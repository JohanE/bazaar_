<?php



class GearboxI18nMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GearboxI18nMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(GearboxI18nPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(GearboxI18nPeer::TABLE_NAME);
		$tMap->setPhpName('GearboxI18n');
		$tMap->setClassname('GearboxI18n');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('ID', 'Id', 'INTEGER' , 'internetbazar_gearbox', 'ID', true, null);

		$tMap->addPrimaryKey('CULTURE', 'Culture', 'VARCHAR', true, 7);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', true, 70);

	} 
} 