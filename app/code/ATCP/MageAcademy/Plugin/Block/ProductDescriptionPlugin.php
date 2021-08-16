<?php


namespace ATCP\MageAcademy\Plugin\Block;

use Magento\Catalog\Block\Product\View\Description;

class ProductDescriptionPlugin
{
    public function beforeToHtml(Description $description)
    {
        $description->getProduct()->setDescription('Temporary product description');
    }
}
