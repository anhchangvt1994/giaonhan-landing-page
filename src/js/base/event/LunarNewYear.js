import urijs from 'urijs';

export function getLunarNewYearPageUrl(objQueryString = {}) {
  let objUriPage = new urijs('/tet-nguyen-dan');
  objUriPage.setSearch(objQueryString);
  return objUriPage.resource();
}