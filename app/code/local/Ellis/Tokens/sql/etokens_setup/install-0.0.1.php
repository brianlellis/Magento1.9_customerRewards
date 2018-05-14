<?php

$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('etokens/etokens'))
    ->addColumn('token_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'auto_increment' => true,
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
        ), 'Token ID')
    ->addColumn('order_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable'  => false,
        ), 'Order ID')
    ->addColumn('customer_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable'  => false,
        ), 'Customer ID')
    ->addColumn('order_items', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        'nullable'  => false,
        ), 'Order Items');
    
$installer->getConnection()->createTable($table);

$installer->endSetup(); 