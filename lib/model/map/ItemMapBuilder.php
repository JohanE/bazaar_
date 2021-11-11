<?php



class ItemMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ItemMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(ItemPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ItemPeer::TABLE_NAME);
		$tMap->setPhpName('Item');
		$tMap->setClassname('Item');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', true, 100);

		$tMap->addColumn('EMAIL', 'Email', 'VARCHAR', true, 100);

		$tMap->addColumn('PHONE', 'Phone', 'VARCHAR', false, 100);

		$tMap->addColumn('TITLE', 'Title', 'VARCHAR', true, 100);

		$tMap->addColumn('BODY', 'Body', 'VARCHAR', true, 2000);

		$tMap->addColumn('SITE', 'Site', 'VARCHAR', false, 60);

		$tMap->addColumn('PRICE', 'Price', 'INTEGER', true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null);

		$tMap->addColumn('APPROVED_AT', 'ApprovedAt', 'TIMESTAMP', false, null);

		$tMap->addColumn('VALID_UNTIL', 'ValidUntil', 'TIMESTAMP', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null);

		$tMap->addColumn('PASSWORD', 'Password', 'VARCHAR', false, 10);

		$tMap->addColumn('SLUG', 'Slug', 'VARCHAR', false, 100);

		$tMap->addForeignKey('STATUS_ID', 'StatusId', 'INTEGER', 'internetbazar_status', 'ID', false, null);

		$tMap->addForeignKey('MODE_ID', 'ModeId', 'INTEGER', 'internetbazar_mode', 'ID', false, null);

		$tMap->addForeignKey('CUSTOMERTYPE_ID', 'CustomertypeId', 'INTEGER', 'internetbazar_customertype', 'ID', false, null);

		$tMap->addForeignKey('LOCATION_ID', 'LocationId', 'INTEGER', 'internetbazar_location', 'ID', true, null);

		$tMap->addForeignKey('SUBLOCATION_ID', 'SublocationId', 'INTEGER', 'internetbazar_sublocation', 'ID', false, null);

		$tMap->addForeignKey('CATEGORY_ID', 'CategoryId', 'INTEGER', 'internetbazar_category', 'ID', true, null);

		$tMap->addForeignKey('SUBCATEGORY_ID', 'SubcategoryId', 'INTEGER', 'internetbazar_subcategory', 'ID', false, null);

		$tMap->addForeignKey('MILAGE_ID', 'MilageId', 'INTEGER', 'internetbazar_milage', 'ID', false, null);

		$tMap->addForeignKey('GEARBOX_ID', 'GearboxId', 'INTEGER', 'internetbazar_gearbox', 'ID', false, null);

		$tMap->addForeignKey('YEARMODEL_ID', 'YearmodelId', 'INTEGER', 'internetbazar_yearmodel', 'ID', false, null);

		$tMap->addForeignKey('FUEL_ID', 'FuelId', 'INTEGER', 'internetbazar_fuel', 'ID', false, null);

		$tMap->addForeignKey('ROOM_ID', 'RoomId', 'INTEGER', 'internetbazar_room', 'ID', false, null);

		$tMap->addColumn('LENGTH', 'Length', 'INTEGER', false, null);

		$tMap->addColumn('AREA', 'Area', 'INTEGER', false, null);

		$tMap->addColumn('STREET', 'Street', 'VARCHAR', false, 90);

		$tMap->addColumn('RENT', 'Rent', 'INTEGER', false, null);

		$tMap->addColumn('POSTALCODE', 'Postalcode', 'VARCHAR', false, 10);

		$tMap->addColumn('NR_OF_EXPIRATION_REMINDERS', 'NrOfExpirationReminders', 'SMALLINT', false, null);

	} 
} 