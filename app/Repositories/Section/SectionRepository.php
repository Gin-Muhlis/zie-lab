<?php

namespace App\Repositories\Section;

use LaravelEasyRepository\Repository;

interface SectionRepository extends Repository{

    public function getByProductId($product_id, $order);
    public function getLastOrderSection($product_id);
    public function getByOrderProductId($order, $product_id);
    public function createData($data);
    public function updateData($data, $id);
    public function deleteData($id);

}
