<?php
class Ellis_Tokens_Block_Sidebar extends Mage_Core_Block_Template
{
    public function getProducts() 
    {
        $products = Mage::getModel('catalog/product')->getCollection()
                ->addAttributeToSelect('*')
                ->setOrder('created_at')
                ->setPageSize(4);
        
        return $products;
    }
}