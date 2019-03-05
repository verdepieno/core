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
			$this->attribute(UpgradeSchema::F__CODICE_SDI, 'Codice SDI');
			$this->attribute(UpgradeSchema::F__PEC, 'PEC');
		}
	}

	/**
	 * 2019-03-05
	 * @used-by _process()
	 * @param string $name
	 * @param string $label
	 */
	private function attribute($name, $label) {
		static $ordering = 1000; /** @var int $ordering */
        $entity = df_eav_config()->getEntityType('customer_address');
        $asId = $entity->getDefaultAttributeSetId(); /** @var int $asId */
        $as = df_new_om(_AS::class); /** @var _AS $as */
		df_eav_setup()->addAttribute(M::ENTITY_TYPE_ADDRESS, $name, [
			'input' => 'text'
			,'label' => $label
			,'position' => $ordering++
			,'required' => false
			,'sort_order' => $ordering
			,'system' => false
			/**
			 * 2019-03-06
			 * `varchar` (a solution without @see \Verdepieno\Core\Setup\UpgradeSchema )
			 * does not work for me.
			 * I guess it is a bug in the Magento 2 Community core.
			 */
			,'type' => 'static'
			,'visible' => true
		]);
		$a = df_eav_config()->getAttribute(M::ENTITY_TYPE_ADDRESS, $name); /** @var A $a */
		$a->addData([
			//G::ATTRIBUTE_SET_ID => M::ATTRIBUTE_SET_ID_ADDRESS
			G::ATTRIBUTE_SET_ID => $asId
			,'attribute_group_id' => $as->getDefaultGroupId($asId)
			,'used_in_forms' => [
				'adminhtml_customer_address'
				,'customer_address_edit'
				,'customer_register_address'
				,'customer_address'
			]
		]);
		$a->save();
	}
}