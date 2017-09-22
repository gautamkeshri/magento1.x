<?php
class Ndsl_Gpay_Model_Mysql4_Gpay extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("gpay/gpay", "gpay_id");
    }
}