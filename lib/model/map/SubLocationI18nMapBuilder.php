<?php



class SubLocationI18nMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.SubLocationI18nMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(SubLocationI18nPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(SubLocationI18nPeer::TABLE_NAME);
		$tMap->setPhpName('SubLocationI18n');
		$tMap->setClassname('SubLocationI18n');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('ID', 'Id', 'INTEGER' , 'internetbazar_sublocation', 'ID', true, null);

		$tMap->addPrimaryKey('CULTURE', 'Culture', 'VARCHAR', true, 7);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', true, 70);

	} 
} 