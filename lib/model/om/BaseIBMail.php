<?php


abstract class BaseIBMail extends BaseObject  implements Persistent {


  const PEER = 'IBMailPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $email;

	
	protected $created_at;

	
	protected $sendstatus_id;

	
	protected $aSendstatus;

	
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

	
	public function getEmail()
	{
		return $this->email;
	}

	
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->created_at === null) {
			return null;
		}


		if ($this->created_at === '0000-00-00 00:00:00') {
									return null;
		} else {
			try {
				$dt = new DateTime($this->created_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
			}
		}

		if ($format === null) {
						return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	
	public function getSendstatusId()
	{
		return $this->sendstatus_id;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = IBMailPeer::ID;
		}

		return $this;
	} 
	
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = IBMailPeer::EMAIL;
		}

		return $this;
	} 
	
	public function setCreatedAt($v)
	{
						if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
									try {
				if (is_numeric($v)) { 					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
															$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->created_at !== null || $dt !== null ) {
			
			$currNorm = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) 					)
			{
				$this->created_at = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = IBMailPeer::CREATED_AT;
			}
		} 
		return $this;
	} 
	
	public function setSendstatusId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->sendstatus_id !== $v) {
			$this->sendstatus_id = $v;
			$this->modifiedColumns[] = IBMailPeer::SENDSTATUS_ID;
		}

		if ($this->aSendstatus !== null && $this->aSendstatus->getId() !== $v) {
			$this->aSendstatus = null;
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
			$this->email = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->created_at = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->sendstatus_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating IBMail object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aSendstatus !== null && $this->sendstatus_id !== $this->aSendstatus->getId()) {
			$this->aSendstatus = null;
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
			$con = Propel::getConnection(IBMailPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = IBMailPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aSendstatus = null;
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(IBMailPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			IBMailPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	
	public function save(PropelPDO $con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(IBMailPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(IBMailPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			IBMailPeer::addInstanceToPool($this);
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

												
			if ($this->aSendstatus !== null) {
				if ($this->aSendstatus->isModified() || $this->aSendstatus->isNew()) {
					$affectedRows += $this->aSendstatus->save($con);
				}
				$this->setSendstatus($this->aSendstatus);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = IBMailPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = IBMailPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += IBMailPeer::doUpdate($this, $con);
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


												
			if ($this->aSendstatus !== null) {
				if (!$this->aSendstatus->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSendstatus->getValidationFailures());
				}
			}


			if (($retval = IBMailPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = IBMailPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getEmail();
				break;
			case 2:
				return $this->getCreatedAt();
				break;
			case 3:
				return $this->getSendstatusId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = IBMailPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getEmail(),
			$keys[2] => $this->getCreatedAt(),
			$keys[3] => $this->getSendstatusId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = IBMailPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setEmail($value);
				break;
			case 2:
				$this->setCreatedAt($value);
				break;
			case 3:
				$this->setSendstatusId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = IBMailPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEmail($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCreatedAt($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSendstatusId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(IBMailPeer::DATABASE_NAME);

		if ($this->isColumnModified(IBMailPeer::ID)) $criteria->add(IBMailPeer::ID, $this->id);
		if ($this->isColumnModified(IBMailPeer::EMAIL)) $criteria->add(IBMailPeer::EMAIL, $this->email);
		if ($this->isColumnModified(IBMailPeer::CREATED_AT)) $criteria->add(IBMailPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(IBMailPeer::SENDSTATUS_ID)) $criteria->add(IBMailPeer::SENDSTATUS_ID, $this->sendstatus_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(IBMailPeer::DATABASE_NAME);

		$criteria->add(IBMailPeer::ID, $this->id);

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

		$copyObj->setEmail($this->email);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setSendstatusId($this->sendstatus_id);


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
			self::$peer = new IBMailPeer();
		}
		return self::$peer;
	}

	
	public function setSendstatus(Sendstatus $v = null)
	{
		if ($v === null) {
			$this->setSendstatusId(NULL);
		} else {
			$this->setSendstatusId($v->getId());
		}

		$this->aSendstatus = $v;

						if ($v !== null) {
			$v->addIBMail($this);
		}

		return $this;
	}


	
	public function getSendstatus(PropelPDO $con = null)
	{
		if ($this->aSendstatus === null && ($this->sendstatus_id !== null)) {
			$c = new Criteria(SendstatusPeer::DATABASE_NAME);
			$c->add(SendstatusPeer::ID, $this->sendstatus_id);
			$this->aSendstatus = SendstatusPeer::doSelectOne($c, $con);
			
		}
		return $this->aSendstatus;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} 
			$this->aSendstatus = null;
	}

} 