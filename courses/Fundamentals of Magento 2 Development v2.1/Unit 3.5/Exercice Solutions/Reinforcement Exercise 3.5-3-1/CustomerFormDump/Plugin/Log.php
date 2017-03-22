<?php

namespace Unit3\CustomerFormDump\Plugin;

class Log
{

    /**
     * \Psr\Log\LoggerInterface
     */
    protected $logger;

    public function __construct(\Psr\Log\LoggerInterface $logger) 
    {
        $this->logger = $logger;
    }

    public function afterGetData(\Magento\Customer\Model\Customer\DataProvider $subject, $result)
    {
        $message = print_r($result, true);
        $this->logger->info($message);
    }
}
