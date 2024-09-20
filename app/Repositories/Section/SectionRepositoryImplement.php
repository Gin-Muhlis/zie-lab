<?php

namespace App\Repositories\Section;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Section;

class SectionRepositoryImplement extends Eloquent implements SectionRepository{

    
    protected $model;

    public function __construct(Section $model)
    {
        $this->model = $model;
    }

    // ambil data section yang ordernya terakhir
    public function getLastOrderSection($product_id)
    {
        return $this->model->where('product_id', $product_id)->orderByDesc('order')->first();
    }

    // tambah data
    public function createData($data)
    {
        return $this->create($data);
    }

    // update data
    public function updateData($data, $id)
    {
        return $this->update($id, $data);
    }
}
