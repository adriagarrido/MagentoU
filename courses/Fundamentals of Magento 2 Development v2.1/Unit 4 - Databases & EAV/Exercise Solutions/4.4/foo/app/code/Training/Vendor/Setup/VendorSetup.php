<?php

namespace Training\Vendor\Setup;

use Magento\Catalog\Model\ProductTypes\ConfigInterface;
use Magento\Catalog\Setup\CategorySetup;
use Magento\Catalog\Setup\CategorySetupFactory;
use Magento\Eav\Model\Entity\Setup\Context;
use Magento\Eav\Model\Resource\Entity\Attribute\Group\CollectionFactory;
use Magento\Framework\App\CacheInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class VendorSetup extends CategorySetup
{
    /**
     * Category setup factory
     *
     * @var CategorySetupFactory
     */
    protected $_setupFactory;

    /**
     * Init
     *
     * @param ModuleDataSetupInterface $setup
     * @param Context $context
     * @param CacheInterface $cache
     * @param CollectionFactory $attrGroupCollectionFactory
     * @param ScopeConfigInterface $config
     * @param CategorySetupFactory $setupFactory
     * @param ConfigInterface $productTypeConfig
     */
    public function __construct(
        ModuleDataSetupInterface $setup,
        Context $context,
        CacheInterface $cache,
        CollectionFactory $attrGroupCollectionFactory,
        ScopeConfigInterface $config,
        CategorySetupFactory $setupFactory,
        ConfigInterface $productTypeConfig
    ) {
        $this->_setupFactory = $setupFactory;
    }

    /**
     * Gets catalog setup
     *
     * @param array $data
     * @return CategorySetup
     */
    public function getCatalogSetup(array $data = [])
    {
        return $this->_setupFactory->create($data);
    }
}