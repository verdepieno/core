<?php
namespace Verdepieno\Core\Setup;
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
			$this->attributeCA(self::F__CODICE_SDI, self::T__CODICE_SDI);
			$this->attributeCA(self::F__PEC, self::T__PEC);
		}
	}

	/**
	 * 2019-03-05
	 * @used-by _process()
	 * @used-by \Verdepieno\Core\Observer\QuoteSubmitBefore::p()
	 * @used-by \Verdepieno\Core\Setup\UpgradeSchema::_process()
	 */
	const F__CODICE_SDI = 'verdepieno_codice_sdi';

	/**
	 * 2019-03-05
	 * @used-by _process()
	 * @used-by \Verdepieno\Core\Observer\QuoteSubmitBefore::p()
	 * @used-by \Verdepieno\Core\Setup\UpgradeSchema::_process()
	 */
	const F__PEC = 'verdepieno_pec';

	/**
	 * 2019-03-06
	 * @used-by _process()
	 */
	const T__CODICE_SDI = 'Codice SDI';

	/**
	 * 2019-03-06
	 * @used-by _process()
	 */
	const T__PEC = 'PEC';
}