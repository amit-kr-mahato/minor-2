<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
    * Register any application services.
    *
    * @return void
    */

    public function register() {
        //
    }

    /**
    * Bootstrap any application services.
    *
    * @return void
    */

public function boot()
{
  $all = Category::all()->groupBy(function ($category) {
    $groupLower = strtolower($category->group);
    info("Group value: $groupLower");
    return match ($groupLower) {
        'restaurants' => 'restaurants',
        'auto', 'auto services' => 'auto_services',
        'home', 'home services' => 'home_services',
    
        default => 'more',
    };
});


View::share('categories', $all);

}


}
