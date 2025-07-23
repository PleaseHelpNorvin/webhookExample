<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;


class UserController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo){
        $this->userRepo = $userRepo;
    }

    public function create($userRepo) {
        $data = $userRepo->only(['name', 'email', 'password']);
        $user = $this->userRepo->create($data);
        return $this->respondWithCreated([
            'user' => $user,
        ], 'User created');
    }
    
    public function read() {
        $users = $this->userRepo->all();
        return $this->respondWithSuccess([
            'users' => $users, 
        ], "User data");
    }

    public function update(Request $request) {
        $id = $request->id;
        $updated = $this->userRepo->update($id, $request->all());
        return $this->respondWithSuccess([
            'user' => $updated,
        ], "User updated");
    }

    public function delete(Request $request) {
        $deleted = $this->userRepo->delete($request->id);
        return $this->respondWithSuccess([
            'user' => $deleted, 
        ], "User deleted");
    }

    public function show(string $id,Request $request) {
        $user = $this->userRepo->find($id);
        return $user 
            ? $this->respondWithSuccess(['id' => $user], 'user info')
            : $this->respondWithNotFound([],"User not found");
    }
}
