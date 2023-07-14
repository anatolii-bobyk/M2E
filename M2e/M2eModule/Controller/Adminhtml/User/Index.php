<?php

namespace M2e\M2eModule\Controller\Adminhtml\User;

use Magento\Backend\App\Action\Context;
use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use M2e\M2eModule\Helper\UserData;

class Index extends Action
{
    private const EDIT_PATH = 'm2e/user/edit/user_id/';

    private const ACTIVE_MENU = 'M2e_M2eModule::m2e_menu';

    private const IS_ALLOWED = 'M2e_M2eModule::user';

    /**
     * @var UserData
     */
    protected $userData;

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param UserData $userData
     */
    public function __construct(
        Context     $context,
        PageFactory $resultPageFactory,
        UserData    $userData
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->userData = $userData;
    }

    /**
     *
     * @return ResponseInterface|Redirect|ResultInterface|Page
     */
    public function execute()
    {
        $user = $this->userData->getAuthorizedUser();
        if ($user) {
            $userId = $user->getUserId();
            return $this->resultRedirectFactory->create()->setPath(self::EDIT_PATH . $userId);
        } else {
            $resultPage = $this->resultPageFactory->create();
            $resultPage->setActiveMenu(self::ACTIVE_MENU);
            $resultPage->getConfig()->getTitle()->prepend(__('Register'));

            return $resultPage;
        }
    }

    /**
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed(self::IS_ALLOWED);
    }
}
