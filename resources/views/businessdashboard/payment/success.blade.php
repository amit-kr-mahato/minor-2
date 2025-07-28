@extends('BusinessLayout.app')

@section('content')
<div class="ml-64 w-full min-h-screen p-6 bg-green-100">
    <div class="max-w-xl mx-auto mt-10 p-6 bg-white shadow rounded-lg">
        <h2 class="text-2xl font-bold text-green-600 mb-4 text-center">🎉 Payment Successful</h2>

        <div class="text-sm text-gray-700 space-y-2">
            <p><strong>Transaction ID:</strong> {{ $transaction->txn_id }}</p>
            <p><strong>Amount:</strong> Rs. {{ $transaction->amount / 100 }}</p>
            <p><strong>Status:</strong> {{ $transaction->status }}</p>
            <p><strong>Mobile:</strong> {{ $transaction->mobile }}</p>
            <p><strong>Order ID:</strong> {{ $transaction->purchase_order_id }}</p>
            <p><strong>Order Name:</strong> {{ $transaction->purchase_order_name }}</p>
        </div>

        <a href="{{ route('businessdashboard.dashboard') }}" class="mt-4 inline-block text-white bg-purple-600 px-4 py-2 rounded hover:bg-purple-700">Back to Dashboard</a>
    </div>
</div>
@endsection
