<?php



class YearmodelMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.YearmodelMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(YearmodelPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(YearmodelPeer::TABLE_NAME);
		$tMap->setPhpName('Yearmodel');
		$tMap->setClassname('Yearmodel');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('VALUE', 'Value', 'INTEGER', true, null);

	} 
} 