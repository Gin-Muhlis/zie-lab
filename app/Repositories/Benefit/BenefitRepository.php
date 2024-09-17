<?php

namespace App\Repositories\Benefit;

use LaravelEasyRepository\Repository;

interface BenefitRepository extends Repository{

    public function createData($data);
}
