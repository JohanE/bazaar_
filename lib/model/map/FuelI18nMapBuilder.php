<?php



class FuelI18nMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FuelI18nMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(FuelI18nPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(FuelI18nPeer::TABLE_NAME);
		$tMap->setPhpName('FuelI18n');
		$tMap->setClassname('FuelI18n');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('ID', 'Id', 'INTEGER' , 'internetbazar_fuel', 'ID', true, null);

		$tMap->addPrimaryKey('CULTURE', 'Culture', 'VARCHAR', true, 7);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', true, 70);

	} 
} 