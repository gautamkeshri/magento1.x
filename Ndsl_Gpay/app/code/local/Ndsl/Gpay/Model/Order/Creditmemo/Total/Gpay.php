<?php
class Ndsl_Gpay_Model_Order_Creditmemo_Total_Gpay 
extends Mage_Sales_Model_Order_Creditmemo_Total_Abstract
{
    public function collect(Mage_Sales_Model_Order_Creditmemo $creditmemo)
    {

		return $this;

        $order = $creditmemo->getOrder();
        $orderGpayTotal        = $order->getGpayTotal();

        if ($orderGpayTotal) {
			$creditmemo->setGrandTotal($creditmemo->getGrandTotal()+$orderGpayTotal);
			$creditmemo->setBaseGrandTotal($creditmemo->getBaseGrandTotal()+$orderGpayTotal);
        }

        return $this;
    }
}