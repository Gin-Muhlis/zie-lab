<?php

namespace App\Repositories\User;

use LaravelEasyRepository\Repository;

interface UserRepository extends Repository{

    public function getData();

    public function getPaginationData($page, $size);
    public function createData($data);
    public function updateData($data, $id);
    public function deleteData($id);
}
