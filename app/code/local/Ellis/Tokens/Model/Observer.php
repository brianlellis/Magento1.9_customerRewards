<?php
class Ellis_Tokens_Model_Observer 
{
    public function tokenOrderSaveAfter(Varien_Event_Observer $observer) {
        $order = $observer->getOrder();

        /* 
         * Check if order has finished been
         *
         * If Complete state was intended consider but using pending will allow even COD and other cash methods
         * ($order->getState() == Mage_Sales_Model_Order::STATE_COMPLETE) || ($order->getStatus() == "complete")
         */
        if( $order->getStatus() == "pending" ) {

            $orderId = $order->getId();
            $customerId = $order->getCustomerId();
            
            $items=array();
            foreach ($order->getAllItems() as $item) {
                array_push($items, $item->getName());

                /*
                 * Intentionally left for easy expansion reference for future use
                
                $items[] = array(
                    'name'          => $item->getName(),
                    'id'            => $order->getIncrementId(),
                    'sku'           => $item->getSku(),
                    'Price'         => $item->getPrice(),
                    'Ordered Qty'   => $item->getQtyOrdered(),
                );
                */
            }
            $items = implode(",",$items);


            try {
                $tokenInfo = Mage::getModel('etokens/etokens');

                $tokenInfo->setOrderId($orderId);
                $tokenInfo->setCustomerId($customerId);
                $tokenInfo->setOrderItems($items);

                $tokenInfo->save();

                $customerId == 0 ? $logStr = $orderId . '(Unregistered Customer)' : $logStr = $orderId;
                Mage::log('Token for order #' . $logStr . ' has been added to ellis_tokens table', null, 'etokens.log');
            
            } catch (Exception $e) {
                Mage::log('Token for Order #' . $orderId . ' failed to save', null, 'etokens.log');
                Mage::logException($e);
            }
        }
    }
}