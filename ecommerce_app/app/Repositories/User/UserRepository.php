<?php

    namespace App\Repositories\User;

    use App\Models\User;

    class UserRepository 
    {
        public function create(array $data)
        {
            return User::create($data);
        }

        public function find($id)
        {
            return User::find($id);
        }

        public function update($id ,array $data)
        {
            $user = User::find($id);
            return $user ? $user->update($data): false;
        }

        public function delete($id)
        {
            return User::destroy($id);
        }

        public function all()
        {
            return User::all();
        }
    }
    
