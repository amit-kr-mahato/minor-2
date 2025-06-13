<?php

namespace App\Http\Controllers;
use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function business_store(Request $request)
{
    $request->validate([
        'province' => 'required|string',
        'business_name' => 'required|string',
        'address1' => 'required|string',
        'city' => 'required|string',
        'postal_code' => 'required|string',
        'phone' => 'required|string',
        'email' => 'required|email',
        'categories' => 'required|array|min:1',
    ]);


     $businesses = new Business();
     $businesses->province = $request->input('province');
     $businesses->business_name = $request->input('business_name');
     $businesses->address1 = $request->input('address1');
     $businesses->address2 = $request->input('address2');
     $businesses->city = $request->input('city');
     $businesses->postal_code = $request->input('postal_code');
     $businesses->phone = $request->input('phone');
     $businesses->web_address = $request->input('web_address');
     $businesses->email = $request->input('email');
     $businesses->categories = $request->input('categories');


    // Business::create([
    //     'province' => $request->province,
    //     'business_name' => $request->business_name,
    //     'address1' => $request->address1,
    //     'address2' => $request->address2,
    //     'city' => $request->city,
    //     'postal_code' => $request->postal_code,
    //     'phone' => $request->phone,
    //     'web_address' => $request->web_address,
    //     'email' => $request->email,
    //     'categories' => $request->categories,
    // ]);

    return redirect()->back()->with('success', 'Business added successfully!');
}

}
