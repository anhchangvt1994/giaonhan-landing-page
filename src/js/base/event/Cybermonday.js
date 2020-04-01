import urijs from 'urijs';

// Cybermonday event
export const CYBERMONDAY_DEFINE = {
  URL_DEFAULT: '/cybermonday?countryCode=us&page=1&categories=172282,2102313011,541966,2335752011,667846011,502394,1266092011,468642,6358539011&priceRanges=25-50&sortOrder=BY_DISCOUNT_DESCENDING',
};

export function getCybermondayPageUrl(objQueryString = {}) {
  let objUri = new urijs('/cybermonday');
  objUri.setSearch(objQueryString);
  return objUri.resource();
}
