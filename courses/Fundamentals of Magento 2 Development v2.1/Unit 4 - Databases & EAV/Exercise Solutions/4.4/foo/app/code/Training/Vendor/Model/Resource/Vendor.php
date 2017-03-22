<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Training\Vendor\Model\Resource;


class Vendor extends \Magento\Framework\Model\Resource\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init(
            'training_vendor_entity',
            'vendor_id'
        );
    }
}