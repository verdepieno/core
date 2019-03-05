<?php
namespace Verdepieno\Core\Setup;
use Magento\Customer\Api\AddressMetadataInterface as M;
use Magento\Eav\Api\Data\AttributeGroupInterface as G;
use Magento\Eav\Model\Entity\Attribute\AbstractAttribute as A;
use Magento\Eav\Model\Entity\Attribute\Set as _AS;
/**
 * 2019-03-05
 * 1) «Add 2 fields to the checkout and customer registration pages»
 * https://www.upwork.com/ab/f/contracts/21713898
 * https://github.com/verdepieno/core/issues/1
 * 2) «How can i add custom field in customer address magento 2»
 * https://magento.stackexchange.com/a/167092
 * 
 * @final Unable to use the PHP «final» keyword here because of the M2 code generation.
 */
class UpgradeData extends \Df\Framework\Upgrade\Data {
	/**
	 * 2019-03-05
	 * @override
	 * @see \Df\Framework\Upgrade::_process()
	 * @used-by \Df\Framework\Upgrade::process()
	 */
	protected function _process() {
		if ($this->isInitial()) {
			$this->attributeCA(UpgradeSchema::F__CODICE_SDI, 'Codice SDI');
			$this->attributeCA(UpgradeSchema::F__PEC, 'PEC');
		}
	}
}