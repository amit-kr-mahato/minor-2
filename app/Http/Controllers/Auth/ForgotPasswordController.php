<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller {

    public function sendResetLinkEmail( Request $request ) {
        $request->validate( [ 'email' => 'required|email' ] );

        $user = User::where( 'email', $request->email )
        ->whereIn( 'role', [ 'user', 'admin', 'businessowner' ] )
        ->first();

        if ( ! $user ) {
            return back()->withErrors( [ 'email' => 'We can’t find a user with that email and valid role.' ] );
        }

        $status = Password::sendResetLink( $request->only( 'email' ) );

        return $status === Password::RESET_LINK_SENT
        ? back()->with( 'status', __( $status ) )
        : back()->withErrors( [ 'email' => __( $status ) ] );
    }
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
}
