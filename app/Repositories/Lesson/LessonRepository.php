<?php

namespace App\Repositories\Lesson;

use LaravelEasyRepository\Repository;

interface LessonRepository extends Repository{

    public function getBySectionId($section_id, $order);
    public function getLastOrderLesson($section_id);

    public function getByOrderSectionId($order, $section_id);
    public function createData($data);
    public function updateData($data, $id);
    public function deleteData($id);
}
