<?php

namespace M2e\M2eModule\Model;

use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use M2e\M2eModule\Api\UserRepositoryInterface;
use M2e\M2eModule\Model\ResourceModel\User;
use M2e\M2eModule\Model\ResourceModel\User\CollectionFactory;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var UserFactory
     */
    private $userFactory;

    /**
     * @var User
     */
    private $userResource;

    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @param UserFactory $userFactory
     * @param User $userResource
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        UserFactory       $userFactory,
        User              $userResource,
        CollectionFactory $collectionFactory
    ) {
        $this->userFactory = $userFactory;
        $this->userResource = $userResource;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     *
     * @param $id
     * @return \M2e\M2eModule\Model\User|mixed
     */
    public function getById($id)
    {
        $user = $this->userFactory->create();
        $this->userResource->load($user, $id);
        return $user;
    }

    /**
     *
     * @param $column
     * @param $value
     * @return \Magento\Framework\DataObject|mixed|null
     */
    public function getByColumnValue($column, $value)
    {
        return $this->collectionFactory->create()->getItemByColumnValue($column, $value);
    }

    /**
     *
     * @param $id
     * @return true
     * @throws CouldNotDeleteException
     */
    public function deleteById($id)
    {
        $user = $this->getById($id);
        try {
            $this->userResource->delete($user);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(
                __('Could not delete the entry: %1', $exception->getMessage())
            );
        }
        return true;
    }
}
