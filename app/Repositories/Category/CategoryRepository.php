<?php

namespace App\Repositories\Category;

use LaravelEasyRepository\Repository;

interface CategoryRepository extends Repository{

    public function getData();
    public function getCategoryHasProduct();
    public function createData($data);
    public function updateData($data, $id);
    public function deleteData($id);
}
