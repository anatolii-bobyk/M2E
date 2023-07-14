<?php

namespace M2e\M2eModule\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Backend\Model\Auth\Session;

class SetAuthId implements ObserverInterface
{
    private const AUTH_ID = 'auth_id';

    /**
     * @var Session
     */
    protected $authSession;

    /**
     * @param Session $authSession
     */
    public function __construct(
        Session $authSession
    ) {
        $this->authSession = $authSession;
    }

    /**
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $user = $observer->getEvent()->getFormData();
        $authUserId = $this->authSession->getUser()->getId();
        $user->setData(self::AUTH_ID, $authUserId)->save();
    }
}
