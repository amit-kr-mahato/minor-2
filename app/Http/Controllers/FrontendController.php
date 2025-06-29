<?php

namespace App\Http\Controllers;
use App\Notifications\VerificationEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use Spatie\Permission\Models\Role;

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
        $roles = Role::where('name', '!=', 'Admin')->get();
        return view( 'signup', compact('roles'));
    }

    public function insert( Request $request ) {
        // Validate the inputs

        $request->validate( [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required',
        ] );

        try {
            DB::beginTransaction();

            // Step 2: Create and save the user
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make( $request->password );

            $user->role = 'admin';
            $user->save();

            $roleId= $request->role;
            $role = Role::where('id',$roleId)->first();

            $user->assignRole($role->name);



            $userData = [
                'name'=> $user->name
            ];

            Notification::route( 'mail', $request->email )->notify( new VerificationEmail( $userData ) );
            // auth()->login( $user );
            // Log them in

            // $user->sendEmailVerificationNotification();
            // // Send verification link

            // return redirect( '/email/verify' );
            // // Built-in page saying “Please verify your email”

            DB::commit();
            // Commit the transaction

            return redirect( 'sigin' )->with( 'success', 'Registration successful.' );
        } catch ( \Exception $e ) {
            DB::rollBack();
            // Rollback on error

            return back()->withErrors( [ 'error' => 'Registration failed. Please try again.' ] );
        }
    }
    //dropdown for admin panel and user

    public function SigninCheck( Request $request ) {
        $credentials = $request->validate( [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ] );

        if ( Auth::attempt( [ 'email' => $credentials[ 'email' ], 'password' => $credentials[ 'password' ] ] ) ) {
            $request->session()->regenerate();
            $user = Auth::user();
            $userRole = $user->getRoleNames()[0];
            // Role-based redirection
            return match ( $userRole ) {
                'Admin' => redirect()->route( 'admin.dashboard' ),
                'Business Owner' => redirect()->route( 'businessdashboard.dashboard' ),
                'User' => redirect()->route( 'index' ),
                default => redirect()->route( 'index' ), // fallback
            }
            ;
        }

        return back()->withErrors( [
            'email' => 'The email or password is incorrect.',
        ] )->withInput();
    }
}