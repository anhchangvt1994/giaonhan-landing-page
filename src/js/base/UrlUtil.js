import parse_url from 'locutus/php/url/parse_url';
import str_replace from 'locutus/php/strings/str_replace';
import urijs from 'urijs';

import { getSlug, getSlugJp } from '@jsBasePath/SlugUtil';
import { isObject as _isObject, isEmpty as _isEmpty, forEach as _forEach } from 'lodash';
import { CART_ENUM } from './CartUtil';
import { COUNTRY_ENUM } from '@jsBasePath/CountryUtil';
import { BASE_URL } from '@jsBasePath/MyDefine';

function _parseQueryStringFromObjectToString(objQueryString = {}) {
  if (!_isObject(objQueryString) || _isEmpty(objQueryString)) {
    return '';
  }

  let arrQueryString = [];
  let encodeAndSpecialChar = encodeURIComponent('&');

  /*
    Ưu tiên param 'rh' và 'keywords'
    Theo đúng thứ tự 'rh' ở trước, 'keywords' ở sau
  */
  if (!_isEmpty(objQueryString['rh'])) {
    let strRh = objQueryString['rh'];
    strRh = strRh.replace(/&/g, encodeAndSpecialChar);
    strRh = strRh.replace(/<\/?[^>]+(>|$)/g, '');
    arrQueryString.push('rh=' + strRh);
    delete objQueryString['rh'];
  }

  if (!_isEmpty(objQueryString['keywords'])) {
    let strKeywords = objQueryString['keywords'];
    strKeywords = strKeywords.replace(/&/g, encodeAndSpecialChar);
    strKeywords = strKeywords.replace(/<\/?[^>]+(>|$)/g, '');
    arrQueryString.push('keywords=' + strKeywords);
    delete objQueryString['keywords'];
  }

  // Xử các param còn lại
  if (!_isEmpty(objQueryString)) {
    _forEach(objQueryString, function(value, key) {
      arrQueryString.push(key + '=' + value);
    });
  }

  if (arrQueryString.length === 0) {
    return '';
  }

  let strQueryString = arrQueryString.join('&');
  return strQueryString = strQueryString.replace(/\s/g, '+');
}

