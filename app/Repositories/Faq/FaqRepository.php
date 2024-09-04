<?php

namespace App\Repositories\Faq;

use LaravelEasyRepository\Repository;

interface FaqRepository extends Repository{

    public function getData();
    public function getPaginationData($page, $size);
    
    public function createData($data);
    public function updateData($data, $id);
    public function deleteData($id);
}
