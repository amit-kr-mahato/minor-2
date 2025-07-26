<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Business;
use App\Models\Review;
use App\Models\User;
use App\Notifications\VerificationEmail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class FrontendController extends Controller {
    public function home() {
        $ads = Advertisement::where( 'status', 'active' )->get();
        $reviews = Review::with( [ 'user', 'business' ] )->latest()->take( 6 )->get();
        return view( 'index', compact( 'ads', 'reviews' ) );
    }

    public function addBusiness() {
        return view( 'business.addbusiness' );
    }

    public function Claim() {
        return view( 'business.claim' );
    }

    public function explore() {
        return view( 'business.Explore' );
    }

    public function Review(  ) {
        // // You can pass business details if needed
        // $business = Business::findOrFail( $id );
        return view( 'review');
    }

    public function Project() {
        return view( 'project' );
    }

    public function Takeout() {
        $businesses = Business::all();
        return view( 'resturant.Takeout', compact( 'businesses' ) );
    }

    public function Contractor() {
        return view( 'contractor' );
    }

    public function Sigin() {
        return view( 'sigin' );
    }

    public function Signup() {
        $roles = [ 'user', 'businessowner' ];
        // Static roles for dropdown
        return view( 'signup', compact( 'roles' ) );
    }

    public function insert( Request $request ) {
        $request->validate( [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|in:user,businessowner,admin', // Validate role input
        ] );

        try {
            DB::beginTransaction();

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make( $request->password );
            $user->role = $request->role;
            $user->save();

            Notification::route( 'mail', $user->email )->notify( new VerificationEmail( [
                'name' => $user->name,
            ] ) );

            DB::commit();
            return redirect( 'sigin' )->with( 'success', 'Registration successful.' );
        } catch ( \Exception $e ) {
            DB::rollBack();
            return back()->withErrors( [ 'error' => $e->getMessage() ] );
        }
    }

    public function SigninCheck( Request $request ) {
        $credentials = $request->validate( [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ] );

        if ( Auth::attempt( $credentials ) ) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ( $user->role === 'admin' ) {
                return redirect()->route( 'admin.dashboard' );
            } elseif ( $user->role === 'businessowner' ) {
                return redirect()->route( 'businessdashboard.dashboard' );
            } else {
                return redirect()->route( 'index' );
            }
        }

        return back()->withErrors( [
            'email' => 'The email or password is incorrect.',
        ] )->withInput();
    }

    public function About() {
        return view( 'about' );
    }
}
