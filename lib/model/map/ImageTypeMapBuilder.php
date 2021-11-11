<?php



class ImageTypeMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ImageTypeMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(ImageTypePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ImageTypePeer::TABLE_NAME);
		$tMap->setPhpName('ImageType');
		$tMap->setClassname('ImageType');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('DESCRIPTION', 'Description', 'VARCHAR', false, 25);

	} 
} 