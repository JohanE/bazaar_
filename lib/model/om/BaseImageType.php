<?php


abstract class BaseImageType extends BaseObject  implements Persistent {


  const PEER = 'ImageTypePeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $description;

	
	protected $collImages;

	
	private $lastImageCriteria = null;

	
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
			$this->modifiedColumns[] = ImageTypePeer::ID;
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
			$this->modifiedColumns[] = ImageTypePeer::DESCRIPTION;
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
			throw new PropelException("Error populating ImageType object", $e);
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
			$con = Propel::getConnection(ImageTypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = ImageTypePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->collImages = null;
			$this->lastImageCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ImageTypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			ImageTypePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ImageTypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			ImageTypePeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = ImageTypePeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ImageTypePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ImageTypePeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collImages !== null) {
				foreach ($this->collImages as $referrerFK) {
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


			if (($retval = ImageTypePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collImages !== null) {
					foreach ($this->collImages as $referrerFK) {
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
		$pos = ImageTypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = ImageTypePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getDescription(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ImageTypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = ImageTypePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescription($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ImageTypePeer::DATABASE_NAME);

		if ($this->isColumnModified(ImageTypePeer::ID)) $criteria->add(ImageTypePeer::ID, $this->id);
		if ($this->isColumnModified(ImageTypePeer::DESCRIPTION)) $criteria->add(ImageTypePeer::DESCRIPTION, $this->description);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ImageTypePeer::DATABASE_NAME);

		$criteria->add(ImageTypePeer::ID, $this->id);

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

			foreach ($this->getImages() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addImage($relObj->copy($deepCopy));
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
			self::$peer = new ImageTypePeer();
		}
		return self::$peer;
	}

	
	public function clearImages()
	{
		$this->collImages = null; 	}

	
	public function initImages()
	{
		$this->collImages = array();
	}

	
	public function getImages($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ImageTypePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collImages === null) {
			if ($this->isNew()) {
			   $this->collImages = array();
			} else {

				$criteria->add(ImagePeer::IMAGETYPE_ID, $this->id);

				ImagePeer::addSelectColumns($criteria);
				$this->collImages = ImagePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ImagePeer::IMAGETYPE_ID, $this->id);

				ImagePeer::addSelectColumns($criteria);
				if (!isset($this->lastImageCriteria) || !$this->lastImageCriteria->equals($criteria)) {
					$this->collImages = ImagePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastImageCriteria = $criteria;
		return $this->collImages;
	}

	
	public function countImages(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ImageTypePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collImages === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ImagePeer::IMAGETYPE_ID, $this->id);

				$count = ImagePeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ImagePeer::IMAGETYPE_ID, $this->id);

				if (!isset($this->lastImageCriteria) || !$this->lastImageCriteria->equals($criteria)) {
					$count = ImagePeer::doCount($criteria, $con);
				} else {
					$count = count($this->collImages);
				}
			} else {
				$count = count($this->collImages);
			}
		}
		return $count;
	}

	
	public function addImage(Image $l)
	{
		if ($this->collImages === null) {
			$this->initImages();
		}
		if (!in_array($l, $this->collImages, true)) { 			array_push($this->collImages, $l);
			$l->setImageType($this);
		}
	}


	
	public function getImagesJoinItem($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ImageTypePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collImages === null) {
			if ($this->isNew()) {
				$this->collImages = array();
			} else {

				$criteria->add(ImagePeer::IMAGETYPE_ID, $this->id);

				$this->collImages = ImagePeer::doSelectJoinItem($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ImagePeer::IMAGETYPE_ID, $this->id);

			if (!isset($this->lastImageCriteria) || !$this->lastImageCriteria->equals($criteria)) {
				$this->collImages = ImagePeer::doSelectJoinItem($criteria, $con, $join_behavior);
			}
		}
		$this->lastImageCriteria = $criteria;

		return $this->collImages;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collImages) {
				foreach ((array) $this->collImages as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collImages = null;
	}

} 