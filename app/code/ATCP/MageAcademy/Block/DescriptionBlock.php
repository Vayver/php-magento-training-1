<?php


namespace ATCP\MageAcademy\Block;

use Magento\Catalog\Block\Product\View\Description;
use Magento\Framework\View\Element\Template;

class DescriptionBlock extends Template
{
    public function beforeToHtml(Description $description)
    {
        $description->setTemplate('ATCP_MageAcademy::description.phtml');
    }
}
