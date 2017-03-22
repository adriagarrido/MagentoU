<?php

namespace Training\EavBackend\Setup;

use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Model\Entity\Attribute\Source\Table as TableSourceModel;
use Magento\Eav\Setup\EavSetup;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{
    /**
     * @var EavSetup
     */
    private $eavSetup;

    public function __construct(EavSetup $eavSetup)
    {
        $this->eavSetup = $eavSetup;
    }

    /**
     * Upgrades data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare('0.1.0', $context->getVersion(), '>=')) {
            $this->eavSetup->addAttribute(Product::ENTITY, 'compatible_condiments', [
                'label'            => 'Compatible Condiments',
                'type'             => 'varchar',
                'input'            => 'multiselect',
                'source'           => TableSourceModel::class,
                'backend'          => ArrayBackend::class,
                'required'         => false,
                'user_defined'     => true,
                'global'           => ScopedAttributeInterface::SCOPE_WEBSITE,
                'visible_on_front' => true,
                'group'            => 'Product Details',
                'option' => [
                    'values' => [
                        100 => 'Creme',
                        200 => 'Milk',
                        300 => 'Onions',
                        400 => 'Mustard',
                        500 => 'Ketchup',
                        600 => 'Sweet Chutney',
                        700 => 'Sugar',
                        800 => 'Honey',
                        900 => 'Chilly',
                    ]
                ],
            ]);
        }
    }
}
