<?php
namespace Verdepieno\Core\Setup;
use Verdepieno\Core\Setup\UpgradeData as D;
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
			df_dbc_ca(D::F__CODICE_SDI);
			df_dbc_ca(D::F__PEC);
		}
		if ($this->v('0.0.2')) {
			df_dbc_oa(D::F__CODICE_SDI);
			df_dbc_oa(D::F__PEC);
			df_dbc_qa(D::F__CODICE_SDI);
			df_dbc_qa(D::F__PEC);
		}
	}
}