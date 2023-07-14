<?php

namespace M2e\M2eModule\Api\Data;

interface ProductInterface
{
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
    public function getSku(): string;

    /**
     *
     * @param string $sku
     * @return mixed
     */
    public function setSku(string $sku);

    /**
     *
     * @return int
     */
    public function getPrice(): int;

    /**
     *
     * @param int $price
     * @return mixed
     */
    public function setPrice(int $price);

    /**
     *
     * @return int
     */
    public function getQty(): int;

    /**
     *
     * @param int $qty
     * @return mixed
     */
    public function setQty(int $qty);

    /**
     *
     * @return int
     */
    public function getStatus(): int;

    /**
     *
     * @param int $status
     * @return mixed
     */
    public function setStatus(int $status);
}
