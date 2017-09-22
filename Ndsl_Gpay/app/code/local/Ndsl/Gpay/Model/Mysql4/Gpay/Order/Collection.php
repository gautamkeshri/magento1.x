<?php

class Ndsl_Gpay_Model_Mysql4_Gpay_Order_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('gpay/gpay_order');
    }
}