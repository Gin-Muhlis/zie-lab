<?php

namespace App\Repositories\User;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\User;

class UserRepositoryImplement extends Eloquent implements UserRepository{

    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function createUser($data)
    {
        return $this->create($data);
    }
}
