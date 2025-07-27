<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Http;
// use Illuminate\Support\Facades\Auth;
// use App\Models\Payment;

// class UserPaymentController extends \App\Http\Controllers\Controller
// {
//     public function initiatePayment(Request $request)
//     {
//         //fetch booking
//         $booking = Booking::with('package')->findOrFail($request->booking_id);

//         //fetch order and amount
//         $amount =  100; // in paisa
//         $orderId = 'ORDER_' . $booking->id; // or generate a UUID

//         // Payload for Khalti
//         $payload = [
//             "return_url" => route('user.Payment.index'),
//             "website_url" => config('app.url'),
//             "amount" => $amount,
//             "purchase_order_id" => $orderId,
//             "purchase_order_name" => "GharSewa Booking",
//             "customer_info" => [
//                 "name" => auth()->user()->name,
//                 "email" => auth()->user()->email,
//                 "phone" => auth()->user()->phone,
//             ],
//             "product_details" => [
//                 [
//                     "identity" => "booking_" . $booking->id,
//                     "name" => $booking->package->title ?? 'Service',
//                     "total_price" => $amount,
//                     "quantity" => 1,
//                     "unit_price" => $amount,
//                 ]
//             ]
//         ];

//         // Khalti API URL
//         $khaltiApiUrl = "https://dev.khalti.com/api/v2/epayment/initiate/";

//         // Send request to Khalti
//         $response = Http::withHeaders([
//             'Authorization' => 'Key ' . config('services.khalti.secret'),
//             'Content-Type' => 'application/json',
//         ])->post($khaltiApiUrl, $payload);

//         // Handle Response
//         if ($response->successful()) {
//             $data = $response->json();

//             // Store pidx in booking
//             $booking->update(['khalti_pidx' => $data['pidx']]);

//             return redirect($data['payment_url']); // Redirect user to Khalti checkout
//         } else {
//             return back()->with('error', 'Khalti payment initiation failed.');
//         }



//     }

//     //verify the payment
//     public function verifyPayment(Request $request)
//     {
//         // Validate the request
//         $request->validate([
//             'pidx' => 'required|string',
//             'status' => 'required|string',
//         ]);

//         $pidx = $request->pidx;

//         $response = Http::withHeaders([
//             'Authorization' => 'Key ' . config('KHALTI_SECRET_KEY'),
//             'Content-Type' => 'application/json',
//         ])->post("https://dev.khalti.com/api/v2/epayment/verify/", [
//             'pidx' => $pidx,
//         ]);

//         if ($response->successful()) {
//             $data = $response->json();

//             // Check if the payment was successful
//             if ($data['status'] === 'Completed') {
//                 // Fetch the booking using pidx or other identifiers
//                 $booking = Booking::where('khalti_pidx', $request->pidx)->first();

//                 if ($booking) {
//                     // Update booking status to paid
//                     $booking->update([
//                         'status' => 'paid',
//                         'khalti_pidx' => $pidx, // for record keeping
//                         'paid_at' => now(), // Optional: record the payment time
//                     ]);
//                     return redirect()->route('user.dashboard')->with('success', 'Payment successful.');
//                 } else {
//                     return redirect()->route('user.dashboard')->with('error', 'Booking not found.');
//                 }
//             } else {
//                 return redirect()->route('user.dashboard')->with('error', 'Payment failed.');
//             }
//         } else {
//             return redirect()->route('user.dashboard')->with('error', 'Payment verification failed.');
//         }
//     }

//     public function p_index()
//     {
//         return view('user.Payment.index');
//     }

//     public function khaltiPay($id)
// {
//     // Redirect internally to initiatePayment using booking_id
//     return redirect()->route('user.khalti.initiate', ['booking_id' => $id]);
// }

// }


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KhaltiController extends Controller
{
    // Show the payment page
    public function index()
    {
        return view('businessdashboard.khalti.page');
    }

    // Verify Khalti payment using token and amount
    public function verifyPayment(Request $request)
    {
        $token = $request->input('token');
        $amount = $request->input('amount'); // Must be in paisa (e.g., 400000 for Rs. 4000)

        // Replace with your actual secret key from Khalti dashboard
        $secretKey = 'c62283ef3f5945faad92736811547a47'; // 🔁 Replace this

        $response = Http::withHeaders([
            'Authorization' => 'Key ' . $secretKey,
        ])->post('https://khalti.com/api/v2/payment/verify/', [
            'token' => $token,
            'amount' => $amount,
        ]);

        if ($response->successful()) {
            // You can store transaction data here if needed
            return response()->json([
                'success' => true,
                'message' => 'Payment verified successfully!',
                'data' => $response->json()
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Payment verification failed.',
                'data' => $response->json()
            ], 400);
        }
    }
}

