<?php
class Ndsl_Gpay_Block_Adminhtml_Gpay_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("gpay_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("gpay")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("gpay")->__("Item Information"),
				"title" => Mage::helper("gpay")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("gpay/adminhtml_gpay_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
