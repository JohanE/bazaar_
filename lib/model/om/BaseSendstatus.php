<?php


abstract class BaseSendstatus extends BaseObject  implements Persistent {


  const PEER = 'SendstatusPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $description;

	
	protected $collIBMails;

	
	private $lastIBMailCriteria = null;

	
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
			$this->modifiedColumns[] = SendstatusPeer::ID;
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
			$this->modifiedColumns[] = SendstatusPeer::DESCRIPTION;
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
			throw new PropelException("Error populating Sendstatus object", $e);
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
			$con = Propel::getConnection(SendstatusPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = SendstatusPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->collIBMails = null;
			$this->lastIBMailCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SendstatusPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			SendstatusPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(SendstatusPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			SendstatusPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = SendstatusPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = SendstatusPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += SendstatusPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collIBMails !== null) {
				foreach ($this->collIBMails as $referrerFK) {
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


			if (($retval = SendstatusPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collIBMails !== null) {
					foreach ($this->collIBMails as $referrerFK) {
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
		$pos = SendstatusPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = SendstatusPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getDescription(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SendstatusPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = SendstatusPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescription($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(SendstatusPeer::DATABASE_NAME);

		if ($this->isColumnModified(SendstatusPeer::ID)) $criteria->add(SendstatusPeer::ID, $this->id);
		if ($this->isColumnModified(SendstatusPeer::DESCRIPTION)) $criteria->add(SendstatusPeer::DESCRIPTION, $this->description);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(SendstatusPeer::DATABASE_NAME);

		$criteria->add(SendstatusPeer::ID, $this->id);

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

			foreach ($this->getIBMails() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addIBMail($relObj->copy($deepCopy));
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
			self::$peer = new SendstatusPeer();
		}
		return self::$peer;
	}

	
	public function clearIBMails()
	{
		$this->collIBMails = null; 	}

	
	public function initIBMails()
	{
		$this->collIBMails = array();
	}

	
	public function getIBMails($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SendstatusPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIBMails === null) {
			if ($this->isNew()) {
			   $this->collIBMails = array();
			} else {

				$criteria->add(IBMailPeer::SENDSTATUS_ID, $this->id);

				IBMailPeer::addSelectColumns($criteria);
				$this->collIBMails = IBMailPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(IBMailPeer::SENDSTATUS_ID, $this->id);

				IBMailPeer::addSelectColumns($criteria);
				if (!isset($this->lastIBMailCriteria) || !$this->lastIBMailCriteria->equals($criteria)) {
					$this->collIBMails = IBMailPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastIBMailCriteria = $criteria;
		return $this->collIBMails;
	}

	
	public function countIBMails(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SendstatusPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collIBMails === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(IBMailPeer::SENDSTATUS_ID, $this->id);

				$count = IBMailPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(IBMailPeer::SENDSTATUS_ID, $this->id);

				if (!isset($this->lastIBMailCriteria) || !$this->lastIBMailCriteria->equals($criteria)) {
					$count = IBMailPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collIBMails);
				}
			} else {
				$count = count($this->collIBMails);
			}
		}
		return $count;
	}

	
	public function addIBMail(IBMail $l)
	{
		if ($this->collIBMails === null) {
			$this->initIBMails();
		}
		if (!in_array($l, $this->collIBMails, true)) { 			array_push($this->collIBMails, $l);
			$l->setSendstatus($this);
		}
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collIBMails) {
				foreach ((array) $this->collIBMails as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collIBMails = null;
	}

} 