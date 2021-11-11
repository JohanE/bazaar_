
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- internetbazar_ibmail
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_ibmail`;


CREATE TABLE `internetbazar_ibmail`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`email` VARCHAR(100)  NOT NULL,
	`created_at` DATETIME,
	`sendstatus_id` INTEGER,
	PRIMARY KEY (`id`),
	UNIQUE KEY `internetbazar_ibmail_U_1` (`email`),
	KEY `internetbazar_ibmail_I_1`(`id`),
	KEY `internetbazar_ibmail_I_2`(`sendstatus_id`),
	CONSTRAINT `internetbazar_ibmail_FK_1`
		FOREIGN KEY (`sendstatus_id`)
		REFERENCES `internetbazar_sendstatus` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_sendstatus
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_sendstatus`;


CREATE TABLE `internetbazar_sendstatus`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`description` VARCHAR(25)  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `internetbazar_sendstatus_I_1`(`id`)
)Type=InnoDB;

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
	`title` VARCHAR(100)  NOT NULL,
	`body` VARCHAR(2000)  NOT NULL,
	`site` VARCHAR(60),
	`price` INTEGER  NOT NULL,
	`created_at` DATETIME,
	`approved_at` DATETIME,
	`valid_until` DATETIME,
	`updated_at` DATETIME,
	`password` VARCHAR(10),
	`slug` VARCHAR(100),
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
	`nr_of_expiration_reminders` SMALLINT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `internetbazar_item_U_1` (`slug`),
	KEY `internetbazar_item_I_1`(`id`),
	KEY `internetbazar_item_I_2`(`title`),
	KEY `internetbazar_item_I_3`(`price`),
	KEY `internetbazar_item_I_4`(`status_id`),
	KEY `internetbazar_item_I_5`(`mode_id`),
	KEY `internetbazar_item_I_6`(`customertype_id`),
	KEY `internetbazar_item_I_7`(`location_id`),
	KEY `internetbazar_item_I_8`(`sublocation_id`),
	KEY `internetbazar_item_I_9`(`category_id`),
	KEY `internetbazar_item_I_10`(`subcategory_id`),
	KEY `internetbazar_item_I_11`(`milage_id`),
	KEY `internetbazar_item_I_12`(`gearbox_id`),
	KEY `internetbazar_item_I_13`(`yearmodel_id`),
	KEY `internetbazar_item_I_14`(`fuel_id`),
	KEY `internetbazar_item_I_15`(`room_id`),
	CONSTRAINT `internetbazar_item_FK_1`
		FOREIGN KEY (`status_id`)
		REFERENCES `internetbazar_status` (`id`),
	CONSTRAINT `internetbazar_item_FK_2`
		FOREIGN KEY (`mode_id`)
		REFERENCES `internetbazar_mode` (`id`),
	CONSTRAINT `internetbazar_item_FK_3`
		FOREIGN KEY (`customertype_id`)
		REFERENCES `internetbazar_customertype` (`id`),
	CONSTRAINT `internetbazar_item_FK_4`
		FOREIGN KEY (`location_id`)
		REFERENCES `internetbazar_location` (`id`),
	CONSTRAINT `internetbazar_item_FK_5`
		FOREIGN KEY (`sublocation_id`)
		REFERENCES `internetbazar_sublocation` (`id`),
	CONSTRAINT `internetbazar_item_FK_6`
		FOREIGN KEY (`category_id`)
		REFERENCES `internetbazar_category` (`id`),
	CONSTRAINT `internetbazar_item_FK_7`
		FOREIGN KEY (`subcategory_id`)
		REFERENCES `internetbazar_subcategory` (`id`),
	CONSTRAINT `internetbazar_item_FK_8`
		FOREIGN KEY (`milage_id`)
		REFERENCES `internetbazar_milage` (`id`),
	CONSTRAINT `internetbazar_item_FK_9`
		FOREIGN KEY (`gearbox_id`)
		REFERENCES `internetbazar_gearbox` (`id`),
	CONSTRAINT `internetbazar_item_FK_10`
		FOREIGN KEY (`yearmodel_id`)
		REFERENCES `internetbazar_yearmodel` (`id`),
	CONSTRAINT `internetbazar_item_FK_11`
		FOREIGN KEY (`fuel_id`)
		REFERENCES `internetbazar_fuel` (`id`),
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
	UNIQUE KEY `internetbazar_image_U_1` (`id`),
	UNIQUE KEY `internetbazar_image_U_2` (`itemid`, `path`, `imagetype_id`),
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
	PRIMARY KEY (`id`),
	KEY `internetbazar_imagetype_I_1`(`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_category
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_category`;


CREATE TABLE `internetbazar_category`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`supercategory_id` INTEGER,
	`price` VARCHAR(8)  NOT NULL,
	`sort_field` INTEGER,
	PRIMARY KEY (`id`),
	UNIQUE KEY `internetbazar_category_U_1` (`id`),
	KEY `internetbazar_category_I_1`(`supercategory_id`),
	CONSTRAINT `internetbazar_category_FK_1`
		FOREIGN KEY (`supercategory_id`)
		REFERENCES `internetbazar_supercategory` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_category_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_category_i18n`;


CREATE TABLE `internetbazar_category_i18n`
(
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`name` VARCHAR(100)  NOT NULL,
	PRIMARY KEY (`id`,`culture`),
	KEY `internetbazar_category_i18n_I_1`(`id`),
	CONSTRAINT `internetbazar_category_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `internetbazar_category` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_supercategory
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_supercategory`;


CREATE TABLE `internetbazar_supercategory`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`sort_field` INTEGER,
	PRIMARY KEY (`id`),
	KEY `internetbazar_supercategory_I_1`(`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_supercategory_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_supercategory_i18n`;


CREATE TABLE `internetbazar_supercategory_i18n`
(
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`name` VARCHAR(100)  NOT NULL,
	PRIMARY KEY (`id`,`culture`),
	KEY `internetbazar_supercategory_i18n_I_1`(`id`),
	CONSTRAINT `internetbazar_supercategory_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `internetbazar_supercategory` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_subcategory
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_subcategory`;


CREATE TABLE `internetbazar_subcategory`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`category_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `internetbazar_subcategory_I_1`(`id`),
	INDEX `internetbazar_subcategory_FI_1` (`category_id`),
	CONSTRAINT `internetbazar_subcategory_FK_1`
		FOREIGN KEY (`category_id`)
		REFERENCES `internetbazar_category` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_subcategory_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_subcategory_i18n`;


CREATE TABLE `internetbazar_subcategory_i18n`
(
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`name` VARCHAR(100)  NOT NULL,
	PRIMARY KEY (`id`,`culture`),
	KEY `internetbazar_subcategory_i18n_I_1`(`id`),
	CONSTRAINT `internetbazar_subcategory_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `internetbazar_subcategory` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_location
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_location`;


CREATE TABLE `internetbazar_location`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`connected_to` VARCHAR(50),
	PRIMARY KEY (`id`),
	KEY `internetbazar_location_I_1`(`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_location_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_location_i18n`;


CREATE TABLE `internetbazar_location_i18n`
(
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`name` VARCHAR(70)  NOT NULL,
	PRIMARY KEY (`id`,`culture`),
	KEY `internetbazar_location_i18n_I_1`(`id`),
	CONSTRAINT `internetbazar_location_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `internetbazar_location` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_sublocation
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_sublocation`;


CREATE TABLE `internetbazar_sublocation`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`location_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `internetbazar_sublocation_I_1`(`id`),
	INDEX `internetbazar_sublocation_FI_1` (`location_id`),
	CONSTRAINT `internetbazar_sublocation_FK_1`
		FOREIGN KEY (`location_id`)
		REFERENCES `internetbazar_location` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_sublocation_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_sublocation_i18n`;


CREATE TABLE `internetbazar_sublocation_i18n`
(
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`name` VARCHAR(70)  NOT NULL,
	PRIMARY KEY (`id`,`culture`),
	KEY `internetbazar_sublocation_i18n_I_1`(`id`),
	CONSTRAINT `internetbazar_sublocation_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `internetbazar_sublocation` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_milage
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_milage`;


CREATE TABLE `internetbazar_milage`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`value` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `internetbazar_milage_I_1`(`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_milage_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_milage_i18n`;


CREATE TABLE `internetbazar_milage_i18n`
(
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`name` VARCHAR(30)  NOT NULL,
	PRIMARY KEY (`id`,`culture`),
	KEY `internetbazar_milage_i18n_I_1`(`id`),
	CONSTRAINT `internetbazar_milage_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `internetbazar_milage` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_gearbox
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_gearbox`;


CREATE TABLE `internetbazar_gearbox`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	KEY `internetbazar_gearbox_I_1`(`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_gearbox_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_gearbox_i18n`;


CREATE TABLE `internetbazar_gearbox_i18n`
(
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`name` VARCHAR(70)  NOT NULL,
	PRIMARY KEY (`id`,`culture`),
	KEY `internetbazar_gearbox_i18n_I_1`(`id`),
	CONSTRAINT `internetbazar_gearbox_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `internetbazar_gearbox` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_fuel
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_fuel`;


CREATE TABLE `internetbazar_fuel`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	KEY `internetbazar_fuel_I_1`(`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_fuel_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_fuel_i18n`;


CREATE TABLE `internetbazar_fuel_i18n`
(
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`name` VARCHAR(70)  NOT NULL,
	PRIMARY KEY (`id`,`culture`),
	KEY `internetbazar_fuel_i18n_I_1`(`id`),
	CONSTRAINT `internetbazar_fuel_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `internetbazar_fuel` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_yearmodel
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_yearmodel`;


CREATE TABLE `internetbazar_yearmodel`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`value` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `internetbazar_yearmodel_I_1`(`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_yearmodel_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_yearmodel_i18n`;


CREATE TABLE `internetbazar_yearmodel_i18n`
(
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`name` VARCHAR(50)  NOT NULL,
	PRIMARY KEY (`id`,`culture`),
	KEY `internetbazar_yearmodel_i18n_I_1`(`id`),
	CONSTRAINT `internetbazar_yearmodel_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `internetbazar_yearmodel` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_room
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_room`;


CREATE TABLE `internetbazar_room`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`value` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `internetbazar_room_I_1`(`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_room_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_room_i18n`;


CREATE TABLE `internetbazar_room_i18n`
(
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`name` VARCHAR(20)  NOT NULL,
	PRIMARY KEY (`id`,`culture`),
	KEY `internetbazar_room_i18n_I_1`(`id`),
	CONSTRAINT `internetbazar_room_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `internetbazar_room` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_mode
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_mode`;


CREATE TABLE `internetbazar_mode`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	KEY `internetbazar_mode_I_1`(`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_mode_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_mode_i18n`;


CREATE TABLE `internetbazar_mode_i18n`
(
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`description` VARCHAR(40)  NOT NULL,
	PRIMARY KEY (`id`,`culture`),
	KEY `internetbazar_mode_i18n_I_1`(`id`),
	CONSTRAINT `internetbazar_mode_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `internetbazar_mode` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_status
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_status`;


CREATE TABLE `internetbazar_status`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`description` VARCHAR(25)  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `internetbazar_status_I_1`(`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_system_setting
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_system_setting`;


CREATE TABLE `internetbazar_system_setting`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(35)  NOT NULL,
	`value` VARCHAR(50)  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `internetbazar_system_setting_I_1`(`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_customertype
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_customertype`;


CREATE TABLE `internetbazar_customertype`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	KEY `internetbazar_customertype_I_1`(`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- internetbazar_customertype_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `internetbazar_customertype_i18n`;


CREATE TABLE `internetbazar_customertype_i18n`
(
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`description` VARCHAR(50)  NOT NULL,
	`plural_description` VARCHAR(50)  NOT NULL,
	PRIMARY KEY (`id`,`culture`),
	KEY `internetbazar_customertype_i18n_I_1`(`id`),
	CONSTRAINT `internetbazar_customertype_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `internetbazar_customertype` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
