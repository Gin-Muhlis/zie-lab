<?php

namespace App\Repositories\Product;

use LaravelEasyRepository\Repository;

interface ProductRepository extends Repository{

    public function getData();
    public function getDetailProduct($code);

    public function getPaginationData();
}
