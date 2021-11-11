<?php



class GearboxMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GearboxMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(GearboxPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(GearboxPeer::TABLE_NAME);
		$tMap->setPhpName('Gearbox');
		$tMap->setClassname('Gearbox');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} 
} 