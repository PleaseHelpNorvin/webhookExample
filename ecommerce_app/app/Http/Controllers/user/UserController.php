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
        return $this->respondWithCreated(['message' => 'User created']);
    }
    
    public function read(Request $request) {
        $users = $this->userRepo->all();
        return $this->respondWithSuccess(['message' => 'User data']);
    }

    public function update(Request $request) {
        $id = $request->id;
        $update = $this->userRepo->update($id, $request->all());
        return $this->respondWithSuccess(['message' => 'User updated']);
    }

    public function delete(Request $request) {
        $deleted = $this->userRepo->delete($request->id);
        return $this->respondWithSuccess(['message' => 'User deleted']);
    }

    public function show(string $id,Request $request) {
        $user = $this->userRepo->find($id);
        return $user 
            ? $this->respondWithSuccess(['id' => $id, 'message' => 'user info'])
            : $this->respondWithNotFound(['message' => 'User not found']);
    }
}
