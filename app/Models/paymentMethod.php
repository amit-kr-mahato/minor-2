<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paymentMethod extends Model
{

    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'amount',
        'product_id',
        'status',
    ];
}
