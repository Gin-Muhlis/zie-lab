<?php

namespace App\Repositories\ProfileCompany;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\ProfileCompany;

class ProfileCompanyRepositoryImplement extends Eloquent implements ProfileCompanyRepository{


    protected $model;

    public function __construct(ProfileCompany $model)
    {
        $this->model = $model;
    }

    public function getData() {
        return $this->model->latest()->first();
    }
}
