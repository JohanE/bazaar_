<?php



class RoomI18nMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RoomI18nMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(RoomI18nPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(RoomI18nPeer::TABLE_NAME);
		$tMap->setPhpName('RoomI18n');
		$tMap->setClassname('RoomI18n');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('ID', 'Id', 'INTEGER' , 'internetbazar_room', 'ID', true, null);

		$tMap->addPrimaryKey('CULTURE', 'Culture', 'VARCHAR', true, 7);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', true, 20);

	} 
} 