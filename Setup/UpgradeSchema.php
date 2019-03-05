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
			$this->columnCAE(UpgradeData::F__CODICE_SDI, 'varchar(255) DEFAULT NULL');
			$this->columnCAE(UpgradeData::F__PEC, 'varchar(255) DEFAULT NULL');
		}
	}
}