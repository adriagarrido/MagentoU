<?php

namespace Training\Test\Plugin;

class Log
{
    protected $_logger;

    public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->_logger = $logger;
    }

    public function afterGetData(\Magento\Customer\Model\Customer\DataProvider $subject, $result)
    {
        $message = print_r($result, true);
        $this->_logger->debug($message);
    }
}
