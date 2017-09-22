<?php
class Ndsl_Gpay_Model_Order_Invoice_Total_Gpay
extends Mage_Sales_Model_Order_Invoice_Total_Abstract
{
    public function collect(Mage_Sales_Model_Order_Invoice $invoice)
    {
		$order=$invoice->getOrder();
        $orderGpayTotal = $order->getGpayTotal();
        if ($orderGpayTotal&&count($order->getInvoiceCollection())==0) {
            $invoice->setGrandTotal($invoice->getGrandTotal()+$orderGpayTotal);
            $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal()+$orderGpayTotal);
        }
        return $this;
    }
}