<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'province',
        'business_name',
        'address1',
        'address2',
        'city',
        'postal_code',
        'longitude',
        'latitude',
        'phone',
        'web_address',
        'status',
        'email',
        'categories',
    ];

    protected $casts = [
        'categories' => 'array',
        'longitude' => 'decimal:8',
        'latitude' => 'decimal:8',
    ];

    // Relationship: owner user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
