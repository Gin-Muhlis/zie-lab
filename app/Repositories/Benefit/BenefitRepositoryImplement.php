<?php

namespace App\Repositories\Benefit;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Benefit;

class BenefitRepositoryImplement extends Eloquent implements BenefitRepository{

    protected $model;

    public function __construct(Benefit $model)
    {
        $this->model = $model;
    }

    // tambah data
    public function createData($data) {
        return $this->create($data);
    }

    // hapus data
    public function deleteData($id) {
        return $this->delete($id);
    }

    // detail data berdasarkan benefit
    public function findBenefitByProductId($benefit, $product_id) {
        return $this->model->where('product_id', $product_id)->where('benefit', $benefit)->first();
    }
}
