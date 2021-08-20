<?php


namespace ATCP\MageAcademy\Plugin\Model;

use \Magento\Catalog\Model\Product;

class ProductPlugin
{
    public function afterGetName(Product $subject, $result): string
    {
        return "[$result]";
    }
}
