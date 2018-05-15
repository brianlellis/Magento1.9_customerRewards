<?php
class Ellis_Tokens_Block_Adminhtml_Etokens extends Mage_Adminhtml_Block_Widget_Grid_Container 
{
    public function __construct() 
    {
        $this->_headerText = Mage::helper('etokens')->__('Test translation for Ellis_Tokens');
        
        $this->_blockGroup = 'etokens';
        $this->_controller = 'adminhtml_etokens';
        
        parent::__construct();
    }
    
    protected function _prepareLayout() 
    {
        $this->_removeButton('add');
        
        return parent::_prepareLayout();
    }
}