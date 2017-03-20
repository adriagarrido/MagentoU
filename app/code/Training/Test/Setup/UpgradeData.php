<?php

namespace Training\Test\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{
    public function upgrade(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;
        $setup->startSetup();

        if (version_compare($context->getVersion(), '0.0.3', '<')) {
            $table = $installer->getTable('training_test_entity');
            $installer->getConnection()->insert(
                $table,
                [
                    'test_id' => 1,
                    'intfield' => 1,
                    'sometext' => 'Some Test Text'
                ]
            );
        }

        $setup->endSetup();
    }
}
