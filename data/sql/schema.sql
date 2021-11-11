
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- internetbazar_item
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_item`;


CREATE TABLE `internetbazar_item`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100)  NOT NULL,
	`email` VARCHAR(100)  NOT NULL,
	`phone` VARCHAR(100),
	`title` VARCHAR(140)  NOT NULL,
	`body` VARCHAR(2000)  NOT NULL,
	`price` INTEGER  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	`password` VARCHAR(10),
	`status_id` INTEGER,
	`mode_id` INTEGER,
	`customertype_id` INTEGER,
	`location_id` INTEGER  NOT NULL,
	`sublocation_id` INTEGER,
	`category_id` INTEGER  NOT NULL,
	`subcategory_id` INTEGER,
	`milage_id` INTEGER,
	`gearbox_id` INTEGER,
	`yearmodel_id` INTEGER,
	`fuel_id` INTEGER,
	`room_id` INTEGER,
	`length` INTEGER,
	`area` INTEGER,
	`street` VARCHAR(90),
	`rent` INTEGER,
	`postalcode` VARCHAR(10),
	PRIMARY KEY (`id`),
	INDEX `internetbazar_item_FI_1` (`status_id`),
	CONSTRAINT `internetbazar_item_FK_1`
		FOREIGN KEY (`status_id`)
		REFERENCES `internetbazar_status` (`id`),
	INDEX `internetbazar_item_FI_2` (`mode_id`),
	CONSTRAINT `internetbazar_item_FK_2`
		FOREIGN KEY (`mode_id`)
		REFERENCES `internetbazar_mode` (`id`),
	INDEX `internetbazar_item_FI_3` (`customertype_id`),
	CONSTRAINT `internetbazar_item_FK_3`
		FOREIGN KEY (`customertype_id`)
		REFERENCES `internetbazar_customertype` (`id`),
	INDEX `internetbazar_item_FI_4` (`location_id`),
	CONSTRAINT `internetbazar_item_FK_4`
		FOREIGN KEY (`location_id`)
		REFERENCES `internetbazar_location` (`id`),
	INDEX `internetbazar_item_FI_5` (`sublocation_id`),
	CONSTRAINT `internetbazar_item_FK_5`
		FOREIGN KEY (`sublocation_id`)
		REFERENCES `internetbazar_sublocation` (`id`),
	INDEX `internetbazar_item_FI_6` (`category_id`),
	CONSTRAINT `internetbazar_item_FK_6`
		FOREIGN KEY (`category_id`)
		REFERENCES `internetbazar_category` (`id`),
	INDEX `internetbazar_item_FI_7` (`subcategory_id`),
	CONSTRAINT `internetbazar_item_FK_7`
		FOREIGN KEY (`subcategory_id`)
		REFERENCES `internetbazar_subcategory` (`id`),
	INDEX `internetbazar_item_FI_8` (`milage_id`),
	CONSTRAINT `internetbazar_item_FK_8`
		FOREIGN KEY (`milage_id`)
		REFERENCES `internetbazar_milage` (`id`),
	INDEX `internetbazar_item_FI_9` (`gearbox_id`),
	CONSTRAINT `internetbazar_item_FK_9`
		FOREIGN KEY (`gearbox_id`)
		REFERENCES `internetbazar_gearbox` (`id`),
	INDEX `internetbazar_item_FI_10` (`yearmodel_id`),
	CONSTRAINT `internetbazar_item_FK_10`
		FOREIGN KEY (`yearmodel_id`)
		REFERENCES `internetbazar_yearmodel` (`id`),
	INDEX `internetbazar_item_FI_11` (`fuel_id`),
	CONSTRAINT `internetbazar_item_FK_11`
		FOREIGN KEY (`fuel_id`)
		REFERENCES `internetbazar_fuel` (`id`),
	INDEX `internetbazar_item_FI_12` (`room_id`),
	CONSTRAINT `internetbazar_item_FK_12`
		FOREIGN KEY (`room_id`)
		REFERENCES `internetbazar_room` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_image
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_image`;


CREATE TABLE `internetbazar_image`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`itemid` INTEGER  NOT NULL,
	`path` VARCHAR(100)  NOT NULL,
	`imagetype_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `internetbazar_image_U_1` (`itemid`, `path`),
	CONSTRAINT `internetbazar_image_FK_1`
		FOREIGN KEY (`itemid`)
		REFERENCES `internetbazar_item` (`id`),
	INDEX `internetbazar_image_FI_2` (`imagetype_id`),
	CONSTRAINT `internetbazar_image_FK_2`
		FOREIGN KEY (`imagetype_id`)
		REFERENCES `internetbazar_imagetype` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_imagetype
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_imagetype`;


CREATE TABLE `internetbazar_imagetype`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`description` VARCHAR(25),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_category
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_category`;


CREATE TABLE `internetbazar_category`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100)  NOT NULL,
	`supercategory_id` INTEGER,
	`price` VARCHAR(8)  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `internetbazar_category_FI_1` (`supercategory_id`),
	CONSTRAINT `internetbazar_category_FK_1`
		FOREIGN KEY (`supercategory_id`)
		REFERENCES `internetbazar_supercategory` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_supercategory
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_supercategory`;


CREATE TABLE `internetbazar_supercategory`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_subcategory
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_subcategory`;


CREATE TABLE `internetbazar_subcategory`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100)  NOT NULL,
	`category_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `internetbazar_subcategory_FI_1` (`category_id`),
	CONSTRAINT `internetbazar_subcategory_FK_1`
		FOREIGN KEY (`category_id`)
		REFERENCES `internetbazar_category` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_milage
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_milage`;


CREATE TABLE `internetbazar_milage`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(30)  NOT NULL,
	`value` INTEGER  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_gearbox
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_gearbox`;


CREATE TABLE `internetbazar_gearbox`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_yearmodel
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_yearmodel`;


CREATE TABLE `internetbazar_yearmodel`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50)  NOT NULL,
	`value` INTEGER  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_fuel
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_fuel`;


CREATE TABLE `internetbazar_fuel`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_room
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_room`;


CREATE TABLE `internetbazar_room`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(10)  NOT NULL,
	`value` INTEGER  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_location
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_location`;


CREATE TABLE `internetbazar_location`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50)  NOT NULL,
	`connectedTo` VARCHAR(50),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_sublocation
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_sublocation`;


CREATE TABLE `internetbazar_sublocation`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50)  NOT NULL,
	`location_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `internetbazar_sublocation_FI_1` (`location_id`),
	CONSTRAINT `internetbazar_sublocation_FK_1`
		FOREIGN KEY (`location_id`)
		REFERENCES `internetbazar_location` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_mode
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_mode`;


CREATE TABLE `internetbazar_mode`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`description` VARCHAR(25)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_status
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_status`;


CREATE TABLE `internetbazar_status`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`description` VARCHAR(25)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_customertype
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_customertype`;


CREATE TABLE `internetbazar_customertype`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`description` VARCHAR(25)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
