<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PaymentController extends Controller {
    public function transactions() {
        $transactions = Transaction::latest()->paginate( 20 );
        return view( 'admin.payment.transactions', compact( 'transactions' ) );
    }

    public function initiatePayment( Request $request ) {
        $payload = [
            'return_url' => url( '/businessdashboard/payment/verify-payment' ),
            'website_url' => config( 'services.khalti.website_url' ),
            'amount' => 4000 * 100, // amount in paisa
            'purchase_order_id' => 1,
            'purchase_order_name' => 'Test Order',
            'customer_info' => [
                'name' => 'Test Customer',
                'email' => 'test@gmail.com',
                'phone' => 9800000001
            ]
        ];
        // dd(config( 'services.khalti.secret_key' ));
        $response = Http::withHeaders( [
            'Authorization' => 'key ' . config( 'services.khalti.secret_key' ),
            'Accept' => 'application/json',
        ] )->post( config( 'services.khalti.base_url' ) . '/initiate/', $payload)->throw();

        $data = $response->json();

        // if ( isset( $data[ 'payment_url' ] ) ) {
        //     return redirect( $data[ 'payment_url' ] );
        // }

        // // If payment_url missing, dump data to debug
        // // dd( $data );

        // // Or redirect back with error message
        // return back()->withErrors( [ 'error' => 'Failed to initiate payment.' ] );
    }

    public function verifyPayment( Request $request ) {
        $response = Http::withHeaders( [
            'Authorization' => 'key ' . config( 'services.khalti.secret_key' ),
            'Accept' => 'application/json',
        ] )->post( config( 'services.khalti.base_url' ) . '/lookup/', [
            'pidx' => $request->pidx
        ] );

        if ( $response->successful() ) {
            return view( 'businessdashboard.payment.success' );
        }

        return view( 'businessdashboard.payment.failed' );
    }

}
