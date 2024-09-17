<?php

namespace App\Repositories\Product;

use LaravelEasyRepository\Repository;

interface ProductRepository extends Repository{

    public function getData();

    public function getPaginationDataByType($page, $size, $type);
    
    public function getDetailProduct($code);

    public function getBrowsePaginationData();

    public function createData($data);
    public function updateData($data, $id);
}
