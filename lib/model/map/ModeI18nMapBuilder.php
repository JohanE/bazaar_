<?php



class ModeI18nMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ModeI18nMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(ModeI18nPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ModeI18nPeer::TABLE_NAME);
		$tMap->setPhpName('ModeI18n');
		$tMap->setClassname('ModeI18n');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('ID', 'Id', 'INTEGER' , 'internetbazar_mode', 'ID', true, null);

		$tMap->addPrimaryKey('CULTURE', 'Culture', 'VARCHAR', true, 7);

		$tMap->addColumn('DESCRIPTION', 'Description', 'VARCHAR', true, 40);

	} 
} 