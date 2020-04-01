import { WOW } from 'wowjs';
import $ from 'jquery';
// import { MyNoty } from '@jsBasePath/MyNoty';
// import { formatAmazonUrlToFadoUrl, isAmazonUrl, getSearchResultPageUrl } from '@jsBasePath/UrlUtil';
// import ProductPanelWrap from '@jsGlobalPath/product-panel-wrap';
import '@fancyapps/fancybox';
import { isEmpty as _isEmpty } from 'lodash';

const amazonLandingPage = (()=> {
  const _setAnimateWhenScroll = () => {
    new WOW().init();
  };

  const _setupScrollPage = () => {
    const elMoveBtn = document.getElementById('jsMoveBtnItem');
    if(!elMoveBtn) { return; }

    const strHashTarget = elMoveBtn.hash;

    const $elScrollPartDot = $('.scroll-pagination-dot-item');

    var body = $('html, body');
    elMoveBtn.addEventListener('click',function() {
      $(window).off('scroll');
      $elScrollPartDot.removeClass('is-active');
      $elScrollPartDot.filter('[href="'+strHashTarget+'"]').addClass('is-active');
      body.stop().animate({
        scrollTop: $(strHashTarget).offset().top,
      },800,'swing',function() {
        _detectScrollPartDotWhenScroll();
      });
    });
  }; // end _setupScrollPage

  /*
    //! search Keyword
    const _searchKeyword = () => {
      const $elSearchForm = $('.amazon-search-form');

      if($elSearchForm.length == 0) { return; }

      $elSearchForm.on('submit', function(e) {
        const strKeywords = e.target[0].value;
        const $elSearchIcon = $($(e.target).find('.amazon-search-icon'));
        if(e) {
          e.preventDefault();
        }

        if(strKeywords == '') {
          MyNoty.alert('Vui lòng nhập từ khóa trước khi tìm kiếm').show();
          return;
        }

        setTimeout(() => {
          $elSearchIcon.replaceWith('<i class="amazon-search-icon far fa-spinner fa-spin"></i>');
          this.isLoadingRedirect = true;

          if(isAmazonUrl(strKeywords)) {
            let strFadoUrl = formatAmazonUrlToFadoUrl(strKeywords);

            if(strFadoUrl) {
              window.location.href = strFadoUrl;
              return;
            }
          }

          const strKeywordsSend = strKeywords.replace(/<\/?[^>]+(>|$)/g, '');

          window.location.href = getSearchResultPageUrl({
            rh: 'k:' + strKeywordsSend,
            keywords: strKeywordsSend,
            lptracking: 'muahangamazon',
          });
        },100);
      });
    }; // end _searchKeyword
  */

  const _selectHotKey = () => {
    const $elHotTag = $('.head-mid-segment-tag-item');
    const $elSearchForm = $('.head-mid-segment-form');

    if($elHotTag.length == 0 && $elSearchForm.length == 0) { return; }

    $elHotTag.on('click', function() {
      const strKeywords = $(this).html()
      .trim()
      .replace(/['"]+/g, '');

      $elSearchForm.find('.head-mid-segment-search-input').val(strKeywords);
      $elSearchForm.submit();
    });
  }; // end _selectHotKey

  const _generateFanpage = () => {
    window.addOnloadEvent(function() {
      setTimeout(() => {
        // document.getElementById('foot-segment-fan-page-box').innerHTML =
        //   '<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FFadoVietnam&tabs=timeline&width=278&height=130&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId" width="278" height="130" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>';
      }, 4000);
    });
  }; // end _generateFanpage

  const _setupDocumentClickEvent = () => {
    const $elIntroBlock = $('#intro-block');
    const $elBenefitPanel = $elIntroBlock.find('.head-segment-top-benefit-panel');

    $(document).on('click','[data-stop-propagation]', function(ev) {
      ev.stopPropagation();
    });

    $(document).on('click', function() {
      // remove is-active for elBenefitPanel

      $elBenefitPanel.removeClass('is-active');
    });
  }; // _setupDocumentClickEvent

  const _clickBenefitPanel = () => {
    const $elIntroBlock = $('#intro-block');
    const $elBenefitPanel = $elIntroBlock.find('.head-segment-top-benefit-panel');

    if(!$elBenefitPanel) { return; }

    $elBenefitPanel.on('click', function() {
      if($(this).hasClass('is-active')) {
        $(this).removeClass('is-active');
        $(this).removeAttr('data-stop-propagation');
      } else {
        $elBenefitPanel.removeClass('is-active');
        $elBenefitPanel.removeAttr('data-stop-propagation');
        $(this).addClass('is-active');
        $(this).attr('data-stop-propagation','');
      }
    });
  }; // end _clickBenefitPanel

  const _changeTabEvent = () => {
    const strDealTabUrl = '/today-deals?tab=';
    const $elRmoreDealBtn = $('.btn-read-more-item');
    const $objElProductSegment = $('.block-product-segment');
    const objElProductSegmentCountry = {
      'us': $objElProductSegment.filter('.product-segment-us'),
      'jp': $objElProductSegment.filter('.product-segment-jp'),
      'de': $objElProductSegment.filter('.product-segment-de'),
    };

    const $elElCountryTabLink = $('.country-tab-link');

    if($elElCountryTabLink.length == 0) {
      return;
    }

    $elElCountryTabLink.on('click', function() {
      if(!objElProductSegmentCountry[$(this).data('countryCode')].hasClass('is-show')) {

        $elElCountryTabLink.removeClass('is-active');
        $(this).addClass('is-active');

        $objElProductSegment.removeClass('is-show');
        objElProductSegmentCountry[$(this).data('countryCode')].addClass('is-show');

        $elRmoreDealBtn.attr('href',strDealTabUrl+$(this).data('countryCode'));
      }
    });
  }; // end _changeTabEvent

  const _setPlaceHolderSearchInput = () => {
    const $elAmazonSearchInput = $('.amazon-search-input');

    if(!$elAmazonSearchInput) {
      return;
    }

    $(window).on('resize load', function() {
      if(window.outerWidth >= 485) {
        if($elAmazonSearchInput.attr('placeholder') == 'Tìm kiếm') {
          $elAmazonSearchInput.attr('placeholder','Nhập tên hoặc link sản phẩm từ Amazon ');
        }
      } else {
        if($elAmazonSearchInput.attr('placeholder') != 'Tìm kiếm') {
          $elAmazonSearchInput.attr('placeholder','Tìm kiếm');
        }
      }
    });
  }; // end _setPlaceHolderSearchInput

  const _setScrollPartDotAction = () => {
    const $elScrollPartDot = $('.scroll-pagination-dot-item');

    if(_isEmpty($elScrollPartDot)) {
      return;
    }

    var body = $('html, body');
    $elScrollPartDot.on('click',function(ev) {
      $(window).off('scroll');
      $elScrollPartDot.removeClass('is-active');
      $(this).addClass('is-active');

      body.stop().animate({
        scrollTop: $(ev.currentTarget ? ev.currentTarget.hash : ev.target.hash).offset().top,
      },800,'swing', function() {
        _detectScrollPartDotWhenScroll();
      });
    });
  }; // end _setScrollPartDotAction

  const _firstCheckHashToScroll = () => {
    const strUrlHash = window.location.hash;
    const $elOfHash = $(strUrlHash);
    const $elScrollPartDot = $('.scroll-pagination-dot-item');

    if(_isEmpty(strUrlHash) ||
      _isEmpty($elOfHash) ||
      _isEmpty($elScrollPartDot)) {
      _detectScrollPartDotWhenScroll();
      return;
    }
    $elScrollPartDot.removeClass('is-active');
    $elScrollPartDot.filter('[href="'+strUrlHash+'"]').addClass('is-active');

    var body = $('html, body');

    body.stop().animate({
      scrollTop: $elOfHash.offset().top,
    },800,'swing', function() {
      _detectScrollPartDotWhenScroll();
    });
  }; // end _firstCheckHashToScroll

  const _detectScrollPartDotWhenScroll = () => {
    const $elScrollPartDot = $('.scroll-pagination-dot-item');
    const $elLastScrollPartDot = $elScrollPartDot.filter('[href="#fado-landing-footer-block"]');

    const __activeDotPagination = (strActiveCurrentId) => {
      $elScrollPartDot.removeClass('is-active');
      $elScrollPartDot.filter('[href="'+strActiveCurrentId+'"]').addClass('is-active');
    };
    const __isScrolledIntoView = (element, fullyInView) => {
      var pageTop = $(window).scrollTop();
      var pageBottom = pageTop + $(window).height();
      var elementTop = $(element).offset().top;
      var elementBottom = elementTop + $(element).outerHeight(true);

      if (fullyInView === true) {
          return ((pageTop < elementTop) && (pageBottom > elementBottom));
      } else {
          return ((elementTop <= pageBottom) && (elementBottom - 10 >= pageTop));
      }
    };

    $(window).scroll(function() {
      if(delayTimeScroll) {
        clearTimeout(delayTimeScroll);
      }

      const delayTimeScroll = setTimeout(function() {
        if (
          (window.innerHeight + window.pageYOffset) >= document.body.offsetHeight - 2
        ) {
          if(!$elLastScrollPartDot.hasClass('is-active')) {
            $elScrollPartDot.removeClass('is-active');
            $elLastScrollPartDot.addClass('is-active');
          }

          return;
        }

        if(__isScrolledIntoView($('#fado-landing-header-block'),false)) {
          __activeDotPagination('#fado-landing-header-block');
        }
        else if(__isScrolledIntoView($('#intro-block'),false)) {
          __activeDotPagination('#intro-block');
        }
        else if(__isScrolledIntoView($('#trend-block'),false)) {
          __activeDotPagination('#trend-block');
        }
        else if(__isScrolledIntoView($('#fado-landing-footer-block'),false)) {
          __activeDotPagination('#fado-landing-footer-block');
        }
      },100);
    });
  }; // end _detectScrollPartDotWhenScroll

  return {
    init() {
      _setAnimateWhenScroll();
      _setupScrollPage();
      // _searchKeyword();
      _selectHotKey();
      _generateFanpage();
      _setupDocumentClickEvent();
      _clickBenefitPanel();
      _changeTabEvent();
      _setPlaceHolderSearchInput();
      _setScrollPartDotAction();
      window.addOnloadEvent(function() {
        _firstCheckHashToScroll();
      });
    },
  };
})();

amazonLandingPage.init();
