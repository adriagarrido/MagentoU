<?php

namespace Training\Vendor\Model;


use Magento\Framework\Object\IdentityInterface;

/**
 * Vendor Model
 *
 * @method \Training\Vendor\Model\Vendor _getResource()
 * @method \Training\Vendor\Model\Resource\Vendor getResource()
 */
class Vendor extends \Magento\Framework\Model\AbstractModel
{
    protected function _constructor()
    {
        $this->_init('Training\Vendor\Model\Resource\Vendor');
    }
}