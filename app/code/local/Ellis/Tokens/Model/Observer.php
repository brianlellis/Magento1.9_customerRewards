<?php
class Ellis_Tokens_Model_Observer 
{
    public function tokenInjector(Varien_Event_Observer $observer){
        $orderIds = $observer->getData('order_ids');
        
        foreach($orderIds as $_orderId){
            $order     = Mage::getModel('sales/order')->load($_orderId);
            $customer_id = $order->getCustomerId();
            $customer  = Mage::getModel('customer/customer')->load($order->getData('customer_id'));

            try {
                $tokenInfo = Mage::getModel('etokens/etokens');
                
                $tokenInfo->save();

                Mage::log('Token for ' . $_orderId . 'has been added to ellis_tokens table', null, 'etokens.log');


            } catch (Exception $e) {
                Mage::logException($e);
            }
        }
        
        return $this;
    }
}