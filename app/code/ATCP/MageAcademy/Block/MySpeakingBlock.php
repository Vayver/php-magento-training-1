<?php


namespace ATCP\MageAcademy\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class MySpeakingBlock extends Template
{
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    public function saySomething(string $timestamp)
    {
        date_default_timezone_set($timestamp);
        $actualDate = date('H:i:s');
        return __($actualDate);
    }
}
