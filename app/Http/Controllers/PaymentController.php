<?php

namespace App\Http\Controllers;
use App\Models\Transaction;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function transactions()
{
    $transactions = Transaction::latest()->paginate(20);
    return view('admin.payment.transactions', compact('transactions'));
}
}
