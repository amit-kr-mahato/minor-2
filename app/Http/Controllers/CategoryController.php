<?php

namespace App\Http\Controllers;
  use App\Models\Category;
use App\Models\Business;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display the specified category by slug along with its businesses.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */

public function show($slug)
{
    $category = Category::where('slug', $slug)->firstOrFail();
    $businesses = Business::where('category_id', $category->id)->get();

    return view('categories.show', compact('category', 'businesses'));
}

}
