<?php

namespace M2e\M2eModule\Model\ResourceModel\Product;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use M2e\M2eModule\Model\Product;
use M2e\M2eModule\Model\ResourceModel\Product as ProductResource;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'id';

    /**
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(Product::class, ProductResource::class);
    }
}
