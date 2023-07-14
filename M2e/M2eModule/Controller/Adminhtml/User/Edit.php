<?php

namespace M2e\M2eModule\Controller\Adminhtml\User;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Forward;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\Page;
use M2e\M2eModule\Helper\UserData;

class Edit extends Action
{
    /**
     * @var UserData
     */
    private $userData;

    /**
     * @param Context $context
     * @param UserData $userData
     */
    public function __construct(
        Context  $context,
        UserData $userData
    ) {
        $this->userData = $userData;
        parent::__construct($context);
    }

    /**
     *
     * @return ResponseInterface|Forward|(Forward&ResultInterface)|ResultInterface|Page|(Page&ResultInterface)
     */

    public function execute()
    {
        $user = $this->userData->getAuthorizedUser();
        $userId = $this->getRequest()->getParam('user_id');
        if ($user->getUserId() == $userId) {
            $userName = $user->getName();
            $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
            $resultPage->getConfig()->getTitle()->prepend(__("$userName"));
        } else {
            $resultPage = $this->resultFactory->create(ResultFactory::TYPE_FORWARD);
            $resultPage->forward('noroute');
        }
        return $resultPage;
    }
}
