<?php


abstract class BaseCustomerType extends BaseObject  implements Persistent {


  const PEER = 'CustomerTypePeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $collItems;

	
	private $lastItemCriteria = null;

	
	protected $collCustomerTypeI18ns;

	
	private $lastCustomerTypeI18nCriteria = null;

	
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

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CustomerTypePeer::ID;
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
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 1; 
		} catch (Exception $e) {
			throw new PropelException("Error populating CustomerType object", $e);
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
			$con = Propel::getConnection(CustomerTypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = CustomerTypePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->collItems = null;
			$this->lastItemCriteria = null;

			$this->collCustomerTypeI18ns = null;
			$this->lastCustomerTypeI18nCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CustomerTypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			CustomerTypePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CustomerTypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			CustomerTypePeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = CustomerTypePeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CustomerTypePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CustomerTypePeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collItems !== null) {
				foreach ($this->collItems as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCustomerTypeI18ns !== null) {
				foreach ($this->collCustomerTypeI18ns as $referrerFK) {
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


			if (($retval = CustomerTypePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collItems !== null) {
					foreach ($this->collItems as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCustomerTypeI18ns !== null) {
					foreach ($this->collCustomerTypeI18ns as $referrerFK) {
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
		$pos = CustomerTypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = CustomerTypePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CustomerTypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CustomerTypePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CustomerTypePeer::DATABASE_NAME);

		if ($this->isColumnModified(CustomerTypePeer::ID)) $criteria->add(CustomerTypePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CustomerTypePeer::DATABASE_NAME);

		$criteria->add(CustomerTypePeer::ID, $this->id);

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


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getItems() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addItem($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCustomerTypeI18ns() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addCustomerTypeI18n($relObj->copy($deepCopy));
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
			self::$peer = new CustomerTypePeer();
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
			$criteria = new Criteria(CustomerTypePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
			   $this->collItems = array();
			} else {

				$criteria->add(ItemPeer::CUSTOMERTYPE_ID, $this->id);

				ItemPeer::addSelectColumns($criteria);
				$this->collItems = ItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ItemPeer::CUSTOMERTYPE_ID, $this->id);

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
			$criteria = new Criteria(CustomerTypePeer::DATABASE_NAME);
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

				$criteria->add(ItemPeer::CUSTOMERTYPE_ID, $this->id);

				$count = ItemPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ItemPeer::CUSTOMERTYPE_ID, $this->id);

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
			$l->setCustomerType($this);
		}
	}


	
	public function getItemsJoinStatus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CustomerTypePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::CUSTOMERTYPE_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinStatus($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::CUSTOMERTYPE_ID, $this->id);

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
			$criteria = new Criteria(CustomerTypePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::CUSTOMERTYPE_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinMode($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::CUSTOMERTYPE_ID, $this->id);

			if (!isset($this->lastItemCriteria) || !$this->lastItemCriteria->equals($criteria)) {
				$this->collItems = ItemPeer::doSelectJoinMode($criteria, $con, $join_behavior);
			}
		}
		$this->lastItemCriteria = $criteria;

		return $this->collItems;
	}


	
	public function getItemsJoinLocation($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CustomerTypePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::CUSTOMERTYPE_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinLocation($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::CUSTOMERTYPE_ID, $this->id);

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
			$criteria = new Criteria(CustomerTypePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::CUSTOMERTYPE_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinSubLocation($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::CUSTOMERTYPE_ID, $this->id);

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
			$criteria = new Criteria(CustomerTypePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::CUSTOMERTYPE_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinCategory($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::CUSTOMERTYPE_ID, $this->id);

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
			$criteria = new Criteria(CustomerTypePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::CUSTOMERTYPE_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinSubCategory($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::CUSTOMERTYPE_ID, $this->id);

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
			$criteria = new Criteria(CustomerTypePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::CUSTOMERTYPE_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinMilage($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::CUSTOMERTYPE_ID, $this->id);

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
			$criteria = new Criteria(CustomerTypePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::CUSTOMERTYPE_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinGearbox($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::CUSTOMERTYPE_ID, $this->id);

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
			$criteria = new Criteria(CustomerTypePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::CUSTOMERTYPE_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinYearmodel($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::CUSTOMERTYPE_ID, $this->id);

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
			$criteria = new Criteria(CustomerTypePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::CUSTOMERTYPE_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinFuel($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::CUSTOMERTYPE_ID, $this->id);

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
			$criteria = new Criteria(CustomerTypePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::CUSTOMERTYPE_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinRoom($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::CUSTOMERTYPE_ID, $this->id);

			if (!isset($this->lastItemCriteria) || !$this->lastItemCriteria->equals($criteria)) {
				$this->collItems = ItemPeer::doSelectJoinRoom($criteria, $con, $join_behavior);
			}
		}
		$this->lastItemCriteria = $criteria;

		return $this->collItems;
	}

	
	public function clearCustomerTypeI18ns()
	{
		$this->collCustomerTypeI18ns = null; 	}

	
	public function initCustomerTypeI18ns()
	{
		$this->collCustomerTypeI18ns = array();
	}

	
	public function getCustomerTypeI18ns($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CustomerTypePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCustomerTypeI18ns === null) {
			if ($this->isNew()) {
			   $this->collCustomerTypeI18ns = array();
			} else {

				$criteria->add(CustomerTypeI18nPeer::ID, $this->id);

				CustomerTypeI18nPeer::addSelectColumns($criteria);
				$this->collCustomerTypeI18ns = CustomerTypeI18nPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CustomerTypeI18nPeer::ID, $this->id);

				CustomerTypeI18nPeer::addSelectColumns($criteria);
				if (!isset($this->lastCustomerTypeI18nCriteria) || !$this->lastCustomerTypeI18nCriteria->equals($criteria)) {
					$this->collCustomerTypeI18ns = CustomerTypeI18nPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCustomerTypeI18nCriteria = $criteria;
		return $this->collCustomerTypeI18ns;
	}

	
	public function countCustomerTypeI18ns(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CustomerTypePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collCustomerTypeI18ns === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(CustomerTypeI18nPeer::ID, $this->id);

				$count = CustomerTypeI18nPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CustomerTypeI18nPeer::ID, $this->id);

				if (!isset($this->lastCustomerTypeI18nCriteria) || !$this->lastCustomerTypeI18nCriteria->equals($criteria)) {
					$count = CustomerTypeI18nPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collCustomerTypeI18ns);
				}
			} else {
				$count = count($this->collCustomerTypeI18ns);
			}
		}
		return $count;
	}

	
	public function addCustomerTypeI18n(CustomerTypeI18n $l)
	{
		if ($this->collCustomerTypeI18ns === null) {
			$this->initCustomerTypeI18ns();
		}
		if (!in_array($l, $this->collCustomerTypeI18ns, true)) { 			array_push($this->collCustomerTypeI18ns, $l);
			$l->setCustomerType($this);
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
			if ($this->collCustomerTypeI18ns) {
				foreach ((array) $this->collCustomerTypeI18ns as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collItems = null;
		$this->collCustomerTypeI18ns = null;
	}


  
  public function getCulture()
  {
    return $this->culture;
  }

  
  public function setCulture($culture)
  {
    $this->culture = $culture;
  }

  public function getDescription($culture = null)
  {
    return $this->getCurrentCustomerTypeI18n($culture)->getDescription();
  }

  public function setDescription($value, $culture = null)
  {
    $this->getCurrentCustomerTypeI18n($culture)->setDescription($value);
  }

  public function getPluralDescription($culture = null)
  {
    return $this->getCurrentCustomerTypeI18n($culture)->getPluralDescription();
  }

  public function setPluralDescription($value, $culture = null)
  {
    $this->getCurrentCustomerTypeI18n($culture)->setPluralDescription($value);
  }

  protected $current_i18n = array();

  public function getCurrentCustomerTypeI18n($culture = null)
  {
    if (is_null($culture))
    {
      $culture = is_null($this->culture) ? sfPropel::getDefaultCulture() : $this->culture;
    }

    if (!isset($this->current_i18n[$culture]))
    {
      $obj = $this->isNew() ? null : CustomerTypeI18nPeer::retrieveByPK($this->getId(), $culture);
      if ($obj)
      {
        $this->setCustomerTypeI18nForCulture($obj, $culture);
      }
      else
      {
        $this->setCustomerTypeI18nForCulture(new CustomerTypeI18n(), $culture);
        $this->current_i18n[$culture]->setCulture($culture);
      }
    }

    return $this->current_i18n[$culture];
  }

  public function setCustomerTypeI18nForCulture($object, $culture)
  {
    $this->current_i18n[$culture] = $object;
    $this->addCustomerTypeI18n($object);
  }

} 