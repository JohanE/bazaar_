<?php


abstract class BaseItem extends BaseObject  implements Persistent {


  const PEER = 'ItemPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $name;

	
	protected $email;

	
	protected $phone;

	
	protected $title;

	
	protected $body;

	
	protected $site;

	
	protected $price;

	
	protected $created_at;

	
	protected $approved_at;

	
	protected $valid_until;

	
	protected $updated_at;

	
	protected $password;

	
	protected $slug;

	
	protected $status_id;

	
	protected $mode_id;

	
	protected $customertype_id;

	
	protected $location_id;

	
	protected $sublocation_id;

	
	protected $category_id;

	
	protected $subcategory_id;

	
	protected $milage_id;

	
	protected $gearbox_id;

	
	protected $yearmodel_id;

	
	protected $fuel_id;

	
	protected $room_id;

	
	protected $length;

	
	protected $area;

	
	protected $street;

	
	protected $rent;

	
	protected $postalcode;

	
	protected $nr_of_expiration_reminders;

	
	protected $aStatus;

	
	protected $aMode;

	
	protected $aCustomerType;

	
	protected $aLocation;

	
	protected $aSubLocation;

	
	protected $aCategory;

	
	protected $aSubCategory;

	
	protected $aMilage;

	
	protected $aGearbox;

	
	protected $aYearmodel;

	
	protected $aFuel;

	
	protected $aRoom;

	
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

	
	public function getName()
	{
		return $this->name;
	}

	
	public function getEmail()
	{
		return $this->email;
	}

	
	public function getPhone()
	{
		return $this->phone;
	}

	
	public function getTitle()
	{
		return $this->title;
	}

	
	public function getBody()
	{
		return $this->body;
	}

	
	public function getSite()
	{
		return $this->site;
	}

	
	public function getPrice()
	{
		return $this->price;
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

	
	public function getApprovedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->approved_at === null) {
			return null;
		}


		if ($this->approved_at === '0000-00-00 00:00:00') {
									return null;
		} else {
			try {
				$dt = new DateTime($this->approved_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->approved_at, true), $x);
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

	
	public function getValidUntil($format = 'Y-m-d H:i:s')
	{
		if ($this->valid_until === null) {
			return null;
		}


		if ($this->valid_until === '0000-00-00 00:00:00') {
									return null;
		} else {
			try {
				$dt = new DateTime($this->valid_until);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->valid_until, true), $x);
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

	
	public function getUpdatedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->updated_at === null) {
			return null;
		}


		if ($this->updated_at === '0000-00-00 00:00:00') {
									return null;
		} else {
			try {
				$dt = new DateTime($this->updated_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->updated_at, true), $x);
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

	
	public function getPassword()
	{
		return $this->password;
	}

	
	public function getSlug()
	{
		return $this->slug;
	}

	
	public function getStatusId()
	{
		return $this->status_id;
	}

	
	public function getModeId()
	{
		return $this->mode_id;
	}

	
	public function getCustomertypeId()
	{
		return $this->customertype_id;
	}

	
	public function getLocationId()
	{
		return $this->location_id;
	}

	
	public function getSublocationId()
	{
		return $this->sublocation_id;
	}

	
	public function getCategoryId()
	{
		return $this->category_id;
	}

	
	public function getSubcategoryId()
	{
		return $this->subcategory_id;
	}

	
	public function getMilageId()
	{
		return $this->milage_id;
	}

	
	public function getGearboxId()
	{
		return $this->gearbox_id;
	}

	
	public function getYearmodelId()
	{
		return $this->yearmodel_id;
	}

	
	public function getFuelId()
	{
		return $this->fuel_id;
	}

	
	public function getRoomId()
	{
		return $this->room_id;
	}

	
	public function getLength()
	{
		return $this->length;
	}

	
	public function getArea()
	{
		return $this->area;
	}

	
	public function getStreet()
	{
		return $this->street;
	}

	
	public function getRent()
	{
		return $this->rent;
	}

	
	public function getPostalcode()
	{
		return $this->postalcode;
	}

	
	public function getNrOfExpirationReminders()
	{
		return $this->nr_of_expiration_reminders;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ItemPeer::ID;
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
			$this->modifiedColumns[] = ItemPeer::NAME;
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
			$this->modifiedColumns[] = ItemPeer::EMAIL;
		}

		return $this;
	} 
	
	public function setPhone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->phone !== $v) {
			$this->phone = $v;
			$this->modifiedColumns[] = ItemPeer::PHONE;
		}

