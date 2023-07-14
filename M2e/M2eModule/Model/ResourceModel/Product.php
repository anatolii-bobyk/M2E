<?php

namespace M2e\M2eModule\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Product extends AbstractDb
{
    /**
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('m2e_products', 'id');
    }
}
