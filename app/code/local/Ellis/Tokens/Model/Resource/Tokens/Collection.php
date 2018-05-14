<?php
class Ellis_Tokens_Model_Resource_Tokens_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
        $this->_init('ellis_tokens/tokens');
    }
}