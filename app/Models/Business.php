<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id',
        'business_name',
        'province',
        'city',
        'address1',
        'address2',
        'postal_code',
        'longitude',
        'latitude',
        'phone',
        'web_address',
        'email',
        'categories', // as string or convert to array with proper input
        'logo',
        'banner',
        // 'status', // if using status filtering
    ];

    protected $casts = [
        'categories' => 'array',
        'longitude' => 'decimal:8',
        'latitude' => 'decimal:8',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function scopeStatus($query, $status) {
        return $query->where('status', $status);
    }

    public function getLogoUrlAttribute() {
        return $this->logo ? asset('storage/' . $this->logo) : null;
    }

    public function getBannerUrlAttribute() {
        return $this->banner ? asset('storage/' . $this->banner) : null;
    }
}
