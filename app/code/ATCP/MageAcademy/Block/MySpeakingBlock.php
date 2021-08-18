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

    public function saySomething()
    {
        date_default_timezone_set('Europe/Warsaw');
        $actualDate = date('Y-m-d H:i:s');
        return __($actualDate);
    }
}
