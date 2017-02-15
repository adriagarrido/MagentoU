<?php
/**
 *
 */
namespace Unit1\FirstModule\Observer;

class RedirrectToProductView implements \Magento\Framework\Event\ObserverInterface
{
    /**
     * @var \Magento\Framework\App\Response\RedirectInterface
     */
    protected $redirect;

    /**
     * @var \Magento\Framework\App\ActionFlag
     */
    protected $_actionFlag;

    /**
     * @param MagentoFrameworkAppResponseRedirectInterface $redirect
     * @param MagentoFrameworkAppActionFlag                $actionFlag
     */
    public function __construct(
        \Magento\Framework\App\Response\RedirectInterface $redirect,
        \Magento\Framework\App\ActionFlag $actionFlag
    ) {
        $this->redirect = $redirect;
        $this->_actionFlag = $actionFlag;
    }

    /**
     * @param  MagentoFrameworkEventObserver $observer
     * @return $this
     *
     * @SuppressWarnings(PHPMD.UnusedLocalVariable)
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        // $request = $observer->getEvent()->getData('request');
        // if ($request->getModuleName() != 'catalog' || $request->getControllerName() != 'product') {
        //     $controller = $observer->getControllerAction();
        //     $this->_actionFlag->set('', \Magento\Framework\App\Action\Action::FLAG_NO_DISPATCH, true);
        //     $this->redirect->redirect($controller->getResponse(), 'catalog/product/view/id/1');
        // }
    }
}
