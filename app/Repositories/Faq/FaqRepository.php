<?php

namespace App\Repositories\Faq;

use LaravelEasyRepository\Repository;

interface FaqRepository extends Repository{

    public function getData();
}
