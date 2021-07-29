<?php


namespace ATCP\MageAcademy\Controller\Index;

use Magento\Framework\App\ActionInterface;

class Test implements ActionInterface
{
    public function execute()
    {
        $_SESSION['log_in_time'] = date("H:i:s");
        echo $_SESSION['log_in_time'];
        echo "Hello world!";
        exit;
    }
}
