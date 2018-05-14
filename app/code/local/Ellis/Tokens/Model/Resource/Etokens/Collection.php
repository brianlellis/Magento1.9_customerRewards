<?php
class Ellis_Tokens_Model_Resource_Etokens_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract 
{
    
    protected function _construct() {
        $this->_init('etokens/etokens');
    }
    
}