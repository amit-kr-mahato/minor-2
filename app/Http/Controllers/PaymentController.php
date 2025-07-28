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
            'return_url' => config( 'services.khalti.redirect' ),
            'website_url' => config( 'services.khalti.website_url' ),
            'amount' => 100, // amount in paisa
            'purchase_order_id' => uniqid(), // better to make this unique
            'purchase_order_name' => 'Test Order',
            'customer_info' => [
                'name' => 'Test Customer',
                'email' => 'test@gmail.com',
                'phone' => 9800000001,
            ],
        ];

    
        try {
            $response = Http::withHeaders( [
                'Authorization' => 'key ' . config( 'services.khalti.secret_key' ),
                'Accept' => 'application/json',
            ] )->post( config( 'services.khalti.base_url' ) . '/epayment/initiate/', $payload );

            return redirect()->away( $response[ 'payment_url' ]);

        } catch ( \Exception $e ) {
            // Log error or handle it
            return back()->withErrors( [ 'error' => 'Payment initiation failed: ' . $e->getMessage() ] );
        }
    }

    public function verifyPayment( Request $request ) {
        $token = $request->input( 'token' );

        $response = Http::withHeaders( [
            'Authorization' => 'key ' . config( 'services.khalti.secret_key' ),
            'Accept' => 'application/json',
        ] )->post( config( 'services.khalti.base_url' ) . '/epayment/lookup/', [
            'token' => $token,
        ] );

        if ( $response->successful() ) {
            $data = $response->json();
            return response()->json( [ 'success' => true, 'data' => $data ] );
        }

        return response()->json( [ 'success' => false ] );
    }

}
