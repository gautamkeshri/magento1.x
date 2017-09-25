<?php
$installer = $this;
$installer->startSetup();

$installer->addAttribute("order_item", "serial", array("type"=>"varchar"));
$installer->endSetup();
	 