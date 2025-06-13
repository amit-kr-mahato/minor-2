<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'province',
        'business_name',
        'address1',
        'address2',
        'city',
        'postal_code',
        'phone',
        'web_address',
        'email',
        'categories',
    ];

    protected $casts = [
        'categories' => 'array',
    ];
}


