<?php

namespace M2e\M2eModule\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\Page;
use M2e\M2eModule\Helper\UserData;

class Index extends Action
{
    private const ACTIVE_MENU = 'M2e_M2eModule::m2e_menu';

    private const IS_ALLOWED = 'M2e_M2eModule::products';

    /**
     * @var UserData
     */
    protected $userData;

    /**
     * @param Context $context
     * @param UserData $userData
     */
    public function __construct(
        Context  $context,
        UserData $userData
    ) {
        parent::__construct($context);
        $this->userData = $userData;
    }

    /**
     *
     * @return ResponseInterface|ResultInterface|Page|(Page&ResultInterface)
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu(self::ACTIVE_MENU);
        $resultPage->getConfig()->getTitle()->prepend(__('Products'));

        return $resultPage;
    }

    /**
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        $user = $this->userData->getAuthorizedUser();
        if ($user) {
            return $this->_authorization->isAllowed(self::IS_ALLOWED);
        } else {
            return false;
        }
    }
}
