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

    // ambil paginasi data untuk browse data
    public function getBrowsePaginationData()
    {
        return $this->model->with(relations: ['category', 'author'])->latest();
    }

    // ambil detail data
    public function getDetailProduct($code)
    {
        return $this->model->with(['author', 'sections.lessons', 'benefits', 'category'])->where('code', $code)->first();
    }


    // ambil paginasi data
    public function getPaginationDataByType($page, $size, $type)
    {
        return $this->model->with('category')->where('type', $type)->orderByDesc('created_at')->paginate($size, ['*'], 'page', $page);
    }

    // tambah data
    public function createData($data)
    {
        return $this->create($data);
    }

    // edit data
    public function updateData($data, $id)
    {
        return $this->update($id, $data);
    }


}
