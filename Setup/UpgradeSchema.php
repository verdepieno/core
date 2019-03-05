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
			$this->columnCAE(self::F__CODICE_SDI, 'varchar(255) DEFAULT NULL');
			$this->columnCAE(self::F__PEC, 'varchar(255) DEFAULT NULL');
		}
	}

	/**
	 * 2016-08-22
	 * Помимо добавления поля в таблицу «customer_entity» надо ещё добавить атрибут
	 * что мы делаем методом @see \Df\Sso\Upgrade\Data::attribute()
	 * иначе данные не будут сохраняться: https://github.com/magento/magento2/blob/2.1.0/app/code/Magento/Eav/Model/Entity/AbstractEntity.php#L1262-L1265
	 * @used-by _process()
	 * @param string $name
	 * @param string $definition
	 */
	final protected function columnCAE($name, $definition) {$this->column(
		'customer_address_entity', $name, $definition
	);}

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