<?php

namespace Training\Test\Block;

class Alert extends \Magento\Framework\View\Element\Template
{
    public function getFullActionName()
    {
        return $this->_request->getFullActionName();
    }
}
