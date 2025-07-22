<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name',
        'price',
        'stock',
    ];
    
    protected function cast(): array
    {
        return [
            'price' => 'decimal:8,2',
            'stock' => 'integer',
        ];
    }
}
