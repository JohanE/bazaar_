<?php


abstract class BaseSubLocation extends BaseObject  implements Persistent {


  const PEER = 'SubLocationPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $location_id;

	
	protected $aLocation;

	
	protected $collItems;

	
	private $lastItemCriteria = null;

	
	protected $collSubLocationI18ns;

	
	private $lastSubLocationI18nCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  protected $culture;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getLocationId()
	{
		return $this->location_id;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SubLocationPeer::ID;
		}

		return $this;
	} 
	
	public function setLocationId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->location_id !== $v) {
			$this->location_id = $v;
			$this->modifiedColumns[] = SubLocationPeer::LOCATION_ID;
		}

		if ($this->aLocation !== null && $this->aLocation->getId() !== $v) {
			$this->aLocation = null;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array())) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->location_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating SubLocation object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aLocation !== null && $this->location_id !== $this->aLocation->getId()) {
			$this->aLocation = null;
		}
	} 
	
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SubLocationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = SubLocationPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aLocation = null;
			$this->collItems = null;
			$this->lastItemCriteria = null;

			$this->collSubLocationI18ns = null;
			$this->lastSubLocationI18nCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SubLocationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			SubLocationPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SubLocationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			SubLocationPeer::addInstanceToPool($this);
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

												
			if ($this->aLocation !== null) {
				if ($this->aLocation->isModified() || ($this->aLocation->getCulture() && $this->aLocation->getCurrentLocationI18n()->isModified()) || $this->aLocation->isNew()) {
					$affectedRows += $this->aLocation->save($con);
				}
				$this->setLocation($this->aLocation);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = SubLocationPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = SubLocationPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += SubLocationPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collItems !== null) {
				foreach ($this->collItems as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSubLocationI18ns !== null) {
				foreach ($this->collSubLocationI18ns as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


												
			if ($this->aLocation !== null) {
				if (!$this->aLocation->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLocation->getValidationFailures());
				}
			}


			if (($retval = SubLocationPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collItems !== null) {
					foreach ($this->collItems as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSubLocationI18ns !== null) {
					foreach ($this->collSubLocationI18ns as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SubLocationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getLocationId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = SubLocationPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getLocationId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SubLocationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setLocationId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SubLocationPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setLocationId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(SubLocationPeer::DATABASE_NAME);

		if ($this->isColumnModified(SubLocationPeer::ID)) $criteria->add(SubLocationPeer::ID, $this->id);
		if ($this->isColumnModified(SubLocationPeer::LOCATION_ID)) $criteria->add(SubLocationPeer::LOCATION_ID, $this->location_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(SubLocationPeer::DATABASE_NAME);

		$criteria->add(SubLocationPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setLocationId($this->location_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getItems() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addItem($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSubLocationI18ns() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addSubLocationI18n($relObj->copy($deepCopy));
				}
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SubLocationPeer();
		}
		return self::$peer;
	}

	
	public function setLocation(Location $v = null)
	{
		if ($v === null) {
			$this->setLocationId(NULL);
		} else {
			$this->setLocationId($v->getId());
		}

		$this->aLocation = $v;

						if ($v !== null) {
			$v->addSubLocation($this);
		}

		return $this;
	}


	
	public function getLocation(PropelPDO $con = null)
	{
		if ($this->aLocation === null && ($this->location_id !== null)) {
			$c = new Criteria(LocationPeer::DATABASE_NAME);
			$c->add(LocationPeer::ID, $this->location_id);
			$this->aLocation = LocationPeer::doSelectOne($c, $con);
			
		}
		return $this->aLocation;
	}

	
	public function clearItems()
	{
		$this->collItems = null; 	}

	
	public function initItems()
	{
		$this->collItems = array();
	}

	
	public function getItems($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SubLocationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
			   $this->collItems = array();
			} else {

				$criteria->add(ItemPeer::SUBLOCATION_ID, $this->id);

				ItemPeer::addSelectColumns($criteria);
				$this->collItems = ItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ItemPeer::SUBLOCATION_ID, $this->id);

				ItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastItemCriteria) || !$this->lastItemCriteria->equals($criteria)) {
					$this->collItems = ItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastItemCriteria = $criteria;
		return $this->collItems;
	}

	
	public function countItems(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SubLocationPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ItemPeer::SUBLOCATION_ID, $this->id);

				$count = ItemPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ItemPeer::SUBLOCATION_ID, $this->id);

				if (!isset($this->lastItemCriteria) || !$this->lastItemCriteria->equals($criteria)) {
					$count = ItemPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collItems);
				}
			} else {
				$count = count($this->collItems);
			}
		}
		return $count;
	}

	
	public function addItem(Item $l)
	{
		if ($this->collItems === null) {
			$this->initItems();
		}
		if (!in_array($l, $this->collItems, true)) { 			array_push($this->collItems, $l);
			$l->setSubLocation($this);
		}
	}


	
	public function getItemsJoinStatus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SubLocationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::SUBLOCATION_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinStatus($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::SUBLOCATION_ID, $this->id);

			if (!isset($this->lastItemCriteria) || !$this->lastItemCriteria->equals($criteria)) {
				$this->collItems = ItemPeer::doSelectJoinStatus($criteria, $con, $join_behavior);
			}
		}
		$this->lastItemCriteria = $criteria;

		return $this->collItems;
	}


	
	public function getItemsJoinMode($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SubLocationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::SUBLOCATION_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinMode($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::SUBLOCATION_ID, $this->id);

			if (!isset($this->lastItemCriteria) || !$this->lastItemCriteria->equals($criteria)) {
				$this->collItems = ItemPeer::doSelectJoinMode($criteria, $con, $join_behavior);
			}
		}
		$this->lastItemCriteria = $criteria;

		return $this->collItems;
	}


	
	public function getItemsJoinCustomerType($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SubLocationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::SUBLOCATION_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinCustomerType($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::SUBLOCATION_ID, $this->id);

			if (!isset($this->lastItemCriteria) || !$this->lastItemCriteria->equals($criteria)) {
				$this->collItems = ItemPeer::doSelectJoinCustomerType($criteria, $con, $join_behavior);
			}
		}
		$this->lastItemCriteria = $criteria;

		return $this->collItems;
	}


	
	public function getItemsJoinLocation($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SubLocationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::SUBLOCATION_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinLocation($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::SUBLOCATION_ID, $this->id);

			if (!isset($this->lastItemCriteria) || !$this->lastItemCriteria->equals($criteria)) {
				$this->collItems = ItemPeer::doSelectJoinLocation($criteria, $con, $join_behavior);
			}
		}
		$this->lastItemCriteria = $criteria;

		return $this->collItems;
	}


	
	public function getItemsJoinCategory($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SubLocationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::SUBLOCATION_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinCategory($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::SUBLOCATION_ID, $this->id);

			if (!isset($this->lastItemCriteria) || !$this->lastItemCriteria->equals($criteria)) {
				$this->collItems = ItemPeer::doSelectJoinCategory($criteria, $con, $join_behavior);
			}
		}
		$this->lastItemCriteria = $criteria;

		return $this->collItems;
	}


	
	public function getItemsJoinSubCategory($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SubLocationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::SUBLOCATION_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinSubCategory($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::SUBLOCATION_ID, $this->id);

			if (!isset($this->lastItemCriteria) || !$this->lastItemCriteria->equals($criteria)) {
				$this->collItems = ItemPeer::doSelectJoinSubCategory($criteria, $con, $join_behavior);
			}
		}
		$this->lastItemCriteria = $criteria;

		return $this->collItems;
	}


	
	public function getItemsJoinMilage($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SubLocationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::SUBLOCATION_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinMilage($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::SUBLOCATION_ID, $this->id);

			if (!isset($this->lastItemCriteria) || !$this->lastItemCriteria->equals($criteria)) {
				$this->collItems = ItemPeer::doSelectJoinMilage($criteria, $con, $join_behavior);
			}
		}
		$this->lastItemCriteria = $criteria;

		return $this->collItems;
	}


	
	public function getItemsJoinGearbox($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SubLocationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::SUBLOCATION_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinGearbox($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::SUBLOCATION_ID, $this->id);

			if (!isset($this->lastItemCriteria) || !$this->lastItemCriteria->equals($criteria)) {
				$this->collItems = ItemPeer::doSelectJoinGearbox($criteria, $con, $join_behavior);
			}
		}
		$this->lastItemCriteria = $criteria;

		return $this->collItems;
	}


	
	public function getItemsJoinYearmodel($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SubLocationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::SUBLOCATION_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinYearmodel($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::SUBLOCATION_ID, $this->id);

			if (!isset($this->lastItemCriteria) || !$this->lastItemCriteria->equals($criteria)) {
				$this->collItems = ItemPeer::doSelectJoinYearmodel($criteria, $con, $join_behavior);
			}
		}
		$this->lastItemCriteria = $criteria;

		return $this->collItems;
	}


	
	public function getItemsJoinFuel($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SubLocationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::SUBLOCATION_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinFuel($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::SUBLOCATION_ID, $this->id);

			if (!isset($this->lastItemCriteria) || !$this->lastItemCriteria->equals($criteria)) {
				$this->collItems = ItemPeer::doSelectJoinFuel($criteria, $con, $join_behavior);
			}
		}
		$this->lastItemCriteria = $criteria;

		return $this->collItems;
	}


	
	public function getItemsJoinRoom($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SubLocationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::SUBLOCATION_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinRoom($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::SUBLOCATION_ID, $this->id);

			if (!isset($this->lastItemCriteria) || !$this->lastItemCriteria->equals($criteria)) {
				$this->collItems = ItemPeer::doSelectJoinRoom($criteria, $con, $join_behavior);
			}
		}
		$this->lastItemCriteria = $criteria;

		return $this->collItems;
	}

	
	public function clearSubLocationI18ns()
	{
		$this->collSubLocationI18ns = null; 	}

	
	public function initSubLocationI18ns()
	{
		$this->collSubLocationI18ns = array();
	}

	
	public function getSubLocationI18ns($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SubLocationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSubLocationI18ns === null) {
			if ($this->isNew()) {
			   $this->collSubLocationI18ns = array();
			} else {

				$criteria->add(SubLocationI18nPeer::ID, $this->id);

				SubLocationI18nPeer::addSelectColumns($criteria);
				$this->collSubLocationI18ns = SubLocationI18nPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SubLocationI18nPeer::ID, $this->id);

				SubLocationI18nPeer::addSelectColumns($criteria);
				if (!isset($this->lastSubLocationI18nCriteria) || !$this->lastSubLocationI18nCriteria->equals($criteria)) {
					$this->collSubLocationI18ns = SubLocationI18nPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSubLocationI18nCriteria = $criteria;
		return $this->collSubLocationI18ns;
	}

	
	public function countSubLocationI18ns(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SubLocationPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collSubLocationI18ns === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(SubLocationI18nPeer::ID, $this->id);

				$count = SubLocationI18nPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SubLocationI18nPeer::ID, $this->id);

				if (!isset($this->lastSubLocationI18nCriteria) || !$this->lastSubLocationI18nCriteria->equals($criteria)) {
					$count = SubLocationI18nPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collSubLocationI18ns);
				}
			} else {
				$count = count($this->collSubLocationI18ns);
			}
		}
		return $count;
	}

	
	public function addSubLocationI18n(SubLocationI18n $l)
	{
		if ($this->collSubLocationI18ns === null) {
			$this->initSubLocationI18ns();
		}
		if (!in_array($l, $this->collSubLocationI18ns, true)) { 			array_push($this->collSubLocationI18ns, $l);
			$l->setSubLocation($this);
		}
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collItems) {
				foreach ((array) $this->collItems as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSubLocationI18ns) {
				foreach ((array) $this->collSubLocationI18ns as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collItems = null;
		$this->collSubLocationI18ns = null;
			$this->aLocation = null;
	}


  
  public function getCulture()
  {
    return $this->culture;
  }

  
  public function setCulture($culture)
  {
    $this->culture = $culture;
  }

  public function getName($culture = null)
  {
    return $this->getCurrentSubLocationI18n($culture)->getName();
  }

  public function setName($value, $culture = null)
  {
    $this->getCurrentSubLocationI18n($culture)->setName($value);
  }

  protected $current_i18n = array();

  public function getCurrentSubLocationI18n($culture = null)
  {
    if (is_null($culture))
    {
      $culture = is_null($this->culture) ? sfPropel::getDefaultCulture() : $this->culture;
    }

    if (!isset($this->current_i18n[$culture]))
    {
      $obj = $this->isNew() ? null : SubLocationI18nPeer::retrieveByPK($this->getId(), $culture);
      if ($obj)
      {
        $this->setSubLocationI18nForCulture($obj, $culture);
      }
      else
      {
        $this->setSubLocationI18nForCulture(new SubLocationI18n(), $culture);
        $this->current_i18n[$culture]->setCulture($culture);
      }
    }

    return $this->current_i18n[$culture];
  }

  public function setSubLocationI18nForCulture($object, $culture)
  {
    $this->current_i18n[$culture] = $object;
    $this->addSubLocationI18n($object);
  }

} 