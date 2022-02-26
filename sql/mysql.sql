# SQL Dump for wgblocks module
# PhpMyAdmin Version: 4.0.4
# http://www.phpmyadmin.net
#
# Host: localhost
# Generated on: Fri Dec 10, 2021 to 10:00:58
# Server version: 8.0.16
# PHP Version: 7.4.4

#
# Structure table for `wgblocks_items` 10
#

CREATE TABLE `wgblocks_items` (
  `item_id` INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_name` VARCHAR(255) NOT NULL DEFAULT '',
  `item_type` INT(10) NOT NULL DEFAULT '0',
  `item_text` LONGTEXT NOT NULL ,
  `item_file` VARCHAR(255) NOT NULL DEFAULT '',
  `item_func` VARCHAR(255) NOT NULL DEFAULT '',
  `item_weight` INT(10) NOT NULL DEFAULT '0',
  `item_status` INT(1) NOT NULL DEFAULT '0',
  `item_datecreated` INT(11) NOT NULL DEFAULT '0',
  `item_submitter` INT(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB;

