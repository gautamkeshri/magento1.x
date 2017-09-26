<?php
class Ndsl_Gpay_Model_Sales_Order extends Mage_Sales_Model_Order{
	public function hasCustomFields(){
		$var = $this->getGpay();
		if($var && !empty($var)){
			return true;
		}else{
			return false;
		}
	}
	public function getFieldHtml(){
		$var = $this->getGpay();
		$html = '<b>Gift Voucher:</b>'.$var.'<br/>';
		return $html;
	}
}