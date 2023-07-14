<?php

namespace M2e\M2eModule\Api;

interface UserRepositoryInterface
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

    /**
     *
     * @param $column
     * @param $value
     * @return mixed
     */
    public function getByColumnValue($column, $value);
}
