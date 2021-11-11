<?php



class SubCategoryI18nMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.SubCategoryI18nMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(SubCategoryI18nPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(SubCategoryI18nPeer::TABLE_NAME);
		$tMap->setPhpName('SubCategoryI18n');
		$tMap->setClassname('SubCategoryI18n');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('ID', 'Id', 'INTEGER' , 'internetbazar_subcategory', 'ID', true, null);

		$tMap->addPrimaryKey('CULTURE', 'Culture', 'VARCHAR', true, 7);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', true, 100);

	} 
} 