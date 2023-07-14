<?php

namespace M2e\M2eModule\Controller\Adminhtml\Product;

use M2e\M2eModule\Model\ProductFactory;
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
     * @var ProductFactory
     */
    private $productFactory;

    /**
     * @param Context $context
     * @param ProductFactory $productFactory
     */
    public function __construct(
        Context        $context,
        ProductFactory $productFactory
    ) {
        $this->productFactory = $productFactory;
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
            $this->productFactory->create()
                ->setData($to_save_data)
                ->save();
        } catch (Exception $e) {
            $this->messageManager->addErrorMessage('Product with this SKU already exist! Choose another one');
            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setRefererOrBaseUrl();
            return $resultRedirect;
        }

        return $this->resultRedirectFactory->create()->setPath(self::BASE_PATH);
    }
}
