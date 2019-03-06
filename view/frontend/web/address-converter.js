define([
	'df-lodash', 'jquery', 'mage/utils/wrapper'
], function(_, $, w) {'use strict';
return function(sb) {
$.extend(sb, {
	formAddressDataToQuoteAddress: w.wrap(sb.formAddressDataToQuoteAddress, function(_super, d) {return _super(
		_.extend(d, {custom_attributes: _.pick(d, ['verdepieno_codice_sdi', 'verdepieno_pec'])}));
	})
});
return sb;};});