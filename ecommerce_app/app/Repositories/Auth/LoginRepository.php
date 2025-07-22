<?php

    namespace App\Repositories\Auth;

    use App\Models\User;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Auth\AuthenticationException;

    class LoginRepository 
    {
        public function attempt(array $fields) : User
        {

            $user = User::where('email', $fields['email'])->first();

            if (!$user || !Hash::check($fields['password'], $user->password)) {
                throw new AuthenticationException('Invalid credentials');
            }

            return $user;
        }
    } 
