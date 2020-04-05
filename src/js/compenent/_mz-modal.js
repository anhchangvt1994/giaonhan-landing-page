import _ from 'lodash';
import $ from 'jquery';
import '$jsLibsPath/boostrap/modal-custom';
export default (() =>{
  let _init = false;
  const generateModalHtml = (options) => {
    let modalId ='';
    let modalType ='';
    let modalTitle ='';
    let modalBody ='';
    let modalFooter ='';
    if(!_.isEmpty(options.id)){
      modalId = 'id="' + options.id + '"';
    }
    if(!_.isEmpty(options.type)){
      modalType = 'mz-modal-'+ options.type;
    }
    if(!_.isEmpty(options.title)){
      modalTitle = 
      `<div class="mz-modal-head">
        <div class= "mz-modal-title">
        `+ options.title +`
        </div>
      </div>`;
    }
    if(!_.isEmpty(options.bodyHtml)){
      modalBody = 
        `<div class="mz-modal-body">
          `+ options.bodyHtml +`
        </div>`;
    }
    if(!_.isEmpty(options.footerHtml)){
      modalFooter =
      `<div class="mz-modal-footer">
        `+ options.footerHtml +`
      </div>`;
    }
    let template =
      `<div ` + modalId + `class="modal fade">
        <div role="document" class="modal-dialog modal-dialog-centered mz-modal-dialog">
          <div role="document" class="modal-dialog modal-dialog-centered mz-modal-dialog">
            <div class="mz-modal-content `+ modalType +`">
              <div class="mz-modal-close-button-row">
                <button type="button" data-dismiss="modal" aria-label="Close" class="close mz-modal-close-top">
                  <i aria-hidden="true" class="fal fa-times-circle"></i>
                </button>
              </div>
                `+ modalTitle + modalBody + modalFooter +`
            </div>
          </div>
        </div>
      </div>`;
    return template;
  };
  const _createModal = (options) => {
    if(_.isEmpty(options) || $('#'+ options.id).length || _.isEmpty(options.id)){
      return;
    }
    let $newModalHtml = $(generateModalHtml(options));
    $(document.body).append($newModalHtml);
    $newModalHtml.modal('show');
    $newModalHtml.on('hidden.bs.modal', function(){
      this.remove();
    });
    return $newModalHtml;
  };
  return {
    init() {
      if(_init) {
        return;
      }
      _init = true;
    },
    createModal: _createModal,
  };
})();