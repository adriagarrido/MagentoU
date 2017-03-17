<?php

namespace Training\Test\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_collectionFactory;
    protected $_categoryCollectionFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Store\Model\ResourceModel\Store\CollectionFactory $collectionFactory,
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollectionFactory
    ) {
        $this->_collectionFactory = $collectionFactory;
        $this->_categoryCollectionFactory = $categoryCollectionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $collection = $this->_collectionFactory->create();
        $stores = [];
        foreach ($collection as $item) {
            $rootCategoryId = $item->getRootCategoryId();
            $categoryCollection = $this->_categoryCollectionFactory->create();
            $categoryCollection->addAttributeToSelect('name')
              ->addAttributeToFilter('entity_id', $rootCategoryId);
            $categories = [];
            foreach ($categoryCollection as $category) {
                $categories[] = [
                    'name' => $category->getName(),
                    'id'   => $category->getId()
                ];
            }
            $stores[] = [
                'store_id' => $item->getStoreId(),
                'code'     => $item->getCode(),
                'name'     => $item->getName(),
                'root_category_id' => $rootCategoryId,
                'category' => $categories
            ];
        }
        $str = json_encode($stores);
        $this->getResponse()->appendBody($str);
    }
}
