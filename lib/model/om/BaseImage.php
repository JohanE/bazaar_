<?php


abstract class BaseImage extends BaseObject  implements Persistent {


  const PEER = 'ImagePeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $itemid;

	
	protected $path;

	
	protected $imagetype_id;

	
	protected $aItem;

	
	protected $aImageType;

	
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

	
	public function getItemid()
	{
		return $this->itemid;
	}

	
	public function getPath()
	{
		return $this->path;
	}

	
	public function getImagetypeId()
	{
		return $this->imagetype_id;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ImagePeer::ID;
		}

		return $this;
	} 
	
	public function setItemid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->itemid !== $v) {
			$this->itemid = $v;
			$this->modifiedColumns[] = ImagePeer::ITEMID;
		}

		if ($this->aItem !== null && $this->aItem->getId() !== $v) {
			$this->aItem = null;
		}

		return $this;
	} 
	
	public function setPath($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->path !== $v) {
			$this->path = $v;
			$this->modifiedColumns[] = ImagePeer::PATH;
		}

		return $this;
	} 
	
	public function setImagetypeId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->imagetype_id !== $v) {
			$this->imagetype_id = $v;
			$this->modifiedColumns[] = ImagePeer::IMAGETYPE_ID;
		}

		if ($this->aImageType !== null && $this->aImageType->getId() !== $v) {
			$this->aImageType = null;
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
			$this->itemid = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->path = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->imagetype_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Image object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aItem !== null && $this->itemid !== $this->aItem->getId()) {
			$this->aItem = null;
		}
		if ($this->aImageType !== null && $this->imagetype_id !== $this->aImageType->getId()) {
			$this->aImageType = null;
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
			$con = Propel::getConnection(ImagePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = ImagePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aItem = null;
			$this->aImageType = null;
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ImagePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			ImagePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ImagePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			ImagePeer::addInstanceToPool($this);
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

												
			if ($this->aItem !== null) {
				if ($this->aItem->isModified() || $this->aItem->isNew()) {
					$affectedRows += $this->aItem->save($con);
				}
				$this->setItem($this->aItem);
			}

			if ($this->aImageType !== null) {
				if ($this->aImageType->isModified() || $this->aImageType->isNew()) {
					$affectedRows += $this->aImageType->save($con);
				}
				$this->setImageType($this->aImageType);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = ImagePeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ImagePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ImagePeer::doUpdate($this, $con);
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


												
			if ($this->aItem !== null) {
				if (!$this->aItem->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aItem->getValidationFailures());
				}
			}

			if ($this->aImageType !== null) {
				if (!$this->aImageType->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aImageType->getValidationFailures());
				}
			}


			if (($retval = ImagePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ImagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getItemid();
				break;
			case 2:
				return $this->getPath();
				break;
			case 3:
				return $this->getImagetypeId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = ImagePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getItemid(),
			$keys[2] => $this->getPath(),
			$keys[3] => $this->getImagetypeId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ImagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setItemid($value);
				break;
			case 2:
				$this->setPath($value);
				break;
			case 3:
				$this->setImagetypeId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ImagePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setItemid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPath($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setImagetypeId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ImagePeer::DATABASE_NAME);

		if ($this->isColumnModified(ImagePeer::ID)) $criteria->add(ImagePeer::ID, $this->id);
		if ($this->isColumnModified(ImagePeer::ITEMID)) $criteria->add(ImagePeer::ITEMID, $this->itemid);
		if ($this->isColumnModified(ImagePeer::PATH)) $criteria->add(ImagePeer::PATH, $this->path);
		if ($this->isColumnModified(ImagePeer::IMAGETYPE_ID)) $criteria->add(ImagePeer::IMAGETYPE_ID, $this->imagetype_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ImagePeer::DATABASE_NAME);

		$criteria->add(ImagePeer::ID, $this->id);

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

		$copyObj->setItemid($this->itemid);

		$copyObj->setPath($this->path);

		$copyObj->setImagetypeId($this->imagetype_id);


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
			self::$peer = new ImagePeer();
		}
		return self::$peer;
	}

	
	public function setItem(Item $v = null)
	{
		if ($v === null) {
			$this->setItemid(NULL);
		} else {
			$this->setItemid($v->getId());
		}

		$this->aItem = $v;

						if ($v !== null) {
			$v->addImage($this);
		}

		return $this;
	}


	
	public function getItem(PropelPDO $con = null)
	{
		if ($this->aItem === null && ($this->itemid !== null)) {
			$c = new Criteria(ItemPeer::DATABASE_NAME);
			$c->add(ItemPeer::ID, $this->itemid);
			$this->aItem = ItemPeer::doSelectOne($c, $con);
			
		}
		return $this->aItem;
	}

	
	public function setImageType(ImageType $v = null)
	{
		if ($v === null) {
			$this->setImagetypeId(NULL);
		} else {
			$this->setImagetypeId($v->getId());
		}

		$this->aImageType = $v;

						if ($v !== null) {
			$v->addImage($this);
		}

		return $this;
	}


	
	public function getImageType(PropelPDO $con = null)
	{
		if ($this->aImageType === null && ($this->imagetype_id !== null)) {
			$c = new Criteria(ImageTypePeer::DATABASE_NAME);
			$c->add(ImageTypePeer::ID, $this->imagetype_id);
			$this->aImageType = ImageTypePeer::doSelectOne($c, $con);
			
		}
		return $this->aImageType;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} 
			$this->aItem = null;
			$this->aImageType = null;
	}

} 