<?php



class IBMailMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.IBMailMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(IBMailPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(IBMailPeer::TABLE_NAME);
		$tMap->setPhpName('IBMail');
		$tMap->setClassname('IBMail');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('EMAIL', 'Email', 'VARCHAR', true, 100);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('SENDSTATUS_ID', 'SendstatusId', 'INTEGER', 'internetbazar_sendstatus', 'ID', false, null);

	} 
} 