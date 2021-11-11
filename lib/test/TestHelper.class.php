<?php

class TestHelper
{

static function getRoomByName($value)
{
  $connection = Propel::getConnection();
  $query = 'SELECT id FROM internetbazar_room_i18n where name=?';
  $statement = $connection->prepare($query);
  $statement->bindValue(1, $value);
  $statement->execute();
  $resultset = $statement->fetch(PDO::FETCH_OBJ);
  $id = $resultset->id;
  return $id;
}

static function getCustomertypeByName($value)
{
  $connection = Propel::getConnection();
  $query = 'SELECT id FROM internetbazar_customertype_i18n where description=?';
  $statement = $connection->prepare($query);
  $statement->bindValue(1, $value);
  $statement->execute();
  $resultset = $statement->fetch(PDO::FETCH_OBJ);
  $id = $resultset->id;
  return $id;
}

static function getLocationByName($value)
{
  $connection = Propel::getConnection();
  $query = 'SELECT id FROM internetbazar_location_i18n where name=?';
  $statement = $connection->prepare($query);
  $statement->bindValue(1, $value);
  $statement->execute();
  $resultset = $statement->fetch(PDO::FETCH_OBJ);
  $id = $resultset->id;
  return $id;
}

static function getFuelByName($value)
{
  $connection = Propel::getConnection();
  $query = 'SELECT id FROM internetbazar_fuel_i18n where name=?';
  $statement = $connection->prepare($query);
  $statement->bindValue(1, $value);
  $statement->execute();
  $resultset = $statement->fetch(PDO::FETCH_OBJ);
  $id = $resultset->id;
  return $id;
}

static function getGearboxByName($value)
{
  $connection = Propel::getConnection();
  $query = 'SELECT id FROM internetbazar_gearbox_i18n where name=?';
  $statement = $connection->prepare($query);
  $statement->bindValue(1, $value);
  $statement->execute();
  $resultset = $statement->fetch(PDO::FETCH_OBJ);
  $id = $resultset->id;
  return $id;
}

static function getYearmodelIdByValue($value)
{
  $connection = Propel::getConnection();
  $query = 'SELECT id FROM internetbazar_yearmodel where value=?';
  $statement = $connection->prepare($query);
  $statement->bindValue(1, $value);
  $statement->execute();
  $resultset = $statement->fetch(PDO::FETCH_OBJ);
  $id = $resultset->id;
  return $id;
}

static function getSubCategoryByName ($catName)
{
  $connection = Propel::getConnection();
  $query = 'SELECT id FROM internetbazar_subcategory_i18n where name=?';
  $statement = $connection->prepare($query);
  $statement->bindValue(1, $catName);
  $statement->execute();
  $resultset = $statement->fetch(PDO::FETCH_OBJ);
  $id = $resultset->id;
  return $id;
}

static function getCategoryByName ($catName)
{
  $connection = Propel::getConnection();
  $query = 'SELECT id FROM internetbazar_category_i18n where name=?';
  $statement = $connection->prepare($query);
  $statement->bindValue(1, $catName);
  $statement->execute();
  $resultset = $statement->fetch(PDO::FETCH_OBJ);
  $id = $resultset->id;
  return $id;
}

static function getDefaultStatus ()
{
  $c = new Criteria();    
  $c->add(StatusPeer::DESCRIPTION, 'approved');    
  $status = StatusPeer::doSelectOne($c);
  return $status->getId();
}

static function getStatusByName ($name)
{
  $c = new Criteria();    
  $c->add(StatusPeer::DESCRIPTION, $name);    
  $status = StatusPeer::doSelectOne($c);
  return $status;
}

static function getMode ($themode)
{
  $connection = Propel::getConnection();
  $query = 'SELECT id FROM internetbazar_mode_i18n where culture="en" and description=?';
  $statement = $connection->prepare($query);
  $statement->bindValue(1, $themode);
  $statement->execute();
  $resultset = $statement->fetch(PDO::FETCH_OBJ);
  $id = $resultset->id;
  return $id;
}

}

?>