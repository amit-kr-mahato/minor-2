<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
  protected $fillable = ['name', 'type', 'slug', 'icon', 'group'];

    protected static function booted()
    {
        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });

        static::updating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    // In Category.php
public function getRouteKeyName()
{
    return 'slug';
}


    public function businesses()
{
    return $this->belongsToMany(Business::class, 'business_category');
}


//     public function businesses()
// {
//     return $this->hasMany(Business::class);
// }

}
