<?php

namespace App\Http\Controllers;
use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller {
    public function business_store( Request $request ) {
        $request->validate( [
            'province' => 'required|string',
            'business_name' => 'required|string',
            'address1' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'categories' => 'required|array|min:1',
        ] );

        $businesses = new Business();
        $businesses->province = $request->input( 'province' );
        $businesses->business_name = $request->input( 'business_name' );
        $businesses->address1 = $request->input( 'address1' );
        $businesses->address2 = $request->input( 'address2' );
        $businesses->city = $request->input( 'city' );
        $businesses->postal_code = $request->input( 'postal_code' );
        $businesses->phone = $request->input( 'phone' );
        $businesses->web_address = $request->input( 'web_address' );
        $businesses->email = $request->input( 'email' );
        $businesses->categories = $request->input( 'categories' );

        $businesses->save();

        return redirect()->back()->with( 'success', 'Business added successfully!' );
    }

    public function Repairs() {
        return view( 'project.repair' );

    }

    public function Businessdetail() {
        return view( 'businessdetail' );

    }

    
    public function Seemorephoto() {
        return view( 'seemorebusinessdetail' );

    }

     public function Blogin() {
        return view( 'businesform.Businesform' );

    }

       public function Alogin() {
        return view( 'admin' );

    }
}
