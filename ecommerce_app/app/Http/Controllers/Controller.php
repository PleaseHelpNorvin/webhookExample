<?php

namespace App\Http\Controllers;

use App\Statics\HttpStatus;
use App\Statics\HttpMessages;

abstract class Controller
{
    //
    protected function respondWithSuccess($data = [], int $code = HttpStatus::OK)
    {
        return response()->json([
            'status' => $code,
            'message' => HttpMessages::get($code),
            'data' => $data,
        ], $code);
    }
    protected function respondWithUnprocessable($data = [], int $code = HttpStatus::UNPROCESSABLE_ENTITY)
    {
        return response()->json([
            'status' => $code,
            'message' => HttpMessages::get($code),
            'data' => $data,
        ], $code);
    }
    protected function respondWithCreated($data = [], int $code = HttpStatus::CREATED)
    {
        return response()->json([
            'status' => $code,
            'message' => HttpMessages::get($code),
            'data' => $data,
        ], $code);
    }
    protected function respondWithBadRequest($data = [], int $code = HttpStatus::BAD_REQUEST)
    {
        return response()->json([
            'status' => $code,
            'message' => HttpMessages::get($code),
            'data' => $data,
        ], $code);
    }
    protected function respondWithUnauthorized($data = [], int $code = HttpStatus::UNAUTHORIZED)
    {
        return response()->json([
            'status' => $code,
            'message' => HttpMessages::get($code),
            'data' => $data,
        ], $code);
    }
    protected function respondWithForbidden($data = [], int $code = HttpStatus::FORBIDDEN)
    {
        return response()->json([
            'status' => $code,
            'message' => HttpMessages::get($code),
            'data' => $data,
        ], $code);
    }
    protected function respondWithNotFound($data = [], int $code = HttpStatus::NOT_FOUND)
    {
        return response()->json([
            'status' => $code,
            'message' => HttpMessages::get($code),
            'data' => $data,
        ], $code);
    }
     protected function respondWithInternalServerError($data = [], int $code = HttpStatus::INTERNAL_SERVER_ERROR)
    {
        return response()->json([
            'status' => $code,
            'message' => HttpMessages::get($code),
            'data' => $data,
        ], $code);
    }
    
}