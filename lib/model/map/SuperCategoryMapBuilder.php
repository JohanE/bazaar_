<?php



class SuperCategoryMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.SuperCategoryMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(SuperCategoryPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(SuperCategoryPeer::TABLE_NAME);
		$tMap->setPhpName('SuperCategory');
		$tMap->setClassname('SuperCategory');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('SORT_FIELD', 'SortField', 'INTEGER', false, null);

	} 
} 