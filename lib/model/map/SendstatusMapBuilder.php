<?php



class SendstatusMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.SendstatusMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(SendstatusPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(SendstatusPeer::TABLE_NAME);
		$tMap->setPhpName('Sendstatus');
		$tMap->setClassname('Sendstatus');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('DESCRIPTION', 'Description', 'VARCHAR', true, 25);

	} 
} 