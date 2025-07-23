<?php

namespace App\Http\Controllers;

use App\Statics\HttpStatus;
use App\Statics\HttpMessages;

abstract class Controller
{
    //
    protected function respondWithSuccess($data = [],  String $message, int $code = HttpStatus::OK)
    {
        return response()->json([
            'status' => HttpMessages::get($code),
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ], $code);
    }
    protected function respondWithUnprocessable($data = [],  String $message, int $code = HttpStatus::UNPROCESSABLE_ENTITY)
    {
        return response()->json([
          'status' => HttpMessages::get($code),
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ], $code);
    }
    protected function respondWithCreated($data = [],  String $message, int $code = HttpStatus::CREATED)
    {
        return response()->json([
          'status' => HttpMessages::get($code),
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ], $code);
    }
    protected function respondWithBadRequest($data = [],  String $message, int $code = HttpStatus::BAD_REQUEST)
    {
        return response()->json([
            'status' => HttpMessages::get($code),
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ], $code);
    }
    protected function respondWithUnauthorized($data = [],  String $message, int $code = HttpStatus::UNAUTHORIZED)
    {
        return response()->json([
           'status' => HttpMessages::get($code),
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ], $code);
    }
    protected function respondWithForbidden($data = [],  String $message, int $code = HttpStatus::FORBIDDEN)
    {
        return response()->json([
           'status' => HttpMessages::get($code),
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ], $code);
    }
    protected function respondWithNotFound($data = [],  String $message, int $code = HttpStatus::NOT_FOUND)
    {
        return response()->json([
            'status' => HttpMessages::get($code),
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ], $code);
    }
     protected function respondWithInternalServerError($data = [],  String $message, int $code = HttpStatus::INTERNAL_SERVER_ERROR)
    {
        return response()->json([
            'status' => HttpMessages::get($code),
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ], $code);
    }
    
}