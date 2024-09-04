<?php

namespace App\Repositories\User;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\User;

class UserRepositoryImplement extends Eloquent implements UserRepository{

    protected $model;

    public function __construct(User $model)
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
