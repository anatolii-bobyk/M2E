<?php

namespace M2e\M2eModule\Model;

use M2e\M2eModule\Api\Data\ProductInterface;
use Magento\Framework\Model\AbstractModel;

class Product extends AbstractModel implements ProductInterface
{
    private const NAME = 'name';

    private const SKU = 'sku';

    private const PRICE = 'price';

    private const QTY = 'qty';

    private const STATUS = 'status';

    /**
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_eventPrefix = 'm2e_m2emodule';
        $this->_eventObject = 'product';
        $this->_idFieldName = 'id';
        $this->_init(ResourceModel\Product::class);
    }

    /**
     *
     * @return string
     */
    public function getName(): string
    {
        return (string)$this->getData(self::NAME);
    }

    /**
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name)
    {
        $this->setData(self::NAME, $name);
    }

    /**
     *
     * @return string
     */
    public function getSku(): string
    {
        return (string)$this->getData(self::SKU);
    }

    /**
     *
     * @param string $sku
     * @return void
     */
    public function setSku(string $sku)
    {
        $this->setData(self::SKU, $sku);
    }

    /**
     *
     * @return int
     */
    public function getPrice(): int
    {
        return (int)$this->getData(self::PRICE);
    }

    /**
     *
     * @param int $price
     * @return void
     */
    public function setPrice(int $price)
    {
        $this->setData(self::PRICE, $price);
    }

    /**
     *
     * @return int
     */
    public function getQty(): int
    {
        return (int)$this->getData(self::QTY);
    }

    /**
     *
     * @param int $qty
     * @return void
     */
    public function setQty(int $qty)
    {
        $this->setData(self::QTY, $qty);
    }

    /**
     *
     * @return int
     */
    public function getStatus(): int
    {
        return (int)$this->getData(self::STATUS);
    }

    /**
     *
     * @param int $status
     * @return void
     */
    public function setStatus(int $status)
    {
        $this->setData(self::STATUS, $status);
    }
}
