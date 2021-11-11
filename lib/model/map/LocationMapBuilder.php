<?php



class LocationMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LocationMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(LocationPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(LocationPeer::TABLE_NAME);
		$tMap->setPhpName('Location');
		$tMap->setClassname('Location');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('CONNECTED_TO', 'ConnectedTo', 'VARCHAR', false, 50);

	} 
} 