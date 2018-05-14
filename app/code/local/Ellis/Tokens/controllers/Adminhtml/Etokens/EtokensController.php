<?php
class Ellis_Tokens_Adminhtml_Etokens_EtokensController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction() 
    {
        $this->loadLayout();
        
        $this->_addContent($this->getLayout()->createBlock('etokens/adminhtml_etokens'));
        
        $this->renderLayout();
    }
}