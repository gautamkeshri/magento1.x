<?php
class Ndsl_Gpay_Block_Adminhtml_Gpay_Order extends Mage_Adminhtml_Block_Sales_Order_Abstract{
	public function getCustomVars(){
		$model = Mage::getModel('gpay/gpay_order');
		return $model->getByOrder($this->getOrder()->getId());
	}
}