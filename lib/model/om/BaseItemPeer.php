<?php


abstract class BaseItemPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'internetbazar_item';

	
	const CLASS_DEFAULT = 'lib.model.Item';

	
	const NUM_COLUMNS = 32;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const ID = 'internetbazar_item.ID';

	
	const NAME = 'internetbazar_item.NAME';

	
	const EMAIL = 'internetbazar_item.EMAIL';

	
	const PHONE = 'internetbazar_item.PHONE';

	
	const TITLE = 'internetbazar_item.TITLE';

	
	const BODY = 'internetbazar_item.BODY';

	
	const SITE = 'internetbazar_item.SITE';

	
	const PRICE = 'internetbazar_item.PRICE';

	
	const CREATED_AT = 'internetbazar_item.CREATED_AT';

	
	const APPROVED_AT = 'internetbazar_item.APPROVED_AT';

	
	const VALID_UNTIL = 'internetbazar_item.VALID_UNTIL';

	
	const UPDATED_AT = 'internetbazar_item.UPDATED_AT';

	
	const PASSWORD = 'internetbazar_item.PASSWORD';

	
	const SLUG = 'internetbazar_item.SLUG';

	
	const STATUS_ID = 'internetbazar_item.STATUS_ID';

	
	const MODE_ID = 'internetbazar_item.MODE_ID';

	
	const CUSTOMERTYPE_ID = 'internetbazar_item.CUSTOMERTYPE_ID';

	
	const LOCATION_ID = 'internetbazar_item.LOCATION_ID';

	
	const SUBLOCATION_ID = 'internetbazar_item.SUBLOCATION_ID';

	
	const CATEGORY_ID = 'internetbazar_item.CATEGORY_ID';

	
	const SUBCATEGORY_ID = 'internetbazar_item.SUBCATEGORY_ID';

	
	const MILAGE_ID = 'internetbazar_item.MILAGE_ID';

	
	const GEARBOX_ID = 'internetbazar_item.GEARBOX_ID';

	
	const YEARMODEL_ID = 'internetbazar_item.YEARMODEL_ID';

	
	const FUEL_ID = 'internetbazar_item.FUEL_ID';

	
	const ROOM_ID = 'internetbazar_item.ROOM_ID';

	
	const LENGTH = 'internetbazar_item.LENGTH';

	
	const AREA = 'internetbazar_item.AREA';

	
	const STREET = 'internetbazar_item.STREET';

	
	const RENT = 'internetbazar_item.RENT';

	
	const POSTALCODE = 'internetbazar_item.POSTALCODE';

	
	const NR_OF_EXPIRATION_REMINDERS = 'internetbazar_item.NR_OF_EXPIRATION_REMINDERS';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Name', 'Email', 'Phone', 'Title', 'Body', 'Site', 'Price', 'CreatedAt', 'ApprovedAt', 'ValidUntil', 'UpdatedAt', 'Password', 'Slug', 'StatusId', 'ModeId', 'CustomertypeId', 'LocationId', 'SublocationId', 'CategoryId', 'SubcategoryId', 'MilageId', 'GearboxId', 'YearmodelId', 'FuelId', 'RoomId', 'Length', 'Area', 'Street', 'Rent', 'Postalcode', 'NrOfExpirationReminders', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'name', 'email', 'phone', 'title', 'body', 'site', 'price', 'createdAt', 'approvedAt', 'validUntil', 'updatedAt', 'password', 'slug', 'statusId', 'modeId', 'customertypeId', 'locationId', 'sublocationId', 'categoryId', 'subcategoryId', 'milageId', 'gearboxId', 'yearmodelId', 'fuelId', 'roomId', 'length', 'area', 'street', 'rent', 'postalcode', 'nrOfExpirationReminders', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::NAME, self::EMAIL, self::PHONE, self::TITLE, self::BODY, self::SITE, self::PRICE, self::CREATED_AT, self::APPROVED_AT, self::VALID_UNTIL, self::UPDATED_AT, self::PASSWORD, self::SLUG, self::STATUS_ID, self::MODE_ID, self::CUSTOMERTYPE_ID, self::LOCATION_ID, self::SUBLOCATION_ID, self::CATEGORY_ID, self::SUBCATEGORY_ID, self::MILAGE_ID, self::GEARBOX_ID, self::YEARMODEL_ID, self::FUEL_ID, self::ROOM_ID, self::LENGTH, self::AREA, self::STREET, self::RENT, self::POSTALCODE, self::NR_OF_EXPIRATION_REMINDERS, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'name', 'email', 'phone', 'title', 'body', 'site', 'price', 'created_at', 'approved_at', 'valid_until', 'updated_at', 'password', 'slug', 'status_id', 'mode_id', 'customertype_id', 'location_id', 'sublocation_id', 'category_id', 'subcategory_id', 'milage_id', 'gearbox_id', 'yearmodel_id', 'fuel_id', 'room_id', 'length', 'area', 'street', 'rent', 'postalcode', 'nr_of_expiration_reminders', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Name' => 1, 'Email' => 2, 'Phone' => 3, 'Title' => 4, 'Body' => 5, 'Site' => 6, 'Price' => 7, 'CreatedAt' => 8, 'ApprovedAt' => 9, 'ValidUntil' => 10, 'UpdatedAt' => 11, 'Password' => 12, 'Slug' => 13, 'StatusId' => 14, 'ModeId' => 15, 'CustomertypeId' => 16, 'LocationId' => 17, 'SublocationId' => 18, 'CategoryId' => 19, 'SubcategoryId' => 20, 'MilageId' => 21, 'GearboxId' => 22, 'YearmodelId' => 23, 'FuelId' => 24, 'RoomId' => 25, 'Length' => 26, 'Area' => 27, 'Street' => 28, 'Rent' => 29, 'Postalcode' => 30, 'NrOfExpirationReminders' => 31, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'name' => 1, 'email' => 2, 'phone' => 3, 'title' => 4, 'body' => 5, 'site' => 6, 'price' => 7, 'createdAt' => 8, 'approvedAt' => 9, 'validUntil' => 10, 'updatedAt' => 11, 'password' => 12, 'slug' => 13, 'statusId' => 14, 'modeId' => 15, 'customertypeId' => 16, 'locationId' => 17, 'sublocationId' => 18, 'categoryId' => 19, 'subcategoryId' => 20, 'milageId' => 21, 'gearboxId' => 22, 'yearmodelId' => 23, 'fuelId' => 24, 'roomId' => 25, 'length' => 26, 'area' => 27, 'street' => 28, 'rent' => 29, 'postalcode' => 30, 'nrOfExpirationReminders' => 31, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::NAME => 1, self::EMAIL => 2, self::PHONE => 3, self::TITLE => 4, self::BODY => 5, self::SITE => 6, self::PRICE => 7, self::CREATED_AT => 8, self::APPROVED_AT => 9, self::VALID_UNTIL => 10, self::UPDATED_AT => 11, self::PASSWORD => 12, self::SLUG => 13, self::STATUS_ID => 14, self::MODE_ID => 15, self::CUSTOMERTYPE_ID => 16, self::LOCATION_ID => 17, self::SUBLOCATION_ID => 18, self::CATEGORY_ID => 19, self::SUBCATEGORY_ID => 20, self::MILAGE_ID => 21, self::GEARBOX_ID => 22, self::YEARMODEL_ID => 23, self::FUEL_ID => 24, self::ROOM_ID => 25, self::LENGTH => 26, self::AREA => 27, self::STREET => 28, self::RENT => 29, self::POSTALCODE => 30, self::NR_OF_EXPIRATION_REMINDERS => 31, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'name' => 1, 'email' => 2, 'phone' => 3, 'title' => 4, 'body' => 5, 'site' => 6, 'price' => 7, 'created_at' => 8, 'approved_at' => 9, 'valid_until' => 10, 'updated_at' => 11, 'password' => 12, 'slug' => 13, 'status_id' => 14, 'mode_id' => 15, 'customertype_id' => 16, 'location_id' => 17, 'sublocation_id' => 18, 'category_id' => 19, 'subcategory_id' => 20, 'milage_id' => 21, 'gearbox_id' => 22, 'yearmodel_id' => 23, 'fuel_id' => 24, 'room_id' => 25, 'length' => 26, 'area' => 27, 'street' => 28, 'rent' => 29, 'postalcode' => 30, 'nr_of_expiration_reminders' => 31, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, )
	);

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new ItemMapBuilder();
		}
		return self::$mapBuilder;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(ItemPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ItemPeer::ID);

		$criteria->addSelectColumn(ItemPeer::NAME);

		$criteria->addSelectColumn(ItemPeer::EMAIL);

		$criteria->addSelectColumn(ItemPeer::PHONE);

		$criteria->addSelectColumn(ItemPeer::TITLE);

		$criteria->addSelectColumn(ItemPeer::BODY);

		$criteria->addSelectColumn(ItemPeer::SITE);

		$criteria->addSelectColumn(ItemPeer::PRICE);

		$criteria->addSelectColumn(ItemPeer::CREATED_AT);

		$criteria->addSelectColumn(ItemPeer::APPROVED_AT);

		$criteria->addSelectColumn(ItemPeer::VALID_UNTIL);

		$criteria->addSelectColumn(ItemPeer::UPDATED_AT);

		$criteria->addSelectColumn(ItemPeer::PASSWORD);

		$criteria->addSelectColumn(ItemPeer::SLUG);

		$criteria->addSelectColumn(ItemPeer::STATUS_ID);

		$criteria->addSelectColumn(ItemPeer::MODE_ID);

		$criteria->addSelectColumn(ItemPeer::CUSTOMERTYPE_ID);

		$criteria->addSelectColumn(ItemPeer::LOCATION_ID);

		$criteria->addSelectColumn(ItemPeer::SUBLOCATION_ID);

		$criteria->addSelectColumn(ItemPeer::CATEGORY_ID);

		$criteria->addSelectColumn(ItemPeer::SUBCATEGORY_ID);

		$criteria->addSelectColumn(ItemPeer::MILAGE_ID);

		$criteria->addSelectColumn(ItemPeer::GEARBOX_ID);

		$criteria->addSelectColumn(ItemPeer::YEARMODEL_ID);

		$criteria->addSelectColumn(ItemPeer::FUEL_ID);

		$criteria->addSelectColumn(ItemPeer::ROOM_ID);

		$criteria->addSelectColumn(ItemPeer::LENGTH);

		$criteria->addSelectColumn(ItemPeer::AREA);

		$criteria->addSelectColumn(ItemPeer::STREET);

		$criteria->addSelectColumn(ItemPeer::RENT);

		$criteria->addSelectColumn(ItemPeer::POSTALCODE);

		$criteria->addSelectColumn(ItemPeer::NR_OF_EXPIRATION_REMINDERS);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ItemPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}
	
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = ItemPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return ItemPeer::populateObjects(ItemPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			ItemPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(Item $obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getId();
			} 			self::$instances[$key] = $obj;
		}
	}

	
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof Item) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Item object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
				throw $e;
			}

			unset(self::$instances[$key]);
		}
	} 
	
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; 	}
	
	
	public static function clearInstancePool()
	{
		self::$instances = array();
	}
	
	
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
				if ($row[$startcol + 0] === null) {
			return null;
		}
		return (string) $row[$startcol + 0];
	}

	
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
				$cls = ItemPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = ItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = ItemPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				ItemPeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinStatus(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ItemPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ItemPeer::STATUS_ID,), array(StatusPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinMode(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ItemPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ItemPeer::MODE_ID,), array(ModePeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinCustomerType(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ItemPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ItemPeer::CUSTOMERTYPE_ID,), array(CustomerTypePeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinLocation(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ItemPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ItemPeer::LOCATION_ID,), array(LocationPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinSubLocation(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ItemPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ItemPeer::SUBLOCATION_ID,), array(SubLocationPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinCategory(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ItemPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ItemPeer::CATEGORY_ID,), array(CategoryPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinSubCategory(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ItemPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ItemPeer::SUBCATEGORY_ID,), array(SubCategoryPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinMilage(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ItemPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ItemPeer::MILAGE_ID,), array(MilagePeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinGearbox(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ItemPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ItemPeer::GEARBOX_ID,), array(GearboxPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinYearmodel(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ItemPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ItemPeer::YEARMODEL_ID,), array(YearmodelPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinFuel(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ItemPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ItemPeer::FUEL_ID,), array(FuelPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinRoom(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ItemPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ItemPeer::ROOM_ID,), array(RoomPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinStatus(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ItemPeer::addSelectColumns($c);
		$startcol = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS);
		StatusPeer::addSelectColumns($c);

		$c->addJoin(array(ItemPeer::STATUS_ID,), array(StatusPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ItemPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = ItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ItemPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = StatusPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = StatusPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = StatusPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					StatusPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addItem($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinMode(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ItemPeer::addSelectColumns($c);
		$startcol = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS);
		ModePeer::addSelectColumns($c);

		$c->addJoin(array(ItemPeer::MODE_ID,), array(ModePeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ItemPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = ItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ItemPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = ModePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = ModePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = ModePeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					ModePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addItem($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinCustomerType(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ItemPeer::addSelectColumns($c);
		$startcol = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS);
		CustomerTypePeer::addSelectColumns($c);

		$c->addJoin(array(ItemPeer::CUSTOMERTYPE_ID,), array(CustomerTypePeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ItemPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = ItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ItemPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = CustomerTypePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = CustomerTypePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = CustomerTypePeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					CustomerTypePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addItem($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinLocation(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ItemPeer::addSelectColumns($c);
		$startcol = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS);
		LocationPeer::addSelectColumns($c);

		$c->addJoin(array(ItemPeer::LOCATION_ID,), array(LocationPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ItemPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = ItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ItemPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = LocationPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = LocationPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = LocationPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					LocationPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addItem($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinSubLocation(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ItemPeer::addSelectColumns($c);
		$startcol = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS);
		SubLocationPeer::addSelectColumns($c);

		$c->addJoin(array(ItemPeer::SUBLOCATION_ID,), array(SubLocationPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ItemPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = ItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ItemPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = SubLocationPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = SubLocationPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = SubLocationPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					SubLocationPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addItem($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinCategory(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ItemPeer::addSelectColumns($c);
		$startcol = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS);
		CategoryPeer::addSelectColumns($c);

		$c->addJoin(array(ItemPeer::CATEGORY_ID,), array(CategoryPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ItemPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = ItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ItemPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = CategoryPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = CategoryPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = CategoryPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					CategoryPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addItem($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinSubCategory(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ItemPeer::addSelectColumns($c);
		$startcol = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS);
		SubCategoryPeer::addSelectColumns($c);

		$c->addJoin(array(ItemPeer::SUBCATEGORY_ID,), array(SubCategoryPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ItemPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = ItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ItemPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = SubCategoryPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = SubCategoryPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = SubCategoryPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					SubCategoryPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addItem($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinMilage(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ItemPeer::addSelectColumns($c);
		$startcol = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS);
		MilagePeer::addSelectColumns($c);

		$c->addJoin(array(ItemPeer::MILAGE_ID,), array(MilagePeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ItemPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = ItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ItemPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = MilagePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = MilagePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = MilagePeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					MilagePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addItem($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinGearbox(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ItemPeer::addSelectColumns($c);
		$startcol = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS);
		GearboxPeer::addSelectColumns($c);

		$c->addJoin(array(ItemPeer::GEARBOX_ID,), array(GearboxPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ItemPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = ItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ItemPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = GearboxPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = GearboxPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = GearboxPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					GearboxPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addItem($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinYearmodel(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ItemPeer::addSelectColumns($c);
		$startcol = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS);
		YearmodelPeer::addSelectColumns($c);

		$c->addJoin(array(ItemPeer::YEARMODEL_ID,), array(YearmodelPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ItemPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = ItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ItemPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = YearmodelPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = YearmodelPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = YearmodelPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					YearmodelPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addItem($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinFuel(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ItemPeer::addSelectColumns($c);
		$startcol = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS);
		FuelPeer::addSelectColumns($c);

		$c->addJoin(array(ItemPeer::FUEL_ID,), array(FuelPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ItemPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = ItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ItemPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = FuelPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = FuelPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = FuelPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					FuelPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addItem($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinRoom(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ItemPeer::addSelectColumns($c);
		$startcol = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS);
		RoomPeer::addSelectColumns($c);

		$c->addJoin(array(ItemPeer::ROOM_ID,), array(RoomPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ItemPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = ItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ItemPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = RoomPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = RoomPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = RoomPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					RoomPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addItem($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ItemPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ItemPeer::STATUS_ID,), array(StatusPeer::ID,), $join_behavior);
		$criteria->addJoin(array(ItemPeer::MODE_ID,), array(ModePeer::ID,), $join_behavior);
		$criteria->addJoin(array(ItemPeer::CUSTOMERTYPE_ID,), array(CustomerTypePeer::ID,), $join_behavior);
		$criteria->addJoin(array(ItemPeer::LOCATION_ID,), array(LocationPeer::ID,), $join_behavior);
		$criteria->addJoin(array(ItemPeer::SUBLOCATION_ID,), array(SubLocationPeer::ID,), $join_behavior);
		$criteria->addJoin(array(ItemPeer::CATEGORY_ID,), array(CategoryPeer::ID,), $join_behavior);
		$criteria->addJoin(array(ItemPeer::SUBCATEGORY_ID,), array(SubCategoryPeer::ID,), $join_behavior);
		$criteria->addJoin(array(ItemPeer::MILAGE_ID,), array(MilagePeer::ID,), $join_behavior);
		$criteria->addJoin(array(ItemPeer::GEARBOX_ID,), array(GearboxPeer::ID,), $join_behavior);
		$criteria->addJoin(array(ItemPeer::YEARMODEL_ID,), array(YearmodelPeer::ID,), $join_behavior);
		$criteria->addJoin(array(ItemPeer::FUEL_ID,), array(FuelPeer::ID,), $join_behavior);
		$criteria->addJoin(array(ItemPeer::ROOM_ID,), array(RoomPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}

	
	public static function doSelectJoinAll(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ItemPeer::addSelectColumns($c);
		$startcol2 = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS);

		StatusPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (StatusPeer::NUM_COLUMNS - StatusPeer::NUM_LAZY_LOAD_COLUMNS);

		ModePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ModePeer::NUM_COLUMNS - ModePeer::NUM_LAZY_LOAD_COLUMNS);

		CustomerTypePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (CustomerTypePeer::NUM_COLUMNS - CustomerTypePeer::NUM_LAZY_LOAD_COLUMNS);

		LocationPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (LocationPeer::NUM_COLUMNS - LocationPeer::NUM_LAZY_LOAD_COLUMNS);

		SubLocationPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + (SubLocationPeer::NUM_COLUMNS - SubLocationPeer::NUM_LAZY_LOAD_COLUMNS);

		CategoryPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + (CategoryPeer::NUM_COLUMNS - CategoryPeer::NUM_LAZY_LOAD_COLUMNS);

		SubCategoryPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + (SubCategoryPeer::NUM_COLUMNS - SubCategoryPeer::NUM_LAZY_LOAD_COLUMNS);

		MilagePeer::addSelectColumns($c);
		$startcol10 = $startcol9 + (MilagePeer::NUM_COLUMNS - MilagePeer::NUM_LAZY_LOAD_COLUMNS);

		GearboxPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + (GearboxPeer::NUM_COLUMNS - GearboxPeer::NUM_LAZY_LOAD_COLUMNS);

		YearmodelPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + (YearmodelPeer::NUM_COLUMNS - YearmodelPeer::NUM_LAZY_LOAD_COLUMNS);

		FuelPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + (FuelPeer::NUM_COLUMNS - FuelPeer::NUM_LAZY_LOAD_COLUMNS);

		RoomPeer::addSelectColumns($c);
		$startcol14 = $startcol13 + (RoomPeer::NUM_COLUMNS - RoomPeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(ItemPeer::STATUS_ID,), array(StatusPeer::ID,), $join_behavior);
		$c->addJoin(array(ItemPeer::MODE_ID,), array(ModePeer::ID,), $join_behavior);
		$c->addJoin(array(ItemPeer::CUSTOMERTYPE_ID,), array(CustomerTypePeer::ID,), $join_behavior);
		$c->addJoin(array(ItemPeer::LOCATION_ID,), array(LocationPeer::ID,), $join_behavior);
		$c->addJoin(array(ItemPeer::SUBLOCATION_ID,), array(SubLocationPeer::ID,), $join_behavior);
		$c->addJoin(array(ItemPeer::CATEGORY_ID,), array(CategoryPeer::ID,), $join_behavior);
		$c->addJoin(array(ItemPeer::SUBCATEGORY_ID,), array(SubCategoryPeer::ID,), $join_behavior);
		$c->addJoin(array(ItemPeer::MILAGE_ID,), array(MilagePeer::ID,), $join_behavior);
		$c->addJoin(array(ItemPeer::GEARBOX_ID,), array(GearboxPeer::ID,), $join_behavior);
		$c->addJoin(array(ItemPeer::YEARMODEL_ID,), array(YearmodelPeer::ID,), $join_behavior);
		$c->addJoin(array(ItemPeer::FUEL_ID,), array(FuelPeer::ID,), $join_behavior);
		$c->addJoin(array(ItemPeer::ROOM_ID,), array(RoomPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ItemPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ItemPeer::addInstanceToPool($obj1, $key1);
			} 
			
			$key2 = StatusPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = StatusPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = StatusPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					StatusPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addItem($obj1);
			} 
			
			$key3 = ModePeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = ModePeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$omClass = ModePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ModePeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addItem($obj1);
			} 
			
			$key4 = CustomerTypePeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = CustomerTypePeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$omClass = CustomerTypePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					CustomerTypePeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addItem($obj1);
			} 
			
			$key5 = LocationPeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = LocationPeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$omClass = LocationPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					LocationPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addItem($obj1);
			} 
			
			$key6 = SubLocationPeer::getPrimaryKeyHashFromRow($row, $startcol6);
			if ($key6 !== null) {
				$obj6 = SubLocationPeer::getInstanceFromPool($key6);
				if (!$obj6) {

					$omClass = SubLocationPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					SubLocationPeer::addInstanceToPool($obj6, $key6);
				} 
								$obj6->addItem($obj1);
			} 
			
			$key7 = CategoryPeer::getPrimaryKeyHashFromRow($row, $startcol7);
			if ($key7 !== null) {
				$obj7 = CategoryPeer::getInstanceFromPool($key7);
				if (!$obj7) {

					$omClass = CategoryPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					CategoryPeer::addInstanceToPool($obj7, $key7);
				} 
								$obj7->addItem($obj1);
			} 
			
			$key8 = SubCategoryPeer::getPrimaryKeyHashFromRow($row, $startcol8);
			if ($key8 !== null) {
				$obj8 = SubCategoryPeer::getInstanceFromPool($key8);
				if (!$obj8) {

					$omClass = SubCategoryPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj8 = new $cls();
					$obj8->hydrate($row, $startcol8);
					SubCategoryPeer::addInstanceToPool($obj8, $key8);
				} 
								$obj8->addItem($obj1);
			} 
			
			$key9 = MilagePeer::getPrimaryKeyHashFromRow($row, $startcol9);
			if ($key9 !== null) {
				$obj9 = MilagePeer::getInstanceFromPool($key9);
				if (!$obj9) {

					$omClass = MilagePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj9 = new $cls();
					$obj9->hydrate($row, $startcol9);
					MilagePeer::addInstanceToPool($obj9, $key9);
				} 
								$obj9->addItem($obj1);
			} 
			
			$key10 = GearboxPeer::getPrimaryKeyHashFromRow($row, $startcol10);
			if ($key10 !== null) {
				$obj10 = GearboxPeer::getInstanceFromPool($key10);
				if (!$obj10) {

					$omClass = GearboxPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj10 = new $cls();
					$obj10->hydrate($row, $startcol10);
					GearboxPeer::addInstanceToPool($obj10, $key10);
				} 
								$obj10->addItem($obj1);
			} 
			
			$key11 = YearmodelPeer::getPrimaryKeyHashFromRow($row, $startcol11);
			if ($key11 !== null) {
				$obj11 = YearmodelPeer::getInstanceFromPool($key11);
				if (!$obj11) {

					$omClass = YearmodelPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj11 = new $cls();
					$obj11->hydrate($row, $startcol11);
					YearmodelPeer::addInstanceToPool($obj11, $key11);
				} 
								$obj11->addItem($obj1);
			} 
			
			$key12 = FuelPeer::getPrimaryKeyHashFromRow($row, $startcol12);
			if ($key12 !== null) {
				$obj12 = FuelPeer::getInstanceFromPool($key12);
				if (!$obj12) {

					$omClass = FuelPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj12 = new $cls();
					$obj12->hydrate($row, $startcol12);
					FuelPeer::addInstanceToPool($obj12, $key12);
				} 
								$obj12->addItem($obj1);
			} 
			
			$key13 = RoomPeer::getPrimaryKeyHashFromRow($row, $startcol13);
			if ($key13 !== null) {
				$obj13 = RoomPeer::getInstanceFromPool($key13);
				if (!$obj13) {

					$omClass = RoomPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj13 = new $cls();
					$obj13->hydrate($row, $startcol13);
					RoomPeer::addInstanceToPool($obj13, $key13);
				} 
								$obj13->addItem($obj1);
			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAllExceptStatus(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ItemPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(ItemPeer::MODE_ID,), array(ModePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::CUSTOMERTYPE_ID,), array(CustomerTypePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::LOCATION_ID,), array(LocationPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::SUBLOCATION_ID,), array(SubLocationPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::CATEGORY_ID,), array(CategoryPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::SUBCATEGORY_ID,), array(SubCategoryPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::MILAGE_ID,), array(MilagePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::GEARBOX_ID,), array(GearboxPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::YEARMODEL_ID,), array(YearmodelPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::FUEL_ID,), array(FuelPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::ROOM_ID,), array(RoomPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptMode(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ItemPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(ItemPeer::STATUS_ID,), array(StatusPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::CUSTOMERTYPE_ID,), array(CustomerTypePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::LOCATION_ID,), array(LocationPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::SUBLOCATION_ID,), array(SubLocationPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::CATEGORY_ID,), array(CategoryPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::SUBCATEGORY_ID,), array(SubCategoryPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::MILAGE_ID,), array(MilagePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::GEARBOX_ID,), array(GearboxPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::YEARMODEL_ID,), array(YearmodelPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::FUEL_ID,), array(FuelPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::ROOM_ID,), array(RoomPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptCustomerType(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ItemPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(ItemPeer::STATUS_ID,), array(StatusPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::MODE_ID,), array(ModePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::LOCATION_ID,), array(LocationPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::SUBLOCATION_ID,), array(SubLocationPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::CATEGORY_ID,), array(CategoryPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::SUBCATEGORY_ID,), array(SubCategoryPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::MILAGE_ID,), array(MilagePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::GEARBOX_ID,), array(GearboxPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::YEARMODEL_ID,), array(YearmodelPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::FUEL_ID,), array(FuelPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::ROOM_ID,), array(RoomPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptLocation(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ItemPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(ItemPeer::STATUS_ID,), array(StatusPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::MODE_ID,), array(ModePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::CUSTOMERTYPE_ID,), array(CustomerTypePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::SUBLOCATION_ID,), array(SubLocationPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::CATEGORY_ID,), array(CategoryPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::SUBCATEGORY_ID,), array(SubCategoryPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::MILAGE_ID,), array(MilagePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::GEARBOX_ID,), array(GearboxPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::YEARMODEL_ID,), array(YearmodelPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::FUEL_ID,), array(FuelPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::ROOM_ID,), array(RoomPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptSubLocation(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ItemPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(ItemPeer::STATUS_ID,), array(StatusPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::MODE_ID,), array(ModePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::CUSTOMERTYPE_ID,), array(CustomerTypePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::LOCATION_ID,), array(LocationPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::CATEGORY_ID,), array(CategoryPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::SUBCATEGORY_ID,), array(SubCategoryPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::MILAGE_ID,), array(MilagePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::GEARBOX_ID,), array(GearboxPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::YEARMODEL_ID,), array(YearmodelPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::FUEL_ID,), array(FuelPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::ROOM_ID,), array(RoomPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptCategory(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ItemPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(ItemPeer::STATUS_ID,), array(StatusPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::MODE_ID,), array(ModePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::CUSTOMERTYPE_ID,), array(CustomerTypePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::LOCATION_ID,), array(LocationPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::SUBLOCATION_ID,), array(SubLocationPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::SUBCATEGORY_ID,), array(SubCategoryPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::MILAGE_ID,), array(MilagePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::GEARBOX_ID,), array(GearboxPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::YEARMODEL_ID,), array(YearmodelPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::FUEL_ID,), array(FuelPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::ROOM_ID,), array(RoomPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptSubCategory(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ItemPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(ItemPeer::STATUS_ID,), array(StatusPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::MODE_ID,), array(ModePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::CUSTOMERTYPE_ID,), array(CustomerTypePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::LOCATION_ID,), array(LocationPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::SUBLOCATION_ID,), array(SubLocationPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::CATEGORY_ID,), array(CategoryPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::MILAGE_ID,), array(MilagePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::GEARBOX_ID,), array(GearboxPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::YEARMODEL_ID,), array(YearmodelPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::FUEL_ID,), array(FuelPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::ROOM_ID,), array(RoomPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptMilage(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ItemPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(ItemPeer::STATUS_ID,), array(StatusPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::MODE_ID,), array(ModePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::CUSTOMERTYPE_ID,), array(CustomerTypePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::LOCATION_ID,), array(LocationPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::SUBLOCATION_ID,), array(SubLocationPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::CATEGORY_ID,), array(CategoryPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::SUBCATEGORY_ID,), array(SubCategoryPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::GEARBOX_ID,), array(GearboxPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::YEARMODEL_ID,), array(YearmodelPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::FUEL_ID,), array(FuelPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::ROOM_ID,), array(RoomPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptGearbox(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ItemPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(ItemPeer::STATUS_ID,), array(StatusPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::MODE_ID,), array(ModePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::CUSTOMERTYPE_ID,), array(CustomerTypePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::LOCATION_ID,), array(LocationPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::SUBLOCATION_ID,), array(SubLocationPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::CATEGORY_ID,), array(CategoryPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::SUBCATEGORY_ID,), array(SubCategoryPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::MILAGE_ID,), array(MilagePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::YEARMODEL_ID,), array(YearmodelPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::FUEL_ID,), array(FuelPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::ROOM_ID,), array(RoomPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptYearmodel(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ItemPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(ItemPeer::STATUS_ID,), array(StatusPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::MODE_ID,), array(ModePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::CUSTOMERTYPE_ID,), array(CustomerTypePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::LOCATION_ID,), array(LocationPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::SUBLOCATION_ID,), array(SubLocationPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::CATEGORY_ID,), array(CategoryPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::SUBCATEGORY_ID,), array(SubCategoryPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::MILAGE_ID,), array(MilagePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::GEARBOX_ID,), array(GearboxPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::FUEL_ID,), array(FuelPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::ROOM_ID,), array(RoomPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptFuel(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ItemPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(ItemPeer::STATUS_ID,), array(StatusPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::MODE_ID,), array(ModePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::CUSTOMERTYPE_ID,), array(CustomerTypePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::LOCATION_ID,), array(LocationPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::SUBLOCATION_ID,), array(SubLocationPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::CATEGORY_ID,), array(CategoryPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::SUBCATEGORY_ID,), array(SubCategoryPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::MILAGE_ID,), array(MilagePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::GEARBOX_ID,), array(GearboxPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::YEARMODEL_ID,), array(YearmodelPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::ROOM_ID,), array(RoomPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptRoom(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ItemPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(ItemPeer::STATUS_ID,), array(StatusPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::MODE_ID,), array(ModePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::CUSTOMERTYPE_ID,), array(CustomerTypePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::LOCATION_ID,), array(LocationPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::SUBLOCATION_ID,), array(SubLocationPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::CATEGORY_ID,), array(CategoryPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::SUBCATEGORY_ID,), array(SubCategoryPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::MILAGE_ID,), array(MilagePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::GEARBOX_ID,), array(GearboxPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::YEARMODEL_ID,), array(YearmodelPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ItemPeer::FUEL_ID,), array(FuelPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinAllExceptStatus(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ItemPeer::addSelectColumns($c);
		$startcol2 = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS);

		ModePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (ModePeer::NUM_COLUMNS - ModePeer::NUM_LAZY_LOAD_COLUMNS);

		CustomerTypePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (CustomerTypePeer::NUM_COLUMNS - CustomerTypePeer::NUM_LAZY_LOAD_COLUMNS);

		LocationPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (LocationPeer::NUM_COLUMNS - LocationPeer::NUM_LAZY_LOAD_COLUMNS);

		SubLocationPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (SubLocationPeer::NUM_COLUMNS - SubLocationPeer::NUM_LAZY_LOAD_COLUMNS);

		CategoryPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + (CategoryPeer::NUM_COLUMNS - CategoryPeer::NUM_LAZY_LOAD_COLUMNS);

		SubCategoryPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + (SubCategoryPeer::NUM_COLUMNS - SubCategoryPeer::NUM_LAZY_LOAD_COLUMNS);

		MilagePeer::addSelectColumns($c);
		$startcol9 = $startcol8 + (MilagePeer::NUM_COLUMNS - MilagePeer::NUM_LAZY_LOAD_COLUMNS);

		GearboxPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + (GearboxPeer::NUM_COLUMNS - GearboxPeer::NUM_LAZY_LOAD_COLUMNS);

		YearmodelPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + (YearmodelPeer::NUM_COLUMNS - YearmodelPeer::NUM_LAZY_LOAD_COLUMNS);

		FuelPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + (FuelPeer::NUM_COLUMNS - FuelPeer::NUM_LAZY_LOAD_COLUMNS);

		RoomPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + (RoomPeer::NUM_COLUMNS - RoomPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(ItemPeer::MODE_ID,), array(ModePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::CUSTOMERTYPE_ID,), array(CustomerTypePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::LOCATION_ID,), array(LocationPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::SUBLOCATION_ID,), array(SubLocationPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::CATEGORY_ID,), array(CategoryPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::SUBCATEGORY_ID,), array(SubCategoryPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::MILAGE_ID,), array(MilagePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::GEARBOX_ID,), array(GearboxPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::YEARMODEL_ID,), array(YearmodelPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::FUEL_ID,), array(FuelPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::ROOM_ID,), array(RoomPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ItemPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ItemPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = ModePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = ModePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = ModePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ModePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addItem($obj1);

			} 
				
				$key3 = CustomerTypePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = CustomerTypePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = CustomerTypePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					CustomerTypePeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addItem($obj1);

			} 
				
				$key4 = LocationPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = LocationPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = LocationPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					LocationPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addItem($obj1);

			} 
				
				$key5 = SubLocationPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = SubLocationPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = SubLocationPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					SubLocationPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addItem($obj1);

			} 
				
				$key6 = CategoryPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = CategoryPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$omClass = CategoryPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					CategoryPeer::addInstanceToPool($obj6, $key6);
				} 
								$obj6->addItem($obj1);

			} 
				
				$key7 = SubCategoryPeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = SubCategoryPeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$omClass = SubCategoryPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					SubCategoryPeer::addInstanceToPool($obj7, $key7);
				} 
								$obj7->addItem($obj1);

			} 
				
				$key8 = MilagePeer::getPrimaryKeyHashFromRow($row, $startcol8);
				if ($key8 !== null) {
					$obj8 = MilagePeer::getInstanceFromPool($key8);
					if (!$obj8) {
	
						$omClass = MilagePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj8 = new $cls();
					$obj8->hydrate($row, $startcol8);
					MilagePeer::addInstanceToPool($obj8, $key8);
				} 
								$obj8->addItem($obj1);

			} 
				
				$key9 = GearboxPeer::getPrimaryKeyHashFromRow($row, $startcol9);
				if ($key9 !== null) {
					$obj9 = GearboxPeer::getInstanceFromPool($key9);
					if (!$obj9) {
	
						$omClass = GearboxPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj9 = new $cls();
					$obj9->hydrate($row, $startcol9);
					GearboxPeer::addInstanceToPool($obj9, $key9);
				} 
								$obj9->addItem($obj1);

			} 
				
				$key10 = YearmodelPeer::getPrimaryKeyHashFromRow($row, $startcol10);
				if ($key10 !== null) {
					$obj10 = YearmodelPeer::getInstanceFromPool($key10);
					if (!$obj10) {
	
						$omClass = YearmodelPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj10 = new $cls();
					$obj10->hydrate($row, $startcol10);
					YearmodelPeer::addInstanceToPool($obj10, $key10);
				} 
								$obj10->addItem($obj1);

			} 
				
				$key11 = FuelPeer::getPrimaryKeyHashFromRow($row, $startcol11);
				if ($key11 !== null) {
					$obj11 = FuelPeer::getInstanceFromPool($key11);
					if (!$obj11) {
	
						$omClass = FuelPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj11 = new $cls();
					$obj11->hydrate($row, $startcol11);
					FuelPeer::addInstanceToPool($obj11, $key11);
				} 
								$obj11->addItem($obj1);

			} 
				
				$key12 = RoomPeer::getPrimaryKeyHashFromRow($row, $startcol12);
				if ($key12 !== null) {
					$obj12 = RoomPeer::getInstanceFromPool($key12);
					if (!$obj12) {
	
						$omClass = RoomPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj12 = new $cls();
					$obj12->hydrate($row, $startcol12);
					RoomPeer::addInstanceToPool($obj12, $key12);
				} 
								$obj12->addItem($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptMode(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ItemPeer::addSelectColumns($c);
		$startcol2 = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS);

		StatusPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (StatusPeer::NUM_COLUMNS - StatusPeer::NUM_LAZY_LOAD_COLUMNS);

		CustomerTypePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (CustomerTypePeer::NUM_COLUMNS - CustomerTypePeer::NUM_LAZY_LOAD_COLUMNS);

		LocationPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (LocationPeer::NUM_COLUMNS - LocationPeer::NUM_LAZY_LOAD_COLUMNS);

		SubLocationPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (SubLocationPeer::NUM_COLUMNS - SubLocationPeer::NUM_LAZY_LOAD_COLUMNS);

		CategoryPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + (CategoryPeer::NUM_COLUMNS - CategoryPeer::NUM_LAZY_LOAD_COLUMNS);

		SubCategoryPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + (SubCategoryPeer::NUM_COLUMNS - SubCategoryPeer::NUM_LAZY_LOAD_COLUMNS);

		MilagePeer::addSelectColumns($c);
		$startcol9 = $startcol8 + (MilagePeer::NUM_COLUMNS - MilagePeer::NUM_LAZY_LOAD_COLUMNS);

		GearboxPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + (GearboxPeer::NUM_COLUMNS - GearboxPeer::NUM_LAZY_LOAD_COLUMNS);

		YearmodelPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + (YearmodelPeer::NUM_COLUMNS - YearmodelPeer::NUM_LAZY_LOAD_COLUMNS);

		FuelPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + (FuelPeer::NUM_COLUMNS - FuelPeer::NUM_LAZY_LOAD_COLUMNS);

		RoomPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + (RoomPeer::NUM_COLUMNS - RoomPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(ItemPeer::STATUS_ID,), array(StatusPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::CUSTOMERTYPE_ID,), array(CustomerTypePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::LOCATION_ID,), array(LocationPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::SUBLOCATION_ID,), array(SubLocationPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::CATEGORY_ID,), array(CategoryPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::SUBCATEGORY_ID,), array(SubCategoryPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::MILAGE_ID,), array(MilagePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::GEARBOX_ID,), array(GearboxPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::YEARMODEL_ID,), array(YearmodelPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::FUEL_ID,), array(FuelPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::ROOM_ID,), array(RoomPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ItemPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ItemPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = StatusPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = StatusPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = StatusPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					StatusPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addItem($obj1);

			} 
				
				$key3 = CustomerTypePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = CustomerTypePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = CustomerTypePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					CustomerTypePeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addItem($obj1);

			} 
				
				$key4 = LocationPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = LocationPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = LocationPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					LocationPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addItem($obj1);

			} 
				
				$key5 = SubLocationPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = SubLocationPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = SubLocationPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					SubLocationPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addItem($obj1);

			} 
				
				$key6 = CategoryPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = CategoryPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$omClass = CategoryPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					CategoryPeer::addInstanceToPool($obj6, $key6);
				} 
								$obj6->addItem($obj1);

			} 
				
				$key7 = SubCategoryPeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = SubCategoryPeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$omClass = SubCategoryPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					SubCategoryPeer::addInstanceToPool($obj7, $key7);
				} 
								$obj7->addItem($obj1);

			} 
				
				$key8 = MilagePeer::getPrimaryKeyHashFromRow($row, $startcol8);
				if ($key8 !== null) {
					$obj8 = MilagePeer::getInstanceFromPool($key8);
					if (!$obj8) {
	
						$omClass = MilagePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj8 = new $cls();
					$obj8->hydrate($row, $startcol8);
					MilagePeer::addInstanceToPool($obj8, $key8);
				} 
								$obj8->addItem($obj1);

			} 
				
				$key9 = GearboxPeer::getPrimaryKeyHashFromRow($row, $startcol9);
				if ($key9 !== null) {
					$obj9 = GearboxPeer::getInstanceFromPool($key9);
					if (!$obj9) {
	
						$omClass = GearboxPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj9 = new $cls();
					$obj9->hydrate($row, $startcol9);
					GearboxPeer::addInstanceToPool($obj9, $key9);
				} 
								$obj9->addItem($obj1);

			} 
				
				$key10 = YearmodelPeer::getPrimaryKeyHashFromRow($row, $startcol10);
				if ($key10 !== null) {
					$obj10 = YearmodelPeer::getInstanceFromPool($key10);
					if (!$obj10) {
	
						$omClass = YearmodelPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj10 = new $cls();
					$obj10->hydrate($row, $startcol10);
					YearmodelPeer::addInstanceToPool($obj10, $key10);
				} 
								$obj10->addItem($obj1);

			} 
				
				$key11 = FuelPeer::getPrimaryKeyHashFromRow($row, $startcol11);
				if ($key11 !== null) {
					$obj11 = FuelPeer::getInstanceFromPool($key11);
					if (!$obj11) {
	
						$omClass = FuelPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj11 = new $cls();
					$obj11->hydrate($row, $startcol11);
					FuelPeer::addInstanceToPool($obj11, $key11);
				} 
								$obj11->addItem($obj1);

			} 
				
				$key12 = RoomPeer::getPrimaryKeyHashFromRow($row, $startcol12);
				if ($key12 !== null) {
					$obj12 = RoomPeer::getInstanceFromPool($key12);
					if (!$obj12) {
	
						$omClass = RoomPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj12 = new $cls();
					$obj12->hydrate($row, $startcol12);
					RoomPeer::addInstanceToPool($obj12, $key12);
				} 
								$obj12->addItem($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptCustomerType(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ItemPeer::addSelectColumns($c);
		$startcol2 = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS);

		StatusPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (StatusPeer::NUM_COLUMNS - StatusPeer::NUM_LAZY_LOAD_COLUMNS);

		ModePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ModePeer::NUM_COLUMNS - ModePeer::NUM_LAZY_LOAD_COLUMNS);

		LocationPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (LocationPeer::NUM_COLUMNS - LocationPeer::NUM_LAZY_LOAD_COLUMNS);

		SubLocationPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (SubLocationPeer::NUM_COLUMNS - SubLocationPeer::NUM_LAZY_LOAD_COLUMNS);

		CategoryPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + (CategoryPeer::NUM_COLUMNS - CategoryPeer::NUM_LAZY_LOAD_COLUMNS);

		SubCategoryPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + (SubCategoryPeer::NUM_COLUMNS - SubCategoryPeer::NUM_LAZY_LOAD_COLUMNS);

		MilagePeer::addSelectColumns($c);
		$startcol9 = $startcol8 + (MilagePeer::NUM_COLUMNS - MilagePeer::NUM_LAZY_LOAD_COLUMNS);

		GearboxPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + (GearboxPeer::NUM_COLUMNS - GearboxPeer::NUM_LAZY_LOAD_COLUMNS);

		YearmodelPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + (YearmodelPeer::NUM_COLUMNS - YearmodelPeer::NUM_LAZY_LOAD_COLUMNS);

		FuelPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + (FuelPeer::NUM_COLUMNS - FuelPeer::NUM_LAZY_LOAD_COLUMNS);

		RoomPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + (RoomPeer::NUM_COLUMNS - RoomPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(ItemPeer::STATUS_ID,), array(StatusPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::MODE_ID,), array(ModePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::LOCATION_ID,), array(LocationPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::SUBLOCATION_ID,), array(SubLocationPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::CATEGORY_ID,), array(CategoryPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::SUBCATEGORY_ID,), array(SubCategoryPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::MILAGE_ID,), array(MilagePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::GEARBOX_ID,), array(GearboxPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::YEARMODEL_ID,), array(YearmodelPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::FUEL_ID,), array(FuelPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::ROOM_ID,), array(RoomPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ItemPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ItemPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = StatusPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = StatusPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = StatusPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					StatusPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addItem($obj1);

			} 
				
				$key3 = ModePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ModePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = ModePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ModePeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addItem($obj1);

			} 
				
				$key4 = LocationPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = LocationPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = LocationPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					LocationPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addItem($obj1);

			} 
				
				$key5 = SubLocationPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = SubLocationPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = SubLocationPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					SubLocationPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addItem($obj1);

			} 
				
				$key6 = CategoryPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = CategoryPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$omClass = CategoryPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					CategoryPeer::addInstanceToPool($obj6, $key6);
				} 
								$obj6->addItem($obj1);

			} 
				
				$key7 = SubCategoryPeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = SubCategoryPeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$omClass = SubCategoryPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					SubCategoryPeer::addInstanceToPool($obj7, $key7);
				} 
								$obj7->addItem($obj1);

			} 
				
				$key8 = MilagePeer::getPrimaryKeyHashFromRow($row, $startcol8);
				if ($key8 !== null) {
					$obj8 = MilagePeer::getInstanceFromPool($key8);
					if (!$obj8) {
	
						$omClass = MilagePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj8 = new $cls();
					$obj8->hydrate($row, $startcol8);
					MilagePeer::addInstanceToPool($obj8, $key8);
				} 
								$obj8->addItem($obj1);

			} 
				
				$key9 = GearboxPeer::getPrimaryKeyHashFromRow($row, $startcol9);
				if ($key9 !== null) {
					$obj9 = GearboxPeer::getInstanceFromPool($key9);
					if (!$obj9) {
	
						$omClass = GearboxPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj9 = new $cls();
					$obj9->hydrate($row, $startcol9);
					GearboxPeer::addInstanceToPool($obj9, $key9);
				} 
								$obj9->addItem($obj1);

			} 
				
				$key10 = YearmodelPeer::getPrimaryKeyHashFromRow($row, $startcol10);
				if ($key10 !== null) {
					$obj10 = YearmodelPeer::getInstanceFromPool($key10);
					if (!$obj10) {
	
						$omClass = YearmodelPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj10 = new $cls();
					$obj10->hydrate($row, $startcol10);
					YearmodelPeer::addInstanceToPool($obj10, $key10);
				} 
								$obj10->addItem($obj1);

			} 
				
				$key11 = FuelPeer::getPrimaryKeyHashFromRow($row, $startcol11);
				if ($key11 !== null) {
					$obj11 = FuelPeer::getInstanceFromPool($key11);
					if (!$obj11) {
	
						$omClass = FuelPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj11 = new $cls();
					$obj11->hydrate($row, $startcol11);
					FuelPeer::addInstanceToPool($obj11, $key11);
				} 
								$obj11->addItem($obj1);

			} 
				
				$key12 = RoomPeer::getPrimaryKeyHashFromRow($row, $startcol12);
				if ($key12 !== null) {
					$obj12 = RoomPeer::getInstanceFromPool($key12);
					if (!$obj12) {
	
						$omClass = RoomPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj12 = new $cls();
					$obj12->hydrate($row, $startcol12);
					RoomPeer::addInstanceToPool($obj12, $key12);
				} 
								$obj12->addItem($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptLocation(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ItemPeer::addSelectColumns($c);
		$startcol2 = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS);

		StatusPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (StatusPeer::NUM_COLUMNS - StatusPeer::NUM_LAZY_LOAD_COLUMNS);

		ModePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ModePeer::NUM_COLUMNS - ModePeer::NUM_LAZY_LOAD_COLUMNS);

		CustomerTypePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (CustomerTypePeer::NUM_COLUMNS - CustomerTypePeer::NUM_LAZY_LOAD_COLUMNS);

		SubLocationPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (SubLocationPeer::NUM_COLUMNS - SubLocationPeer::NUM_LAZY_LOAD_COLUMNS);

		CategoryPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + (CategoryPeer::NUM_COLUMNS - CategoryPeer::NUM_LAZY_LOAD_COLUMNS);

		SubCategoryPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + (SubCategoryPeer::NUM_COLUMNS - SubCategoryPeer::NUM_LAZY_LOAD_COLUMNS);

		MilagePeer::addSelectColumns($c);
		$startcol9 = $startcol8 + (MilagePeer::NUM_COLUMNS - MilagePeer::NUM_LAZY_LOAD_COLUMNS);

		GearboxPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + (GearboxPeer::NUM_COLUMNS - GearboxPeer::NUM_LAZY_LOAD_COLUMNS);

		YearmodelPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + (YearmodelPeer::NUM_COLUMNS - YearmodelPeer::NUM_LAZY_LOAD_COLUMNS);

		FuelPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + (FuelPeer::NUM_COLUMNS - FuelPeer::NUM_LAZY_LOAD_COLUMNS);

		RoomPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + (RoomPeer::NUM_COLUMNS - RoomPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(ItemPeer::STATUS_ID,), array(StatusPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::MODE_ID,), array(ModePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::CUSTOMERTYPE_ID,), array(CustomerTypePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::SUBLOCATION_ID,), array(SubLocationPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::CATEGORY_ID,), array(CategoryPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::SUBCATEGORY_ID,), array(SubCategoryPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::MILAGE_ID,), array(MilagePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::GEARBOX_ID,), array(GearboxPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::YEARMODEL_ID,), array(YearmodelPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::FUEL_ID,), array(FuelPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::ROOM_ID,), array(RoomPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ItemPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ItemPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = StatusPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = StatusPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = StatusPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					StatusPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addItem($obj1);

			} 
				
				$key3 = ModePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ModePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = ModePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ModePeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addItem($obj1);

			} 
				
				$key4 = CustomerTypePeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = CustomerTypePeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = CustomerTypePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					CustomerTypePeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addItem($obj1);

			} 
				
				$key5 = SubLocationPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = SubLocationPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = SubLocationPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					SubLocationPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addItem($obj1);

			} 
				
				$key6 = CategoryPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = CategoryPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$omClass = CategoryPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					CategoryPeer::addInstanceToPool($obj6, $key6);
				} 
								$obj6->addItem($obj1);

			} 
				
				$key7 = SubCategoryPeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = SubCategoryPeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$omClass = SubCategoryPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					SubCategoryPeer::addInstanceToPool($obj7, $key7);
				} 
								$obj7->addItem($obj1);

			} 
				
				$key8 = MilagePeer::getPrimaryKeyHashFromRow($row, $startcol8);
				if ($key8 !== null) {
					$obj8 = MilagePeer::getInstanceFromPool($key8);
					if (!$obj8) {
	
						$omClass = MilagePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj8 = new $cls();
					$obj8->hydrate($row, $startcol8);
					MilagePeer::addInstanceToPool($obj8, $key8);
				} 
								$obj8->addItem($obj1);

			} 
				
				$key9 = GearboxPeer::getPrimaryKeyHashFromRow($row, $startcol9);
				if ($key9 !== null) {
					$obj9 = GearboxPeer::getInstanceFromPool($key9);
					if (!$obj9) {
	
						$omClass = GearboxPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj9 = new $cls();
					$obj9->hydrate($row, $startcol9);
					GearboxPeer::addInstanceToPool($obj9, $key9);
				} 
								$obj9->addItem($obj1);

			} 
				
				$key10 = YearmodelPeer::getPrimaryKeyHashFromRow($row, $startcol10);
				if ($key10 !== null) {
					$obj10 = YearmodelPeer::getInstanceFromPool($key10);
					if (!$obj10) {
	
						$omClass = YearmodelPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj10 = new $cls();
					$obj10->hydrate($row, $startcol10);
					YearmodelPeer::addInstanceToPool($obj10, $key10);
				} 
								$obj10->addItem($obj1);

			} 
				
				$key11 = FuelPeer::getPrimaryKeyHashFromRow($row, $startcol11);
				if ($key11 !== null) {
					$obj11 = FuelPeer::getInstanceFromPool($key11);
					if (!$obj11) {
	
						$omClass = FuelPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj11 = new $cls();
					$obj11->hydrate($row, $startcol11);
					FuelPeer::addInstanceToPool($obj11, $key11);
				} 
								$obj11->addItem($obj1);

			} 
				
				$key12 = RoomPeer::getPrimaryKeyHashFromRow($row, $startcol12);
				if ($key12 !== null) {
					$obj12 = RoomPeer::getInstanceFromPool($key12);
					if (!$obj12) {
	
						$omClass = RoomPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj12 = new $cls();
					$obj12->hydrate($row, $startcol12);
					RoomPeer::addInstanceToPool($obj12, $key12);
				} 
								$obj12->addItem($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptSubLocation(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ItemPeer::addSelectColumns($c);
		$startcol2 = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS);

		StatusPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (StatusPeer::NUM_COLUMNS - StatusPeer::NUM_LAZY_LOAD_COLUMNS);

		ModePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ModePeer::NUM_COLUMNS - ModePeer::NUM_LAZY_LOAD_COLUMNS);

		CustomerTypePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (CustomerTypePeer::NUM_COLUMNS - CustomerTypePeer::NUM_LAZY_LOAD_COLUMNS);

		LocationPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (LocationPeer::NUM_COLUMNS - LocationPeer::NUM_LAZY_LOAD_COLUMNS);

		CategoryPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + (CategoryPeer::NUM_COLUMNS - CategoryPeer::NUM_LAZY_LOAD_COLUMNS);

		SubCategoryPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + (SubCategoryPeer::NUM_COLUMNS - SubCategoryPeer::NUM_LAZY_LOAD_COLUMNS);

		MilagePeer::addSelectColumns($c);
		$startcol9 = $startcol8 + (MilagePeer::NUM_COLUMNS - MilagePeer::NUM_LAZY_LOAD_COLUMNS);

		GearboxPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + (GearboxPeer::NUM_COLUMNS - GearboxPeer::NUM_LAZY_LOAD_COLUMNS);

		YearmodelPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + (YearmodelPeer::NUM_COLUMNS - YearmodelPeer::NUM_LAZY_LOAD_COLUMNS);

		FuelPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + (FuelPeer::NUM_COLUMNS - FuelPeer::NUM_LAZY_LOAD_COLUMNS);

		RoomPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + (RoomPeer::NUM_COLUMNS - RoomPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(ItemPeer::STATUS_ID,), array(StatusPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::MODE_ID,), array(ModePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::CUSTOMERTYPE_ID,), array(CustomerTypePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::LOCATION_ID,), array(LocationPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::CATEGORY_ID,), array(CategoryPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::SUBCATEGORY_ID,), array(SubCategoryPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::MILAGE_ID,), array(MilagePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::GEARBOX_ID,), array(GearboxPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::YEARMODEL_ID,), array(YearmodelPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::FUEL_ID,), array(FuelPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::ROOM_ID,), array(RoomPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ItemPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ItemPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = StatusPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = StatusPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = StatusPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					StatusPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addItem($obj1);

			} 
				
				$key3 = ModePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ModePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = ModePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ModePeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addItem($obj1);

			} 
				
				$key4 = CustomerTypePeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = CustomerTypePeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = CustomerTypePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					CustomerTypePeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addItem($obj1);

			} 
				
				$key5 = LocationPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = LocationPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = LocationPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					LocationPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addItem($obj1);

			} 
				
				$key6 = CategoryPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = CategoryPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$omClass = CategoryPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					CategoryPeer::addInstanceToPool($obj6, $key6);
				} 
								$obj6->addItem($obj1);

			} 
				
				$key7 = SubCategoryPeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = SubCategoryPeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$omClass = SubCategoryPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					SubCategoryPeer::addInstanceToPool($obj7, $key7);
				} 
								$obj7->addItem($obj1);

			} 
				
				$key8 = MilagePeer::getPrimaryKeyHashFromRow($row, $startcol8);
				if ($key8 !== null) {
					$obj8 = MilagePeer::getInstanceFromPool($key8);
					if (!$obj8) {
	
						$omClass = MilagePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj8 = new $cls();
					$obj8->hydrate($row, $startcol8);
					MilagePeer::addInstanceToPool($obj8, $key8);
				} 
								$obj8->addItem($obj1);

			} 
				
				$key9 = GearboxPeer::getPrimaryKeyHashFromRow($row, $startcol9);
				if ($key9 !== null) {
					$obj9 = GearboxPeer::getInstanceFromPool($key9);
					if (!$obj9) {
	
						$omClass = GearboxPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj9 = new $cls();
					$obj9->hydrate($row, $startcol9);
					GearboxPeer::addInstanceToPool($obj9, $key9);
				} 
								$obj9->addItem($obj1);

			} 
				
				$key10 = YearmodelPeer::getPrimaryKeyHashFromRow($row, $startcol10);
				if ($key10 !== null) {
					$obj10 = YearmodelPeer::getInstanceFromPool($key10);
					if (!$obj10) {
	
						$omClass = YearmodelPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj10 = new $cls();
					$obj10->hydrate($row, $startcol10);
					YearmodelPeer::addInstanceToPool($obj10, $key10);
				} 
								$obj10->addItem($obj1);

			} 
				
				$key11 = FuelPeer::getPrimaryKeyHashFromRow($row, $startcol11);
				if ($key11 !== null) {
					$obj11 = FuelPeer::getInstanceFromPool($key11);
					if (!$obj11) {
	
						$omClass = FuelPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj11 = new $cls();
					$obj11->hydrate($row, $startcol11);
					FuelPeer::addInstanceToPool($obj11, $key11);
				} 
								$obj11->addItem($obj1);

			} 
				
				$key12 = RoomPeer::getPrimaryKeyHashFromRow($row, $startcol12);
				if ($key12 !== null) {
					$obj12 = RoomPeer::getInstanceFromPool($key12);
					if (!$obj12) {
	
						$omClass = RoomPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj12 = new $cls();
					$obj12->hydrate($row, $startcol12);
					RoomPeer::addInstanceToPool($obj12, $key12);
				} 
								$obj12->addItem($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptCategory(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ItemPeer::addSelectColumns($c);
		$startcol2 = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS);

		StatusPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (StatusPeer::NUM_COLUMNS - StatusPeer::NUM_LAZY_LOAD_COLUMNS);

		ModePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ModePeer::NUM_COLUMNS - ModePeer::NUM_LAZY_LOAD_COLUMNS);

		CustomerTypePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (CustomerTypePeer::NUM_COLUMNS - CustomerTypePeer::NUM_LAZY_LOAD_COLUMNS);

		LocationPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (LocationPeer::NUM_COLUMNS - LocationPeer::NUM_LAZY_LOAD_COLUMNS);

		SubLocationPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + (SubLocationPeer::NUM_COLUMNS - SubLocationPeer::NUM_LAZY_LOAD_COLUMNS);

		SubCategoryPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + (SubCategoryPeer::NUM_COLUMNS - SubCategoryPeer::NUM_LAZY_LOAD_COLUMNS);

		MilagePeer::addSelectColumns($c);
		$startcol9 = $startcol8 + (MilagePeer::NUM_COLUMNS - MilagePeer::NUM_LAZY_LOAD_COLUMNS);

		GearboxPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + (GearboxPeer::NUM_COLUMNS - GearboxPeer::NUM_LAZY_LOAD_COLUMNS);

		YearmodelPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + (YearmodelPeer::NUM_COLUMNS - YearmodelPeer::NUM_LAZY_LOAD_COLUMNS);

		FuelPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + (FuelPeer::NUM_COLUMNS - FuelPeer::NUM_LAZY_LOAD_COLUMNS);

		RoomPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + (RoomPeer::NUM_COLUMNS - RoomPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(ItemPeer::STATUS_ID,), array(StatusPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::MODE_ID,), array(ModePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::CUSTOMERTYPE_ID,), array(CustomerTypePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::LOCATION_ID,), array(LocationPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::SUBLOCATION_ID,), array(SubLocationPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::SUBCATEGORY_ID,), array(SubCategoryPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::MILAGE_ID,), array(MilagePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::GEARBOX_ID,), array(GearboxPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::YEARMODEL_ID,), array(YearmodelPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::FUEL_ID,), array(FuelPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::ROOM_ID,), array(RoomPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ItemPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ItemPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = StatusPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = StatusPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = StatusPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					StatusPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addItem($obj1);

			} 
				
				$key3 = ModePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ModePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = ModePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ModePeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addItem($obj1);

			} 
				
				$key4 = CustomerTypePeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = CustomerTypePeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = CustomerTypePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					CustomerTypePeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addItem($obj1);

			} 
				
				$key5 = LocationPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = LocationPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = LocationPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					LocationPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addItem($obj1);

			} 
				
				$key6 = SubLocationPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = SubLocationPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$omClass = SubLocationPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					SubLocationPeer::addInstanceToPool($obj6, $key6);
				} 
								$obj6->addItem($obj1);

			} 
				
				$key7 = SubCategoryPeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = SubCategoryPeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$omClass = SubCategoryPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					SubCategoryPeer::addInstanceToPool($obj7, $key7);
				} 
								$obj7->addItem($obj1);

			} 
				
				$key8 = MilagePeer::getPrimaryKeyHashFromRow($row, $startcol8);
				if ($key8 !== null) {
					$obj8 = MilagePeer::getInstanceFromPool($key8);
					if (!$obj8) {
	
						$omClass = MilagePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj8 = new $cls();
					$obj8->hydrate($row, $startcol8);
					MilagePeer::addInstanceToPool($obj8, $key8);
				} 
								$obj8->addItem($obj1);

			} 
				
				$key9 = GearboxPeer::getPrimaryKeyHashFromRow($row, $startcol9);
				if ($key9 !== null) {
					$obj9 = GearboxPeer::getInstanceFromPool($key9);
					if (!$obj9) {
	
						$omClass = GearboxPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj9 = new $cls();
					$obj9->hydrate($row, $startcol9);
					GearboxPeer::addInstanceToPool($obj9, $key9);
				} 
								$obj9->addItem($obj1);

			} 
				
				$key10 = YearmodelPeer::getPrimaryKeyHashFromRow($row, $startcol10);
				if ($key10 !== null) {
					$obj10 = YearmodelPeer::getInstanceFromPool($key10);
					if (!$obj10) {
	
						$omClass = YearmodelPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj10 = new $cls();
					$obj10->hydrate($row, $startcol10);
					YearmodelPeer::addInstanceToPool($obj10, $key10);
				} 
								$obj10->addItem($obj1);

			} 
				
				$key11 = FuelPeer::getPrimaryKeyHashFromRow($row, $startcol11);
				if ($key11 !== null) {
					$obj11 = FuelPeer::getInstanceFromPool($key11);
					if (!$obj11) {
	
						$omClass = FuelPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj11 = new $cls();
					$obj11->hydrate($row, $startcol11);
					FuelPeer::addInstanceToPool($obj11, $key11);
				} 
								$obj11->addItem($obj1);

			} 
				
				$key12 = RoomPeer::getPrimaryKeyHashFromRow($row, $startcol12);
				if ($key12 !== null) {
					$obj12 = RoomPeer::getInstanceFromPool($key12);
					if (!$obj12) {
	
						$omClass = RoomPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj12 = new $cls();
					$obj12->hydrate($row, $startcol12);
					RoomPeer::addInstanceToPool($obj12, $key12);
				} 
								$obj12->addItem($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptSubCategory(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ItemPeer::addSelectColumns($c);
		$startcol2 = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS);

		StatusPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (StatusPeer::NUM_COLUMNS - StatusPeer::NUM_LAZY_LOAD_COLUMNS);

		ModePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ModePeer::NUM_COLUMNS - ModePeer::NUM_LAZY_LOAD_COLUMNS);

		CustomerTypePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (CustomerTypePeer::NUM_COLUMNS - CustomerTypePeer::NUM_LAZY_LOAD_COLUMNS);

		LocationPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (LocationPeer::NUM_COLUMNS - LocationPeer::NUM_LAZY_LOAD_COLUMNS);

		SubLocationPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + (SubLocationPeer::NUM_COLUMNS - SubLocationPeer::NUM_LAZY_LOAD_COLUMNS);

		CategoryPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + (CategoryPeer::NUM_COLUMNS - CategoryPeer::NUM_LAZY_LOAD_COLUMNS);

		MilagePeer::addSelectColumns($c);
		$startcol9 = $startcol8 + (MilagePeer::NUM_COLUMNS - MilagePeer::NUM_LAZY_LOAD_COLUMNS);

		GearboxPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + (GearboxPeer::NUM_COLUMNS - GearboxPeer::NUM_LAZY_LOAD_COLUMNS);

		YearmodelPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + (YearmodelPeer::NUM_COLUMNS - YearmodelPeer::NUM_LAZY_LOAD_COLUMNS);

		FuelPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + (FuelPeer::NUM_COLUMNS - FuelPeer::NUM_LAZY_LOAD_COLUMNS);

		RoomPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + (RoomPeer::NUM_COLUMNS - RoomPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(ItemPeer::STATUS_ID,), array(StatusPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::MODE_ID,), array(ModePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::CUSTOMERTYPE_ID,), array(CustomerTypePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::LOCATION_ID,), array(LocationPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::SUBLOCATION_ID,), array(SubLocationPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::CATEGORY_ID,), array(CategoryPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::MILAGE_ID,), array(MilagePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::GEARBOX_ID,), array(GearboxPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::YEARMODEL_ID,), array(YearmodelPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::FUEL_ID,), array(FuelPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::ROOM_ID,), array(RoomPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ItemPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ItemPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = StatusPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = StatusPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = StatusPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					StatusPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addItem($obj1);

			} 
				
				$key3 = ModePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ModePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = ModePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ModePeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addItem($obj1);

			} 
				
				$key4 = CustomerTypePeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = CustomerTypePeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = CustomerTypePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					CustomerTypePeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addItem($obj1);

			} 
				
				$key5 = LocationPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = LocationPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = LocationPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					LocationPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addItem($obj1);

			} 
				
				$key6 = SubLocationPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = SubLocationPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$omClass = SubLocationPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					SubLocationPeer::addInstanceToPool($obj6, $key6);
				} 
								$obj6->addItem($obj1);

			} 
				
				$key7 = CategoryPeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = CategoryPeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$omClass = CategoryPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					CategoryPeer::addInstanceToPool($obj7, $key7);
				} 
								$obj7->addItem($obj1);

			} 
				
				$key8 = MilagePeer::getPrimaryKeyHashFromRow($row, $startcol8);
				if ($key8 !== null) {
					$obj8 = MilagePeer::getInstanceFromPool($key8);
					if (!$obj8) {
	
						$omClass = MilagePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj8 = new $cls();
					$obj8->hydrate($row, $startcol8);
					MilagePeer::addInstanceToPool($obj8, $key8);
				} 
								$obj8->addItem($obj1);

			} 
				
				$key9 = GearboxPeer::getPrimaryKeyHashFromRow($row, $startcol9);
				if ($key9 !== null) {
					$obj9 = GearboxPeer::getInstanceFromPool($key9);
					if (!$obj9) {
	
						$omClass = GearboxPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj9 = new $cls();
					$obj9->hydrate($row, $startcol9);
					GearboxPeer::addInstanceToPool($obj9, $key9);
				} 
								$obj9->addItem($obj1);

			} 
				
				$key10 = YearmodelPeer::getPrimaryKeyHashFromRow($row, $startcol10);
				if ($key10 !== null) {
					$obj10 = YearmodelPeer::getInstanceFromPool($key10);
					if (!$obj10) {
	
						$omClass = YearmodelPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj10 = new $cls();
					$obj10->hydrate($row, $startcol10);
					YearmodelPeer::addInstanceToPool($obj10, $key10);
				} 
								$obj10->addItem($obj1);

			} 
				
				$key11 = FuelPeer::getPrimaryKeyHashFromRow($row, $startcol11);
				if ($key11 !== null) {
					$obj11 = FuelPeer::getInstanceFromPool($key11);
					if (!$obj11) {
	
						$omClass = FuelPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj11 = new $cls();
					$obj11->hydrate($row, $startcol11);
					FuelPeer::addInstanceToPool($obj11, $key11);
				} 
								$obj11->addItem($obj1);

			} 
				
				$key12 = RoomPeer::getPrimaryKeyHashFromRow($row, $startcol12);
				if ($key12 !== null) {
					$obj12 = RoomPeer::getInstanceFromPool($key12);
					if (!$obj12) {
	
						$omClass = RoomPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj12 = new $cls();
					$obj12->hydrate($row, $startcol12);
					RoomPeer::addInstanceToPool($obj12, $key12);
				} 
								$obj12->addItem($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptMilage(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ItemPeer::addSelectColumns($c);
		$startcol2 = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS);

		StatusPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (StatusPeer::NUM_COLUMNS - StatusPeer::NUM_LAZY_LOAD_COLUMNS);

		ModePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ModePeer::NUM_COLUMNS - ModePeer::NUM_LAZY_LOAD_COLUMNS);

		CustomerTypePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (CustomerTypePeer::NUM_COLUMNS - CustomerTypePeer::NUM_LAZY_LOAD_COLUMNS);

		LocationPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (LocationPeer::NUM_COLUMNS - LocationPeer::NUM_LAZY_LOAD_COLUMNS);

		SubLocationPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + (SubLocationPeer::NUM_COLUMNS - SubLocationPeer::NUM_LAZY_LOAD_COLUMNS);

		CategoryPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + (CategoryPeer::NUM_COLUMNS - CategoryPeer::NUM_LAZY_LOAD_COLUMNS);

		SubCategoryPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + (SubCategoryPeer::NUM_COLUMNS - SubCategoryPeer::NUM_LAZY_LOAD_COLUMNS);

		GearboxPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + (GearboxPeer::NUM_COLUMNS - GearboxPeer::NUM_LAZY_LOAD_COLUMNS);

		YearmodelPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + (YearmodelPeer::NUM_COLUMNS - YearmodelPeer::NUM_LAZY_LOAD_COLUMNS);

		FuelPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + (FuelPeer::NUM_COLUMNS - FuelPeer::NUM_LAZY_LOAD_COLUMNS);

		RoomPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + (RoomPeer::NUM_COLUMNS - RoomPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(ItemPeer::STATUS_ID,), array(StatusPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::MODE_ID,), array(ModePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::CUSTOMERTYPE_ID,), array(CustomerTypePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::LOCATION_ID,), array(LocationPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::SUBLOCATION_ID,), array(SubLocationPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::CATEGORY_ID,), array(CategoryPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::SUBCATEGORY_ID,), array(SubCategoryPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::GEARBOX_ID,), array(GearboxPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::YEARMODEL_ID,), array(YearmodelPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::FUEL_ID,), array(FuelPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::ROOM_ID,), array(RoomPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ItemPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ItemPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = StatusPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = StatusPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = StatusPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					StatusPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addItem($obj1);

			} 
				
				$key3 = ModePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ModePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = ModePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ModePeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addItem($obj1);

			} 
				
				$key4 = CustomerTypePeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = CustomerTypePeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = CustomerTypePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					CustomerTypePeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addItem($obj1);

			} 
				
				$key5 = LocationPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = LocationPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = LocationPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					LocationPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addItem($obj1);

			} 
				
				$key6 = SubLocationPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = SubLocationPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$omClass = SubLocationPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					SubLocationPeer::addInstanceToPool($obj6, $key6);
				} 
								$obj6->addItem($obj1);

			} 
				
				$key7 = CategoryPeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = CategoryPeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$omClass = CategoryPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					CategoryPeer::addInstanceToPool($obj7, $key7);
				} 
								$obj7->addItem($obj1);

			} 
				
				$key8 = SubCategoryPeer::getPrimaryKeyHashFromRow($row, $startcol8);
				if ($key8 !== null) {
					$obj8 = SubCategoryPeer::getInstanceFromPool($key8);
					if (!$obj8) {
	
						$omClass = SubCategoryPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj8 = new $cls();
					$obj8->hydrate($row, $startcol8);
					SubCategoryPeer::addInstanceToPool($obj8, $key8);
				} 
								$obj8->addItem($obj1);

			} 
				
				$key9 = GearboxPeer::getPrimaryKeyHashFromRow($row, $startcol9);
				if ($key9 !== null) {
					$obj9 = GearboxPeer::getInstanceFromPool($key9);
					if (!$obj9) {
	
						$omClass = GearboxPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj9 = new $cls();
					$obj9->hydrate($row, $startcol9);
					GearboxPeer::addInstanceToPool($obj9, $key9);
				} 
								$obj9->addItem($obj1);

			} 
				
				$key10 = YearmodelPeer::getPrimaryKeyHashFromRow($row, $startcol10);
				if ($key10 !== null) {
					$obj10 = YearmodelPeer::getInstanceFromPool($key10);
					if (!$obj10) {
	
						$omClass = YearmodelPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj10 = new $cls();
					$obj10->hydrate($row, $startcol10);
					YearmodelPeer::addInstanceToPool($obj10, $key10);
				} 
								$obj10->addItem($obj1);

			} 
				
				$key11 = FuelPeer::getPrimaryKeyHashFromRow($row, $startcol11);
				if ($key11 !== null) {
					$obj11 = FuelPeer::getInstanceFromPool($key11);
					if (!$obj11) {
	
						$omClass = FuelPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj11 = new $cls();
					$obj11->hydrate($row, $startcol11);
					FuelPeer::addInstanceToPool($obj11, $key11);
				} 
								$obj11->addItem($obj1);

			} 
				
				$key12 = RoomPeer::getPrimaryKeyHashFromRow($row, $startcol12);
				if ($key12 !== null) {
					$obj12 = RoomPeer::getInstanceFromPool($key12);
					if (!$obj12) {
	
						$omClass = RoomPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj12 = new $cls();
					$obj12->hydrate($row, $startcol12);
					RoomPeer::addInstanceToPool($obj12, $key12);
				} 
								$obj12->addItem($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptGearbox(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ItemPeer::addSelectColumns($c);
		$startcol2 = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS);

		StatusPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (StatusPeer::NUM_COLUMNS - StatusPeer::NUM_LAZY_LOAD_COLUMNS);

		ModePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ModePeer::NUM_COLUMNS - ModePeer::NUM_LAZY_LOAD_COLUMNS);

		CustomerTypePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (CustomerTypePeer::NUM_COLUMNS - CustomerTypePeer::NUM_LAZY_LOAD_COLUMNS);

		LocationPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (LocationPeer::NUM_COLUMNS - LocationPeer::NUM_LAZY_LOAD_COLUMNS);

		SubLocationPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + (SubLocationPeer::NUM_COLUMNS - SubLocationPeer::NUM_LAZY_LOAD_COLUMNS);

		CategoryPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + (CategoryPeer::NUM_COLUMNS - CategoryPeer::NUM_LAZY_LOAD_COLUMNS);

		SubCategoryPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + (SubCategoryPeer::NUM_COLUMNS - SubCategoryPeer::NUM_LAZY_LOAD_COLUMNS);

		MilagePeer::addSelectColumns($c);
		$startcol10 = $startcol9 + (MilagePeer::NUM_COLUMNS - MilagePeer::NUM_LAZY_LOAD_COLUMNS);

		YearmodelPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + (YearmodelPeer::NUM_COLUMNS - YearmodelPeer::NUM_LAZY_LOAD_COLUMNS);

		FuelPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + (FuelPeer::NUM_COLUMNS - FuelPeer::NUM_LAZY_LOAD_COLUMNS);

		RoomPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + (RoomPeer::NUM_COLUMNS - RoomPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(ItemPeer::STATUS_ID,), array(StatusPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::MODE_ID,), array(ModePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::CUSTOMERTYPE_ID,), array(CustomerTypePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::LOCATION_ID,), array(LocationPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::SUBLOCATION_ID,), array(SubLocationPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::CATEGORY_ID,), array(CategoryPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::SUBCATEGORY_ID,), array(SubCategoryPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::MILAGE_ID,), array(MilagePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::YEARMODEL_ID,), array(YearmodelPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::FUEL_ID,), array(FuelPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::ROOM_ID,), array(RoomPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ItemPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ItemPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = StatusPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = StatusPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = StatusPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					StatusPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addItem($obj1);

			} 
				
				$key3 = ModePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ModePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = ModePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ModePeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addItem($obj1);

			} 
				
				$key4 = CustomerTypePeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = CustomerTypePeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = CustomerTypePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					CustomerTypePeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addItem($obj1);

			} 
				
				$key5 = LocationPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = LocationPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = LocationPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					LocationPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addItem($obj1);

			} 
				
				$key6 = SubLocationPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = SubLocationPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$omClass = SubLocationPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					SubLocationPeer::addInstanceToPool($obj6, $key6);
				} 
								$obj6->addItem($obj1);

			} 
				
				$key7 = CategoryPeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = CategoryPeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$omClass = CategoryPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					CategoryPeer::addInstanceToPool($obj7, $key7);
				} 
								$obj7->addItem($obj1);

			} 
				
				$key8 = SubCategoryPeer::getPrimaryKeyHashFromRow($row, $startcol8);
				if ($key8 !== null) {
					$obj8 = SubCategoryPeer::getInstanceFromPool($key8);
					if (!$obj8) {
	
						$omClass = SubCategoryPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj8 = new $cls();
					$obj8->hydrate($row, $startcol8);
					SubCategoryPeer::addInstanceToPool($obj8, $key8);
				} 
								$obj8->addItem($obj1);

			} 
				
				$key9 = MilagePeer::getPrimaryKeyHashFromRow($row, $startcol9);
				if ($key9 !== null) {
					$obj9 = MilagePeer::getInstanceFromPool($key9);
					if (!$obj9) {
	
						$omClass = MilagePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj9 = new $cls();
					$obj9->hydrate($row, $startcol9);
					MilagePeer::addInstanceToPool($obj9, $key9);
				} 
								$obj9->addItem($obj1);

			} 
				
				$key10 = YearmodelPeer::getPrimaryKeyHashFromRow($row, $startcol10);
				if ($key10 !== null) {
					$obj10 = YearmodelPeer::getInstanceFromPool($key10);
					if (!$obj10) {
	
						$omClass = YearmodelPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj10 = new $cls();
					$obj10->hydrate($row, $startcol10);
					YearmodelPeer::addInstanceToPool($obj10, $key10);
				} 
								$obj10->addItem($obj1);

			} 
				
				$key11 = FuelPeer::getPrimaryKeyHashFromRow($row, $startcol11);
				if ($key11 !== null) {
					$obj11 = FuelPeer::getInstanceFromPool($key11);
					if (!$obj11) {
	
						$omClass = FuelPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj11 = new $cls();
					$obj11->hydrate($row, $startcol11);
					FuelPeer::addInstanceToPool($obj11, $key11);
				} 
								$obj11->addItem($obj1);

			} 
				
				$key12 = RoomPeer::getPrimaryKeyHashFromRow($row, $startcol12);
				if ($key12 !== null) {
					$obj12 = RoomPeer::getInstanceFromPool($key12);
					if (!$obj12) {
	
						$omClass = RoomPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj12 = new $cls();
					$obj12->hydrate($row, $startcol12);
					RoomPeer::addInstanceToPool($obj12, $key12);
				} 
								$obj12->addItem($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptYearmodel(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ItemPeer::addSelectColumns($c);
		$startcol2 = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS);

		StatusPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (StatusPeer::NUM_COLUMNS - StatusPeer::NUM_LAZY_LOAD_COLUMNS);

		ModePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ModePeer::NUM_COLUMNS - ModePeer::NUM_LAZY_LOAD_COLUMNS);

		CustomerTypePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (CustomerTypePeer::NUM_COLUMNS - CustomerTypePeer::NUM_LAZY_LOAD_COLUMNS);

		LocationPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (LocationPeer::NUM_COLUMNS - LocationPeer::NUM_LAZY_LOAD_COLUMNS);

		SubLocationPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + (SubLocationPeer::NUM_COLUMNS - SubLocationPeer::NUM_LAZY_LOAD_COLUMNS);

		CategoryPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + (CategoryPeer::NUM_COLUMNS - CategoryPeer::NUM_LAZY_LOAD_COLUMNS);

		SubCategoryPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + (SubCategoryPeer::NUM_COLUMNS - SubCategoryPeer::NUM_LAZY_LOAD_COLUMNS);

		MilagePeer::addSelectColumns($c);
		$startcol10 = $startcol9 + (MilagePeer::NUM_COLUMNS - MilagePeer::NUM_LAZY_LOAD_COLUMNS);

		GearboxPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + (GearboxPeer::NUM_COLUMNS - GearboxPeer::NUM_LAZY_LOAD_COLUMNS);

		FuelPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + (FuelPeer::NUM_COLUMNS - FuelPeer::NUM_LAZY_LOAD_COLUMNS);

		RoomPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + (RoomPeer::NUM_COLUMNS - RoomPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(ItemPeer::STATUS_ID,), array(StatusPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::MODE_ID,), array(ModePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::CUSTOMERTYPE_ID,), array(CustomerTypePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::LOCATION_ID,), array(LocationPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::SUBLOCATION_ID,), array(SubLocationPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::CATEGORY_ID,), array(CategoryPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::SUBCATEGORY_ID,), array(SubCategoryPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::MILAGE_ID,), array(MilagePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::GEARBOX_ID,), array(GearboxPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::FUEL_ID,), array(FuelPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::ROOM_ID,), array(RoomPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ItemPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ItemPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = StatusPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = StatusPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = StatusPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					StatusPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addItem($obj1);

			} 
				
				$key3 = ModePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ModePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = ModePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ModePeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addItem($obj1);

			} 
				
				$key4 = CustomerTypePeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = CustomerTypePeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = CustomerTypePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					CustomerTypePeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addItem($obj1);

			} 
				
				$key5 = LocationPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = LocationPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = LocationPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					LocationPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addItem($obj1);

			} 
				
				$key6 = SubLocationPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = SubLocationPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$omClass = SubLocationPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					SubLocationPeer::addInstanceToPool($obj6, $key6);
				} 
								$obj6->addItem($obj1);

			} 
				
				$key7 = CategoryPeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = CategoryPeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$omClass = CategoryPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					CategoryPeer::addInstanceToPool($obj7, $key7);
				} 
								$obj7->addItem($obj1);

			} 
				
				$key8 = SubCategoryPeer::getPrimaryKeyHashFromRow($row, $startcol8);
				if ($key8 !== null) {
					$obj8 = SubCategoryPeer::getInstanceFromPool($key8);
					if (!$obj8) {
	
						$omClass = SubCategoryPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj8 = new $cls();
					$obj8->hydrate($row, $startcol8);
					SubCategoryPeer::addInstanceToPool($obj8, $key8);
				} 
								$obj8->addItem($obj1);

			} 
				
				$key9 = MilagePeer::getPrimaryKeyHashFromRow($row, $startcol9);
				if ($key9 !== null) {
					$obj9 = MilagePeer::getInstanceFromPool($key9);
					if (!$obj9) {
	
						$omClass = MilagePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj9 = new $cls();
					$obj9->hydrate($row, $startcol9);
					MilagePeer::addInstanceToPool($obj9, $key9);
				} 
								$obj9->addItem($obj1);

			} 
				
				$key10 = GearboxPeer::getPrimaryKeyHashFromRow($row, $startcol10);
				if ($key10 !== null) {
					$obj10 = GearboxPeer::getInstanceFromPool($key10);
					if (!$obj10) {
	
						$omClass = GearboxPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj10 = new $cls();
					$obj10->hydrate($row, $startcol10);
					GearboxPeer::addInstanceToPool($obj10, $key10);
				} 
								$obj10->addItem($obj1);

			} 
				
				$key11 = FuelPeer::getPrimaryKeyHashFromRow($row, $startcol11);
				if ($key11 !== null) {
					$obj11 = FuelPeer::getInstanceFromPool($key11);
					if (!$obj11) {
	
						$omClass = FuelPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj11 = new $cls();
					$obj11->hydrate($row, $startcol11);
					FuelPeer::addInstanceToPool($obj11, $key11);
				} 
								$obj11->addItem($obj1);

			} 
				
				$key12 = RoomPeer::getPrimaryKeyHashFromRow($row, $startcol12);
				if ($key12 !== null) {
					$obj12 = RoomPeer::getInstanceFromPool($key12);
					if (!$obj12) {
	
						$omClass = RoomPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj12 = new $cls();
					$obj12->hydrate($row, $startcol12);
					RoomPeer::addInstanceToPool($obj12, $key12);
				} 
								$obj12->addItem($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptFuel(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ItemPeer::addSelectColumns($c);
		$startcol2 = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS);

		StatusPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (StatusPeer::NUM_COLUMNS - StatusPeer::NUM_LAZY_LOAD_COLUMNS);

		ModePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ModePeer::NUM_COLUMNS - ModePeer::NUM_LAZY_LOAD_COLUMNS);

		CustomerTypePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (CustomerTypePeer::NUM_COLUMNS - CustomerTypePeer::NUM_LAZY_LOAD_COLUMNS);

		LocationPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (LocationPeer::NUM_COLUMNS - LocationPeer::NUM_LAZY_LOAD_COLUMNS);

		SubLocationPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + (SubLocationPeer::NUM_COLUMNS - SubLocationPeer::NUM_LAZY_LOAD_COLUMNS);

		CategoryPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + (CategoryPeer::NUM_COLUMNS - CategoryPeer::NUM_LAZY_LOAD_COLUMNS);

		SubCategoryPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + (SubCategoryPeer::NUM_COLUMNS - SubCategoryPeer::NUM_LAZY_LOAD_COLUMNS);

		MilagePeer::addSelectColumns($c);
		$startcol10 = $startcol9 + (MilagePeer::NUM_COLUMNS - MilagePeer::NUM_LAZY_LOAD_COLUMNS);

		GearboxPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + (GearboxPeer::NUM_COLUMNS - GearboxPeer::NUM_LAZY_LOAD_COLUMNS);

		YearmodelPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + (YearmodelPeer::NUM_COLUMNS - YearmodelPeer::NUM_LAZY_LOAD_COLUMNS);

		RoomPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + (RoomPeer::NUM_COLUMNS - RoomPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(ItemPeer::STATUS_ID,), array(StatusPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::MODE_ID,), array(ModePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::CUSTOMERTYPE_ID,), array(CustomerTypePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::LOCATION_ID,), array(LocationPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::SUBLOCATION_ID,), array(SubLocationPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::CATEGORY_ID,), array(CategoryPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::SUBCATEGORY_ID,), array(SubCategoryPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::MILAGE_ID,), array(MilagePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::GEARBOX_ID,), array(GearboxPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::YEARMODEL_ID,), array(YearmodelPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::ROOM_ID,), array(RoomPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ItemPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ItemPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = StatusPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = StatusPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = StatusPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					StatusPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addItem($obj1);

			} 
				
				$key3 = ModePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ModePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = ModePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ModePeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addItem($obj1);

			} 
				
				$key4 = CustomerTypePeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = CustomerTypePeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = CustomerTypePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					CustomerTypePeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addItem($obj1);

			} 
				
				$key5 = LocationPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = LocationPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = LocationPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					LocationPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addItem($obj1);

			} 
				
				$key6 = SubLocationPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = SubLocationPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$omClass = SubLocationPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					SubLocationPeer::addInstanceToPool($obj6, $key6);
				} 
								$obj6->addItem($obj1);

			} 
				
				$key7 = CategoryPeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = CategoryPeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$omClass = CategoryPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					CategoryPeer::addInstanceToPool($obj7, $key7);
				} 
								$obj7->addItem($obj1);

			} 
				
				$key8 = SubCategoryPeer::getPrimaryKeyHashFromRow($row, $startcol8);
				if ($key8 !== null) {
					$obj8 = SubCategoryPeer::getInstanceFromPool($key8);
					if (!$obj8) {
	
						$omClass = SubCategoryPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj8 = new $cls();
					$obj8->hydrate($row, $startcol8);
					SubCategoryPeer::addInstanceToPool($obj8, $key8);
				} 
								$obj8->addItem($obj1);

			} 
				
				$key9 = MilagePeer::getPrimaryKeyHashFromRow($row, $startcol9);
				if ($key9 !== null) {
					$obj9 = MilagePeer::getInstanceFromPool($key9);
					if (!$obj9) {
	
						$omClass = MilagePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj9 = new $cls();
					$obj9->hydrate($row, $startcol9);
					MilagePeer::addInstanceToPool($obj9, $key9);
				} 
								$obj9->addItem($obj1);

			} 
				
				$key10 = GearboxPeer::getPrimaryKeyHashFromRow($row, $startcol10);
				if ($key10 !== null) {
					$obj10 = GearboxPeer::getInstanceFromPool($key10);
					if (!$obj10) {
	
						$omClass = GearboxPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj10 = new $cls();
					$obj10->hydrate($row, $startcol10);
					GearboxPeer::addInstanceToPool($obj10, $key10);
				} 
								$obj10->addItem($obj1);

			} 
				
				$key11 = YearmodelPeer::getPrimaryKeyHashFromRow($row, $startcol11);
				if ($key11 !== null) {
					$obj11 = YearmodelPeer::getInstanceFromPool($key11);
					if (!$obj11) {
	
						$omClass = YearmodelPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj11 = new $cls();
					$obj11->hydrate($row, $startcol11);
					YearmodelPeer::addInstanceToPool($obj11, $key11);
				} 
								$obj11->addItem($obj1);

			} 
				
				$key12 = RoomPeer::getPrimaryKeyHashFromRow($row, $startcol12);
				if ($key12 !== null) {
					$obj12 = RoomPeer::getInstanceFromPool($key12);
					if (!$obj12) {
	
						$omClass = RoomPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj12 = new $cls();
					$obj12->hydrate($row, $startcol12);
					RoomPeer::addInstanceToPool($obj12, $key12);
				} 
								$obj12->addItem($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptRoom(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ItemPeer::addSelectColumns($c);
		$startcol2 = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS);

		StatusPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (StatusPeer::NUM_COLUMNS - StatusPeer::NUM_LAZY_LOAD_COLUMNS);

		ModePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ModePeer::NUM_COLUMNS - ModePeer::NUM_LAZY_LOAD_COLUMNS);

		CustomerTypePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (CustomerTypePeer::NUM_COLUMNS - CustomerTypePeer::NUM_LAZY_LOAD_COLUMNS);

		LocationPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (LocationPeer::NUM_COLUMNS - LocationPeer::NUM_LAZY_LOAD_COLUMNS);

		SubLocationPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + (SubLocationPeer::NUM_COLUMNS - SubLocationPeer::NUM_LAZY_LOAD_COLUMNS);

		CategoryPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + (CategoryPeer::NUM_COLUMNS - CategoryPeer::NUM_LAZY_LOAD_COLUMNS);

		SubCategoryPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + (SubCategoryPeer::NUM_COLUMNS - SubCategoryPeer::NUM_LAZY_LOAD_COLUMNS);

		MilagePeer::addSelectColumns($c);
		$startcol10 = $startcol9 + (MilagePeer::NUM_COLUMNS - MilagePeer::NUM_LAZY_LOAD_COLUMNS);

		GearboxPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + (GearboxPeer::NUM_COLUMNS - GearboxPeer::NUM_LAZY_LOAD_COLUMNS);

		YearmodelPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + (YearmodelPeer::NUM_COLUMNS - YearmodelPeer::NUM_LAZY_LOAD_COLUMNS);

		FuelPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + (FuelPeer::NUM_COLUMNS - FuelPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(ItemPeer::STATUS_ID,), array(StatusPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::MODE_ID,), array(ModePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::CUSTOMERTYPE_ID,), array(CustomerTypePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::LOCATION_ID,), array(LocationPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::SUBLOCATION_ID,), array(SubLocationPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::CATEGORY_ID,), array(CategoryPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::SUBCATEGORY_ID,), array(SubCategoryPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::MILAGE_ID,), array(MilagePeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::GEARBOX_ID,), array(GearboxPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::YEARMODEL_ID,), array(YearmodelPeer::ID,), $join_behavior);
				$c->addJoin(array(ItemPeer::FUEL_ID,), array(FuelPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ItemPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ItemPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = StatusPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = StatusPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = StatusPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					StatusPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addItem($obj1);

			} 
				
				$key3 = ModePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ModePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = ModePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ModePeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addItem($obj1);

			} 
				
				$key4 = CustomerTypePeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = CustomerTypePeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = CustomerTypePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					CustomerTypePeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addItem($obj1);

			} 
				
				$key5 = LocationPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = LocationPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = LocationPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					LocationPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addItem($obj1);

			} 
				
				$key6 = SubLocationPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = SubLocationPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$omClass = SubLocationPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					SubLocationPeer::addInstanceToPool($obj6, $key6);
				} 
								$obj6->addItem($obj1);

			} 
				
				$key7 = CategoryPeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = CategoryPeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$omClass = CategoryPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					CategoryPeer::addInstanceToPool($obj7, $key7);
				} 
								$obj7->addItem($obj1);

			} 
				
				$key8 = SubCategoryPeer::getPrimaryKeyHashFromRow($row, $startcol8);
				if ($key8 !== null) {
					$obj8 = SubCategoryPeer::getInstanceFromPool($key8);
					if (!$obj8) {
	
						$omClass = SubCategoryPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj8 = new $cls();
					$obj8->hydrate($row, $startcol8);
					SubCategoryPeer::addInstanceToPool($obj8, $key8);
				} 
								$obj8->addItem($obj1);

			} 
				
				$key9 = MilagePeer::getPrimaryKeyHashFromRow($row, $startcol9);
				if ($key9 !== null) {
					$obj9 = MilagePeer::getInstanceFromPool($key9);
					if (!$obj9) {
	
						$omClass = MilagePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj9 = new $cls();
					$obj9->hydrate($row, $startcol9);
					MilagePeer::addInstanceToPool($obj9, $key9);
				} 
								$obj9->addItem($obj1);

			} 
				
				$key10 = GearboxPeer::getPrimaryKeyHashFromRow($row, $startcol10);
				if ($key10 !== null) {
					$obj10 = GearboxPeer::getInstanceFromPool($key10);
					if (!$obj10) {
	
						$omClass = GearboxPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj10 = new $cls();
					$obj10->hydrate($row, $startcol10);
					GearboxPeer::addInstanceToPool($obj10, $key10);
				} 
								$obj10->addItem($obj1);

			} 
				
				$key11 = YearmodelPeer::getPrimaryKeyHashFromRow($row, $startcol11);
				if ($key11 !== null) {
					$obj11 = YearmodelPeer::getInstanceFromPool($key11);
					if (!$obj11) {
	
						$omClass = YearmodelPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj11 = new $cls();
					$obj11->hydrate($row, $startcol11);
					YearmodelPeer::addInstanceToPool($obj11, $key11);
				} 
								$obj11->addItem($obj1);

			} 
				
				$key12 = FuelPeer::getPrimaryKeyHashFromRow($row, $startcol12);
				if ($key12 !== null) {
					$obj12 = FuelPeer::getInstanceFromPool($key12);
					if (!$obj12) {
	
						$omClass = FuelPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj12 = new $cls();
					$obj12->hydrate($row, $startcol12);
					FuelPeer::addInstanceToPool($obj12, $key12);
				} 
								$obj12->addItem($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


  static public function getUniqueColumnNames()
  {
    return array(array('slug'));
  }
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return ItemPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(ItemPeer::ID) && $criteria->keyContainsValue(ItemPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.ItemPeer::ID.')');
		}


				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(ItemPeer::ID);
			$selectCriteria->add(ItemPeer::ID, $criteria->remove(ItemPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(ItemPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	
	 public static function doDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												ItemPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof Item) {
						ItemPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ItemPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								ItemPeer::removeInstanceFromPool($singleval);
			}
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->beginTransaction();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);

			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	
	public static function doValidate(Item $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ItemPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ItemPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach ($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(ItemPeer::DATABASE_NAME, ItemPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ItemPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = ItemPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(ItemPeer::DATABASE_NAME);
		$criteria->add(ItemPeer::ID, $pk);

		$v = ItemPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(ItemPeer::DATABASE_NAME);
			$criteria->add(ItemPeer::ID, $pks, Criteria::IN);
			$objs = ItemPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseItemPeer::DATABASE_NAME)->addTableBuilder(BaseItemPeer::TABLE_NAME, BaseItemPeer::getMapBuilder());

