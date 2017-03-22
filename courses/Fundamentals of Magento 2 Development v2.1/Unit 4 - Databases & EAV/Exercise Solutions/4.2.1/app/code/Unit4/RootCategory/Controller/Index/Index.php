<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit4\RootCategory\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{

    protected $collectionFactory;
    protected $categoryCollectionFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Store\Model\ResourceModel\Store\CollectionFactory $collectionFactory,
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollectionFactory
    ) {
        $this->collectionFactory         = $collectionFactory;
        $this->categoryCollectionFactory = $categoryCollectionFactory;        
        parent::__construct($context);
    }


    public function execute()
    {
        $collection = $this->collectionFactory->create();;
        $stores = array();
        foreach ($collection as $item) {
            $rootCategoryId = $item->getRootCategoryId();
            $categoryCollection = $this->categoryCollectionFactory->create();
            $categoryCollection->addAttributeToSelect('name')
              ->addAttributeToFilter('entity_id', $rootCategoryId);
            $cats = array();
            foreach ($categoryCollection as $category) {
                $cats[] = array(
                    'name' => $category->getName(),
                    'id'   => $category->getId()
                );
            }
            $stores[] = array(
                'store_id' => $item->getStoreId(),
                'code'     => $item->getCode(),
                'name'     => $item->getName(),
                'root_category_id' => $rootCategoryId,
                'category' => $cats
            );
        }
        $str = json_encode($stores);
        $this->getResponse()->appendBody($str);
    }
}
