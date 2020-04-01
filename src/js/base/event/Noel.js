import urijs from 'urijs';

export function getNoelPageUrl(objQueryString = {}) {
  let objUriPage = new urijs('/noel');
  objUriPage.setSearch(objQueryString);
  return objUriPage.resource();
}