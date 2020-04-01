import urijs from 'urijs';

export function getBlackfridayPageUrl(objQueryString = {}) {
  let objUriPage = new urijs('/blackfriday');
  objUriPage.setSearch(objQueryString);
  return objUriPage.resource();
}