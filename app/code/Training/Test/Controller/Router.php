<?php

namespace Training\Test\Controller;

class Router implements \Magento\Framework\App\RouterInterface
{
    protected $actionFactory;

    public function __construct(\Magento\Framework\App\ActionFactory $actionFactory)
    {
        $this->actionFactory = $actionFactory;
    }

    public function match(\Magento\Framework\App\RequestInterface $request)
    {
        $info = $request->getPathInfo();

        if (preg_match("%^/(test)-(.*?)-(.*?)$%", $info, $m)) {
            $request->setPathInfo(sprintf("/%s/%s/%s", $m[1], $m[2], $m[3]));
            return $this->actionFactory->create('Magento\Framework\App\Action\Forward', ['request' => $request]);
        }
        return null;
    }
}
