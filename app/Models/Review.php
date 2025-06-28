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
     // 👇 Add this to fix the error
   public function user()
{
    return $this->belongsTo(User::class);
}

    // Define relationship if needed
  public function business()
{
    return $this->belongsTo(Business::class);
}
    
    
}