		return $this;
	} 
	
	public function setTitle($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = ItemPeer::TITLE;
		}

		return $this;
	} 
	
	public function setBody($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->body !== $v) {
			$this->body = $v;
			$this->modifiedColumns[] = ItemPeer::BODY;
		}

		return $this;
	} 
	
	public function setSite($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->site !== $v) {
			$this->site = $v;
			$this->modifiedColumns[] = ItemPeer::SITE;
		}

		return $this;
	} 
	
	public function setPrice($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->price !== $v) {
			$this->price = $v;
			$this->modifiedColumns[] = ItemPeer::PRICE;
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
				$this->modifiedColumns[] = ItemPeer::CREATED_AT;
			}
		} 
		return $this;
	} 
	
	public function setApprovedAt($v)
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

		if ( $this->approved_at !== null || $dt !== null ) {
			
			$currNorm = ($this->approved_at !== null && $tmpDt = new DateTime($this->approved_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) 					)
			{
				$this->approved_at = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = ItemPeer::APPROVED_AT;
			}
		} 
		return $this;
	} 
	
	public function setValidUntil($v)
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

		if ( $this->valid_until !== null || $dt !== null ) {
			
			$currNorm = ($this->valid_until !== null && $tmpDt = new DateTime($this->valid_until)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) 					)
			{
				$this->valid_until = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = ItemPeer::VALID_UNTIL;
			}
		} 
		return $this;
	} 
	
	public function setUpdatedAt($v)
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

		if ( $this->updated_at !== null || $dt !== null ) {
			
			$currNorm = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) 					)
			{
				$this->updated_at = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = ItemPeer::UPDATED_AT;
			}
		} 
		return $this;
	} 
	
	public function setPassword($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->password !== $v) {
			$this->password = $v;
			$this->modifiedColumns[] = ItemPeer::PASSWORD;
		}

		return $this;
	} 
	
	public function setSlug($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->slug !== $v) {
			$this->slug = $v;
			$this->modifiedColumns[] = ItemPeer::SLUG;
		}

		return $this;
	} 
	
	public function setStatusId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->status_id !== $v) {
			$this->status_id = $v;
			$this->modifiedColumns[] = ItemPeer::STATUS_ID;
		}

		if ($this->aStatus !== null && $this->aStatus->getId() !== $v) {
			$this->aStatus = null;
		}

		return $this;
	} 
	
	public function setModeId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->mode_id !== $v) {
			$this->mode_id = $v;
			$this->modifiedColumns[] = ItemPeer::MODE_ID;
		}

		if ($this->aMode !== null && $this->aMode->getId() !== $v) {
			$this->aMode = null;
		}

		return $this;
	} 
	
	public function setCustomertypeId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->customertype_id !== $v) {
			$this->customertype_id = $v;
			$this->modifiedColumns[] = ItemPeer::CUSTOMERTYPE_ID;
		}

		if ($this->aCustomerType !== null && $this->aCustomerType->getId() !== $v) {
			$this->aCustomerType = null;
		}

		return $this;
	} 
	
	public function setLocationId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->location_id !== $v) {
			$this->location_id = $v;
			$this->modifiedColumns[] = ItemPeer::LOCATION_ID;
		}

		if ($this->aLocation !== null && $this->aLocation->getId() !== $v) {
			$this->aLocation = null;
		}

		return $this;
	} 
	
	public function setSublocationId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->sublocation_id !== $v) {
			$this->sublocation_id = $v;
			$this->modifiedColumns[] = ItemPeer::SUBLOCATION_ID;
		}

		if ($this->aSubLocation !== null && $this->aSubLocation->getId() !== $v) {
			$this->aSubLocation = null;
		}

		return $this;
	} 
	
	public function setCategoryId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->category_id !== $v) {
			$this->category_id = $v;
			$this->modifiedColumns[] = ItemPeer::CATEGORY_ID;
		}

		if ($this->aCategory !== null && $this->aCategory->getId() !== $v) {
			$this->aCategory = null;
		}

		return $this;
	} 
	
	public function setSubcategoryId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->subcategory_id !== $v) {
			$this->subcategory_id = $v;
			$this->modifiedColumns[] = ItemPeer::SUBCATEGORY_ID;
		}

		if ($this->aSubCategory !== null && $this->aSubCategory->getId() !== $v) {
			$this->aSubCategory = null;
		}

		return $this;
	} 
	
	public function setMilageId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->milage_id !== $v) {
			$this->milage_id = $v;
			$this->modifiedColumns[] = ItemPeer::MILAGE_ID;
		}

		if ($this->aMilage !== null && $this->aMilage->getId() !== $v) {
			$this->aMilage = null;
		}

		return $this;
	} 
	
	public function setGearboxId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->gearbox_id !== $v) {
			$this->gearbox_id = $v;
			$this->modifiedColumns[] = ItemPeer::GEARBOX_ID;
		}

		if ($this->aGearbox !== null && $this->aGearbox->getId() !== $v) {
			$this->aGearbox = null;
		}

		return $this;
	} 
	
	public function setYearmodelId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->yearmodel_id !== $v) {
			$this->yearmodel_id = $v;
			$this->modifiedColumns[] = ItemPeer::YEARMODEL_ID;
		}

		if ($this->aYearmodel !== null && $this->aYearmodel->getId() !== $v) {
			$this->aYearmodel = null;
		}

		return $this;
	} 
	
	public function setFuelId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fuel_id !== $v) {
			$this->fuel_id = $v;
			$this->modifiedColumns[] = ItemPeer::FUEL_ID;
		}

		if ($this->aFuel !== null && $this->aFuel->getId() !== $v) {
			$this->aFuel = null;
		}

		return $this;
	} 
	
	public function setRoomId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->room_id !== $v) {
			$this->room_id = $v;
			$this->modifiedColumns[] = ItemPeer::ROOM_ID;
		}

		if ($this->aRoom !== null && $this->aRoom->getId() !== $v) {
			$this->aRoom = null;
		}

		return $this;
	} 
	
	public function setLength($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->length !== $v) {
			$this->length = $v;
			$this->modifiedColumns[] = ItemPeer::LENGTH;
		}

		return $this;
	} 
	
	public function setArea($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->area !== $v) {
			$this->area = $v;
			$this->modifiedColumns[] = ItemPeer::AREA;
		}

		return $this;
	} 
	
	public function setStreet($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->street !== $v) {
			$this->street = $v;
			$this->modifiedColumns[] = ItemPeer::STREET;
		}

		return $this;
	} 
	
	public function setRent($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->rent !== $v) {
			$this->rent = $v;
			$this->modifiedColumns[] = ItemPeer::RENT;
		}

		return $this;
	} 
	
	public function setPostalcode($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->postalcode !== $v) {
			$this->postalcode = $v;
			$this->modifiedColumns[] = ItemPeer::POSTALCODE;
		}

		return $this;
	} 
	
	public function setNrOfExpirationReminders($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->nr_of_expiration_reminders !== $v) {
			$this->nr_of_expiration_reminders = $v;
			$this->modifiedColumns[] = ItemPeer::NR_OF_EXPIRATION_REMINDERS;
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
			$this->email = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->phone = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->title = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->body = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->site = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->price = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->created_at = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->approved_at = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->valid_until = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->updated_at = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->password = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->slug = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->status_id = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
			$this->mode_id = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
			$this->customertype_id = ($row[$startcol + 16] !== null) ? (int) $row[$startcol + 16] : null;
			$this->location_id = ($row[$startcol + 17] !== null) ? (int) $row[$startcol + 17] : null;
			$this->sublocation_id = ($row[$startcol + 18] !== null) ? (int) $row[$startcol + 18] : null;
			$this->category_id = ($row[$startcol + 19] !== null) ? (int) $row[$startcol + 19] : null;
			$this->subcategory_id = ($row[$startcol + 20] !== null) ? (int) $row[$startcol + 20] : null;
			$this->milage_id = ($row[$startcol + 21] !== null) ? (int) $row[$startcol + 21] : null;
			$this->gearbox_id = ($row[$startcol + 22] !== null) ? (int) $row[$startcol + 22] : null;
			$this->yearmodel_id = ($row[$startcol + 23] !== null) ? (int) $row[$startcol + 23] : null;
			$this->fuel_id = ($row[$startcol + 24] !== null) ? (int) $row[$startcol + 24] : null;
			$this->room_id = ($row[$startcol + 25] !== null) ? (int) $row[$startcol + 25] : null;
			$this->length = ($row[$startcol + 26] !== null) ? (int) $row[$startcol + 26] : null;
			$this->area = ($row[$startcol + 27] !== null) ? (int) $row[$startcol + 27] : null;
			$this->street = ($row[$startcol + 28] !== null) ? (string) $row[$startcol + 28] : null;
			$this->rent = ($row[$startcol + 29] !== null) ? (int) $row[$startcol + 29] : null;
			$this->postalcode = ($row[$startcol + 30] !== null) ? (string) $row[$startcol + 30] : null;
			$this->nr_of_expiration_reminders = ($row[$startcol + 31] !== null) ? (int) $row[$startcol + 31] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 32; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Item object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aStatus !== null && $this->status_id !== $this->aStatus->getId()) {
			$this->aStatus = null;
		}
		if ($this->aMode !== null && $this->mode_id !== $this->aMode->getId()) {
			$this->aMode = null;
		}
		if ($this->aCustomerType !== null && $this->customertype_id !== $this->aCustomerType->getId()) {
			$this->aCustomerType = null;
		}
		if ($this->aLocation !== null && $this->location_id !== $this->aLocation->getId()) {
			$this->aLocation = null;
		}
		if ($this->aSubLocation !== null && $this->sublocation_id !== $this->aSubLocation->getId()) {
			$this->aSubLocation = null;
		}
		if ($this->aCategory !== null && $this->category_id !== $this->aCategory->getId()) {
			$this->aCategory = null;
		}
		if ($this->aSubCategory !== null && $this->subcategory_id !== $this->aSubCategory->getId()) {
			$this->aSubCategory = null;
		}
		if ($this->aMilage !== null && $this->milage_id !== $this->aMilage->getId()) {
			$this->aMilage = null;
		}
		if ($this->aGearbox !== null && $this->gearbox_id !== $this->aGearbox->getId()) {
			$this->aGearbox = null;
		}
		if ($this->aYearmodel !== null && $this->yearmodel_id !== $this->aYearmodel->getId()) {
			$this->aYearmodel = null;
		}
		if ($this->aFuel !== null && $this->fuel_id !== $this->aFuel->getId()) {
			$this->aFuel = null;
		}
		if ($this->aRoom !== null && $this->room_id !== $this->aRoom->getId()) {
			$this->aRoom = null;
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
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = ItemPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aStatus = null;
			$this->aMode = null;
			$this->aCustomerType = null;
			$this->aLocation = null;
			$this->aSubLocation = null;
			$this->aCategory = null;
			$this->aSubCategory = null;
			$this->aMilage = null;
			$this->aGearbox = null;
			$this->aYearmodel = null;
			$this->aFuel = null;
			$this->aRoom = null;
			$this->collImages = null;
			$this->lastImageCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			ItemPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	
	public function save(PropelPDO $con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(ItemPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(ItemPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			ItemPeer::addInstanceToPool($this);
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

												
			if ($this->aStatus !== null) {
				if ($this->aStatus->isModified() || $this->aStatus->isNew()) {
					$affectedRows += $this->aStatus->save($con);
				}
				$this->setStatus($this->aStatus);
			}

			if ($this->aMode !== null) {
				if ($this->aMode->isModified() || ($this->aMode->getCulture() && $this->aMode->getCurrentModeI18n()->isModified()) || $this->aMode->isNew()) {
					$affectedRows += $this->aMode->save($con);
				}
				$this->setMode($this->aMode);
			}

			if ($this->aCustomerType !== null) {
				if ($this->aCustomerType->isModified() || ($this->aCustomerType->getCulture() && $this->aCustomerType->getCurrentCustomerTypeI18n()->isModified()) || $this->aCustomerType->isNew()) {
					$affectedRows += $this->aCustomerType->save($con);
				}
				$this->setCustomerType($this->aCustomerType);
			}

			if ($this->aLocation !== null) {
				if ($this->aLocation->isModified() || ($this->aLocation->getCulture() && $this->aLocation->getCurrentLocationI18n()->isModified()) || $this->aLocation->isNew()) {
					$affectedRows += $this->aLocation->save($con);
				}
				$this->setLocation($this->aLocation);
			}

			if ($this->aSubLocation !== null) {
				if ($this->aSubLocation->isModified() || ($this->aSubLocation->getCulture() && $this->aSubLocation->getCurrentSubLocationI18n()->isModified()) || $this->aSubLocation->isNew()) {
					$affectedRows += $this->aSubLocation->save($con);
				}
				$this->setSubLocation($this->aSubLocation);
			}

			if ($this->aCategory !== null) {
				if ($this->aCategory->isModified() || ($this->aCategory->getCulture() && $this->aCategory->getCurrentCategoryI18n()->isModified()) || $this->aCategory->isNew()) {
					$affectedRows += $this->aCategory->save($con);
				}
				$this->setCategory($this->aCategory);
			}

			if ($this->aSubCategory !== null) {
				if ($this->aSubCategory->isModified() || ($this->aSubCategory->getCulture() && $this->aSubCategory->getCurrentSubCategoryI18n()->isModified()) || $this->aSubCategory->isNew()) {
					$affectedRows += $this->aSubCategory->save($con);
				}
				$this->setSubCategory($this->aSubCategory);
			}

			if ($this->aMilage !== null) {
				if ($this->aMilage->isModified() || ($this->aMilage->getCulture() && $this->aMilage->getCurrentMilageI18n()->isModified()) || $this->aMilage->isNew()) {
					$affectedRows += $this->aMilage->save($con);
				}
				$this->setMilage($this->aMilage);
			}

			if ($this->aGearbox !== null) {
				if ($this->aGearbox->isModified() || ($this->aGearbox->getCulture() && $this->aGearbox->getCurrentGearboxI18n()->isModified()) || $this->aGearbox->isNew()) {
					$affectedRows += $this->aGearbox->save($con);
				}
				$this->setGearbox($this->aGearbox);
			}

			if ($this->aYearmodel !== null) {
				if ($this->aYearmodel->isModified() || ($this->aYearmodel->getCulture() && $this->aYearmodel->getCurrentYearmodelI18n()->isModified()) || $this->aYearmodel->isNew()) {
					$affectedRows += $this->aYearmodel->save($con);
				}
				$this->setYearmodel($this->aYearmodel);
			}

			if ($this->aFuel !== null) {
				if ($this->aFuel->isModified() || ($this->aFuel->getCulture() && $this->aFuel->getCurrentFuelI18n()->isModified()) || $this->aFuel->isNew()) {
					$affectedRows += $this->aFuel->save($con);
				}
				$this->setFuel($this->aFuel);
			}

			if ($this->aRoom !== null) {
				if ($this->aRoom->isModified() || ($this->aRoom->getCulture() && $this->aRoom->getCurrentRoomI18n()->isModified()) || $this->aRoom->isNew()) {
					$affectedRows += $this->aRoom->save($con);
				}
				$this->setRoom($this->aRoom);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = ItemPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ItemPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ItemPeer::doUpdate($this, $con);
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


												
			if ($this->aStatus !== null) {
				if (!$this->aStatus->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aStatus->getValidationFailures());
				}
			}

			if ($this->aMode !== null) {
				if (!$this->aMode->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aMode->getValidationFailures());
				}
			}

			if ($this->aCustomerType !== null) {
				if (!$this->aCustomerType->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCustomerType->getValidationFailures());
				}
			}

			if ($this->aLocation !== null) {
				if (!$this->aLocation->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLocation->getValidationFailures());
				}
			}

			if ($this->aSubLocation !== null) {
				if (!$this->aSubLocation->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSubLocation->getValidationFailures());
				}
			}

			if ($this->aCategory !== null) {
				if (!$this->aCategory->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCategory->getValidationFailures());
				}
			}

			if ($this->aSubCategory !== null) {
				if (!$this->aSubCategory->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSubCategory->getValidationFailures());
				}
			}

			if ($this->aMilage !== null) {
				if (!$this->aMilage->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aMilage->getValidationFailures());
				}
			}

			if ($this->aGearbox !== null) {
				if (!$this->aGearbox->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aGearbox->getValidationFailures());
				}
			}

			if ($this->aYearmodel !== null) {
				if (!$this->aYearmodel->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aYearmodel->getValidationFailures());
				}
			}

			if ($this->aFuel !== null) {
				if (!$this->aFuel->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFuel->getValidationFailures());
				}
			}

			if ($this->aRoom !== null) {
				if (!$this->aRoom->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aRoom->getValidationFailures());
				}
			}


			if (($retval = ItemPeer::doValidate($this, $columns)) !== true) {
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
		$pos = ItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getEmail();
				break;
			case 3:
				return $this->getPhone();
				break;
			case 4:
				return $this->getTitle();
				break;
			case 5:
				return $this->getBody();
				break;
			case 6:
				return $this->getSite();
				break;
			case 7:
				return $this->getPrice();
				break;
			case 8:
				return $this->getCreatedAt();
				break;
			case 9:
				return $this->getApprovedAt();
				break;
			case 10:
				return $this->getValidUntil();
				break;
			case 11:
				return $this->getUpdatedAt();
				break;
			case 12:
				return $this->getPassword();
				break;
			case 13:
				return $this->getSlug();
				break;
			case 14:
				return $this->getStatusId();
				break;
			case 15:
				return $this->getModeId();
				break;
			case 16:
				return $this->getCustomertypeId();
				break;
			case 17:
				return $this->getLocationId();
				break;
			case 18:
				return $this->getSublocationId();
				break;
			case 19:
				return $this->getCategoryId();
				break;
			case 20:
				return $this->getSubcategoryId();
				break;
			case 21:
				return $this->getMilageId();
				break;
			case 22:
				return $this->getGearboxId();
				break;
			case 23:
				return $this->getYearmodelId();
				break;
			case 24:
				return $this->getFuelId();
				break;
			case 25:
				return $this->getRoomId();
				break;
			case 26:
				return $this->getLength();
				break;
			case 27:
				return $this->getArea();
				break;
			case 28:
				return $this->getStreet();
				break;
			case 29:
				return $this->getRent();
				break;
			case 30:
				return $this->getPostalcode();
				break;
			case 31:
				return $this->getNrOfExpirationReminders();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = ItemPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getEmail(),
			$keys[3] => $this->getPhone(),
			$keys[4] => $this->getTitle(),
			$keys[5] => $this->getBody(),
			$keys[6] => $this->getSite(),
			$keys[7] => $this->getPrice(),
			$keys[8] => $this->getCreatedAt(),
			$keys[9] => $this->getApprovedAt(),
			$keys[10] => $this->getValidUntil(),
			$keys[11] => $this->getUpdatedAt(),
			$keys[12] => $this->getPassword(),
			$keys[13] => $this->getSlug(),
			$keys[14] => $this->getStatusId(),
			$keys[15] => $this->getModeId(),
			$keys[16] => $this->getCustomertypeId(),
			$keys[17] => $this->getLocationId(),
			$keys[18] => $this->getSublocationId(),
			$keys[19] => $this->getCategoryId(),
			$keys[20] => $this->getSubcategoryId(),
			$keys[21] => $this->getMilageId(),
			$keys[22] => $this->getGearboxId(),
			$keys[23] => $this->getYearmodelId(),
			$keys[24] => $this->getFuelId(),
			$keys[25] => $this->getRoomId(),
			$keys[26] => $this->getLength(),
			$keys[27] => $this->getArea(),
			$keys[28] => $this->getStreet(),
			$keys[29] => $this->getRent(),
			$keys[30] => $this->getPostalcode(),
			$keys[31] => $this->getNrOfExpirationReminders(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setEmail($value);
				break;
			case 3:
				$this->setPhone($value);
				break;
			case 4:
				$this->setTitle($value);
				break;
			case 5:
				$this->setBody($value);
				break;
			case 6:
				$this->setSite($value);
				break;
			case 7:
				$this->setPrice($value);
				break;
			case 8:
				$this->setCreatedAt($value);
				break;
			case 9:
				$this->setApprovedAt($value);
				break;
			case 10:
				$this->setValidUntil($value);
				break;
			case 11:
				$this->setUpdatedAt($value);
				break;
			case 12:
				$this->setPassword($value);
				break;
			case 13:
				$this->setSlug($value);
				break;
			case 14:
				$this->setStatusId($value);
				break;
			case 15:
				$this->setModeId($value);
				break;
			case 16:
				$this->setCustomertypeId($value);
				break;
			case 17:
				$this->setLocationId($value);
				break;
			case 18:
				$this->setSublocationId($value);
				break;
			case 19:
				$this->setCategoryId($value);
				break;
			case 20:
				$this->setSubcategoryId($value);
				break;
			case 21:
				$this->setMilageId($value);
				break;
			case 22:
				$this->setGearboxId($value);
				break;
			case 23:
				$this->setYearmodelId($value);
				break;
			case 24:
				$this->setFuelId($value);
				break;
			case 25:
				$this->setRoomId($value);
				break;
			case 26:
				$this->setLength($value);
				break;
			case 27:
				$this->setArea($value);
				break;
			case 28:
				$this->setStreet($value);
				break;
			case 29:
				$this->setRent($value);
				break;
			case 30:
				$this->setPostalcode($value);
				break;
			case 31:
				$this->setNrOfExpirationReminders($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ItemPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEmail($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPhone($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTitle($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setBody($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setSite($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPrice($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCreatedAt($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setApprovedAt($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setValidUntil($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUpdatedAt($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setPassword($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setSlug($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setStatusId($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setModeId($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCustomertypeId($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setLocationId($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setSublocationId($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCategoryId($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setSubcategoryId($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setMilageId($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setGearboxId($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setYearmodelId($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setFuelId($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setRoomId($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setLength($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setArea($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setStreet($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setRent($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setPostalcode($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setNrOfExpirationReminders($arr[$keys[31]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ItemPeer::DATABASE_NAME);

		if ($this->isColumnModified(ItemPeer::ID)) $criteria->add(ItemPeer::ID, $this->id);
		if ($this->isColumnModified(ItemPeer::NAME)) $criteria->add(ItemPeer::NAME, $this->name);
		if ($this->isColumnModified(ItemPeer::EMAIL)) $criteria->add(ItemPeer::EMAIL, $this->email);
		if ($this->isColumnModified(ItemPeer::PHONE)) $criteria->add(ItemPeer::PHONE, $this->phone);
		if ($this->isColumnModified(ItemPeer::TITLE)) $criteria->add(ItemPeer::TITLE, $this->title);
		if ($this->isColumnModified(ItemPeer::BODY)) $criteria->add(ItemPeer::BODY, $this->body);
		if ($this->isColumnModified(ItemPeer::SITE)) $criteria->add(ItemPeer::SITE, $this->site);
		if ($this->isColumnModified(ItemPeer::PRICE)) $criteria->add(ItemPeer::PRICE, $this->price);
		if ($this->isColumnModified(ItemPeer::CREATED_AT)) $criteria->add(ItemPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(ItemPeer::APPROVED_AT)) $criteria->add(ItemPeer::APPROVED_AT, $this->approved_at);
		if ($this->isColumnModified(ItemPeer::VALID_UNTIL)) $criteria->add(ItemPeer::VALID_UNTIL, $this->valid_until);
		if ($this->isColumnModified(ItemPeer::UPDATED_AT)) $criteria->add(ItemPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(ItemPeer::PASSWORD)) $criteria->add(ItemPeer::PASSWORD, $this->password);
		if ($this->isColumnModified(ItemPeer::SLUG)) $criteria->add(ItemPeer::SLUG, $this->slug);
		if ($this->isColumnModified(ItemPeer::STATUS_ID)) $criteria->add(ItemPeer::STATUS_ID, $this->status_id);
		if ($this->isColumnModified(ItemPeer::MODE_ID)) $criteria->add(ItemPeer::MODE_ID, $this->mode_id);
		if ($this->isColumnModified(ItemPeer::CUSTOMERTYPE_ID)) $criteria->add(ItemPeer::CUSTOMERTYPE_ID, $this->customertype_id);
		if ($this->isColumnModified(ItemPeer::LOCATION_ID)) $criteria->add(ItemPeer::LOCATION_ID, $this->location_id);
		if ($this->isColumnModified(ItemPeer::SUBLOCATION_ID)) $criteria->add(ItemPeer::SUBLOCATION_ID, $this->sublocation_id);
		if ($this->isColumnModified(ItemPeer::CATEGORY_ID)) $criteria->add(ItemPeer::CATEGORY_ID, $this->category_id);
		if ($this->isColumnModified(ItemPeer::SUBCATEGORY_ID)) $criteria->add(ItemPeer::SUBCATEGORY_ID, $this->subcategory_id);
		if ($this->isColumnModified(ItemPeer::MILAGE_ID)) $criteria->add(ItemPeer::MILAGE_ID, $this->milage_id);
		if ($this->isColumnModified(ItemPeer::GEARBOX_ID)) $criteria->add(ItemPeer::GEARBOX_ID, $this->gearbox_id);
		if ($this->isColumnModified(ItemPeer::YEARMODEL_ID)) $criteria->add(ItemPeer::YEARMODEL_ID, $this->yearmodel_id);
		if ($this->isColumnModified(ItemPeer::FUEL_ID)) $criteria->add(ItemPeer::FUEL_ID, $this->fuel_id);
		if ($this->isColumnModified(ItemPeer::ROOM_ID)) $criteria->add(ItemPeer::ROOM_ID, $this->room_id);
		if ($this->isColumnModified(ItemPeer::LENGTH)) $criteria->add(ItemPeer::LENGTH, $this->length);
		if ($this->isColumnModified(ItemPeer::AREA)) $criteria->add(ItemPeer::AREA, $this->area);
		if ($this->isColumnModified(ItemPeer::STREET)) $criteria->add(ItemPeer::STREET, $this->street);
		if ($this->isColumnModified(ItemPeer::RENT)) $criteria->add(ItemPeer::RENT, $this->rent);
		if ($this->isColumnModified(ItemPeer::POSTALCODE)) $criteria->add(ItemPeer::POSTALCODE, $this->postalcode);
		if ($this->isColumnModified(ItemPeer::NR_OF_EXPIRATION_REMINDERS)) $criteria->add(ItemPeer::NR_OF_EXPIRATION_REMINDERS, $this->nr_of_expiration_reminders);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ItemPeer::DATABASE_NAME);

		$criteria->add(ItemPeer::ID, $this->id);

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

		$copyObj->setEmail($this->email);

		$copyObj->setPhone($this->phone);

		$copyObj->setTitle($this->title);

		$copyObj->setBody($this->body);

		$copyObj->setSite($this->site);

		$copyObj->setPrice($this->price);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setApprovedAt($this->approved_at);

		$copyObj->setValidUntil($this->valid_until);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setPassword($this->password);

		$copyObj->setSlug($this->slug);

		$copyObj->setStatusId($this->status_id);

		$copyObj->setModeId($this->mode_id);

		$copyObj->setCustomertypeId($this->customertype_id);

		$copyObj->setLocationId($this->location_id);

		$copyObj->setSublocationId($this->sublocation_id);

		$copyObj->setCategoryId($this->category_id);

		$copyObj->setSubcategoryId($this->subcategory_id);

		$copyObj->setMilageId($this->milage_id);

		$copyObj->setGearboxId($this->gearbox_id);

		$copyObj->setYearmodelId($this->yearmodel_id);

		$copyObj->setFuelId($this->fuel_id);

		$copyObj->setRoomId($this->room_id);

		$copyObj->setLength($this->length);

		$copyObj->setArea($this->area);

		$copyObj->setStreet($this->street);

		$copyObj->setRent($this->rent);

		$copyObj->setPostalcode($this->postalcode);

		$copyObj->setNrOfExpirationReminders($this->nr_of_expiration_reminders);


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
			self::$peer = new ItemPeer();
		}
		return self::$peer;
	}

	
	public function setStatus(Status $v = null)
	{
		if ($v === null) {
			$this->setStatusId(NULL);
		} else {
			$this->setStatusId($v->getId());
		}

		$this->aStatus = $v;

						if ($v !== null) {
			$v->addItem($this);
		}

		return $this;
	}


	
	public function getStatus(PropelPDO $con = null)
	{
		if ($this->aStatus === null && ($this->status_id !== null)) {
			$c = new Criteria(StatusPeer::DATABASE_NAME);
			$c->add(StatusPeer::ID, $this->status_id);
			$this->aStatus = StatusPeer::doSelectOne($c, $con);
			
		}
		return $this->aStatus;
	}

	
	public function setMode(Mode $v = null)
	{
		if ($v === null) {
			$this->setModeId(NULL);
		} else {
			$this->setModeId($v->getId());
		}

		$this->aMode = $v;

						if ($v !== null) {
			$v->addItem($this);
		}

		return $this;
	}


	
	public function getMode(PropelPDO $con = null)
	{
		if ($this->aMode === null && ($this->mode_id !== null)) {
			$c = new Criteria(ModePeer::DATABASE_NAME);
			$c->add(ModePeer::ID, $this->mode_id);
			$this->aMode = ModePeer::doSelectOne($c, $con);
			
		}
		return $this->aMode;
	}

	
	public function setCustomerType(CustomerType $v = null)
	{
		if ($v === null) {
			$this->setCustomertypeId(NULL);
		} else {
			$this->setCustomertypeId($v->getId());
		}

		$this->aCustomerType = $v;

						if ($v !== null) {
			$v->addItem($this);
		}

		return $this;
	}


	
	public function getCustomerType(PropelPDO $con = null)
	{
		if ($this->aCustomerType === null && ($this->customertype_id !== null)) {
			$c = new Criteria(CustomerTypePeer::DATABASE_NAME);
			$c->add(CustomerTypePeer::ID, $this->customertype_id);
			$this->aCustomerType = CustomerTypePeer::doSelectOne($c, $con);
			
		}
		return $this->aCustomerType;
	}

	
	public function setLocation(Location $v = null)
	{
		if ($v === null) {
			$this->setLocationId(NULL);
		} else {
			$this->setLocationId($v->getId());
		}

		$this->aLocation = $v;

						if ($v !== null) {
			$v->addItem($this);
		}

		return $this;
	}


	
	public function getLocation(PropelPDO $con = null)
	{
		if ($this->aLocation === null && ($this->location_id !== null)) {
			$c = new Criteria(LocationPeer::DATABASE_NAME);
			$c->add(LocationPeer::ID, $this->location_id);
			$this->aLocation = LocationPeer::doSelectOne($c, $con);
			
		}
		return $this->aLocation;
	}

	
	public function setSubLocation(SubLocation $v = null)
	{
		if ($v === null) {
			$this->setSublocationId(NULL);
		} else {
			$this->setSublocationId($v->getId());
		}

		$this->aSubLocation = $v;

						if ($v !== null) {
			$v->addItem($this);
		}

		return $this;
	}


	
	public function getSubLocation(PropelPDO $con = null)
	{
		if ($this->aSubLocation === null && ($this->sublocation_id !== null)) {
			$c = new Criteria(SubLocationPeer::DATABASE_NAME);
			$c->add(SubLocationPeer::ID, $this->sublocation_id);
			$this->aSubLocation = SubLocationPeer::doSelectOne($c, $con);
			
		}
		return $this->aSubLocation;
	}

	
	public function setCategory(Category $v = null)
	{
		if ($v === null) {
			$this->setCategoryId(NULL);
		} else {
			$this->setCategoryId($v->getId());
		}

		$this->aCategory = $v;

						if ($v !== null) {
			$v->addItem($this);
		}

		return $this;
	}


	
	public function getCategory(PropelPDO $con = null)
	{
		if ($this->aCategory === null && ($this->category_id !== null)) {
			$c = new Criteria(CategoryPeer::DATABASE_NAME);
			$c->add(CategoryPeer::ID, $this->category_id);
			$this->aCategory = CategoryPeer::doSelectOne($c, $con);
			
		}
		return $this->aCategory;
	}

	
	public function setSubCategory(SubCategory $v = null)
	{
		if ($v === null) {
			$this->setSubcategoryId(NULL);
		} else {
			$this->setSubcategoryId($v->getId());
		}

		$this->aSubCategory = $v;

						if ($v !== null) {
			$v->addItem($this);
		}

		return $this;
	}


	
	public function getSubCategory(PropelPDO $con = null)
	{
		if ($this->aSubCategory === null && ($this->subcategory_id !== null)) {
			$c = new Criteria(SubCategoryPeer::DATABASE_NAME);
			$c->add(SubCategoryPeer::ID, $this->subcategory_id);
			$this->aSubCategory = SubCategoryPeer::doSelectOne($c, $con);
			
		}
		return $this->aSubCategory;
	}

	
	public function setMilage(Milage $v = null)
	{
		if ($v === null) {
			$this->setMilageId(NULL);
		} else {
			$this->setMilageId($v->getId());
		}

		$this->aMilage = $v;

						if ($v !== null) {
			$v->addItem($this);
		}

		return $this;
	}


	
	public function getMilage(PropelPDO $con = null)
	{
		if ($this->aMilage === null && ($this->milage_id !== null)) {
			$c = new Criteria(MilagePeer::DATABASE_NAME);
			$c->add(MilagePeer::ID, $this->milage_id);
			$this->aMilage = MilagePeer::doSelectOne($c, $con);
			
		}
		return $this->aMilage;
	}

	
	public function setGearbox(Gearbox $v = null)
	{
		if ($v === null) {
			$this->setGearboxId(NULL);
		} else {
			$this->setGearboxId($v->getId());
		}

		$this->aGearbox = $v;

						if ($v !== null) {
			$v->addItem($this);
		}

		return $this;
	}


	
	public function getGearbox(PropelPDO $con = null)
	{
		if ($this->aGearbox === null && ($this->gearbox_id !== null)) {
			$c = new Criteria(GearboxPeer::DATABASE_NAME);
			$c->add(GearboxPeer::ID, $this->gearbox_id);
			$this->aGearbox = GearboxPeer::doSelectOne($c, $con);
			
		}
		return $this->aGearbox;
	}

	
	public function setYearmodel(Yearmodel $v = null)
	{
		if ($v === null) {
			$this->setYearmodelId(NULL);
		} else {
			$this->setYearmodelId($v->getId());
		}

		$this->aYearmodel = $v;

						if ($v !== null) {
			$v->addItem($this);
		}

		return $this;
	}


	
	public function getYearmodel(PropelPDO $con = null)
	{
		if ($this->aYearmodel === null && ($this->yearmodel_id !== null)) {
			$c = new Criteria(YearmodelPeer::DATABASE_NAME);
			$c->add(YearmodelPeer::ID, $this->yearmodel_id);
			$this->aYearmodel = YearmodelPeer::doSelectOne($c, $con);
			
		}
		return $this->aYearmodel;
	}

	
	public function setFuel(Fuel $v = null)
	{
		if ($v === null) {
			$this->setFuelId(NULL);
		} else {
			$this->setFuelId($v->getId());
		}

		$this->aFuel = $v;

						if ($v !== null) {
			$v->addItem($this);
		}

		return $this;
	}


	
	public function getFuel(PropelPDO $con = null)
	{
		if ($this->aFuel === null && ($this->fuel_id !== null)) {
			$c = new Criteria(FuelPeer::DATABASE_NAME);
			$c->add(FuelPeer::ID, $this->fuel_id);
			$this->aFuel = FuelPeer::doSelectOne($c, $con);
			
		}
		return $this->aFuel;
	}

	
	public function setRoom(Room $v = null)
	{
		if ($v === null) {
			$this->setRoomId(NULL);
		} else {
			$this->setRoomId($v->getId());
		}

		$this->aRoom = $v;

						if ($v !== null) {
			$v->addItem($this);
		}

		return $this;
	}


	
	public function getRoom(PropelPDO $con = null)
	{
		if ($this->aRoom === null && ($this->room_id !== null)) {
			$c = new Criteria(RoomPeer::DATABASE_NAME);
			$c->add(RoomPeer::ID, $this->room_id);
			$this->aRoom = RoomPeer::doSelectOne($c, $con);
			
		}
		return $this->aRoom;
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
			$criteria = new Criteria(ItemPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collImages === null) {
			if ($this->isNew()) {
			   $this->collImages = array();
			} else {

				$criteria->add(ImagePeer::ITEMID, $this->id);

				ImagePeer::addSelectColumns($criteria);
				$this->collImages = ImagePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ImagePeer::ITEMID, $this->id);

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
			$criteria = new Criteria(ItemPeer::DATABASE_NAME);
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

				$criteria->add(ImagePeer::ITEMID, $this->id);

				$count = ImagePeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ImagePeer::ITEMID, $this->id);

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
			$l->setItem($this);
		}
	}


	
	public function getImagesJoinImageType($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ItemPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collImages === null) {
			if ($this->isNew()) {
				$this->collImages = array();
			} else {

				$criteria->add(ImagePeer::ITEMID, $this->id);

				$this->collImages = ImagePeer::doSelectJoinImageType($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ImagePeer::ITEMID, $this->id);

			if (!isset($this->lastImageCriteria) || !$this->lastImageCriteria->equals($criteria)) {
				$this->collImages = ImagePeer::doSelectJoinImageType($criteria, $con, $join_behavior);
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
			$this->aStatus = null;
			$this->aMode = null;
			$this->aCustomerType = null;
			$this->aLocation = null;
			$this->aSubLocation = null;
			$this->aCategory = null;
			$this->aSubCategory = null;
			$this->aMilage = null;
			$this->aGearbox = null;
			$this->aYearmodel = null;
			$this->aFuel = null;
			$this->aRoom = null;
	}

} 