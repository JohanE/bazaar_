<?php



class CustomerTypeMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CustomerTypeMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(CustomerTypePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(CustomerTypePeer::TABLE_NAME);
		$tMap->setPhpName('CustomerType');
		$tMap->setClassname('CustomerType');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} 
} 