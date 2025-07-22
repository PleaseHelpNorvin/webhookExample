<?php

    namespace App\Repositories\Auth;

    use App\Models\User;

    class RegisterRepository 
    {
        public function register(array $fields) : User 
        {
            return User::create([
                'name'     => $fields['name'],
                'email'    => $fields['email'],
                'password' => bcrypt($fields['password']),
            ]);
        }
    }
    
