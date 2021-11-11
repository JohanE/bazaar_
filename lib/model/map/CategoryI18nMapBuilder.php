<?php



class CategoryI18nMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CategoryI18nMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(CategoryI18nPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(CategoryI18nPeer::TABLE_NAME);
		$tMap->setPhpName('CategoryI18n');
		$tMap->setClassname('CategoryI18n');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('ID', 'Id', 'INTEGER' , 'internetbazar_category', 'ID', true, null);

		$tMap->addPrimaryKey('CULTURE', 'Culture', 'VARCHAR', true, 7);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', true, 100);

	} 
} 