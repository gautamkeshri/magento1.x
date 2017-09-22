<?php
class Ndsl_Gpay_Model_Gpay_Quote extends Mage_Core_Model_Abstract{
	public function _construct()
	{
		parent::_construct();
		$this->_init('gpay/gpay_quote');
	}
	public function deteleByQuote($quote_id,$var){
		$this->_getResource()->deteleByQuote($quote_id,$var);
	}
	public function getByQuote($quote_id,$var = ''){
		return $this->_getResource()->getByQuote($quote_id,$var);
	}
}