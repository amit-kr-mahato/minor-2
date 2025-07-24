<?php
namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class KhaltiController extends Controller
{
    public function index()
    {
        return view('businessdashboard.payment.khalti');
    }

    public function verify(Request $request)
    {
        $token = $request->token;
        $amount = $request->amount;

        $response = Http::withHeaders([
            'Authorization' => 'Key ' . config('services.khalti.secret_key')
        ])->post('https://khalti.com/api/v2/payment/verify/', [
            'token' => $token,
            'amount' => $amount,
        ]);

        if ($response->successful()) {
            $data = $response->json();

            $payment = Payment::create([
                'user_id' => Auth::id(),
                'token' => $token,
                'amount' => $amount,
                'idx' => $data['idx'],
                'status' => 'completed',
            ]);

            return response()->json($data);
        } else {
            return response()->json(['error' => 'Payment verification failed'], 400);
        }
    }

    // public function history()
    // {
    //     $payments = Payment::latest()->get();
    //     return view('admin.payment.index', compact('payments'));
    // }
}
