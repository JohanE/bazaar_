<?php



class SubCategoryMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.SubCategoryMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(SubCategoryPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(SubCategoryPeer::TABLE_NAME);
		$tMap->setPhpName('SubCategory');
		$tMap->setClassname('SubCategory');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('CATEGORY_ID', 'CategoryId', 'INTEGER', 'internetbazar_category', 'ID', true, null);

	} 
} 