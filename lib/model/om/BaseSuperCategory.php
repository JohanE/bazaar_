<?php


abstract class BaseSuperCategory extends BaseObject  implements Persistent {


  const PEER = 'SuperCategoryPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $sort_field;

	
	protected $collCategorys;

	
	private $lastCategoryCriteria = null;

	
	protected $collSuperCategoryI18ns;

	
	private $lastSuperCategoryI18nCriteria = null;

	
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
			$this->modifiedColumns[] = SuperCategoryPeer::ID;
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
			$this->modifiedColumns[] = SuperCategoryPeer::SORT_FIELD;
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
			$this->sort_field = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating SuperCategory object", $e);
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
			$con = Propel::getConnection(SuperCategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = SuperCategoryPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->collCategorys = null;
			$this->lastCategoryCriteria = null;

			$this->collSuperCategoryI18ns = null;
			$this->lastSuperCategoryI18nCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SuperCategoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			SuperCategoryPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(SuperCategoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			SuperCategoryPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = SuperCategoryPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = SuperCategoryPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += SuperCategoryPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collCategorys !== null) {
				foreach ($this->collCategorys as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSuperCategoryI18ns !== null) {
				foreach ($this->collSuperCategoryI18ns as $referrerFK) {
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


			if (($retval = SuperCategoryPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCategorys !== null) {
					foreach ($this->collCategorys as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSuperCategoryI18ns !== null) {
					foreach ($this->collSuperCategoryI18ns as $referrerFK) {
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
		$pos = SuperCategoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getSortField();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = SuperCategoryPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getSortField(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SuperCategoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setSortField($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SuperCategoryPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setSortField($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(SuperCategoryPeer::DATABASE_NAME);

		if ($this->isColumnModified(SuperCategoryPeer::ID)) $criteria->add(SuperCategoryPeer::ID, $this->id);
		if ($this->isColumnModified(SuperCategoryPeer::SORT_FIELD)) $criteria->add(SuperCategoryPeer::SORT_FIELD, $this->sort_field);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(SuperCategoryPeer::DATABASE_NAME);

		$criteria->add(SuperCategoryPeer::ID, $this->id);

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

		$copyObj->setSortField($this->sort_field);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getCategorys() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addCategory($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSuperCategoryI18ns() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addSuperCategoryI18n($relObj->copy($deepCopy));
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
			self::$peer = new SuperCategoryPeer();
		}
		return self::$peer;
	}

	
	public function clearCategorys()
	{
		$this->collCategorys = null; 	}

	
	public function initCategorys()
	{
		$this->collCategorys = array();
	}

	
	public function getCategorys($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SuperCategoryPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCategorys === null) {
			if ($this->isNew()) {
			   $this->collCategorys = array();
			} else {

				$criteria->add(CategoryPeer::SUPERCATEGORY_ID, $this->id);

				CategoryPeer::addSelectColumns($criteria);
				$this->collCategorys = CategoryPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CategoryPeer::SUPERCATEGORY_ID, $this->id);

				CategoryPeer::addSelectColumns($criteria);
				if (!isset($this->lastCategoryCriteria) || !$this->lastCategoryCriteria->equals($criteria)) {
					$this->collCategorys = CategoryPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCategoryCriteria = $criteria;
		return $this->collCategorys;
	}

	
	public function countCategorys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SuperCategoryPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collCategorys === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(CategoryPeer::SUPERCATEGORY_ID, $this->id);

				$count = CategoryPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CategoryPeer::SUPERCATEGORY_ID, $this->id);

				if (!isset($this->lastCategoryCriteria) || !$this->lastCategoryCriteria->equals($criteria)) {
					$count = CategoryPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collCategorys);
				}
			} else {
				$count = count($this->collCategorys);
			}
		}
		return $count;
	}

	
	public function addCategory(Category $l)
	{
		if ($this->collCategorys === null) {
			$this->initCategorys();
		}
		if (!in_array($l, $this->collCategorys, true)) { 			array_push($this->collCategorys, $l);
			$l->setSuperCategory($this);
		}
	}

	
	public function clearSuperCategoryI18ns()
	{
		$this->collSuperCategoryI18ns = null; 	}

	
	public function initSuperCategoryI18ns()
	{
		$this->collSuperCategoryI18ns = array();
	}

	
	public function getSuperCategoryI18ns($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SuperCategoryPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSuperCategoryI18ns === null) {
			if ($this->isNew()) {
			   $this->collSuperCategoryI18ns = array();
			} else {

				$criteria->add(SuperCategoryI18nPeer::ID, $this->id);

				SuperCategoryI18nPeer::addSelectColumns($criteria);
				$this->collSuperCategoryI18ns = SuperCategoryI18nPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SuperCategoryI18nPeer::ID, $this->id);

				SuperCategoryI18nPeer::addSelectColumns($criteria);
				if (!isset($this->lastSuperCategoryI18nCriteria) || !$this->lastSuperCategoryI18nCriteria->equals($criteria)) {
					$this->collSuperCategoryI18ns = SuperCategoryI18nPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSuperCategoryI18nCriteria = $criteria;
		return $this->collSuperCategoryI18ns;
	}

	
	public function countSuperCategoryI18ns(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SuperCategoryPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collSuperCategoryI18ns === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(SuperCategoryI18nPeer::ID, $this->id);

				$count = SuperCategoryI18nPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SuperCategoryI18nPeer::ID, $this->id);

				if (!isset($this->lastSuperCategoryI18nCriteria) || !$this->lastSuperCategoryI18nCriteria->equals($criteria)) {
					$count = SuperCategoryI18nPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collSuperCategoryI18ns);
				}
			} else {
				$count = count($this->collSuperCategoryI18ns);
			}
		}
		return $count;
	}

	
	public function addSuperCategoryI18n(SuperCategoryI18n $l)
	{
		if ($this->collSuperCategoryI18ns === null) {
			$this->initSuperCategoryI18ns();
		}
		if (!in_array($l, $this->collSuperCategoryI18ns, true)) { 			array_push($this->collSuperCategoryI18ns, $l);
			$l->setSuperCategory($this);
		}
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collCategorys) {
				foreach ((array) $this->collCategorys as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSuperCategoryI18ns) {
				foreach ((array) $this->collSuperCategoryI18ns as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collCategorys = null;
		$this->collSuperCategoryI18ns = null;
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
    return $this->getCurrentSuperCategoryI18n($culture)->getName();
  }

  public function setName($value, $culture = null)
  {
    $this->getCurrentSuperCategoryI18n($culture)->setName($value);
  }

  protected $current_i18n = array();

  public function getCurrentSuperCategoryI18n($culture = null)
  {
    if (is_null($culture))
    {
      $culture = is_null($this->culture) ? sfPropel::getDefaultCulture() : $this->culture;
    }

    if (!isset($this->current_i18n[$culture]))
    {
      $obj = $this->isNew() ? null : SuperCategoryI18nPeer::retrieveByPK($this->getId(), $culture);
      if ($obj)
      {
        $this->setSuperCategoryI18nForCulture($obj, $culture);
      }
      else
      {
        $this->setSuperCategoryI18nForCulture(new SuperCategoryI18n(), $culture);
        $this->current_i18n[$culture]->setCulture($culture);
      }
    }

    return $this->current_i18n[$culture];
  }

  public function setSuperCategoryI18nForCulture($object, $culture)
  {
    $this->current_i18n[$culture] = $object;
    $this->addSuperCategoryI18n($object);
  }

} 