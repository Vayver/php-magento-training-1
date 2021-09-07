<?php


namespace ATCP\MagentoORM\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class SaveProductObserver implements ObserverInterface
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $product = $observer->getEvent()->getProduct();
        if ($product->isDataChanged() || $product->isObjectNew()) {
            $logMessage = PHP_EOL . 'Product Saving Log...' . PHP_EOL;
            foreach ($product->getData() as $key => $value) {
                if((is_string($value))) {
                    $logMessage .= $key . ' : ' . $value . PHP_EOL;
                }
            }
        }
        if (!empty($logMessage)) {
            $this->logger->info($logMessage);
        }
    }
}
