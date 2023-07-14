<?php

namespace M2e\M2eModule\Model;

use M2e\M2eModule\Api\Data\UserInterface;
use Magento\Framework\Model\AbstractModel;

class User extends AbstractModel implements UserInterface
{
    private const USER_ID = 'user_id';

    private const NAME = 'name';

    private const EMAIL = 'email';

    private const PHONE = 'phone';

    private const AUTH_ID = 'auth_id';

    /**
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_eventPrefix = 'm2e_m2emodule';
        $this->_eventObject = 'user';
        $this->_idFieldName = 'user_id';
        $this->_init(ResourceModel\User::class);
    }

    /**
     *
     * @return int
     */
    public function getUserId(): int
    {
        return (int)$this->getData(self::USER_ID);
    }

    /**
     *
     * @param int $userId
     * @return void
     */
    public function setUserId(int $userId)
    {
        $this->setData(self::USER_ID, $userId);
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
    public function getEmail(): string
    {
        return (string)$this->getData(self::EMAIL);
    }

    /**
     *
     * @param string $email
     * @return void
     */
    public function setEmail(string $email)
    {
        $this->setData(self::EMAIL, $email);
    }

    /**
     *
     * @return string
     */
    public function getPhone(): string
    {
        return (string)$this->getData(self::PHONE);
    }

    /**
     *
     * @param string $phone
     * @return void
     */
    public function setPhone(string $phone)
    {
        $this->setData(self::PHONE, $phone);
    }

    /**
     *
     * @return int
     */
    public function getAuthId(): int
    {
        return (int)$this->getData(self::AUTH_ID);
    }

    /**
     *
     * @param int $authId
     * @return void
     */
    public function setAuthId(int $authId)
    {
        $this->setData(self::AUTH_ID, $authId);
    }
}
