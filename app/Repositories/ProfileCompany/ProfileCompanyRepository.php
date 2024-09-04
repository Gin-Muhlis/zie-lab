<?php

namespace App\Repositories\ProfileCompany;

use LaravelEasyRepository\Repository;

interface ProfileCompanyRepository extends Repository{

    public function getData();

    public function updateData($data, $id);
}
