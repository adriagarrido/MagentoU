<?php
/**
 *
 */

namespace Unit1\FirstModule;

class Plugin
{
    public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $price)
    {
        return $price * 2;
    }

    public function afterGetCopyright(\Magento\Theme\Block\Html\Footer $subject)
    {
        return "Customized copyright!";
    }

    public function beforeAddCrumb(\Magento\Theme\Block\Html\Breadcrumbs $subject, $crumbName, $crumbInfo)
    {
        $crumbName = $crumbName . "(!)";
        //$crumbInfo['label'] = $crumbInfo['label'] . "(!)";
        return [$crumbName, $crumbInfo];
    }
}
