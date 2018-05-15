<?php
class Ellis_Tokens_Model_Observer 
{
    public function tokenOrderSaveAfter(Varien_Event_Observer $observer) {
        $order = $observer->getEvent()->getOrder();
        

        /*
         * Ensure order has been saved first
         */
        if ($order->getState() == Mage_Sales_Model_Order::STATE_COMPLETE) {
            $orderId = $order->getId();
            $customerId = $order->getCustomerId();
            
            $items=array();
            foreach ($order->getAllItems() as $item) {
                $items[] = array(
                    'name'          => $item->getName(),

                    /*
                     * Intentionally left for easy expansion reference for future use

                    'id'            => $order->getIncrementId(),
                    'sku'           => $item->getSku(),
                    'Price'         => $item->getPrice(),
                    'Ordered Qty'   => $item->getQtyOrdered(),

                    */
                );
            }
            $items = implode(",",$items);


            try {
                $tokenInfo = Mage::getModel('etokens/etokens');

                $tokenInfo->setOrderId($orderId);
                $tokenInfo->setCustomerId($customerId);
                $tokenInfo->setOrderItems($items);

                $tokenInfo->save();


                Mage::log('Token for ' . $orderId . 'has been added to ellis_tokens table', null, 'etokens.log');
            } catch (Exception $e) {
                Mage::logException($e);
            }
        }
    }
}