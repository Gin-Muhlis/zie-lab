<?php

namespace App\Repositories\Product;

use LaravelEasyRepository\Repository;

interface ProductRepository extends Repository{

    public function getData();

    public function getPaginationData($page, $size);
    
    public function getDetailProduct($code);

    public function getBrowsePaginationData();
}
