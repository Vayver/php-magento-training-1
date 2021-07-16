<?php


namespace ATCP\MageAcademy\Plugin\Model;

use Magento\Catalog\Model\Product;
use Magento\Store\Model\StoreManagerInterface;

class ProductNamePlugin
{
    private $storeManager;

    public function __construct(StoreManagerInterface $storeManager)
    {
        $this->storeManager = $storeManager;
    }

    public function aroundGetName(Product $subject, callable $proceed, $result): string
    {
        if($this->storeManager->getStore()->getCode() == 'uk')
        {
            return substr($result,0,15);
        }
        else
        {
            return $result;
        }
    }
}
