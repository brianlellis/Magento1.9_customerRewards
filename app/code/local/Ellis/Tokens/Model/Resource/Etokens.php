<?php
class Ellis_Tokens_Model_Resource_Etokens extends Mage_Core_Model_Resource_Db_Abstract 
{
    
    protected function _construct() {
        $this->_init('etokens/tokens', 'token_id');
    }
    
}