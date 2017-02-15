<?php
/**
 *
 */
namespace Unit1\FirstModule\Model;

use Magento\Framework\Config\Data;
use Unit1\FirstModule\Model\Config\ConfigInterface;

class Config extends Data implements ConfigInterface
{
    public function __construct(
        \Unit1\FirstModule\Model\Config\Reader $reader,
        \Magento\Framework\Config\CacheInterface $cache,
        $cacheId = "unit1_firstmodule_config"
    ) {
        parent::__construct($reader, $cache, $cacheId);
    }

    public function getMyNodeInfo()
    {
        return $this->get();
    }
}
