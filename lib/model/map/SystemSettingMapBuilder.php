<?php



class SystemSettingMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.SystemSettingMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(SystemSettingPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(SystemSettingPeer::TABLE_NAME);
		$tMap->setPhpName('SystemSetting');
		$tMap->setClassname('SystemSetting');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', true, 35);

		$tMap->addColumn('VALUE', 'Value', 'VARCHAR', true, 50);

	} 
} 