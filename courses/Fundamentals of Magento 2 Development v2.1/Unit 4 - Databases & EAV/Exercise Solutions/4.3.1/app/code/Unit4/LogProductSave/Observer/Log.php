<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit4\LogProductSave\Observer;

class Log implements \Magento\Framework\Event\ObserverInterface
{
    protected $logger;

    public function __construct(
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->logger = $logger;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $product = $observer->getEvent()->getProduct();
        if ($product) {
            if ($product->hasDataChanges()) {
                $origData = $product->getOrigData();
                $data     = $product->getData();
                $changed  = array();
                foreach ($data as $key => $value) {
                    if (is_object($value) || is_array($value)) {
                        continue;
                    }
                    if (isset($origData[$key]) && !is_array($origData[$key]) && ($origData[$key] != $value)) {
                        $changed[$key] = sprintf("From %s, to %s", $origData[$key], $value);
                    }
                }
                $message = sprintf("Saving product %d, changed data: %s\n", $product->getId(), print_r($changed, true));
                $this->logger->info($message);
            }
        }
    }


}
