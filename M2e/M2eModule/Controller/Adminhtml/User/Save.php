<?php

namespace M2e\M2eModule\Controller\Adminhtml\User;

use M2e\M2eModule\Model\UserFactory;
use Exception;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;

class Save extends Action
{
    private const BASE_PATH = 'm2e/index/index';

    /**
     * @var UserFactory
     */
    private $userFactory;

    /**
     * @param Context $context
     * @param UserFactory $userFactory
     */
    public function __construct(
        Context     $context,
        UserFactory $userFactory
    ) {
        $this->userFactory = $userFactory;
        parent::__construct($context);
    }

    /**
     *
     * @return ResponseInterface|Redirect|ResultInterface
     */

    public function execute()
    {
        try {
            $to_save_data = $this->getRequest()->getPostValue()['general'];
            $user = $this->userFactory->create();
            $user->setData($to_save_data)
                ->save();
            $this->messageManager->addSuccessMessage('form data saved');
        } catch (Exception $e) {
            $this->messageManager->addErrorMessage('User with this auth_id already exists');
            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setRefererOrBaseUrl();
            return $resultRedirect;
        }

        $this->_eventManager->dispatch(
            'set_auth_id_observer',
            ['form_data' => $user]
        );

        return $this->resultRedirectFactory->create()->setPath(self::BASE_PATH);
    }
}
