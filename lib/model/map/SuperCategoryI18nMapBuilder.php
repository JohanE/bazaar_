<?php



class SuperCategoryI18nMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.SuperCategoryI18nMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(SuperCategoryI18nPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(SuperCategoryI18nPeer::TABLE_NAME);
		$tMap->setPhpName('SuperCategoryI18n');
		$tMap->setClassname('SuperCategoryI18n');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('ID', 'Id', 'INTEGER' , 'internetbazar_supercategory', 'ID', true, null);

		$tMap->addPrimaryKey('CULTURE', 'Culture', 'VARCHAR', true, 7);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', true, 100);

	} 
} 