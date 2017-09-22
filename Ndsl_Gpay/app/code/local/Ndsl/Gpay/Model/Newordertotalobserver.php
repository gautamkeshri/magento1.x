<?php
class Ndsl_Gpay_Model_Newordertotalobserver
{
	 public function saveGpayTotal(Varien_Event_Observer $observer)
    {
         $order = $observer -> getEvent() -> getOrder();
         $quote = $observer -> getEvent() -> getQuote();
         $shippingAddress = $quote -> getShippingAddress();
         if($shippingAddress && $shippingAddress -> getData('gpay_total')){
             $order -> setData('gpay_total', $shippingAddress -> getData('gpay_total'));
             }
        else{
             $billingAddress = $quote -> getBillingAddress();
             $order -> setData('gpay_total', $billingAddress -> getData('gpay_total'));
             }
         $order -> save();
     }
    
     public function saveGpayTotalForMultishipping(Varien_Event_Observer $observer)
    {
         $order = $observer -> getEvent() -> getOrder();
         $address = $observer -> getEvent() -> getAddress();
         $order -> setData('gpay_total', $shippingAddress -> getData('gpay_total'));
		 $order -> save();
     }
}