<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function create(array $data) : User
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'email_verified_at' => now(),
        ]);

        return $user;
    }

    public function byEmail(array $data) : User | null
    {
        $user = User::where('email', $data['email'])->first();

        return $user;
    }

}