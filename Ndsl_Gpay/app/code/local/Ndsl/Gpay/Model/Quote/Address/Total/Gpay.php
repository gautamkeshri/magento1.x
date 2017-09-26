<?php
class Ndsl_Gpay_Model_Quote_Address_Total_Gpay 
extends Mage_Sales_Model_Quote_Address_Total_Abstract
{
     public function __construct()
    {
         $this -> setCode('gpay_total');
         }
    /**
     * Collect totals information about gpay
     * 
     * @param Mage_Sales_Model_Quote_Address $address 
     * @return Mage_Sales_Model_Quote_Address_Total_Shipping 
     */
     public function collect(Mage_Sales_Model_Quote_Address $address)
    {

        $gpayAmount = 0; 
        $currenQuoteId=Mage::getSingleton('checkout/session')->getQuoteId();
        $item_quote   = Mage::getModel('sales/quote')->loadByIdWithoutStore($currenQuoteId);

         parent :: collect($address);
         $items = $this->_getAddressItems($address);
         if (!count($items)) {
            return $this;
         }
         $quote= $address->getQuote();

		//amount definition
        //if($item_quote->getSsn() > 0)
            $gpayAmount = $item_quote->getGpay();
        //else
        //   $gpayAmount = 0;

         //amount definition

         $gpayAmount = $quote -> getStore() -> roundPrice($gpayAmount);
         $this -> _setAmount($gpayAmount) -> _setBaseAmount($gpayAmount);
         $address->setData('gpay_total',$gpayAmount);

         return $this;
     }
    
    /**
     * Add gpay totals information to address object
     * 
     * @param Mage_Sales_Model_Quote_Address $address 
     * @return Mage_Sales_Model_Quote_Address_Total_Shipping 
     */
     public function fetch(Mage_Sales_Model_Quote_Address $address)
    {
         parent :: fetch($address);
         $amount = $address -> getTotalAmount($this -> getCode());
         if ($amount != 0){
             $address -> addTotal(array(
                     'code' => $this -> getCode(),
                     'title' => $this -> getLabel(),
                     'value' => $amount
                    ));
         }
        
         return $this;
     }
    
    /**
     * Get label
     * 
     * @return string 
     */
     public function getLabel()
    {
         return Mage :: helper('gpay') -> __('Gpay');
    }
}