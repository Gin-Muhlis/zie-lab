<?php

namespace App\Repositories\Section;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Section;

class SectionRepositoryImplement extends Eloquent implements SectionRepository
{


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

    // ambil data section yang berdasarkan order dan product id
    public function getByOrderProductId($order, $product_id)
    {
        return $this->model->where('product_id', $product_id)->where('order', $order)->first();
    }

    // ambil data section yang berdasarkan tipe order dan product id
    public function getByProductId($product_id, $order)
    {
        if ($order === 'asc') {
            return $this->model->with([
                'lessons' => function ($query) {
                    $query->orderBy('order', 'asc');
                }
            ])->where('product_id', $product_id)->orderBy('order')->get();
        } else {
            return $this->model->with([
                'lessons' => function ($query) {
                    $query->orderBy('order', 'asc');
                }
            ])->where('product_id', $product_id)->orderByDesc('order')->get();
        }
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

    // delete data
    public function deleteData($id)
    {
        return $this->delete($id);
    }
}
