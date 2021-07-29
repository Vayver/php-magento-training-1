<?php

namespace ATCP\MageAcademy\Plugin\Model;

use Magento\Customer\Model\Session;
use Magento\Framework\Event\ManagerInterface;

class MyRegisterObserverPlugin
{
    private $session;
    private $manager;

    public function __construct(Session $session,
                                ManagerInterface $manager)
    {
        $this->session = $session;
        $this->manager = $manager;
    }

    public function afterExecute()
    {
        $this->session->logout();
        $this->manager->dispatch('registration_event');
    }
}
