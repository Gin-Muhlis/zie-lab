<?php

namespace App\Repositories\Lesson;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Lesson;

class LessonRepositoryImplement extends Eloquent implements LessonRepository
{

    protected $model;

    public function __construct(Lesson $model)
    {
        $this->model = $model;
    }

    // ambil data section yang ordernya terakhir
    public function getLastOrderLesson($section_id)
    {
        return $this->model->where('section_id', $section_id)->orderByDesc('order')->first();
    }

     // ambil data section yang berdasarkan order dan product id
     public function getByOrderSectionId($order, $section_id)
     {
         return $this->model->where('section_id', $section_id)->where('order', $order)->first();
     }

     // ambil data section yang berdasarkan tipe order dan product id
    public function getBySectionId($section_id, $order)
    {
        if ($order === 'asc') {
            return $this->model->with('lessons')->where('section_id', $section_id)->orderBy('order')->get();
        } else {
            return $this->model->with('lessons')->where('section_id', $section_id)->orderByDesc('order')->get();
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
