<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository {

    public function findByEmail($email)
    {
        $user = User::where('email', $email)->firstOrFail(); 
        return $user;
    }
}