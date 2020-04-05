import $ from 'jquery';
import './modal';
(() => {
  // Fix bootstrap multi modal
  // =============================================
  const $document = $(document);
  const $body = $(document.body);
  let zIndex = null;
  $document.on('hidden.bs.modal', '.modal', function() {
    $('.modal:visible').length && $body.addClass('modal-open');
  });
  $document.on('show.bs.modal', '.modal', function() {
    zIndex = 2040 + 10 * $('.modal:visible').length;
    $(this).css('z-index', zIndex);
    setTimeout(() => {
      $('.modal-backdrop')
        .not('.modal-stack')
        .css('z-index', zIndex - 1)
        .addClass('modal-stack');
    }, 10);
  });
})();