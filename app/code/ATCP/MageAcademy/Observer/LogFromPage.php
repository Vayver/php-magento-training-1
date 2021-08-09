<?php


namespace ATCP\MageAcademy\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class LogFromPage implements ObserverInterface
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $response = $observer->getEvent()->getData('response');
        if (!$response) return;
        $body = $response->getBody();
        $this->logger->info("HTML Log from capture -> \n" . $body);
    }
}
