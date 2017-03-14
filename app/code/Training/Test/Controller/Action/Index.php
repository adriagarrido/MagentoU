<?php
namespace Training\Test\Controller\Action;

class Index extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        // $this->getResponse()->appendBody("HELLO WORLD");
        $block = $this->_view->getLayout()->createBlock('Training\Test\Block\Template');
        $block->setTemplate('Training_Test::test.phtml');
        $this->getResponse()->appendBody($block->toHtml());
    }
}
