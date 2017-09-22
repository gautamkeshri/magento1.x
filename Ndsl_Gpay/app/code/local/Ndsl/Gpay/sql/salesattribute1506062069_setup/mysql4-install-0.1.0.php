<?php
$installer = $this;
$installer->startSetup();

$installer->addAttribute("quote_address", "gpay_total", array("type"=>"varchar"));
$installer->addAttribute("order", "gpay_total", array("type"=>"varchar"));
$installer->endSetup();
	 