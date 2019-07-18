<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Repositories\BaseRepository;

use App\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface {

    public function __construct(User $user) {
        $this->model = $user;
    }

    
}