<?php


abstract class BaseMilage extends BaseObject  implements Persistent {


  const PEER = 'MilagePeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $value;

	
	protected $collItems;

	
	private $lastItemCriteria = null;

	
	protected $collMilageI18ns;

	
	private $lastMilageI18nCriteria = null;

	
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

	
	public function getValue()
	{
		return $this->value;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = MilagePeer::ID;
		}

		return $this;
	} 
	
	public function setValue($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->value !== $v) {
			$this->value = $v;
			$this->modifiedColumns[] = MilagePeer::VALUE;
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
			$this->value = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Milage object", $e);
		}
	}

	
	public function ensureConsistency()
	{

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
			$con = Propel::getConnection(MilagePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = MilagePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->collItems = null;
			$this->lastItemCriteria = null;

			$this->collMilageI18ns = null;
			$this->lastMilageI18nCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MilagePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			MilagePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(MilagePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			MilagePeer::addInstanceToPool($this);
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

			if ($this->isNew() ) {
				$this->modifiedColumns[] = MilagePeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = MilagePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MilagePeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collItems !== null) {
				foreach ($this->collItems as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collMilageI18ns !== null) {
				foreach ($this->collMilageI18ns as $referrerFK) {
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


			if (($retval = MilagePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collItems !== null) {
					foreach ($this->collItems as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collMilageI18ns !== null) {
					foreach ($this->collMilageI18ns as $referrerFK) {
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
		$pos = MilagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getValue();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = MilagePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getValue(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MilagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setValue($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MilagePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setValue($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MilagePeer::DATABASE_NAME);

		if ($this->isColumnModified(MilagePeer::ID)) $criteria->add(MilagePeer::ID, $this->id);
		if ($this->isColumnModified(MilagePeer::VALUE)) $criteria->add(MilagePeer::VALUE, $this->value);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MilagePeer::DATABASE_NAME);

		$criteria->add(MilagePeer::ID, $this->id);

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

		$copyObj->setValue($this->value);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getItems() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addItem($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getMilageI18ns() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addMilageI18n($relObj->copy($deepCopy));
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
			self::$peer = new MilagePeer();
		}
		return self::$peer;
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
			$criteria = new Criteria(MilagePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
			   $this->collItems = array();
			} else {

				$criteria->add(ItemPeer::MILAGE_ID, $this->id);

				ItemPeer::addSelectColumns($criteria);
				$this->collItems = ItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ItemPeer::MILAGE_ID, $this->id);

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
			$criteria = new Criteria(MilagePeer::DATABASE_NAME);
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

				$criteria->add(ItemPeer::MILAGE_ID, $this->id);

				$count = ItemPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ItemPeer::MILAGE_ID, $this->id);

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
			$l->setMilage($this);
		}
	}


	
	public function getItemsJoinStatus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(MilagePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::MILAGE_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinStatus($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::MILAGE_ID, $this->id);

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
			$criteria = new Criteria(MilagePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::MILAGE_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinMode($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::MILAGE_ID, $this->id);

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
			$criteria = new Criteria(MilagePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::MILAGE_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinCustomerType($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::MILAGE_ID, $this->id);

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
			$criteria = new Criteria(MilagePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::MILAGE_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinLocation($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::MILAGE_ID, $this->id);

			if (!isset($this->lastItemCriteria) || !$this->lastItemCriteria->equals($criteria)) {
				$this->collItems = ItemPeer::doSelectJoinLocation($criteria, $con, $join_behavior);
			}
		}
		$this->lastItemCriteria = $criteria;

		return $this->collItems;
	}


	
	public function getItemsJoinSubLocation($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(MilagePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::MILAGE_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinSubLocation($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::MILAGE_ID, $this->id);

			if (!isset($this->lastItemCriteria) || !$this->lastItemCriteria->equals($criteria)) {
				$this->collItems = ItemPeer::doSelectJoinSubLocation($criteria, $con, $join_behavior);
			}
		}
		$this->lastItemCriteria = $criteria;

		return $this->collItems;
	}


	
	public function getItemsJoinCategory($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(MilagePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::MILAGE_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinCategory($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::MILAGE_ID, $this->id);

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
			$criteria = new Criteria(MilagePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::MILAGE_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinSubCategory($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::MILAGE_ID, $this->id);

			if (!isset($this->lastItemCriteria) || !$this->lastItemCriteria->equals($criteria)) {
				$this->collItems = ItemPeer::doSelectJoinSubCategory($criteria, $con, $join_behavior);
			}
		}
		$this->lastItemCriteria = $criteria;

		return $this->collItems;
	}


	
	public function getItemsJoinGearbox($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(MilagePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::MILAGE_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinGearbox($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::MILAGE_ID, $this->id);

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
			$criteria = new Criteria(MilagePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::MILAGE_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinYearmodel($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::MILAGE_ID, $this->id);

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
			$criteria = new Criteria(MilagePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::MILAGE_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinFuel($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::MILAGE_ID, $this->id);

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
			$criteria = new Criteria(MilagePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::MILAGE_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinRoom($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::MILAGE_ID, $this->id);

			if (!isset($this->lastItemCriteria) || !$this->lastItemCriteria->equals($criteria)) {
				$this->collItems = ItemPeer::doSelectJoinRoom($criteria, $con, $join_behavior);
			}
		}
		$this->lastItemCriteria = $criteria;

		return $this->collItems;
	}

	
	public function clearMilageI18ns()
	{
		$this->collMilageI18ns = null; 	}

	
	public function initMilageI18ns()
	{
		$this->collMilageI18ns = array();
	}

	
	public function getMilageI18ns($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(MilagePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMilageI18ns === null) {
			if ($this->isNew()) {
			   $this->collMilageI18ns = array();
			} else {

				$criteria->add(MilageI18nPeer::ID, $this->id);

				MilageI18nPeer::addSelectColumns($criteria);
				$this->collMilageI18ns = MilageI18nPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(MilageI18nPeer::ID, $this->id);

				MilageI18nPeer::addSelectColumns($criteria);
				if (!isset($this->lastMilageI18nCriteria) || !$this->lastMilageI18nCriteria->equals($criteria)) {
					$this->collMilageI18ns = MilageI18nPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastMilageI18nCriteria = $criteria;
		return $this->collMilageI18ns;
	}

	
	public function countMilageI18ns(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(MilagePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collMilageI18ns === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(MilageI18nPeer::ID, $this->id);

				$count = MilageI18nPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(MilageI18nPeer::ID, $this->id);

				if (!isset($this->lastMilageI18nCriteria) || !$this->lastMilageI18nCriteria->equals($criteria)) {
					$count = MilageI18nPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collMilageI18ns);
				}
			} else {
				$count = count($this->collMilageI18ns);
			}
		}
		return $count;
	}

	
	public function addMilageI18n(MilageI18n $l)
	{
		if ($this->collMilageI18ns === null) {
			$this->initMilageI18ns();
		}
		if (!in_array($l, $this->collMilageI18ns, true)) { 			array_push($this->collMilageI18ns, $l);
			$l->setMilage($this);
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
			if ($this->collMilageI18ns) {
				foreach ((array) $this->collMilageI18ns as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collItems = null;
		$this->collMilageI18ns = null;
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
    return $this->getCurrentMilageI18n($culture)->getName();
  }

  public function setName($value, $culture = null)
  {
    $this->getCurrentMilageI18n($culture)->setName($value);
  }

  protected $current_i18n = array();

  public function getCurrentMilageI18n($culture = null)
  {
    if (is_null($culture))
    {
      $culture = is_null($this->culture) ? sfPropel::getDefaultCulture() : $this->culture;
    }

    if (!isset($this->current_i18n[$culture]))
    {
      $obj = $this->isNew() ? null : MilageI18nPeer::retrieveByPK($this->getId(), $culture);
      if ($obj)
      {
        $this->setMilageI18nForCulture($obj, $culture);
      }
      else
      {
        $this->setMilageI18nForCulture(new MilageI18n(), $culture);
        $this->current_i18n[$culture]->setCulture($culture);
      }
    }

    return $this->current_i18n[$culture];
  }

  public function setMilageI18nForCulture($object, $culture)
  {
    $this->current_i18n[$culture] = $object;
    $this->addMilageI18n($object);
  }

} 