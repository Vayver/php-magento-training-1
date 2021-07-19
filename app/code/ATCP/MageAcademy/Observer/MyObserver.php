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

    public function __construct(Session $session, LoggerInterface $logger)
    {
        $this->session = $session;
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $user_id_by_observer = $observer->getCustomer()->getEntityId();
        $user_id_by_session = $this->session->getCustomerId();
        $log_time = date('H:i:s');
        $this->logger->info("User id : $user_id_by_observer - $user_id_by_session logged in at $log_time");
    }
}
