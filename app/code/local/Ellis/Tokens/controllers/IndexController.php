<?php
class Ellis_Tokens_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction() 
    {
        echo $this->__('Test translation for Ellis');
    }
    
    public function helloAction()
    {
        $this->loadLayout();
        
        $parameters = array(
            'product' => Mage::getModel('catalog/product')->load(166),
            'category' => Mage::getModel('catalog/category')->load(10),
        );
        
        Mage::dispatchEvent('etokens_register_visit', $parameters);
        
        $this->renderLayout();
    }
    
    public function etokensAction()
    {
        $subscription = Mage::getModel('etokens/etokens');
        
        $subscription->setFirstname('John');
        $subscription->setLastname('Doe');
        $subscription->setEmail('john.doe@example.com');
        $subscription->setMessage('A short message to test');
        
        $subscription->save();
        
        echo 'success';
    }
    
    public function flatAction() {
//        $resource = Mage::getSingleton('core/resource');
//        $connection = $resource->getConnection('core_read');
//        
//        $results = $connection->query('SELECT * FROM review_detail')->fetchAll();
//        
//        Zend_Debug::dump($results);
        $reviews = Mage::getModel('review/review')->getCollection();
        
        foreach ($reviews as $_review) {
            echo $_review->getReviewUrl().'<br/>';
        }
//        Zend_Debug::dump($reviews);
    }
    
    public function collectionAction () 
    {
        
        $productCollection = Mage::getModel('catalog/product')
                ->getCollection()
                ->addAttributeToSelect('price')
                ->addAttributeToSelect('image')
                ->addAttributeToFilter('name', array(
                    'like' => '%PC%'
                ));
        
        $productCollection->setDataToAll('price', 20);
        
        foreach ($productCollection as $product)
        {
            Zend_Debug::dump($product->debug());
        }
        
    }
}