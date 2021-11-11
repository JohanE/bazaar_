<?php


abstract class BaseCustomerTypeI18n extends BaseObject  implements Persistent {


  const PEER = 'CustomerTypeI18nPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $culture;

	
	protected $description;

	
	protected $plural_description;

	
	protected $aCustomerType;

	
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

	
	public function getCulture()
	{
		return $this->culture;
	}

	
	public function getDescription()
	{
		return $this->description;
	}

	
	public function getPluralDescription()
	{
		return $this->plural_description;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CustomerTypeI18nPeer::ID;
		}

		if ($this->aCustomerType !== null && $this->aCustomerType->getId() !== $v) {
			$this->aCustomerType = null;
		}

		return $this;
	} 
	
	public function setCulture($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->culture !== $v) {
			$this->culture = $v;
			$this->modifiedColumns[] = CustomerTypeI18nPeer::CULTURE;
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
			$this->modifiedColumns[] = CustomerTypeI18nPeer::DESCRIPTION;
		}

		return $this;
	} 
	
	public function setPluralDescription($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->plural_description !== $v) {
			$this->plural_description = $v;
			$this->modifiedColumns[] = CustomerTypeI18nPeer::PLURAL_DESCRIPTION;
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
			$this->culture = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->description = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->plural_description = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating CustomerTypeI18n object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aCustomerType !== null && $this->id !== $this->aCustomerType->getId()) {
			$this->aCustomerType = null;
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
			$con = Propel::getConnection(CustomerTypeI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = CustomerTypeI18nPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aCustomerType = null;
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CustomerTypeI18nPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			CustomerTypeI18nPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CustomerTypeI18nPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			CustomerTypeI18nPeer::addInstanceToPool($this);
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

												
			if ($this->aCustomerType !== null) {
				if ($this->aCustomerType->isModified() || ($this->aCustomerType->getCulture() && $this->aCustomerType->getCurrentCustomerTypeI18n()->isModified()) || $this->aCustomerType->isNew()) {
					$affectedRows += $this->aCustomerType->save($con);
				}
				$this->setCustomerType($this->aCustomerType);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CustomerTypeI18nPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CustomerTypeI18nPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

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


												
			if ($this->aCustomerType !== null) {
				if (!$this->aCustomerType->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCustomerType->getValidationFailures());
				}
			}


			if (($retval = CustomerTypeI18nPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CustomerTypeI18nPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCulture();
				break;
			case 2:
				return $this->getDescription();
				break;
			case 3:
				return $this->getPluralDescription();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = CustomerTypeI18nPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCulture(),
			$keys[2] => $this->getDescription(),
			$keys[3] => $this->getPluralDescription(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CustomerTypeI18nPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCulture($value);
				break;
			case 2:
				$this->setDescription($value);
				break;
			case 3:
				$this->setPluralDescription($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CustomerTypeI18nPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCulture($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescription($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPluralDescription($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CustomerTypeI18nPeer::DATABASE_NAME);

		if ($this->isColumnModified(CustomerTypeI18nPeer::ID)) $criteria->add(CustomerTypeI18nPeer::ID, $this->id);
		if ($this->isColumnModified(CustomerTypeI18nPeer::CULTURE)) $criteria->add(CustomerTypeI18nPeer::CULTURE, $this->culture);
		if ($this->isColumnModified(CustomerTypeI18nPeer::DESCRIPTION)) $criteria->add(CustomerTypeI18nPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(CustomerTypeI18nPeer::PLURAL_DESCRIPTION)) $criteria->add(CustomerTypeI18nPeer::PLURAL_DESCRIPTION, $this->plural_description);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CustomerTypeI18nPeer::DATABASE_NAME);

		$criteria->add(CustomerTypeI18nPeer::ID, $this->id);
		$criteria->add(CustomerTypeI18nPeer::CULTURE, $this->culture);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getId();

		$pks[1] = $this->getCulture();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setId($keys[0]);

		$this->setCulture($keys[1]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setId($this->id);

		$copyObj->setCulture($this->culture);

		$copyObj->setDescription($this->description);

		$copyObj->setPluralDescription($this->plural_description);


		$copyObj->setNew(true);

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
			self::$peer = new CustomerTypeI18nPeer();
		}
		return self::$peer;
	}

	
	public function setCustomerType(CustomerType $v = null)
	{
		if ($v === null) {
			$this->setId(NULL);
		} else {
			$this->setId($v->getId());
		}

		$this->aCustomerType = $v;

						if ($v !== null) {
			$v->addCustomerTypeI18n($this);
		}

		return $this;
	}


	
	public function getCustomerType(PropelPDO $con = null)
	{
		if ($this->aCustomerType === null && ($this->id !== null)) {
			$c = new Criteria(CustomerTypePeer::DATABASE_NAME);
			$c->add(CustomerTypePeer::ID, $this->id);
			$this->aCustomerType = CustomerTypePeer::doSelectOne($c, $con);
			
		}
		return $this->aCustomerType;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} 
			$this->aCustomerType = null;
	}

} 