<?php


abstract class BaseCategory extends BaseObject  implements Persistent {


  const PEER = 'CategoryPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $supercategory_id;

	
	protected $price;

	
	protected $sort_field;

	
	protected $aSuperCategory;

	
	protected $collItems;

	
	private $lastItemCriteria = null;

	
	protected $collCategoryI18ns;

	
	private $lastCategoryI18nCriteria = null;

	
	protected $collSubCategorys;

	
	private $lastSubCategoryCriteria = null;

	
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

	
	public function getSupercategoryId()
	{
		return $this->supercategory_id;
	}

	
	public function getPrice()
	{
		return $this->price;
	}

	
	public function getSortField()
	{
		return $this->sort_field;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CategoryPeer::ID;
		}

		return $this;
	} 
	
	public function setSupercategoryId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->supercategory_id !== $v) {
			$this->supercategory_id = $v;
			$this->modifiedColumns[] = CategoryPeer::SUPERCATEGORY_ID;
		}

		if ($this->aSuperCategory !== null && $this->aSuperCategory->getId() !== $v) {
			$this->aSuperCategory = null;
		}

		return $this;
	} 
	
	public function setPrice($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->price !== $v) {
			$this->price = $v;
			$this->modifiedColumns[] = CategoryPeer::PRICE;
		}

		return $this;
	} 
	
	public function setSortField($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->sort_field !== $v) {
			$this->sort_field = $v;
			$this->modifiedColumns[] = CategoryPeer::SORT_FIELD;
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
			$this->supercategory_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->price = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->sort_field = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Category object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aSuperCategory !== null && $this->supercategory_id !== $this->aSuperCategory->getId()) {
			$this->aSuperCategory = null;
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
			$con = Propel::getConnection(CategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = CategoryPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aSuperCategory = null;
			$this->collItems = null;
			$this->lastItemCriteria = null;

			$this->collCategoryI18ns = null;
			$this->lastCategoryI18nCriteria = null;

			$this->collSubCategorys = null;
			$this->lastSubCategoryCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CategoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			CategoryPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CategoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			CategoryPeer::addInstanceToPool($this);
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

												
			if ($this->aSuperCategory !== null) {
				if ($this->aSuperCategory->isModified() || ($this->aSuperCategory->getCulture() && $this->aSuperCategory->getCurrentSuperCategoryI18n()->isModified()) || $this->aSuperCategory->isNew()) {
					$affectedRows += $this->aSuperCategory->save($con);
				}
				$this->setSuperCategory($this->aSuperCategory);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = CategoryPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CategoryPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CategoryPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collItems !== null) {
				foreach ($this->collItems as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCategoryI18ns !== null) {
				foreach ($this->collCategoryI18ns as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSubCategorys !== null) {
				foreach ($this->collSubCategorys as $referrerFK) {
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


												
			if ($this->aSuperCategory !== null) {
				if (!$this->aSuperCategory->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSuperCategory->getValidationFailures());
				}
			}


			if (($retval = CategoryPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collItems !== null) {
					foreach ($this->collItems as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCategoryI18ns !== null) {
					foreach ($this->collCategoryI18ns as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSubCategorys !== null) {
					foreach ($this->collSubCategorys as $referrerFK) {
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
		$pos = CategoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getSupercategoryId();
				break;
			case 2:
				return $this->getPrice();
				break;
			case 3:
				return $this->getSortField();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = CategoryPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getSupercategoryId(),
			$keys[2] => $this->getPrice(),
			$keys[3] => $this->getSortField(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CategoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setSupercategoryId($value);
				break;
			case 2:
				$this->setPrice($value);
				break;
			case 3:
				$this->setSortField($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CategoryPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setSupercategoryId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPrice($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSortField($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CategoryPeer::DATABASE_NAME);

		if ($this->isColumnModified(CategoryPeer::ID)) $criteria->add(CategoryPeer::ID, $this->id);
		if ($this->isColumnModified(CategoryPeer::SUPERCATEGORY_ID)) $criteria->add(CategoryPeer::SUPERCATEGORY_ID, $this->supercategory_id);
		if ($this->isColumnModified(CategoryPeer::PRICE)) $criteria->add(CategoryPeer::PRICE, $this->price);
		if ($this->isColumnModified(CategoryPeer::SORT_FIELD)) $criteria->add(CategoryPeer::SORT_FIELD, $this->sort_field);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CategoryPeer::DATABASE_NAME);

		$criteria->add(CategoryPeer::ID, $this->id);

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

		$copyObj->setSupercategoryId($this->supercategory_id);

		$copyObj->setPrice($this->price);

		$copyObj->setSortField($this->sort_field);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getItems() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addItem($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCategoryI18ns() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addCategoryI18n($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSubCategorys() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addSubCategory($relObj->copy($deepCopy));
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
			self::$peer = new CategoryPeer();
		}
		return self::$peer;
	}

	
	public function setSuperCategory(SuperCategory $v = null)
	{
		if ($v === null) {
			$this->setSupercategoryId(NULL);
		} else {
			$this->setSupercategoryId($v->getId());
		}

		$this->aSuperCategory = $v;

						if ($v !== null) {
			$v->addCategory($this);
		}

		return $this;
	}


	
	public function getSuperCategory(PropelPDO $con = null)
	{
		if ($this->aSuperCategory === null && ($this->supercategory_id !== null)) {
			$c = new Criteria(SuperCategoryPeer::DATABASE_NAME);
			$c->add(SuperCategoryPeer::ID, $this->supercategory_id);
			$this->aSuperCategory = SuperCategoryPeer::doSelectOne($c, $con);
			
		}
		return $this->aSuperCategory;
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
			$criteria = new Criteria(CategoryPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
			   $this->collItems = array();
			} else {

				$criteria->add(ItemPeer::CATEGORY_ID, $this->id);

				ItemPeer::addSelectColumns($criteria);
				$this->collItems = ItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ItemPeer::CATEGORY_ID, $this->id);

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
			$criteria = new Criteria(CategoryPeer::DATABASE_NAME);
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

				$criteria->add(ItemPeer::CATEGORY_ID, $this->id);

				$count = ItemPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ItemPeer::CATEGORY_ID, $this->id);

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
			$l->setCategory($this);
		}
	}


	
	public function getItemsJoinStatus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CategoryPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::CATEGORY_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinStatus($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::CATEGORY_ID, $this->id);

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
			$criteria = new Criteria(CategoryPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::CATEGORY_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinMode($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::CATEGORY_ID, $this->id);

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
			$criteria = new Criteria(CategoryPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::CATEGORY_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinCustomerType($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::CATEGORY_ID, $this->id);

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
			$criteria = new Criteria(CategoryPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::CATEGORY_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinLocation($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::CATEGORY_ID, $this->id);

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
			$criteria = new Criteria(CategoryPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::CATEGORY_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinSubLocation($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::CATEGORY_ID, $this->id);

			if (!isset($this->lastItemCriteria) || !$this->lastItemCriteria->equals($criteria)) {
				$this->collItems = ItemPeer::doSelectJoinSubLocation($criteria, $con, $join_behavior);
			}
		}
		$this->lastItemCriteria = $criteria;

		return $this->collItems;
	}


	
	public function getItemsJoinSubCategory($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CategoryPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::CATEGORY_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinSubCategory($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::CATEGORY_ID, $this->id);

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
			$criteria = new Criteria(CategoryPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::CATEGORY_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinMilage($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::CATEGORY_ID, $this->id);

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
			$criteria = new Criteria(CategoryPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::CATEGORY_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinGearbox($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::CATEGORY_ID, $this->id);

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
			$criteria = new Criteria(CategoryPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::CATEGORY_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinYearmodel($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::CATEGORY_ID, $this->id);

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
			$criteria = new Criteria(CategoryPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::CATEGORY_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinFuel($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::CATEGORY_ID, $this->id);

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
			$criteria = new Criteria(CategoryPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::CATEGORY_ID, $this->id);

				$this->collItems = ItemPeer::doSelectJoinRoom($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ItemPeer::CATEGORY_ID, $this->id);

			if (!isset($this->lastItemCriteria) || !$this->lastItemCriteria->equals($criteria)) {
				$this->collItems = ItemPeer::doSelectJoinRoom($criteria, $con, $join_behavior);
			}
		}
		$this->lastItemCriteria = $criteria;

		return $this->collItems;
	}

	
	public function clearCategoryI18ns()
	{
		$this->collCategoryI18ns = null; 	}

	
	public function initCategoryI18ns()
	{
		$this->collCategoryI18ns = array();
	}

	
	public function getCategoryI18ns($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CategoryPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCategoryI18ns === null) {
			if ($this->isNew()) {
			   $this->collCategoryI18ns = array();
			} else {

				$criteria->add(CategoryI18nPeer::ID, $this->id);

				CategoryI18nPeer::addSelectColumns($criteria);
				$this->collCategoryI18ns = CategoryI18nPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CategoryI18nPeer::ID, $this->id);

				CategoryI18nPeer::addSelectColumns($criteria);
				if (!isset($this->lastCategoryI18nCriteria) || !$this->lastCategoryI18nCriteria->equals($criteria)) {
					$this->collCategoryI18ns = CategoryI18nPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCategoryI18nCriteria = $criteria;
		return $this->collCategoryI18ns;
	}

	
	public function countCategoryI18ns(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CategoryPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collCategoryI18ns === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(CategoryI18nPeer::ID, $this->id);

				$count = CategoryI18nPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CategoryI18nPeer::ID, $this->id);

				if (!isset($this->lastCategoryI18nCriteria) || !$this->lastCategoryI18nCriteria->equals($criteria)) {
					$count = CategoryI18nPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collCategoryI18ns);
				}
			} else {
				$count = count($this->collCategoryI18ns);
			}
		}
		return $count;
	}

	
	public function addCategoryI18n(CategoryI18n $l)
	{
		if ($this->collCategoryI18ns === null) {
			$this->initCategoryI18ns();
		}
		if (!in_array($l, $this->collCategoryI18ns, true)) { 			array_push($this->collCategoryI18ns, $l);
			$l->setCategory($this);
		}
	}

	
	public function clearSubCategorys()
	{
		$this->collSubCategorys = null; 	}

	
	public function initSubCategorys()
	{
		$this->collSubCategorys = array();
	}

	
	public function getSubCategorys($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CategoryPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSubCategorys === null) {
			if ($this->isNew()) {
			   $this->collSubCategorys = array();
			} else {

				$criteria->add(SubCategoryPeer::CATEGORY_ID, $this->id);

				SubCategoryPeer::addSelectColumns($criteria);
				$this->collSubCategorys = SubCategoryPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SubCategoryPeer::CATEGORY_ID, $this->id);

				SubCategoryPeer::addSelectColumns($criteria);
				if (!isset($this->lastSubCategoryCriteria) || !$this->lastSubCategoryCriteria->equals($criteria)) {
					$this->collSubCategorys = SubCategoryPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSubCategoryCriteria = $criteria;
		return $this->collSubCategorys;
	}

	
	public function countSubCategorys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CategoryPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collSubCategorys === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(SubCategoryPeer::CATEGORY_ID, $this->id);

				$count = SubCategoryPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SubCategoryPeer::CATEGORY_ID, $this->id);

				if (!isset($this->lastSubCategoryCriteria) || !$this->lastSubCategoryCriteria->equals($criteria)) {
					$count = SubCategoryPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collSubCategorys);
				}
			} else {
				$count = count($this->collSubCategorys);
			}
		}
		return $count;
	}

	
	public function addSubCategory(SubCategory $l)
	{
		if ($this->collSubCategorys === null) {
			$this->initSubCategorys();
		}
		if (!in_array($l, $this->collSubCategorys, true)) { 			array_push($this->collSubCategorys, $l);
			$l->setCategory($this);
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
			if ($this->collCategoryI18ns) {
				foreach ((array) $this->collCategoryI18ns as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSubCategorys) {
				foreach ((array) $this->collSubCategorys as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collItems = null;
		$this->collCategoryI18ns = null;
		$this->collSubCategorys = null;
			$this->aSuperCategory = null;
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
    return $this->getCurrentCategoryI18n($culture)->getName();
  }

  public function setName($value, $culture = null)
  {
    $this->getCurrentCategoryI18n($culture)->setName($value);
  }

  protected $current_i18n = array();

  public function getCurrentCategoryI18n($culture = null)
  {
    if (is_null($culture))
    {
      $culture = is_null($this->culture) ? sfPropel::getDefaultCulture() : $this->culture;
    }

    if (!isset($this->current_i18n[$culture]))
    {
      $obj = $this->isNew() ? null : CategoryI18nPeer::retrieveByPK($this->getId(), $culture);
      if ($obj)
      {
        $this->setCategoryI18nForCulture($obj, $culture);
      }
      else
      {
        $this->setCategoryI18nForCulture(new CategoryI18n(), $culture);
        $this->current_i18n[$culture]->setCulture($culture);
      }
    }

    return $this->current_i18n[$culture];
  }

  public function setCategoryI18nForCulture($object, $culture)
  {
    $this->current_i18n[$culture] = $object;
    $this->addCategoryI18n($object);
  }

} 