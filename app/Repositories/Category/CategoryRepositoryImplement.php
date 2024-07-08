<?php

namespace App\Repositories\Category;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Category;

class CategoryRepositoryImplement extends Eloquent implements CategoryRepository{

    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function getData() {
        return $this->model->latest()->get();
    }

    public function getCategoryHasProduct() {
        return $this->model->with('products')->latest()->has('products')->get();
    }
}
