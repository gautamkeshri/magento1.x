<?php
class Ndsl_Gpay_Block_Adminhtml_Gpay_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("gpay_form", array("legend"=>Mage::helper("gpay")->__("Item information")));

				
						$fieldset->addField("orderno", "text", array(
						"label" => Mage::helper("gpay")->__("Order No"),
						"name" => "orderno",
						));
					
						$fieldset->addField("transref", "text", array(
						"label" => Mage::helper("gpay")->__("Trans ref"),
						"name" => "transref",
						));
									
						 $fieldset->addField('status', 'select', array(
						'label'     => Mage::helper('gpay')->__('Status'),
						'values'   => Ndsl_Gpay_Block_Adminhtml_Gpay_Grid::getValueArray2(),
						'name' => 'status',
						));				
						 $fieldset->addField('is_active', 'select', array(
						'label'     => Mage::helper('gpay')->__('Is Active'),
						'values'   => Ndsl_Gpay_Block_Adminhtml_Gpay_Grid::getValueArray5(),
						'name' => 'is_active',
						));

				if (Mage::getSingleton("adminhtml/session")->getGpayData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getGpayData());
					Mage::getSingleton("adminhtml/session")->setGpayData(null);
				} 
				elseif(Mage::registry("gpay_data")) {
				    $form->setValues(Mage::registry("gpay_data")->getData());
				}
				return parent::_prepareForm();
		}
}
