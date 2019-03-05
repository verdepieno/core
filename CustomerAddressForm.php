<?php
namespace Verdepieno\Core;
use Magento\Customer\Model\Data\Address as A;
// 2019-03-06
final class CustomerAddressForm {
	/**
	 * 2019-03-06
	 * @used-by vendor/verdepieno/core/view/frontend/templates/customer_address_edit.phtml
	 * @param A $a
	 * @param string $name
	 * @param string $label
	 * @return string
	 */
	static function f(A $a, $name, $label) {return df_tag('div', 'field', df_cc_n(
		df_tag('label', ['class' => 'label', 'for' => $name], df_tag('span', [], $label))
		,df_tag('div', 'control', df_tag('input', [
			'class' => 'input-text'
			,'name' => $name
			,'title' => $label
			,'type' => 'text'
			,'value' => df_cav($a, $name)
		]))
	));}
}