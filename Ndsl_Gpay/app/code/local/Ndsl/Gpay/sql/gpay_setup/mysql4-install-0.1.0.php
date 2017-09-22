<?php
$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
CREATE TABLE IF NOT EXISTS {$installer->getTable('ndsl_gpay_gmanage')} (
    `gpay_id` int(11) unsigned NOT NULL auto_increment,
    `orderno` VARCHAR(30) NOT NULL,
    `transref` VARCHAR(50) NOT NULL,
    `status` TINYINT NOT NULL DEFAULT '0',
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `is_active` TINYINT NOT NULL DEFAULT '0',
    PRIMARY KEY(`gpay_id`)
) ENGINE = InnoDB;
SQLTEXT;

$installer->run($sql);
//demo 
//Mage::getModel('core/url_rewrite')->setId(null);
//demo 
$installer->endSetup();
	 