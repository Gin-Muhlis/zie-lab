<?php

namespace App\Repositories\Lesson;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Lesson;

class LessonRepositoryImplement extends Eloquent implements LessonRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Lesson $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)
}
