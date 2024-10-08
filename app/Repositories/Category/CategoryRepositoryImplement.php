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

    // ambil data
    public function getData() {
        return $this->model->latest()->get();
    }

    // ambil paginasi data
    public function getPaginationData($page, $size) {
        return $this->model->orderByDesc('created_at')->paginate($size, ['*'], 'page', $page);
    }

    // ambil data yang memiliki produk
    public function getCategoryHasProduct() {
        return $this->model->with('products')->latest()->whereHas('products')->get();
    }

    // tambah data
    public function createdata($data) {
        return $this->create($data);
    }

    // update data
    public function updateData($data, $id) {
        return $this->update($id, $data);
    }

    // delete data
    public function deleteData($id) {
        return $this->delete($id);
    }
}
