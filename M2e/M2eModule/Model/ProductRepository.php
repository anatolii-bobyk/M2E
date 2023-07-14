<?php

namespace M2e\M2eModule\Model;

use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use M2e\M2eModule\Api\ProductRepositoryInterface;
use M2e\M2eModule\Model\ResourceModel\Product;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @var ProductFactory
     */
    private $productFactory;

    /**
     * @var Product
     */
    private $productResource;

    /**
     * @param ProductFactory $productFactory
     * @param Product $productResource
     */
    public function __construct(
        ProductFactory $productFactory,
        Product        $productResource,
    ) {
        $this->productFactory = $productFactory;
        $this->productResource = $productResource;
    }

    /**
     *
     * @param $id
     * @return \M2e\M2eModule\Model\Product|mixed
     * @throws NoSuchEntityException
     */
    public function getById($id)
    {
        $product = $this->productFactory->create();
        $this->productResource->load($product, $id);
        if (!$product->getId()) {
            throw new NoSuchEntityException(__('Unable to find product with ID "%1"', $id));
        }
        return $product;
    }

    /**
     *
     * @param $id
     * @return true
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($id)
    {
        $product = $this->getById($id);
        try {
            $this->productResource->delete($product);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(
                __('Could not delete the entry: %1', $exception->getMessage())
            );
        }
        return true;
    }
}
