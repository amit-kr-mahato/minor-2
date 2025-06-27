<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'business_id',
        'user_id',
        'rating',
        'Review',
        // other columns
    ];

    // Define relationship if needed
    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}