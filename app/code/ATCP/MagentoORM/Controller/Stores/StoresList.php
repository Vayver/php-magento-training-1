<?php


namespace ATCP\MagentoORM\Controller\Stores;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\View\Result\PageFactory;

class StoresList implements ActionInterface
{
    private $pageFactory;

    public function __construct(PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
    }

    public function execute()
    {
        return $this->pageFactory->create();
    }
}
