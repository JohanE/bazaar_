<?php



class ImageMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ImageMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(ImagePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ImagePeer::TABLE_NAME);
		$tMap->setPhpName('Image');
		$tMap->setClassname('Image');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('ITEMID', 'Itemid', 'INTEGER', 'internetbazar_item', 'ID', true, null);

		$tMap->addColumn('PATH', 'Path', 'VARCHAR', true, 100);

		$tMap->addForeignKey('IMAGETYPE_ID', 'ImagetypeId', 'INTEGER', 'internetbazar_imagetype', 'ID', true, null);

	} 
} 