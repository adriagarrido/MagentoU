<?php

namespace Training\Test\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;
        $installer->startSetup();
        $connection = $installer->getConnection();

        if (version_compare($context->getVersion(), '0.0.2', '<')) {
            $table = $installer->getTable('training_test_entity');
            if ($connection->isTableExists($table) == true) {
                $connection->addColumn(
                    $table,
                    'sometext',
                    [
                        'type' => Table::TYPE_TEXT,
                        'length' => 255,
                        'comment' => 'Some Text'
                    ]
                );
            }
        }

        $installer->endSetup();
    }
}
