<?php

namespace App\statics;

class HttpMessages
{
    public static array $messages = [
        HttpStatus::OK => 'Success',
        HttpStatus::CREATED  => 'Created successfully',
        HttpStatus::BAD_REQUEST  => 'Bad request',
        HttpStatus::UNAUTHORIZED  => 'Unauthorized',
        HttpStatus::FORBIDDEN => 'Forbidden',
        HttpStatus::NOT_FOUND  => 'Not found',
        HttpStatus::INTERNAL_SERVER_ERROR  => 'Server error',
    ];

    public static function get(int $code): string 
    {
        return self::$messages[$code] ?? 'uncknown status code';
    }
}

