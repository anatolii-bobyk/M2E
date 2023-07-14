<?php

namespace M2e\M2eModule\Controller\Adminhtml\Index;

use Exception;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use M2e\M2eModule\Model\ProductRepository;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;

class Delete extends Action
{
    private const BASE_PATH = '*/*/';

    private const EDIT_PATH = '*/*/edit';

    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @param Context $context
     * @param ProductRepository $productRepository
     */
    public function __construct(
        Context           $context,
        ProductRepository $productRepository
    ) {
        parent::__construct($context);
        $this->productRepository = $productRepository;
    }

    /**
     *
     * @return ResponseInterface|Redirect|ResultInterface
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $this->productRepository->deleteById($id);
                $this->messageManager->addSuccessMessage(__('Product deleted'));
                return $resultRedirect->setPath(self::BASE_PATH);
            } catch (Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath(self::EDIT_PATH, ['id' => $id]);
            }
        }
        $this->messageManager->addErrorMessage(__('Product does not exist'));
        return $resultRedirect->setPath(self::BASE_PATH);
    }
}
