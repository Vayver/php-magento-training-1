<?php


namespace ATCP\MageAcademy\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\App\ResponseInterface;

class Home implements ActionInterface
{
    private $response;
    private $storeManager;

    public function __construct(StoreManagerInterface $storeManager,
                                ResponseInterface $response
    )
    {
        $this->response = $response;
        $this->storeManager = $storeManager;
    }
    public function execute()
    {
        $homeUrl = $this->storeManager->getStore()->getUrl();
        $this->response->setRedirect($homeUrl)->sendResponse();
    }
}
