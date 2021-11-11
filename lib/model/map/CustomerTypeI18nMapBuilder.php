<?php



class CustomerTypeI18nMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CustomerTypeI18nMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(CustomerTypeI18nPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(CustomerTypeI18nPeer::TABLE_NAME);
		$tMap->setPhpName('CustomerTypeI18n');
		$tMap->setClassname('CustomerTypeI18n');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('ID', 'Id', 'INTEGER' , 'internetbazar_customertype', 'ID', true, null);

		$tMap->addPrimaryKey('CULTURE', 'Culture', 'VARCHAR', true, 7);

		$tMap->addColumn('DESCRIPTION', 'Description', 'VARCHAR', true, 50);

		$tMap->addColumn('PLURAL_DESCRIPTION', 'PluralDescription', 'VARCHAR', true, 50);

	} 
} 