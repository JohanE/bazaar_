<?php



class SubLocationMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.SubLocationMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(SubLocationPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(SubLocationPeer::TABLE_NAME);
		$tMap->setPhpName('SubLocation');
		$tMap->setClassname('SubLocation');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('LOCATION_ID', 'LocationId', 'INTEGER', 'internetbazar_location', 'ID', true, null);

	} 
} 