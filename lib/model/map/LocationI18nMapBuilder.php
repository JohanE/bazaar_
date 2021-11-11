<?php



class LocationI18nMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LocationI18nMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(LocationI18nPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(LocationI18nPeer::TABLE_NAME);
		$tMap->setPhpName('LocationI18n');
		$tMap->setClassname('LocationI18n');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('ID', 'Id', 'INTEGER' , 'internetbazar_location', 'ID', true, null);

		$tMap->addPrimaryKey('CULTURE', 'Culture', 'VARCHAR', true, 7);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', true, 70);

	} 
} 