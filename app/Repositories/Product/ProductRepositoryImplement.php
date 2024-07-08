<?php

namespace App\Repositories\Product;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Product;

class ProductRepositoryImplement extends Eloquent implements ProductRepository{

    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function getData() {
        return $this->model->with(['category', 'author'])->latest()->get();
    }
}
