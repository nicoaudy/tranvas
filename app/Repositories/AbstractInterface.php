<?php

namespace App\Repositories;

interface AbstractInterface
{
    public function getById($id);
    public function getAll($limit = 10);
    public function getAllNoLimit();
    public function create(array $attributes);
    public function update(array $attributes, $id, $getDataBack = false);
    public function remove($id);
}
