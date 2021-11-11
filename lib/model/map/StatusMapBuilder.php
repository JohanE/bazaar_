<?php



class StatusMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.StatusMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(StatusPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(StatusPeer::TABLE_NAME);
		$tMap->setPhpName('Status');
		$tMap->setClassname('Status');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('DESCRIPTION', 'Description', 'VARCHAR', true, 25);

	} 
} 