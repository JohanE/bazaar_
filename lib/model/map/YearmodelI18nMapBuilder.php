<?php



class YearmodelI18nMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.YearmodelI18nMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(YearmodelI18nPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(YearmodelI18nPeer::TABLE_NAME);
		$tMap->setPhpName('YearmodelI18n');
		$tMap->setClassname('YearmodelI18n');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('ID', 'Id', 'INTEGER' , 'internetbazar_yearmodel', 'ID', true, null);

		$tMap->addPrimaryKey('CULTURE', 'Culture', 'VARCHAR', true, 7);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', true, 50);

	} 
} 