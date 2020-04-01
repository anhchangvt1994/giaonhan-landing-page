import numeral from 'numeral';

export function formatVnPriceWithUnit(price) {
  return numeral(price).format('0,0') + ' <sup>đ</sup>';
}

export function formatVnPrice(price) {
  return numeral(price).format('0,0');
}

export function formatUsPrice(price) {
  return numeral(price).format('0,0.00');
}

export function formatUsPriceWithUnit(price) {
  return numeral(price).format('0,0.00') + ' $';
}
