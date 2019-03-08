<?php
namespace Verdepieno\Core\Plugin\Customer\Model;
use Magento\Customer\Api\Data\AddressInterface as IA;
use Magento\Customer\Model\Address as A;
use Magento\Customer\Model\Customer as Sb;
// 2019-03-09
// "If a customer's VAT field is empty, then fill it from his default address":
// https://github.com/verdepieno/core/issues/2
final class Customer {
	/**
	 * 2019-03-09
	 * @see \Magento\Framework\Model\AbstractModel::setOrigData()
	 * @param Sb $sb
	 */
	function beforeSetOrigData(Sb $sb) {
		if (!$sb['taxvat']) {
			if ($a = $sb->getPrimaryBillingAddress()) /** @var A|false $a */ {
				$sb['taxvat'] = $a[IA::VAT_ID];
			}
		}
	}
}