<?php
namespace Training\Test\Controller\Block;

class Index extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $layout = $this->_view->getLayout();
        $block = $layout->createBlock('Training\Test\Block\Test');
        $this->getResponse()->appendBody($block->toHtml());
    }
}
