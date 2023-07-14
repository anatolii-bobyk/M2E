<?php

namespace M2e\M2eModule\Api;

interface ProductRepositoryInterface
{
    /**
     *
     * @param $id
     * @return mixed
     */
    public function getById($id);

    /**
     *
     * @param $id
     * @return mixed
     */
    public function deleteById($id);
}
