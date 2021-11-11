<?php



class RoomMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RoomMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(RoomPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(RoomPeer::TABLE_NAME);
		$tMap->setPhpName('Room');
		$tMap->setClassname('Room');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('VALUE', 'Value', 'INTEGER', true, null);

	} 
} 