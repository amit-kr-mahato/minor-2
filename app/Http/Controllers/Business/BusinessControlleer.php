<?php
namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Business;
use Illuminate\Support\Facades\Storage;

class BusinessControlleer extends Controller
{
  // For listing businesses (index)
public function index()
{
    $businesses = Business::where('user_id', auth()->id())->get();
    return view('Businessdashboard.businesses', [
        'mode' => 'index',
        'businesses' => $businesses,
    ]);
}

// Show create form
public function create()
{
    return view('Businessdashboard.businesses', ['mode' => 'create']);
}

// Show edit form
public function edit(Business $business)
{
    $this->authorizeAccess($business);

    return view('Businessdashboard.businesses', [
        'mode' => 'edit',
        'business' => $business,
    ]);
}

}
