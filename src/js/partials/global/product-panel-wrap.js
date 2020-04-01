import $ from 'jquery';
import { formatVnPriceWithUnit } from '@jsBasePath/PriceUtil';
import { AJAX_URL, MY_DEFINE, BANNED_IMAGE_URL, LOADING_IMAGE_URL } from '@jsBasePath/MyDefine';
import { isEmpty as _isEmpty, isNumber as _isNumber } from 'lodash';

export default (() => {
  const _getBasicDataFormatted = (arrElGetFinalPrice) => {
    let $arrElGetFinalPrice = $(arrElGetFinalPrice);

    $arrElGetFinalPrice.removeAttr('data-get-final-price');

    let objBasicData = {},
      productItemData,
      strAsinMerchandId;

    $arrElGetFinalPrice.each(function($key, $elGetFinalPrice) {
      productItemData = $elGetFinalPrice.dataset;
      if (!objBasicData[productItemData.countryCode]) {
        // nếu đối tượng objBasicData của countrycode nào chưa được khai báo đối tượng thì khai báo, ở đây được xác thực và khai báo tự động, nên số lượng countryCode có bao nhiêu thì sẽ tự khai báo bấy nhiêu, vd (us,de,jp) ở đây là khai báo 3 object tương ứng với 3 countryCode
        objBasicData[productItemData.countryCode] = {};
      }

      // gán giá trị tương ứng : mỗi asin-merchantId/asin = element chứa nó, cụ thể ở đây là ' <div class="product-panel" data-get-final-price data-asin="..." data-merchant-id="..."> '
      strAsinMerchandId = !_isEmpty(productItemData.merchantId)
        ? productItemData.asin + '-' + productItemData.merchantId
        : productItemData.asin;
      objBasicData[productItemData.countryCode][strAsinMerchandId] = $elGetFinalPrice;
    });

    return objBasicData;
  }; // end_getBasicDataFormatted

  const _renderFinalPriceProcess = (objResponseData,
    arrAsinMerchantIdOfCountry,
    arrFinalPriceDataOfCountry) => {
    let intOldPrice = 0,
      intCurPrice = 0,
      intNewPrice = 0,
      intMemberPrice = 0,
      intPercentDiscount = 0,
      isBanned = false;

    arrAsinMerchantIdOfCountry.forEach(function(key) {
      (intOldPrice = 0),
        (intCurPrice = 0),
        (intNewPrice = 0),
        (intMemberPrice = 0),
        (intPercentDiscount = 0),
        (isBanned = false);

      let data = objResponseData['original'][key],
        dataFinal = objResponseData['final'];

      if (_isEmpty(data)) {
        return;
      }

      const $elProductPanel = $(arrFinalPriceDataOfCountry[key]);

      if (!_isEmpty(dataFinal) && !_isEmpty(dataFinal[key])) {
        let dataAsinFinal = dataFinal[key];

        // Generate final price
        if (!_isEmpty(dataAsinFinal['finalPrice'])) {
          const dataAsinFinalPrice = dataAsinFinal['finalPrice'];

          if (
            !_isEmpty(dataAsinFinalPrice['oldPrice']) &&
            _isNumber(dataAsinFinalPrice['oldPrice']['formattedPrice']) &&
            dataAsinFinalPrice['oldPrice']['formattedPrice'] > 0
          ) {
            // có giá cũ
            intOldPrice = dataAsinFinalPrice['oldPrice']['formattedPrice'];
          }

          if (
            !_isEmpty(dataAsinFinalPrice['currentPrice']) &&
            _isNumber(dataAsinFinalPrice['currentPrice']['formattedPrice']) &&
            dataAsinFinalPrice['currentPrice']['formattedPrice'] > 0
          ) {
            intCurPrice = dataAsinFinalPrice['currentPrice']['formattedPrice'];
          }

          if (
            !_isEmpty(dataAsinFinalPrice['memberPrice']) &&
            _isNumber(dataAsinFinalPrice['memberPrice']['formattedPrice']) &&
            dataAsinFinalPrice['memberPrice']['formattedPrice'] > 0
          ) {
            // có giá thành viên
            intMemberPrice = dataAsinFinalPrice['memberPrice']['formattedPrice'];
          }

          // final price (lưu ý phải xét giá ưu đãi thành viên nếu có)
          intNewPrice = intMemberPrice > 0 ? intMemberPrice : intCurPrice;
        }

        if (
          _isNumber(dataAsinFinal['percentageDiscount']) &&
          dataAsinFinal['percentageDiscount'] > 0
        ) {
          intPercentDiscount = dataAsinFinal['percentageDiscount'];
        }

        // ! Cờ này trả từ BOT anh Vũ mập
        if ((_isNumber(data['isAdult']) && data['isAdult'] > 0)
        || (_isNumber(data['isWeapon']) && data['isWeapon'] > 0)
        || (_isNumber(data['isUnsupport']) && data['isUnsupport'] > 0)) {
          isBanned = true;
        } else if (_isNumber(dataAsinFinal['banned']) && dataAsinFinal['banned'] > 0) { // ! Cờ này trả từ API anh Trí lớn
          isBanned = true;
        }
      } // endif

      // xét trường hợp show giá / xem báo giá / liên hệ
      if (!isBanned && intNewPrice > 0) {
        $elProductPanel.attr('data-product_price', intNewPrice); // Set gtm product price
        $elProductPanel.find('.product-curr-price').html(formatVnPriceWithUnit(intNewPrice));

        if (intOldPrice > 0 && intOldPrice != intNewPrice) {
          $elProductPanel
            .find('.product-old-price')
            .html(formatVnPriceWithUnit(intOldPrice));
        } else {
          $elProductPanel.find('.product-old-price').text('');
        }
      } else {
        if (!isBanned) {
          $elProductPanel
            .find('.product-curr-price')
            .html('Click để xem báo giá');
        } else {
          $elProductPanel
            .find('.product-curr-price')
            .text('Không hỗ trợ nhập khẩu');
        }

        $elProductPanel.find('.product-old-price').text('');
      }

      // Generate product url
      if (!isBanned) {
        $elProductPanel.find('.product-panel-link').attr('href', data.url);
      } else {
        $elProductPanel.addClass('is-banned');
        $elProductPanel.find('.product-panel-link').attr('href', 'javascript:;');
      }
      // Add banned image
      const $elProductImage = $elProductPanel.find('.product-img-item');
      if (isBanned) {
        $elProductImage.removeClass('lazyload').attr('src',BANNED_IMAGE_URL);
      } else {
        $elProductImage.attr('src',$elProductImage.data('src'));
      }

      // Generate percent discount
      if (!isBanned && intPercentDiscount > 0) {
        $elProductPanel
          .find('.product-value')
          .before(`<div class="product-percentage">-${ intPercentDiscount }%</div>`);
      }
    }); // end forEach()
  }; // _renderFinalPriceProcess

  /**
   *
   * @param {*} strCountryCode
   * @param {*} arrAsinMerchantIdOfCountry // danh sách [arin-merchantId,...]
   * @param {*} arrFinalPriceDataOfCountry // danh sách sản phẩm {arsin-merchantId => productData,...}
   * @param {*} isGetDataFromCache // kiểm tra có lấy data từ cache không
   */
  const _requestAjaxFinalPrice = (strCountryCode,
    arrAsinMerchantIdOfCountry,
    arrFinalPriceDataOfCountry) => {
      /**
       * trường hợp phải request dữ liệu từ API Amazon thì cần :
       *  - cắt mảng/object từ basic data formatted ra tối đa maxProductPerGetFinalPriceRequest phần tử cho 1 lượt request
       *  - phần tử vẫn còn thì tiếp tục đệ quy hàm và lặp lại các bước
       */

      const arrAsinMerchantIdCountrySplitted = arrAsinMerchantIdOfCountry.slice(0,
        MY_DEFINE.maxProductPerGetFinalPriceRequest);

      let objData = {
        lang: strCountryCode,
        listAsin: arrAsinMerchantIdCountrySplitted.join(),
      };

      $.ajax({
        type: 'GET',
        url: AJAX_URL.product.getFinalPriceList,
        data: objData,
        dataType: 'json',

        success(objResponse) {
          if (
            _isEmpty(objResponse) ||
            !objResponse.success ||
            _isEmpty(objResponse.data) ||
            _isEmpty(objResponse.data['original'])
          ) {
            return;
          }

          _renderFinalPriceProcess(objResponse.data,
            arrAsinMerchantIdCountrySplitted,
            arrFinalPriceDataOfCountry,
            false);
        },

        complete() {
          const intBeginAsinMerchantIdIndex = Object.keys(arrFinalPriceDataOfCountry).indexOf(arrAsinMerchantIdCountrySplitted[0]);
          const arrFinalPriceDataOfCountrySplitted = Object.values(arrFinalPriceDataOfCountry).slice(intBeginAsinMerchantIdIndex,
            intBeginAsinMerchantIdIndex + MY_DEFINE.maxProductPerGetFinalPriceRequest);
          const $arrElNoneHref = $(arrFinalPriceDataOfCountrySplitted).find('a[href=""]');
          const $arrElNoneImage = $(arrFinalPriceDataOfCountrySplitted).find('img[src="'+LOADING_IMAGE_URL+'"]');

          $arrElNoneHref.each(function(id, elNoneHref) {
            elNoneHref.setAttribute('href',elNoneHref.getAttribute('data-url'));
          });

          $arrElNoneImage.each(function(id, elNoneImage) {
            elNoneImage.setAttribute('src',elNoneImage.getAttribute('data-src'));
          });

          $(arrFinalPriceDataOfCountrySplitted)
            .removeClass('is-loading-price');
        },
      }); // end ajax()

      const arrNextAsinMerchandIdOfCountry = arrAsinMerchantIdOfCountry.slice(MY_DEFINE.maxProductPerGetFinalPriceRequest);

      if (arrNextAsinMerchandIdOfCountry.length > 0) {
        _requestAjaxFinalPrice(strCountryCode,
          arrNextAsinMerchandIdOfCountry,
          arrFinalPriceDataOfCountry,
          false);
      }
  }; // end_requestAjaxFinalPrice

  const _getFinalPrice = (arrElGetFinalPrice) => {
    if (_isEmpty(arrElGetFinalPrice)) {
      return;
    }

    // gọi hàm _getBasicDataFormatted để get object dữ liệu ban đầu để làm origin data cho request Ajax final price
    let objBasicDataFormatted = _getBasicDataFormatted(arrElGetFinalPrice);
    /**
     * cấu trúc objBasicDataFormatted :
     * {
     *  us : { asin-merchant/asin : element },
     *  de : { // },
     *  jp : { // },
     * }
     *
     * Object.keys(objFinalPriceDataOfCountryCode) = [ asin-merchant/asin, ... ]
     */
    $.each(objBasicDataFormatted, function(countryCode, objFinalPriceDataOfCountryCode) {
      _requestAjaxFinalPrice(countryCode,
        Object.keys(objFinalPriceDataOfCountryCode),
        objFinalPriceDataOfCountryCode,
        true);
    });
  }; // end_getFinalPrice


  /*=======================================*/

  const _checkAnchorTagHasHref = (elProductPanel) => {
    return elProductPanel.find('a[href=""]');
  };


  return {
    init() {
      const arrElProductPanel = $('.product-panel'); // Tất cả div.product-panel.is-loading-price

      arrElProductPanel.on('click', function() {
        if(_checkAnchorTagHasHref($(this)).length > 0) {
          return false;
        }
      });

      if (arrElProductPanel.length <= 0) {
        return;
      }



      const arrElProductPanelGetFinalPrice = document.querySelectorAll('.product-panel[data-get-final-price]');
      if (arrElProductPanelGetFinalPrice.length <= 0) {
        return;
      }

      _getFinalPrice(arrElProductPanelGetFinalPrice);
    },
  };
})();
