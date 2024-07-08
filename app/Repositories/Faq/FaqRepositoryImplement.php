<?php

namespace App\Repositories\Faq;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Faq;

class FaqRepositoryImplement extends Eloquent implements FaqRepository{

    protected $model;

    public function __construct(Faq $model)
    {
        $this->model = $model;
    }

    public function getData() {
        return $this->model->latest()->get();
    }
}
