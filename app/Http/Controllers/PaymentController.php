<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use App\Notifications\PaymentSuccess;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

            return redirect()->away( $response[ 'payment_url' ] );

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

            // Save payment
            $payment = Payment::create( [
                'user_id' => auth()->id(),
                'token' => $data[ 'token' ],
                'amount' => $data[ 'amount' ],
                'status' => $data[ 'status' ],
                'idx' => $data[ 'pidx' ] ?? null,
                'payload' => $data,
            ] );

            auth()->user()->notify( new PaymentSuccess( $payment ) );

            return response()->json( [
                'success' => true,
                'message' => 'Payment verified successfully.',
                'payment' => $payment
            ] );
        }

        return response()->json( [
            'success' => false,
            'message' => 'Payment verification failed.'
        ] );
    }

    public function handleRedirect( Request $request ) {
        $userId = auth()->id();
        $transaction = Transaction::create( [
            'pidx' => $request->get( 'pidx' ),
            'transaction_id' => $request->get( 'transaction_id' ),
            'tidx' => $request->get( 'tidx' ),
            'txn_id' => $request->get( 'txnId' ),
            'amount' => $request->get( 'amount' ),
            'total_amount' => $request->get( 'total_amount' ),
            'mobile' => $request->get( 'mobile' ),
            'status' => $request->get( 'status' ),
            'user_id' => $userId,
            'purchase_order_id' => $request->get( 'purchase_order_id' ),
            'purchase_order_name' => $request->get( 'purchase_order_name' ),
        ] );

        // ✅ Send email notification to user
        auth()->user()->notify( new PaymentSuccess( $transaction ) );
        return view( 'businessdashboard.payment.success', compact( 'transaction' ) );
    }

   public function myPayments()
{
    $payments = Transaction::where('user_id', auth()->id())
        ->latest()
        ->paginate(10);

    return view('businessdashboard.payment.history', compact('payments'));
}


}
