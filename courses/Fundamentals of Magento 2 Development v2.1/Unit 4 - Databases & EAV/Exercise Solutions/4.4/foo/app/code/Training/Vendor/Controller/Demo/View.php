<?php

namespace Training\Vendor\Controller\Demo;

class View extends \Magento\Framework\App\Action\Action
{
    /**
     * View CMS page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $model = $this->_objectManager->create('Training\Vendor\Model\Vendor');
        $resourceModel = $this->_objectManager->create('Training\Vendor\Model\Resource\Vendor');
        $collection = $this->_objectManager->create('Training\Vendor\Model\Resource\Vendor\Collection');

        $this->getResponse()->appendBody(
            get_class($model)
            . "<br />" . get_class($resourceModel)
            . "<br />" . get_class($collection)
        );
    }
}
