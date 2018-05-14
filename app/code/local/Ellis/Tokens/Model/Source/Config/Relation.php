<?php
class Ellis_Tokens_Model_Source_Config_Relation 
{
    public function toOptionArray() 
    {
        return array(
            array(
                'value' => null, 
                'label'=>Mage::helper('etokens')->__('--Please Select--'),
            ),
            array(
                'value' => 'bronze', 
                'label'=>Mage::helper('etokens')->__('Bronze'),
            ),
            array(
                'value' => 'silver', 
                'label'=>Mage::helper('etokens')->__('Silver'),
            ),
            array(
                'value' => 'gold', 
                'label'=>Mage::helper('etokens')->__('Gold'),
            ),
        );
    }
}