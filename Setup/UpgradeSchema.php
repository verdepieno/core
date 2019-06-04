<?php
namespace Verdepieno\Core\Setup;
// 2019-03-06
/** @final Unable to use the PHP «final» keyword here because of the M2 code generation. */
class UpgradeSchema extends \Df\Framework\Upgrade\Schema {
	/**
	 * 2019-03-06
	 * @override
	 * @see \Df\Framework\Upgrade::_process()
	 * @used-by \Df\Framework\Upgrade::process()
	 */
	final protected function _process() {
		if ($this->isInitial()) {
			$this->columnCAE(UpgradeData::F__CODICE_SDI);
			$this->columnCAE(UpgradeData::F__PEC);
		}
		if ($this->v('0.0.2')) {
			$this->column('quote_address', UpgradeData::F__CODICE_SDI);
			$this->column('sales_order_address', UpgradeData::F__CODICE_SDI);
			$this->column('quote_address', UpgradeData::F__PEC);
			$this->column('sales_order_address', UpgradeData::F__PEC);
		}
	}
}