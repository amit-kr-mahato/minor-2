<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;

class FrontendController extends Controller {
    public function home() {
        return view( 'index' );
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

    public function Login() {
        return view( 'business.login' );
    }

    public function Review() {
        return view( 'review' );
    }

    public function Project() {
        return view( 'project' );
    }

    public function Takeout() {
        return view( 'resturant.Takeout' );
    }

    public function Contractor() {
        return view( 'contractor' );
    }

    public function Sigin() {
        return view( 'sigin' );
    }

    public function Signup() {
        return view( 'signup' );
    }

    public function insert( Request $request ) {
        // Validate the inputs
        $request->validate( [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|in:admin,businessowner,user',
        ] );

        // Step 2: Create and save the user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
         $user->password = Hash::make($request->password); 
        $user->role = $request->role;
        $user->save();

        return redirect( 'sigin' )->with( 'success', 'Registration successful.' );
    }
  //dropdown for admin panel and user
    public function SigninCheck( Request $request ) {
        $credentials = $request->validate( [
            'email' => 'required|email',
            'password' => 'required|min:6',
            // 'role' => 'required|in:admin,businessowner,user',
        ] );

        if ( Auth::attempt( ['email' => $credentials[ 'email' ],'password' => $credentials[ 'password' ]] ) ) {
            $request->session()->regenerate();
            $user = Auth::user();

            // if ( $user->role !== $credentials[ 'role' ] ) {
            //     Auth::logout();
            //     return back()->withErrors( [
            //         'role' => 'Selected role does not match your account role.',
            //     ] )->withInput();
            // }

            // Role-based redirection
            return match ( $user->role ) {
                'admin' => redirect()->route( 'admin.dashboard' ),
                'businessowner' => redirect()->route( 'businessdashboard.dashboard' ),
                'user' => redirect()->route( 'index' ),
                default => redirect()->route( 'index' ), // fallback
            }
            ;
        }

        return back()->withErrors( [
            'email' => 'The email or password is incorrect.',
        ] )->withInput();
    }
}