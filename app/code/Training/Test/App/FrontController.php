<?php
namespace Training\Test\App;

class FrontController extends \Magento\Framework\App\FrontController
{
    /**
     * @var \Magento\Framework\App\RouterList
     */
    protected $routerList;

    /**
     * @var \Magento\Framework\App\Response\Http
     */
    protected $response;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * @param \Magento\Framework\App\RouterList $routerList
     * @param \Magento\Framework\App\Response\Http $response
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        \Magento\Framework\App\RouterList $routerList,
        \Magento\Framework\App\Response\Http $response,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->routerList = $routerList;
        $this->response = $response;
        $this->logger = $logger;
        parent::__construct($this->routerList, $this->response); // This doesnt appear on documentation course.
    }

    /**
     * @param  \Magento\Framework\App\RequestInterface $request
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        foreach ($this->routerList as $router) {
            $this->logger->addDebug(get_class($router));
        }
        return parent::dispatch($request);
    }
}
