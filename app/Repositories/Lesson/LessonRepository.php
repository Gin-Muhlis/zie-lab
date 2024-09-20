<?php

namespace App\Repositories\Lesson;

use LaravelEasyRepository\Repository;

interface LessonRepository extends Repository{

    public function getLastOrderLesson($section_id);
    public function createData($data);
    public function updateData($data, $id);
}
