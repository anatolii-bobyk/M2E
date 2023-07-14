<?php

namespace M2e\M2eModule\Controller\Adminhtml\Product;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use M2e\M2eModule\Model\ProductRepository;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Result\Page;
use Magento\TestFramework\Exception\NoSuchActionException;

class Edit extends Action
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * @param Context $context
     * @param ProductRepository $productRepository
     */
    public function __construct(
        Context           $context,
        ProductRepository $productRepository
    ) {
        $this->productRepository = $productRepository;
        parent::__construct($context);
    }

    /**
     *
     * @return ResponseInterface|ResultInterface|Page|(Page&ResultInterface)
     * @throws NoSuchEntityException
     */
    public function execute()
    {
        $productId = $this->getRequest()->getParam('id');
        $productName = $this->getProductName($productId);
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend(__("$productName"));
        return $resultPage;
    }

    /**
     *
     * @param $productId
     * @return string
     * @throws NoSuchEntityException
     */
    public function getProductName($productId)
    {
        try {
            $productName = $this->productRepository->getById($productId)->getName();
        } catch (NoSuchActionException $exception) {
            $this->messageManager->addErrorMessage(__($exception->getMessage()));
        }
        return $productName;
    }
}
