<?php
namespace Training\Orm\Setup;

use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\ResourceModel\Eav\Attribute as CatalogAttribute;
use Magento\Catalog\Setup\CategorySetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    /**
     * @var CategorySetupFactory
     */
    private $catalogSetupFactory;

    public function __construct(
        CategorySetupFactory $categorySetupFactory
    ) {
        $this->catalogSetupFactory = $categorySetupFactory;
    }

    /**
     * Installs data for a module
     *
     * @param  ModuleDataSetupInterface $setup
     * @param  ModuleContextInterface   $context
     * @return void
     */
    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        /**
         * @var Category $catalogSetup
         */
        $catalogSetup = $this->catalogSetupFactory->create(['setup' => $setup]);
        $catalogSetup->addAttribute(Product::ENTITY, 'flavor_from_setup_method', [
            'label' => 'Flavor From Setup Method',
            'visible_on_front' => 1,
            'required' => 0,
            'global' => CatalogAttribute::SCOPE_STORE
        ]);
    }
}
