<?php
class Ndsl_Gpay_Model_Observer
{

			public function saveQuoteBefore(Varien_Event_Observer $observer)
			{
				
				$quote = $observer->getQuote();
				$post = Mage::app()->getFrontController()->getRequest()->getPost();
				if(isset($post['ndsl']['gpay'])){
					$var = $post['ndsl']['gpay'];
					$quote->setGpay($var);
				}
				
			}
		
			public function saveQuoteAfter(Varien_Event_Observer $observer)
			{
				
				$quote = $observer->getQuote();
				if($quote->getGpay()){
					$var = $quote->getGpay();
					if(!empty($var)){
						$model = Mage::getModel('gpay/gpay_quote');
						$model->deteleByQuote($quote->getId(),'gpay');
						$model->setQuoteId($quote->getId());
						$model->setKey('gpay');
						$model->setValue($var);
						$model->save();
					}
				}
				
			}
		
			public function loadQuoteAfter(Varien_Event_Observer $observer)
			{
				
				$quote = $observer->getQuote();
				$model = Mage::getModel('gpay/gpay_quote');
				$data = $model->getByQuote($quote->getId());
				foreach($data as $key => $value){
					$quote->setData($key,$value);
				}
				
			}
		
			public function saveOrderAfter(Varien_Event_Observer $observer)
			{
				
				$order = $observer->getOrder();
				$quote = $observer->getQuote();
				if($quote->getGpay()){
					$var = $quote->getGpay();
					if(!empty($var)){
						$model = Mage::getModel('gpay/gpay_order');
						$model->deleteByOrder($order->getId(),'gpay');
						$model->setOrderId($order->getId());
						$model->setKey('gpay');
						$model->setValue($var);
						$order->setGpay($var);
						$model->save();
					}
				}
				
			}
		
			public function loadOrderAfter(Varien_Event_Observer $observer)
			{
				
				$order = $observer->getOrder();
				$model = Mage::getModel('gpay/gpay_order');
				$data = $model->getByOrder($order->getId());
				foreach($data as $key => $value){
					$order->setData($key,$value);
				}
				
			}
		
			/**
		     * Update PayPal Total
		     *
		     * @param Varien_Event_Observer $observer
		     * @return Ndsl_Gpay_Model_Observer
		     */
		    public function updatePaypalTotal(Varien_Event_Observer $observer)
		    {
				
		        $cart = $observer->getEvent()->getPaypalCart();

		        $cart->updateTotal(Mage_Paypal_Model_Cart::TOTAL_SUBTOTAL, $cart->getSalesEntity()->getFeeAmount());

		        return $this;
				
		    }
		
			/**
		     * Set fee amount invoiced to the order
		     *
		     * @param Varien_Event_Observer $observer
		     * @return Ndsl_Gpay_Model_Observer
		     */
		    public function invoiceSaveAfter(Varien_Event_Observer $observer)
		    {
				
		        $invoice = $observer->getEvent()->getInvoice();

		        if ($invoice->getBaseFeeAmount()) {
		            $order = $invoice->getOrder();
		            $order->setFeeAmountInvoiced($order->getFeeAmountInvoiced() + $invoice->getFeeAmount());
		            $order->setBaseFeeAmountInvoiced($order->getBaseFeeAmountInvoiced() + $invoice->getBaseFeeAmount());
		        }

		        return $this;
				
		    }

		    /**
		     * Set fee amount refunded to the order
		     *
		     * @param Varien_Event_Observer $observer
		     * @return Ndsl_Gpay_Model_Observer
		     */
		    public function creditmemoSaveAfter(Varien_Event_Observer $observer)
		    {
				
		        $creditmemo = $observer->getEvent()->getCreditmemo();

		        if ($creditmemo->getFeeAmount()) {
		            $order = $creditmemo->getOrder();
		            $order->setFeeAmountRefunded($order->getFeeAmountRefunded() + $creditmemo->getFeeAmount());
		            $order->setBaseFeeAmountRefunded($order->getBaseFeeAmountRefunded() + $creditmemo->getBaseFeeAmount());
		        }

		        return $this;
				
		    }
		
}
