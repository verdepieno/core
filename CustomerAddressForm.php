<?php
namespace Verdepieno\Core;
use Magento\Customer\Model\Data\Address as A;
// 2019-03-06
final class CustomerAddressForm {
	/**
	 * 2019-03-06
	 * @used-by app/design/frontend/thebell/thebell4/Magento_Customer/templates/form/register.phtml
	 * @used-by vendor/verdepieno/core/view/frontend/templates/customer_address_edit.phtml
	 * @param string $name
	 * @param string $label
	 * @param A|null $a [optional]
	 * @return string
	 */
	static function f($name, $label, A $a = null) {return df_tag('div', "field $name", df_cc_n(
		df_tag('label', ['class' => 'label', 'for' => $name], df_tag('span', [], $label))
		,df_tag('div', 'control', df_tag('input', [
			'class' => 'input-text'
			,'name' => $name
			,'title' => $label
			,'type' => 'text'
			,'value' => !$a ? null : df_cav($a, $name)
		]))
	));}
}