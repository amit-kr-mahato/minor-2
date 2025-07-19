<?php

namespace App\Http\Controllers;
use App\Models\Advertisement;

use Illuminate\Http\Request;

class UserController extends Controller
{
  
public function dashboard()
{
    $ads = Advertisement::where('status', 'active')->get();
    return view('index', compact('ads'));
}
}
