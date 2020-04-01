import Language from '@jsBasePath/Language';
import LanguageEnum from '@jsBasePath/LanguageEnum';
import { isEmpty as _isEmpty } from 'lodash';

export const COUNTRY_ENUM = {
  STR_US_CODE: 'us',
  STR_DE_CODE: 'de',
  STR_JP_CODE: 'jp',
  STR_SGP_CODE: 'sgp',
  STR_UK_CODE: 'uk',
  STR_HKG_CODE: 'hkg',
  STR_AU_CODE: 'au',
};

export const ARR_STR_CODE = [
  COUNTRY_ENUM.STR_US_CODE,
  COUNTRY_ENUM.STR_DE_CODE,
  COUNTRY_ENUM.STR_JP_CODE,
  COUNTRY_ENUM.STR_SGP_CODE,
  COUNTRY_ENUM.STR_UK_CODE,
  COUNTRY_ENUM.STR_HKG_CODE,
  COUNTRY_ENUM.STR_AU_CODE,
];

export const ARR_STR_AMAZON_CODE = [
  COUNTRY_ENUM.STR_US_CODE,
  COUNTRY_ENUM.STR_DE_CODE,
  COUNTRY_ENUM.STR_JP_CODE,
  COUNTRY_ENUM.STR_UK_CODE,
  COUNTRY_ENUM.STR_AU_CODE
];

const OBJ_CODE_TO_VN = {};
OBJ_CODE_TO_VN[COUNTRY_ENUM.STR_US_CODE] = 'Mỹ';
OBJ_CODE_TO_VN[COUNTRY_ENUM.STR_DE_CODE] = 'Đức';
OBJ_CODE_TO_VN[COUNTRY_ENUM.STR_JP_CODE] = 'Nhật';
OBJ_CODE_TO_VN[COUNTRY_ENUM.STR_SGP_CODE] = 'Singapore';
OBJ_CODE_TO_VN[COUNTRY_ENUM.STR_UK_CODE] = 'Anh';
OBJ_CODE_TO_VN[COUNTRY_ENUM.STR_HKG_CODE] = 'Hồng Kông';
OBJ_CODE_TO_VN[COUNTRY_ENUM.STR_AU_CODE] = 'Úc';

const OBJ_CODE_TO_EN = {};
OBJ_CODE_TO_EN[COUNTRY_ENUM.STR_US_CODE] = 'United States';
OBJ_CODE_TO_EN[COUNTRY_ENUM.STR_DE_CODE] = 'Germany';
OBJ_CODE_TO_EN[COUNTRY_ENUM.STR_JP_CODE] = 'Japan';
OBJ_CODE_TO_EN[COUNTRY_ENUM.STR_SGP_CODE] = 'Singapore';
OBJ_CODE_TO_EN[COUNTRY_ENUM.STR_UK_CODE] = 'England';
OBJ_CODE_TO_EN[COUNTRY_ENUM.STR_HKG_CODE] = 'Hong Kong';
OBJ_CODE_TO_EN[COUNTRY_ENUM.STR_AU_CODE] = 'Australia';
/**
 * Get text from country code
 * @param {String} strCode us|de|jp....
 */
export function getTextFromCode(strCountryCode) {
  strCountryCode = strCountryCode.toLowerCase();

  if (!ARR_STR_CODE.includes(strCountryCode)) {
    return '';
  }

  let strLanguageCode = Language.getCode();

  switch (strLanguageCode) {
    case LanguageEnum.STR_EN_CODE:
      if (!_isEmpty(OBJ_CODE_TO_EN[strCountryCode])) {
        return OBJ_CODE_TO_EN[strCountryCode];
      }
      break;
    default:
      if (!_isEmpty(OBJ_CODE_TO_VN[strCountryCode])) {
        return OBJ_CODE_TO_VN[strCountryCode];
      }
      break;
  }

  return '';
}

export function isValidAmazonCode(strCountryCode) {
  if (ARR_STR_AMAZON_CODE.includes(strCountryCode)) {
    return true;
  }

  return false;
}
