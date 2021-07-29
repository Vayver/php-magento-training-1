<?php

namespace ATCP\MageAcademy\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\UrlInterface;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\App\ResponseFactory;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Response\RedirectInterface;
use Magento\Framework\App\Response\Http;

class MyRegisterObserver implements ObserverInterface
{
    private $url;
    private $message;
    private $responseFactory;
    private $resultFactory;
    private $redirect;
    private $responseInterface;
    private $response;

    public function __construct(Http $response,
                                ResponseInterface $responseInterface,
                                UrlInterface $url,
                                ManagerInterface $message,
                                ResponseFactory $responseFactory,
                                ResultFactory $resultFactory,
                                RedirectInterface $redirect

    )
    {
        $this->url = $url;
        $this->message = $message;
        $this->responseFactory = $responseFactory;
        $this->resultFactory = $resultFactory;
        $this->redirect = $redirect;
        $this->responseInterface = $responseInterface;
        $this->response = $response;
    }

    public function execute(Observer $observer)
    {
//        ---Old and wrong code---
//        $page_url = $this->url->getUrl('customer/account/login/');
//        $this->response->setRedirect($page_url)->sendResponse();
//        $this->message->addSuccessMessage('Registration complete. Log in to your account.');
//        exit;
//
        $page_url = $this->url->getUrl('customer/account/login/');
        $this->message->addNoticeMessage('Registration complete. Log in to your account.');

//        ---HTTP Response solution---
        $this->response->setRedirect($page_url);
//        ---ResultFactory solution---
//        $resultRedirect = $this->resultFactory->create();
//        $resultRedirect->setRedirect($page_url)->sendResponse();

//        ---ResponseInterface solution---
//        $this->responseInterface->setRedirect($page_url)->sendResponse();

//        ---ResponseFactory solution---
//        $this->responseFactory->create()->setRedirect($page_url)->sendResponse();

//        ---ResponseFactory with return value---`
//        $resultRedirect->setUrl($page_url);
//        $resultRedirect = $this->responseFactory->create()->setRedirect($page_url)->sendResponse();
//        return $resultRedirect;

//        ---ResultFactory with creation type---
//        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
//        $resultRedirect->setUrl('test/customer/account/login/');
//        $resultRedirect->setPath('customer/account/login/');

    }
}
