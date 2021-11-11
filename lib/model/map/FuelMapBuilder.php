<?php



class FuelMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FuelMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(FuelPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(FuelPeer::TABLE_NAME);
		$tMap->setPhpName('Fuel');
		$tMap->setClassname('Fuel');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} 
} 