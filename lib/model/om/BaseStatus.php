<?php


abstract class BaseStatus extends BaseObject  implements Persistent {


  const PEER = 'StatusPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $description;

	
	protected $collItems;

	
	private $lastItemCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
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

	
	public function getDescription()
	{
		return $this->description;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = StatusPeer::ID;
		}

		return $this;
	} 
	
	public function setDescription($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = StatusPeer::DESCRIPTION;
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
			$this->description = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Status object", $e);
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
			$con = Propel::getConnection(StatusPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = StatusPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->collItems = null;
			$this->lastItemCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(StatusPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			StatusPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(StatusPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			StatusPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = StatusPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = StatusPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += StatusPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collItems !== null) {
				foreach ($this->collItems as $referrerFK) {
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


			if (($retval = StatusPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collItems !== null) {
					foreach ($this->collItems as $referrerFK) {
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
		$pos = StatusPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getDescription();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = StatusPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getDescription(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = StatusPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setDescription($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = StatusPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescription($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(StatusPeer::DATABASE_NAME);

		if ($this->isColumnModified(StatusPeer::ID)) $criteria->add(StatusPeer::ID, $this->id);
		if ($this->isColumnModified(StatusPeer::DESCRIPTION)) $criteria->add(StatusPeer::DESCRIPTION, $this->description);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(StatusPeer::DATABASE_NAME);

		$criteria->add(StatusPeer::ID, $this->id);

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

		$copyObj->setDescription($this->description);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getItems() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addItem($relObj->copy($deepCopy));
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
			self::$peer = new StatusPeer();
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
			$criteria = new Criteria(StatusPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
			   $this->collItems = array();
			} else {

				$criteria->add(ItemPeer::STATUS_ID, $this->id);

				ItemPeer::addSelectColumns($criteria);
				$this->collItems = ItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ItemPeer::STATUS_ID, $this->id);

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
			$criteria = new Criteria(StatusPeer::DATABASE_NAME);
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

				$criteria->add(ItemPeer::STATUS_ID, $this->id);

				$count = ItemPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ItemPeer::STATUS_ID, $this->id);

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
			$l->setStatus($this);
		}
	}


	
	public function getItemsJoinMode($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(StatusPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::STATUS_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinMode($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::STATUS_ID, $this->id);

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
			$criteria = new Criteria(StatusPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::STATUS_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinCustomerType($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::STATUS_ID, $this->id);

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
			$criteria = new Criteria(StatusPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::STATUS_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinLocation($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::STATUS_ID, $this->id);

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
			$criteria = new Criteria(StatusPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::STATUS_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinSubLocation($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::STATUS_ID, $this->id);

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
			$criteria = new Criteria(StatusPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::STATUS_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinCategory($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::STATUS_ID, $this->id);

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
			$criteria = new Criteria(StatusPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::STATUS_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinSubCategory($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::STATUS_ID, $this->id);

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
			$criteria = new Criteria(StatusPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::STATUS_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinMilage($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::STATUS_ID, $this->id);

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
			$criteria = new Criteria(StatusPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::STATUS_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinGearbox($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::STATUS_ID, $this->id);

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
			$criteria = new Criteria(StatusPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::STATUS_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinYearmodel($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::STATUS_ID, $this->id);

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
			$criteria = new Criteria(StatusPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::STATUS_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinFuel($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::STATUS_ID, $this->id);

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
			$criteria = new Criteria(StatusPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::STATUS_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinRoom($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::STATUS_ID, $this->id);

			if (!isset($this->lastItemCriteria) || !$this->lastItemCriteria->equals($criteria)) {
				$this->collItems = ItemPeer::doSelectJoinRoom($criteria, $con, $join_behavior);
			}
		}
		$this->lastItemCriteria = $criteria;

		return $this->collItems;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collItems) {
				foreach ((array) $this->collItems as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collItems = null;
	}

} 