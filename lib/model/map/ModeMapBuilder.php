<?php



class ModeMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ModeMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(ModePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ModePeer::TABLE_NAME);
		$tMap->setPhpName('Mode');
		$tMap->setClassname('Mode');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} 
} 