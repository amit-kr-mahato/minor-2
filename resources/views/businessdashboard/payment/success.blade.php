@extends('BusinessLayout.app')

@section('content')
<div class="ml-64 p-6 bg-green-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow max-w-lg text-center">
        <h1 class="text-3xl font-bold text-green-700 mb-4">Payment Successful!</h1>
        <p class="mb-6 text-gray-700">Thank you for your payment. Your transaction was completed successfully.</p>
        <a href="{{ route('businessdashboard.payment.index') }}" class="text-purple-600 hover:underline font-semibold">Back to Payment Page</a>
    </div>
</div>
@endsection