export function isValidUrl(strUrl) {
  return /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([-.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/.test(strUrl);
}

export function appendParamToUrl(strUrl, strKey, strValue) {
  strKey = encodeURI(strKey);
  strValue = encodeURI(strValue);

  var parser = document.createElement('a');
  parser.href = strUrl;

  let arrKeyValue = [];
  if (parser.search.length > 1) {
    arrKeyValue = decodeURIComponent(parser.search.substr(1)).split('&');
  }
  let intArrKeyValueLength = arrKeyValue.length;
  let x;
  while (intArrKeyValueLength--) {
    x = arrKeyValue[intArrKeyValueLength].split('=');
    if (x[0] === strKey) {
      x[1] = strValue;
      arrKeyValue[intArrKeyValueLength] = x.join('=');
      break;
    }
  }
  if (intArrKeyValueLength < 0) {
    arrKeyValue[arrKeyValue.length] = [strKey, strValue].join('=');
  }

  let strNewUrl =
    parser.protocol +
    '//' +
    parser.hostname +
    (parser.port ? ':' + parser.port : '') +
    parser.pathname +
    '?' +
    arrKeyValue.join('&') +
    parser.hash;

  return strNewUrl;
}

/**
 * ! Cần nâng cấp hàm này lên xử lý được cả link http, có hoặc không có www vẫn được
 */
export function isAmazonUrl(strUrl) {
  return /^https:\/\/(?=(?:....)?amazon)(((?:\/(?:dp|gp)\/([A-Z0-9]+))?\S*[?&]?(?:tag=))?\S*?)(?:#)?(\w*?-\w{2})?(\S*)(#?\S*)/.test(strUrl);
}

export function getAmazonAsinFromUrl(strUrl) {
  strUrl = str_replace(['gp/', 'aw/', 'd/'], 'dp', strUrl);
  let arrMatches = strUrl.match(/B[0-9]{2}[0-9A-Z]{7}|[0-9]{9}(X|0-9])|[0-9]{10}/);

  if (arrMatches) {
    return arrMatches[0];
  } else {
    return false;
  }
}

/**
 * ! Cần nâng cấp hàm này lên, có thể detect lấy được cả slug chính xác, hiện tại chỉ lấy được asin với merchant, tránh trang chi tiết phải detect lại slug lần nữa performance giảm
 * @param {*} strUrl
 */
export function formatAmazonUrlToFadoUrl(strUrl) {
  if (!isAmazonUrl(strUrl)) {
    return false;
  }

  let arrUrl = parse_url(strUrl);
  let strCountryCode = '';

  switch (arrUrl['host']) {
    case 'www.amazon.com':
      strCountryCode = 'us';
      break;
    case 'amazon.com':
      strCountryCode = 'us';
      break;
    case 'www.amazon.co.jp':
      strCountryCode = 'jp';
      break;
    case 'amazon.co.jp':
      strCountryCode = 'jp';
      break;
    case 'www.amazon.de':
      strCountryCode = 'de';
      break;
    case 'amazon.de':
      strCountryCode = 'de';
      break;
    default:
      return false;
  }

  let objUriPage = new urijs(strUrl);
  let objQueryString = objUriPage.search(true);
  let strAsin = getAmazonAsinFromUrl(strUrl);

  if (!strAsin) {
    return false;
  }

  return getAmazonProductDetailPageUrl(strCountryCode, 'chi-tiet-san-pham', strAsin, {
    m: objQueryString.pf_rd_m,
  });
}

/**
 *
 * @param {String} strCountryCode us|de|jp...
 * @param {String} strProductTitle
 * @param {String} strAsin
 * @param {Object} objQueryString
 */
export function getAmazonProductDetailPageUrl(strCountryCode,
  strProductTitle,
  strAsin,
  objQueryString = {}) {
  let strUrlResult = '';

  if (strCountryCode == 'jp') {
    strProductTitle = getSlugJp(strProductTitle);
  } else {
    strProductTitle = getSlug(strProductTitle);
  }

  strUrlResult += '/' + strCountryCode;
  strUrlResult += '/' + strProductTitle;
  strUrlResult += '-' + strAsin + '.html';

  let objUriPage = new urijs(strUrlResult);
  objUriPage.setSearch(objQueryString);
  return objUriPage.resource();
}

/**
 *
 * @param {String} strCountryCode us|de|jp...
 * @param {Object} objQueryString
 */
export function getDealCategoryPageUrl(strCountryCode, objQueryString = {}) {
  let objUriPage = new urijs('/xem-tat-ca-san-pham-giam-gia-' + strCountryCode);
  objUriPage.setSearch(objQueryString);
  return objUriPage.resource();
}

export function getTodayDealsPageUrl(objQueryString = {}) {
  let objUriPage = new urijs('/today-deals');
  objUriPage.setSearch(objQueryString);
  return objUriPage.resource();
}

export function getCartPageUrl(objQueryString = {}) {
  let objUriPage = new urijs('/gio-hang-cua-ban');
  objUriPage.setSearch(objQueryString);
  return objUriPage.resource();
}

export function getLoginPageUrl(enableRedirect = true, objQueryString = {}) {
  let objUriPage = new urijs('/dang-nhap');

  if (enableRedirect) {
    let strRedirectUrl =  BASE_URL;

    if (!_.isEmpty(objQueryString.redirect)) {
      strRedirectUrl = urijs.decode(objQueryString.redirect);
      let objRedirectParts = urijs.parse(strRedirectUrl);
      if (window.location.hostname !== objRedirectParts.hostname) {
        strRedirectUrl =  BASE_URL;
      }
    } else {
      strRedirectUrl = window.location.href;
    }

    objQueryString.redirect = strRedirectUrl;
  }

  objUriPage.setSearch(filterQueryString(objQueryString));
  return objUriPage.resource();
}

export function getOrderPageUrl(cartType, objQueryString = {}) {
  let strUrlResult = '/xac-nhan-thong-tin-dat-hang';
  cartType = cartType || CART_ENUM.INT_TYPE_DDP;

  if (cartType) {
    strUrlResult = '/xac-nhan-thong-tin-dat-hang?cartType=' + cartType;
  }

  let objUriPage = new urijs(strUrlResult);
  objUriPage.setSearch(objQueryString);
  return objUriPage.resource();
}

export function getContactPageUrl() {
  return '/danh-sach-chi-nhanh';
}

export function getQuotationListUrl() {
  return '/danh-sach-yeu-cau-bao-gia';
}

export function getSearchResultPageUrl(objQueryString = {}) {
  let strUrlResult = '/result/search/';

  let strQueryString = _parseQueryStringFromObjectToString(objQueryString);
  if (strQueryString.length > 0) {
    strUrlResult += '?' + strQueryString;
  }

  return strUrlResult;
}

export function getCategoryPageUrl(strCountryCode, objQueryString) {
  let strUrlResult = '/' + strCountryCode + '/s/cat/';

  let strQueryString = _parseQueryStringFromObjectToString(objQueryString);
  if (strQueryString.length > 0) {
    strUrlResult += '?' + strQueryString;
  }

  return strUrlResult;
}

export function getSearchCategoryPageUrl(strCountryCode, objQueryString) {
  let strUrlResult = '/' + strCountryCode + '/s/search/';

  let strQueryString = _parseQueryStringFromObjectToString(objQueryString);
  if (strQueryString.length > 0) {
    strUrlResult += '?' + strQueryString;
  }

  return strUrlResult;
}

export function getStoreProductDetailPageUrl(strCountryCode,
  strProductTitle,
  strAsin,
  objQueryString = {}) {
  let strUrlResult = '';
  strUrlResult = getAmazonProductDetailPageUrl(strCountryCode, strProductTitle, strAsin, objQueryString);
  strUrlResult += '/store/' + strUrlResult;
  return strUrlResult;
}

export function getSearchOrderPageUrl(objQueryString = {}) {
  let objUriPage = new urijs('/kiem-tra-don-hang');
  objUriPage.setSearch(objQueryString);
  return objUriPage.resource();
}

export function getUserDiscountCodePageUrl(objQueryString = {}) {
  let objUriPage = new urijs('/danh-sach-ma-giam-gia');
  objUriPage.setSearch(objQueryString);
  return objUriPage.resource();
}

export function getInventoryCategoryPageUrl(objQueryString = {}) {
  let objUriPage = new urijs('/san-pham-khuyen-mai');
  objUriPage.setSearch(objQueryString);
  return objUriPage.resource();
}

export function getStoreCategoryPageUrl(strStoreSlug, intStoreId, objQueryString = {}) {
  strStoreSlug = String(strStoreSlug);
  intStoreId = String(intStoreId);

  if (!strStoreSlug || !intStoreId) {
    return null;
  }

  let strPageUrl = '/shop/' + strStoreSlug;
  let objUriPage = new urijs(strPageUrl);
  objUriPage.setSearch(objQueryString);
  return objUriPage.resource();
}

export function getStoreSearchPageUrl(keywords, objQueryString = {}) {
  if (!keywords) {
    return null;
  }

  objQueryString.keywords = keywords;

  let strPageUrl = '/search-store/';
  let objUriPage = new urijs(strPageUrl);
  objUriPage.setSearch(objQueryString);
  return objUriPage.resource();
}

function getAmazonUrlWithCountryCode(countryCode,strSubfixUrl) {
  let strAmazonUrlDefault = 'https://www.amazon.com/' + strSubfixUrl;
  let strAmazonUrl = '';
  switch (countryCode) {
    case COUNTRY_ENUM.STR_DE_CODE:
      strAmazonUrl = strAmazonUrlDefault.replace('com', 'de');
      break;
    case COUNTRY_ENUM.STR_JP_CODE:
      strAmazonUrl = strAmazonUrlDefault.replace('com', 'co.jp');
      break;
    case COUNTRY_ENUM.STR_UK_CODE:
      strAmazonUrl = strAmazonUrlDefault.replace('com', 'co.uk');
      break;
    default:
      strAmazonUrl = strAmazonUrlDefault;
  }

  return strAmazonUrl;
}

// get url category in amazon
export function getAmazonCategoryUrl(strQueryString, countryCode) {
  if(!strQueryString) { return; }

  let strAmazonCategoryUrl = getAmazonUrlWithCountryCode(countryCode, 's/');

  if(strQueryString) {
    strAmazonCategoryUrl += strQueryString;
  }

  return strAmazonCategoryUrl;
}

// get url detail product in amazon
export function getAmazonProductDetailUrl(asin, strQueryString, countryCode) {
  if (!asin) {
    return;
  }

  let strAmazonProductDetailUrl = getAmazonUrlWithCountryCode(countryCode,'dp/'); // trả về strAmazonUrl cho từng region Amazon Mỹ, Đức, Nhật, Anh
  strAmazonProductDetailUrl += asin;

  if (strQueryString) {
    strAmazonProductDetailUrl += strQueryString;
  }

  return strAmazonProductDetailUrl;
}

export function getOrderDetailPageUrl(orderId) {
  if(!orderId) {
    return null;
  }

  orderId = String(orderId);

  return '/chi-tiet-don-hang-' + orderId;
}