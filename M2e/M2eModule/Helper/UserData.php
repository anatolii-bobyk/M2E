<?php

namespace M2e\M2eModule\Helper;

use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Backend\Model\Auth\Session;
use M2e\M2eModule\Model\UserRepository;

/**
 * Products helper
 */
class UserData extends AbstractHelper
{
    private const AUTH_ID = 'auth_id';
    /**
     * @var Session
     */
    protected $authSession;

    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @param Context $context
     * @param Session $authSession
     * @param UserRepository $userRepository
     */
    public function __construct(
        Context        $context,
        Session        $authSession,
        UserRepository $userRepository
    ) {
        $this->authSession = $authSession;
        $this->userRepository = $userRepository;
        parent::__construct($context);
    }

    /**
     *
     * @return \Magento\Framework\DataObject|mixed|null
     */
    public function getAuthorizedUser()
    {
        $authUserId = $this->authSession->getUser()->getId();
        return $this->userRepository->getByColumnValue(self::AUTH_ID, $authUserId);
    }
}
