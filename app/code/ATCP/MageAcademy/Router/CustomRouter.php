<?php


namespace ATCP\MageAcademy\Router;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\RouterInterface;
use Magento\Framework\App\ActionFactory;

class CustomRouter implements RouterInterface
{
    private $actionFactory;

    public function __construct(ActionFactory $actionFactory)
    {
        $this->actionFactory = $actionFactory;
    }

    public function match(RequestInterface $request)
    {
        $identifier = $request->getPathInfo();
        if (preg_match("%^/(.*?)-(.*?)-(.*?)$%", $identifier, $match))
        {
//            $request->setModuleName($match[1])->setControllerName($match[2])->setActionName($match[3]);
            $request->setPathInfo(sprintf("/%s/%s/%s", $match[1], $match[2], $match[3]));

            return $this->actionFactory->create(\Magento\Framework\App\Action\Forward::class);
        }
        return null;
    }
}
