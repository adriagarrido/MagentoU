<?php
/**
 *
 */
namespace Unit1\FirstModule\Controller\Action;

use Magento\Framework\App\Action\Action;

class Config extends Action
{
    public function execute()
    {
        $testConfig = $this->_objectManager->get('Unit1\FirstModule\Model\Config\ConfigInterface');
        $myNodeInfo = $testConfig->getMyNodeInfo();
        if (is_array($myNodeInfo)) {
            foreach ($myNodeInfo as $str) {
                $this->getResponse()->appendBody($str . "<br />");
            }
        }
    }
}
