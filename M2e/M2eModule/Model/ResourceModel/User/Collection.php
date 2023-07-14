<?php

namespace M2e\M2eModule\Model\ResourceModel\User;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use M2e\M2eModule\Model\User;
use M2e\M2eModule\Model\ResourceModel\User as UserResource;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'user_id';

    /**
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(User::class, UserResource::class);
    }
}
