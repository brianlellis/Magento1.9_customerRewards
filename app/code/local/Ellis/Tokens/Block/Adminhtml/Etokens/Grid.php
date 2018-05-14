<?php
class Ellis_Tokens_Block_Adminhtml_Etokens_Grid extends Mage_Adminhtml_Block_Widget_Grid 
{
    public function __construct() 
    {
        parent::__construct();
        
        $this->setId('etokens_grid');
        $this->setDefaultSort('token_id');
        $this->setDefaultDir('ASC');
    }
    
    protected function _prepareCollection() 
    {
        $collection = Mage::getModel('etokens/etokens')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();     
    }
    
    protected function _prepareColumns() 
    {
        $this->addColumn('token_id', array (
            'index' => 'token_id',
            'header' => Mage::helper('etokens')->__('Token ID'),
            'type'  => 'number',
            'sortable'  => true,
            'width' => '100px',
        ));
        
        $this->addColumn('order_id', array (
            'index' => 'order_id',
            'header' => Mage::helper('etokens')->__('Order ID'),
            'type'  => 'number',
            'sortable'  => true,
            'width' => '150px',
        ));
        
        $this->addColumn('customer_id', array (
            'index' => 'customer_id',
            'header' => Mage::helper('etokens')->__('Customer ID'),
            'type'  => 'number',
            'sortable'  => true,
        ));
        
        $this->addColumn('order_items', array (
            'index' => 'order_items',
            'header' => Mage::helper('etokens')->__('Order Items'),
            'sortable'  => false,
        ));
        

        return parent::_prepareColumns();
    }
    
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array(
            '_current' => true,
        ));
    }
    
    public function prepareStatusLayout($value)
    {
        $class = '';
        switch ($value) {
            case 'pending' :
                $class = 'grid-severity-notice';
                break;
            case 'approved' :
                $class = 'grid-severity-major';
                break;
            case 'declined' :
                $class = 'grid-severity-critical';
                break;
        }
        return '<span class="'.$class.'"><span>'.$value.'</span></span>';
    }
}