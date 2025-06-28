<?php

namespace App\Http\Controllers;
use App\Models\Business;
use App\Models\User;
use Illuminate\Http\Request;

class BusinessController extends Controller {

    public function index() {
        $businesses = Business::with( 'user' )->orderByDesc( 'created_at' )->paginate( 15 );
        return view( 'admin.businesses.index', compact( 'businesses' ) );
    }

    public function create() {
        $users = User::all();
        return view( 'admin.businesses.editdelete', [
            'business' => new Business(),
            'users' => $users,
        ] );
    }

    public function store( Request $request ) {

        $data = $request->validate( [
            'user_id' => 'required|exists:users,id',
            'province' => 'required|string|max:255',
            'business_name' => 'required|string|max:255',
            'address1' => 'required|string|max:255',
            'address2' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'longitude' => 'nullable|numeric',
            'latitude' => 'nullable|numeric',
            'phone' => 'required|string|max:50',
            'web_address' => 'nullable|url|max:255',
            'status' => 'required|in:active,pending,suspended',
            'email' => 'required|email|max:255',
            'categories.*' => 'required|string',
        ] );

        $data[ 'categories' ] = json_encode( array_map( 'trim', explode( ',', $data[ 'categories' ] ) ) );

        Business::create( $data );

        return redirect()->route( 'admin.businesses.index' )->with( 'success', 'Business added successfully.' );
    }

    public function edit( Business $business ) {
        $users = User::all();
        return view( 'admin.businesses.editdelete', [
            'business' => $business,
            'users' => $users,
        ] );
    }

    public function update( Request $request, Business $business ) {
        $data = $request->validate( [
            'user_id' => 'required|exists:users,id',
            'province' => 'required|string|max:255',
            'business_name' => 'required|string|max:255',
            'address1' => 'required|string|max:255',
            'address2' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'longitude' => 'nullable|numeric',
            'latitude' => 'nullable|numeric',
            'phone' => 'required|string|max:50',
            'web_address' => 'nullable|url|max:255',
            'status' => 'required|in:active,pending,suspended',
            'email' => 'required|email|max:255',
            'categories' => 'required|array',
            'categories.*' => 'string|max:50',
        ] );

        $business->update( $data );

        return redirect()->route( 'admin.businesses.index' )->with( 'success', 'Business updated successfully.' );
    }

    public function destroy( Business $business ) {
        $business->delete();
        return redirect()->route( 'admin.businesses.index' )->with( 'success', 'Business deleted successfully.' );
    }

    public function searchOrAdd( Request $request ) {
        $businessName = $request->query( 'business_name' );

        // Search for business in DB
        $business = Business::where( 'business_name', 'like', "%{$businessName}%" )->first();

        return view( 'addbusiness', [
            'business_name' => $business ? $business->business_name : $businessName,
            'business' => $business
        ] );
    }

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

    public function businesssphoto() {
        return view( 'addphoto' );

    }

    public function Blogin() {
        return view( 'businesform.Businesform' );

    }

    public function dashboard() {
        return view( 'Businessdashboard.dashboard' );
    }
}
