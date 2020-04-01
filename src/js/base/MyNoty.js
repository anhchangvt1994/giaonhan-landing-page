/*
Exam alert: https://ned.im/noty/#/options
MyNoty.alert('message',{
  layout: 'bottomCenter',
  queue: 'alert',
  delay: 0,
  force: false,
}).show()

*/
import Noty from 'noty';

Noty.overrideDefaults({
  progressBar: false,
});

let MyNoty = {};

// =============================================
// Setup alert
// =============================================
Noty.setMaxVisible(5, 'alert');
let arrAlertType = ['warning', 'danger', 'success'];

/**
 * Fado Notify Alert
 * @param {String} strMessage message text
 * @param {String} strType warning | danger | success
 * @param {Object} objOptionsConfig { layout: 'bottomCenter', delay: 0, ... }
 */
MyNoty.alert = function(strMessage, strType = 'warning', objOptionsConfig = {}) {
  objOptionsConfig.type = strType;

  if (!arrAlertType.includes(objOptionsConfig.type)) objOptionsConfig.type = 'warning';

  objOptionsConfig = {
    layout: 'bottomCenter',
    timeout: 5000,
    queue: 'alert',
    text: '',
    ...objOptionsConfig,
    ...{
      theme: 'my-alert',
    },
  };

  // Set html
  switch (strType) {
    case 'warning':
      objOptionsConfig.text = `
        <div class="noty_body__icon-col"><i class="noty_body__icon fal fa-exclamation-circle"></i></div>
        <div class="noty_body__content-col">${ strMessage }</div>
      `;
      break;
    case 'danger':
      objOptionsConfig.text = `
        <div class="noty_body__icon-col"><i class="noty_body__icon fal fa-times-circle"></i></div>
        <div class="noty_body__content-col">${ strMessage }</div>
      `;
      break;
    case 'success':
      objOptionsConfig.text = `
        <div class="noty_body__icon-col"><i class="noty_body__icon fal fa-check-circle"></i></div>
        <div class="noty_body__content-col">${ strMessage }</div>
      `;
      break;
  }

  return new Noty(objOptionsConfig);
};

// =============================================
// Setup loading
// =============================================
Noty.setMaxVisible(5, 'loading');
let arrLoadingType = ['warning', 'danger', 'success', 'default'];

/**
 * Fado Notify loading
 * @param {String} strMessage message text
 * @param {String} strType default | warning | danger | success
 * @param {Object} objOptionsConfig { layout: 'bottomCenter', delay: 0, ... }
 */
MyNoty.loading = function(strMessage = 'Đang xử lý dữ liệu...',
  strType = 'default',
  objOptionsConfig = {}) {
  objOptionsConfig.type = strType;

  if (!arrLoadingType.includes(objOptionsConfig.type)) objOptionsConfig.type = 'default';

  objOptionsConfig = {
    layout: 'bottomCenter',
    queue: 'loading',
    force: true,
    closeWith: false,
    ...objOptionsConfig,
    ...{
      theme: 'my-loading',
    },
  };

  objOptionsConfig.text = `
    <div class="noty_body__icon-col"><i class="noty_body__icon far fa-spinner fa-spin"></i></div>
    <div class="noty_body__content-col">${ strMessage }</div>
  `;

  return new Noty(objOptionsConfig);
};

// =============================================
// Export
// =============================================
export { Noty, MyNoty };
