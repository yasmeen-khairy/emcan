<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository
{

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function getByRole($role)
    {
        return $this->model->where('role', $role)->get();
    }
}
