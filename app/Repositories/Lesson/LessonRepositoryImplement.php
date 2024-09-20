<?php

namespace App\Repositories\Lesson;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Lesson;

class LessonRepositoryImplement extends Eloquent implements LessonRepository{

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

    // tambah data
    public function createData($data)
    {
        return $this->create($data);
    }
}
