<?php
namespace Verdepieno\Core\Plugin\Quote\Model\Quote\Address;
use Magento\Quote\Model\Quote\Address\CustomAttributeListInterface as Sb;
use Verdepieno\Core\Setup\UpgradeData as D;
// 2019-03-06
final class CustomAttributeListInterface {
	/**
	 * 2019-03-06
	 * @see \Magento\Quote\Model\Quote\Address\CustomAttributeList::getAttributes()
	 * @param Sb $sb
	 * @param string[] $r
	 * @return array(string => int)
	 */
	function afterGetAttributes(Sb $sb, array $r) {return $r + array_flip([
		D::F__CODICE_SDI, D::F__PEC
	]);}
}