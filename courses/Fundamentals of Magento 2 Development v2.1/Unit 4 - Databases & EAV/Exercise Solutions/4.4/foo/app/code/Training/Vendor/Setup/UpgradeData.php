<?php

namespace Training\Vendor\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @codeCoverageIgnore
 */
class UpgradeData implements UpgradeDataInterface
{
    /**
     * Vendor setup factory
     *
     * @var VendorSetupFactory
     */
    private $vendorSetupFactory;

    /**
     * Init
     *
     * @param VendorSetupFactory $taxSetupFactory
     */
    public function __construct(VendorSetupFactory $vendorSetupFactory)
    {
        $this->vendorSetupFactory = $vendorSetupFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '0.0.3') < 0) {
            /** @var VendorSetup $vendorSetup */
            $vendorSetup = $this->vendorSetupFactory->create(['setup' => $setup]);

            /**
             * Add some_attr attribute to the 'eav_attribute' table
             */
            $catalogInstaller = $vendorSetup->getCatalogSetup(['resourceName' => 'catalog_setup']);
            $catalogInstaller->addAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
                'some_attr',
                [
                    'name'      => 'Some New Attribute',
                    'group'     => 'Product Details',
                    'required'  => false,
                    //'label'     => 'Some Attribute'
                ]
            );
        }

        if (version_compare($context->getVersion(), '0.0.4') < 0) {
            /** @var VendorSetup $vendorSetup */
            $vendorSetup = $this->vendorSetupFactory->create(['setup' => $setup]);
            $catalogInstaller = $vendorSetup->getCatalogSetup(['resourceName' => 'catalog_setup']);
            $catalogInstaller->updateAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
                'some_attr',
                'frontend_label',
                'Some Attribute'
            );
        }
    }
}