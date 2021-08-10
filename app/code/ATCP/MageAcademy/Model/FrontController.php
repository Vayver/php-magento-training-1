<?php


namespace ATCP\MageAcademy\Model;

use Magento\Framework\App\RouterList;
use Magento\Framework\App\RequestInterface;
use Psr\Log\LoggerInterface;
use Magento\Framework\App\Response\Http;

class FrontController extends \Magento\Framework\App\FrontController
{
    private $logger;

    public function __construct(RouterList $routerList, LoggerInterface $logger, Http $response)
    {
        $this->logger = $logger;
        parent::__construct($routerList, $response);
    }

    public function dispatch(RequestInterface $request)
    {
        $list = [];
        $level = 'DEBUG';
        $message = "List ->";
        foreach ($this->_routerList as $router) {
            $list [] = get_class($router);
        }

        $this->logger->log($level, $message, $list);
//        $this->logger->info(print_r($list));
        return parent::dispatch($request);
    }
}
