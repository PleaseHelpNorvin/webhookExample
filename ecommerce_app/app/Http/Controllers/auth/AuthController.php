<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\Auth\RegisterRepository;
use App\Repositories\Auth\LoginRepository;
use Illuminate\Auth\AuthenticationException;

class AuthController extends Controller
{
    protected $registerRepo;
    protected $loginRepo;

    public function __construct(RegisterRepository $registerRepo, LoginRepository $loginRepo)
    {
        $this->registerRepo = $registerRepo;        
        $this->loginRepo = $loginRepo;
    }   

    public function register(RegisterRequest $request)
    {
        $fields = $request->validated();

        $user = $this->registerRepo->register($fields);
    
        $token = $user->createToken('usertoken')->plainTextToken;

        return $this->respondWithCreated([
            'user'  => $user,
            'token' => $token,
            'message' => 'User registered successfully!',
        ]);
    }

    public function login(LoginRequest $request, )
    {
        try {
            $fields = $request->validated();

            $user = $this->loginRepo->attempt($fields);

            $token = $user->createToken('usertoken')->plainTextToken;

            return $this->respondWithSuccess([
                'user'  => $user,
                'token' => $token
            ]);

        } catch (AuthenticationException $e) {
            return $this->respondWithUnauthorized(['message' => $e->getMessage()]);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $this->respondWithSuccess(['message' => 'Logged out successfully']);
    }

}
