<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'token',
        'idx',
        'amount',
        'user_id',
        'payload',
        'status',
    ];

    protected $casts = [
        'payload' => 'array',
    ];

    /**
     * Payment belongs to a User (optional).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
