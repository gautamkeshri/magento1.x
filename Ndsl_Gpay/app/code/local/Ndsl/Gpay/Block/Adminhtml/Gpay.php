<?php


class Ndsl_Gpay_Block_Adminhtml_Gpay extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_gpay";
	$this->_blockGroup = "gpay";
	$this->_headerText = Mage::helper("gpay")->__("Gpay Manager");
	$this->_addButtonLabel = Mage::helper("gpay")->__("Add New Item");
	parent::__construct();
	
	}

}