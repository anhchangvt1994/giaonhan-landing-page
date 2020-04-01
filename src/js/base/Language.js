import {
  isEmpty as _isEmpty,
  templateSettings as _templateSettings,
  template as _template
} from 'lodash';

export default (() => {
  let _strCode = null;
  let _strGlobalScopeKey = null;
  let _strScopeKey = null;
  let _objData = {};

  const _init = () => {
    if (_isEmpty(window.objLanguageData)) {
      return;
    }

    // Không cho thay đổi content sau này
    window.objLanguageData = Object.freeze(window.objLanguageData);

    _strCode = window.objLanguageData.strCode;
    _strGlobalScopeKey = window.objLanguageData.strGlobalScopeKey;
    _strScopeKey = window.objLanguageData.strScopeKey;
    _objData = window.objLanguageData.objData;

    // Nếu không có data thì nghỉ chơi luôn
    if (_isEmpty(_objData)) {
      return;
    }

    _templateSettings.interpolate = /%([\s\S]+?)%/g;
  };

  const _getCode = () => {
    return _strCode;
  };

  /**
   * Mặc định sẽ lấy data thuộc scope global
   */
  const _getGlobal = (strKey, objPlaceholder = null) => {
    if (_isEmpty(strKey)) {
      return '';
    }

    if (_isEmpty(_strGlobalScopeKey) || _isEmpty(_objData[_strGlobalScopeKey])) {
      return strKey;
    }

    let strValue = _objData[_strGlobalScopeKey][strKey];

    if (_isEmpty(strValue)) {
      return strKey;
    }

    let compiled = _template(strValue);
    strValue = compiled(objPlaceholder);

    return strValue;
  };

  /**
   * Mặc định sẽ lấy data thuộc scope hiện tại đang truy cập
   */
  const _get = (strKey, objPlaceholder = null) => {
    if (_isEmpty(strKey)) {
      return '';
    }

    if (_isEmpty(_strScopeKey) || _isEmpty(_objData[_strScopeKey])) {
      return strKey;
    }

    let strValue = _objData[_strScopeKey][strKey];

    if (_isEmpty(strValue)) {
      return strKey;
    }

    let compiled = _template(strValue);
    strValue = compiled(objPlaceholder);

    return strValue;
  };

  /**
   * Mặc định sẽ lấy data thuộc scope yêu cầu
   */
  const _getByScope = (strScopeKey, strKey, objPlaceholder = null) => {
    if (_isEmpty(strKey)) {
      return '';
    }

    if (_isEmpty(strScopeKey) || _isEmpty(_objData[strScopeKey])) {
      return strKey;
    }

    let strValue = _objData[strScopeKey][strKey];

    if (_isEmpty(strValue)) {
      return strKey;
    }

    let compiled = _template(strValue);
    strValue = compiled(objPlaceholder);

    return strValue;
  };

  return {
    init: _init,
    getCode: _getCode,
    getGlobal: _getGlobal,
    get: _get,
    getByScope: _getByScope,
  };
})();
