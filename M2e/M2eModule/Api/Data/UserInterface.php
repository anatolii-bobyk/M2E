<?php

namespace M2e\M2eModule\Api\Data;

interface UserInterface
{
    /**
     *
     * @return int
     */
    public function getUserId(): int;

    /**
     *
     * @param int $userId
     * @return mixed
     */
    public function setUserId(int $userId);

    /**
     *
     * @return string
     */
    public function getName(): string;

    /**
     *
     * @param string $name
     * @return mixed
     */
    public function setName(string $name);

    /**
     *
     * @return string
     */
    public function getEmail(): string;

    /**
     *
     * @param string $email
     * @return mixed
     */
    public function setEmail(string $email);

    /**
     *
     * @return string
     */
    public function getPhone(): string;

    /**
     *
     * @param string $phone
     * @return mixed
     */
    public function setPhone(string $phone);

    /**
     *
     * @return int
     */
    public function getAuthId(): int;

    /**
     *
     * @param int $authId
     * @return mixed
     */
    public function setAuthId(int $authId);
}
