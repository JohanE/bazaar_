<?php



class MilageI18nMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MilageI18nMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(MilageI18nPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(MilageI18nPeer::TABLE_NAME);
		$tMap->setPhpName('MilageI18n');
		$tMap->setClassname('MilageI18n');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('ID', 'Id', 'INTEGER' , 'internetbazar_milage', 'ID', true, null);

		$tMap->addPrimaryKey('CULTURE', 'Culture', 'VARCHAR', true, 7);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', true, 30);

	} 
} 