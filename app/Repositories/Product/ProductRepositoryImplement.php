<?php

namespace App\Repositories\Product;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Product;

class ProductRepositoryImplement extends Eloquent implements ProductRepository
{

    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    // ambil data
    public function getData()
    {
        return $this->model->with(['category', 'author'])->latest()->get();
    }

    // ambil paginasi data
    public function getPaginationData($page, $size)
    {
        return $this->model->with('category')->orderByDesc('created_at')->paginate($size, ['*'], 'page', $page);
    }

    // ambil paginasi data untuk browse data
    public function getBrowsePaginationData()
    {
        return $this->model->with(['category', 'author'])->latest();
    }

    // ambil detail data
    public function getDetailProduct($code)
    {
        return $this->model->with(['author', 'sections.lessons', 'benefits'])->where('code', $code)->first();
    }
}
