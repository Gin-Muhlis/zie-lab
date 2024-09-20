<?php

namespace App\Repositories\Section;

use LaravelEasyRepository\Repository;

interface SectionRepository extends Repository{

    public function getLastOrderSection($product_id);
    public function createData($data);
    public function updateData($data, $id);

}
