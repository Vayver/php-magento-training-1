<?php

namespace ATCP\MageAcademy\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Customer\Model\Session;
use Psr\Log\LoggerInterface;

class MyObserver implements ObserverInterface
{
    private $session;
    private $logger;

    public function __construct(Session $session,
                                LoggerInterface $logger)
    {
        $this->session = $session;
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $userIdByObserver = $observer->getCustomer()->getEntityId();
        $userIdBySession = $this->session->getCustomerId();
        $logTime = date('H:i:s');
        $this->logger->info("User id : $userIdByObserver - $userIdBySession logged in at $logTime");
    }
}
