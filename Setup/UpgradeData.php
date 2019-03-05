<?php
namespace Verdepieno\Core\Setup;
use Magento\Eav\Model\Entity\Attribute\AbstractAttribute as A;
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
			$this->attribute(self::F__CODICE_SDI, 'Codice SDI');
			$this->attribute(self::F__PEC, 'PEC');
		}
	}

	/**
	 * 2019-03-05
	 * @used-by _process()
	 * @param string $name
	 * @param string $label
	 */
	private function attribute($name, $label) {
		$e = 'customer_address'; /** @var string $e */
		static $ordering = 1000; /** @var int $ordering */
		df_eav_setup()->addAttribute($e, $name, [
			'input' => 'text'
			,'label' => $label
			,'position' => $ordering++
			,'required' => false
			,'sort_order' => $ordering
			,'system' => false
			,'type' => 'varchar'
			,'user_defined' => true
			,'visible' => true
		]);
		$a = df_eav_config()->getAttribute($e, $name); /** @var A $a */
		$a->addData(['used_in_forms' => [
			'adminhtml_customer_address', 'customer_address_edit', 'customer_register_address'
		]]);
		$a->save();
	}

	/**
	 * 2019-03-05
	 * @used-by _process()
	 */
	const F__CODICE_SDI = 'verdepieno__codice_sdi';

	/**
	 * 2019-03-05
	 * @used-by _process()
	 */
	const F__PEC = 'verdepieno__pec';
}