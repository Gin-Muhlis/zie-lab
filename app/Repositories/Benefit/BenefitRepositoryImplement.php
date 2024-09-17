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
    public function createdata($data) {
        return $this->create($data);
    }
}
