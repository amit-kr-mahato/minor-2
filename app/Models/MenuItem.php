<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model {
    use HasFactory;

    protected $fillable = [
        'business_id',
        'name',
        'category',
        'price',
        'image'
    ];

    public function business() {
        return $this->belongsTo( Business::class );
    }
}
