<?php


abstract class BasesfGuardPermission extends BaseObject  implements Persistent {


  const PEER = 'sfGuardPermissionPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $name;

	
	protected $description;

	
	protected $collsfGuardGroupPermissions;

	
	private $lastsfGuardGroupPermissionCriteria = null;

	
	protected $collsfGuardUserPermissions;

	
	private $lastsfGuardUserPermissionCriteria = null;

	
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

	
	public function getName()
	{
		return $this->name;
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
			$this->modifiedColumns[] = sfGuardPermissionPeer::ID;
		}

		return $this;
	} 
	
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = sfGuardPermissionPeer::NAME;
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
			$this->modifiedColumns[] = sfGuardPermissionPeer::DESCRIPTION;
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
			$this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->description = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating sfGuardPermission object", $e);
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
			$con = Propel::getConnection(sfGuardPermissionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = sfGuardPermissionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->collsfGuardGroupPermissions = null;
			$this->lastsfGuardGroupPermissionCriteria = null;

			$this->collsfGuardUserPermissions = null;
			$this->lastsfGuardUserPermissionCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(sfGuardPermissionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			sfGuardPermissionPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(sfGuardPermissionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			sfGuardPermissionPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = sfGuardPermissionPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = sfGuardPermissionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += sfGuardPermissionPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collsfGuardGroupPermissions !== null) {
				foreach ($this->collsfGuardGroupPermissions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfGuardUserPermissions !== null) {
				foreach ($this->collsfGuardUserPermissions as $referrerFK) {
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


			if (($retval = sfGuardPermissionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collsfGuardGroupPermissions !== null) {
					foreach ($this->collsfGuardGroupPermissions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collsfGuardUserPermissions !== null) {
					foreach ($this->collsfGuardUserPermissions as $referrerFK) {
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
		$pos = sfGuardPermissionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getName();
				break;
			case 2:
				return $this->getDescription();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = sfGuardPermissionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getDescription(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfGuardPermissionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setName($value);
				break;
			case 2:
				$this->setDescription($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfGuardPermissionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescription($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(sfGuardPermissionPeer::DATABASE_NAME);

		if ($this->isColumnModified(sfGuardPermissionPeer::ID)) $criteria->add(sfGuardPermissionPeer::ID, $this->id);
		if ($this->isColumnModified(sfGuardPermissionPeer::NAME)) $criteria->add(sfGuardPermissionPeer::NAME, $this->name);
		if ($this->isColumnModified(sfGuardPermissionPeer::DESCRIPTION)) $criteria->add(sfGuardPermissionPeer::DESCRIPTION, $this->description);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(sfGuardPermissionPeer::DATABASE_NAME);

		$criteria->add(sfGuardPermissionPeer::ID, $this->id);

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

		$copyObj->setName($this->name);

		$copyObj->setDescription($this->description);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getsfGuardGroupPermissions() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addsfGuardGroupPermission($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getsfGuardUserPermissions() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addsfGuardUserPermission($relObj->copy($deepCopy));
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
			self::$peer = new sfGuardPermissionPeer();
		}
		return self::$peer;
	}

	
	public function clearsfGuardGroupPermissions()
	{
		$this->collsfGuardGroupPermissions = null; 	}

	
	public function initsfGuardGroupPermissions()
	{
		$this->collsfGuardGroupPermissions = array();
	}

	
	public function getsfGuardGroupPermissions($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(sfGuardPermissionPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardGroupPermissions === null) {
			if ($this->isNew()) {
			   $this->collsfGuardGroupPermissions = array();
			} else {

				$criteria->add(sfGuardGroupPermissionPeer::PERMISSION_ID, $this->id);

				sfGuardGroupPermissionPeer::addSelectColumns($criteria);
				$this->collsfGuardGroupPermissions = sfGuardGroupPermissionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfGuardGroupPermissionPeer::PERMISSION_ID, $this->id);

				sfGuardGroupPermissionPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfGuardGroupPermissionCriteria) || !$this->lastsfGuardGroupPermissionCriteria->equals($criteria)) {
					$this->collsfGuardGroupPermissions = sfGuardGroupPermissionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfGuardGroupPermissionCriteria = $criteria;
		return $this->collsfGuardGroupPermissions;
	}

	
	public function countsfGuardGroupPermissions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(sfGuardPermissionPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collsfGuardGroupPermissions === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(sfGuardGroupPermissionPeer::PERMISSION_ID, $this->id);

				$count = sfGuardGroupPermissionPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfGuardGroupPermissionPeer::PERMISSION_ID, $this->id);

				if (!isset($this->lastsfGuardGroupPermissionCriteria) || !$this->lastsfGuardGroupPermissionCriteria->equals($criteria)) {
					$count = sfGuardGroupPermissionPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collsfGuardGroupPermissions);
				}
			} else {
				$count = count($this->collsfGuardGroupPermissions);
			}
		}
		return $count;
	}

	
	public function addsfGuardGroupPermission(sfGuardGroupPermission $l)
	{
		if ($this->collsfGuardGroupPermissions === null) {
			$this->initsfGuardGroupPermissions();
		}
		if (!in_array($l, $this->collsfGuardGroupPermissions, true)) { 			array_push($this->collsfGuardGroupPermissions, $l);
			$l->setsfGuardPermission($this);
		}
	}


	
	public function getsfGuardGroupPermissionsJoinsfGuardGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(sfGuardPermissionPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardGroupPermissions === null) {
			if ($this->isNew()) {
				$this->collsfGuardGroupPermissions = array();
			} else {

				$criteria->add(sfGuardGroupPermissionPeer::PERMISSION_ID, $this->id);

				$this->collsfGuardGroupPermissions = sfGuardGroupPermissionPeer::doSelectJoinsfGuardGroup($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(sfGuardGroupPermissionPeer::PERMISSION_ID, $this->id);

			if (!isset($this->lastsfGuardGroupPermissionCriteria) || !$this->lastsfGuardGroupPermissionCriteria->equals($criteria)) {
				$this->collsfGuardGroupPermissions = sfGuardGroupPermissionPeer::doSelectJoinsfGuardGroup($criteria, $con, $join_behavior);
			}
		}
		$this->lastsfGuardGroupPermissionCriteria = $criteria;

		return $this->collsfGuardGroupPermissions;
	}

	
	public function clearsfGuardUserPermissions()
	{
		$this->collsfGuardUserPermissions = null; 	}

	
	public function initsfGuardUserPermissions()
	{
		$this->collsfGuardUserPermissions = array();
	}

	
	public function getsfGuardUserPermissions($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(sfGuardPermissionPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardUserPermissions === null) {
			if ($this->isNew()) {
			   $this->collsfGuardUserPermissions = array();
			} else {

				$criteria->add(sfGuardUserPermissionPeer::PERMISSION_ID, $this->id);

				sfGuardUserPermissionPeer::addSelectColumns($criteria);
				$this->collsfGuardUserPermissions = sfGuardUserPermissionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfGuardUserPermissionPeer::PERMISSION_ID, $this->id);

				sfGuardUserPermissionPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfGuardUserPermissionCriteria) || !$this->lastsfGuardUserPermissionCriteria->equals($criteria)) {
					$this->collsfGuardUserPermissions = sfGuardUserPermissionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfGuardUserPermissionCriteria = $criteria;
		return $this->collsfGuardUserPermissions;
	}

	
	public function countsfGuardUserPermissions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(sfGuardPermissionPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collsfGuardUserPermissions === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(sfGuardUserPermissionPeer::PERMISSION_ID, $this->id);

				$count = sfGuardUserPermissionPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfGuardUserPermissionPeer::PERMISSION_ID, $this->id);

				if (!isset($this->lastsfGuardUserPermissionCriteria) || !$this->lastsfGuardUserPermissionCriteria->equals($criteria)) {
					$count = sfGuardUserPermissionPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collsfGuardUserPermissions);
				}
			} else {
				$count = count($this->collsfGuardUserPermissions);
			}
		}
		return $count;
	}

	
	public function addsfGuardUserPermission(sfGuardUserPermission $l)
	{
		if ($this->collsfGuardUserPermissions === null) {
			$this->initsfGuardUserPermissions();
		}
		if (!in_array($l, $this->collsfGuardUserPermissions, true)) { 			array_push($this->collsfGuardUserPermissions, $l);
			$l->setsfGuardPermission($this);
		}
	}


	
	public function getsfGuardUserPermissionsJoinsfGuardUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(sfGuardPermissionPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardUserPermissions === null) {
			if ($this->isNew()) {
				$this->collsfGuardUserPermissions = array();
			} else {

				$criteria->add(sfGuardUserPermissionPeer::PERMISSION_ID, $this->id);

				$this->collsfGuardUserPermissions = sfGuardUserPermissionPeer::doSelectJoinsfGuardUser($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(sfGuardUserPermissionPeer::PERMISSION_ID, $this->id);

			if (!isset($this->lastsfGuardUserPermissionCriteria) || !$this->lastsfGuardUserPermissionCriteria->equals($criteria)) {
				$this->collsfGuardUserPermissions = sfGuardUserPermissionPeer::doSelectJoinsfGuardUser($criteria, $con, $join_behavior);
			}
		}
		$this->lastsfGuardUserPermissionCriteria = $criteria;

		return $this->collsfGuardUserPermissions;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collsfGuardGroupPermissions) {
				foreach ((array) $this->collsfGuardGroupPermissions as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collsfGuardUserPermissions) {
				foreach ((array) $this->collsfGuardUserPermissions as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collsfGuardGroupPermissions = null;
		$this->collsfGuardUserPermissions = null;
	}

} 