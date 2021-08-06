<?php


namespace ATCP\MageAcademy\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Result\PageFactory;

class Params implements ActionInterface
{
    private $request;
    private $pageFactory;

    public function __construct(RequestInterface $request, PageFactory $pageFactory)
    {
        $this->request = $request;
        $this->pageFactory = $pageFactory;
    }

    public function execute()
    {
        $productId = (int) $this->request->getParam('id');
        $page = $this->pageFactory->create();
        $page->getConfig()->getTitle()->set($productId);
        return $page;
    }
}
