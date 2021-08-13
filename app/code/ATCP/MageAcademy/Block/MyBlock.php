<?php


namespace ATCP\MageAcademy\Block;


class MyBlock extends \Magento\Framework\View\Element\AbstractBlock
{
    protected function _toHtml()
    {
        return "Hello world from my block! :)";
    }
}
