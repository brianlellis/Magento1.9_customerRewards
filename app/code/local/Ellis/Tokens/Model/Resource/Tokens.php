<?php
 
class Ellis_Tokens_Model_Resource_Tokens extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('ellis_tokens/tokens', 'token_id');
    }
}