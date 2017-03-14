<?php
namespace Training\Test\Block\Product\View;

class Description extends \Magento\Framework\View\Element\Template
{
    public function beforeToHtml(\Magento\Catalog\Block\Product\View\Description $originalBlock)
    {
        $originalBlock->getProduct()->setDescription('Test description');
    }
}
