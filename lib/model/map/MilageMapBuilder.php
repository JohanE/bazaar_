<?php



class MilageMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MilageMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(MilagePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(MilagePeer::TABLE_NAME);
		$tMap->setPhpName('Milage');
		$tMap->setClassname('Milage');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('VALUE', 'Value', 'INTEGER', true, null);

	} 
} 