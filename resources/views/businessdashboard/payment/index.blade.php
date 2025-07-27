@extends('BusinessLayout.app')
@section('content')

    <div class="ml-64 w-full min-h-screen p-6 bg-gray-300">
        <div class="max-w-[900px] px-4">
            <div class="flex justify-center items-center min-h-screen bg-gray-100">
                <div class="bg-white shadow-lg rounded-xl p-8 max-w-md w-full">
                    <h2 class="text-2xl font-bold mb-6 text-center">Khalti Payment</h2>

                    <form id="khalti-payment-form" action="{{ route('businessdashboard.payment.initiate') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <p class="text-gray-700">Amount: <strong>Rs. 4000</strong></p>
                        </div>

                        <button type="submit"
                            class="w-full bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-lg shadow">
                            Pay with Khalti
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection