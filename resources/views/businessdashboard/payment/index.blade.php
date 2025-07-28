@extends('BusinessLayout.app')

@section('content')
<div class="ml-64 w-full min-h-screen p-6 bg-gray-300">
    <div class="max-w-md mx-auto mt-10 p-6 bg-white shadow-lg rounded-xl">
        <h2 class="text-2xl font-bold text-center mb-4">Pay with Khalti</h2>

        <p class="mb-4 text-gray-700 text-center">Amount: <strong>Rs. 1</strong></p>

        {{-- <button id="khalti-button" class="w-full bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-lg shadow">
            Pay with Khalti
        </button> --}}
        <form action="{{route('businessdashboard.payment.initiate')}}" method="POST">
            @csrf
            <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-lg shadow">
            Pay with Khalti
        </button>
        </form>

        <div id="payment-result" class="mt-4 text-center text-sm text-gray-800"></div>
    </div>
</div>

<!-- Khalti JS -->
<script src="https://khalti.com/static/khalti-checkout.js"></script>

<script>
    let config = {
        // replace with your actual public key from Khalti dashboard
        publicKey: "ab7509ec1ff94b0b96d702ebab07b73a",
        productIdentity: "1234567890",
        productName: "Static Order",
        productUrl: "http://yourdomain.com/product/static-order",
        amount: 100, // in paisa (Rs. 4000)

        eventHandler: {
            onSuccess(payload) {
                // Send token and amount to Laravel for verification
                fetch("{{ route('businessdashboard.khalti.verify') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        token: payload.token,
                        amount: 100
                    })
                })
                .then(res => res.json())
                .then(res => {
                    const resultDiv = document.getElementById('payment-result');
                    if (res.success) {
                        resultDiv.innerHTML = `<span class="text-green-600 font-semibold">✅ Payment successful!</span>`;
                    } else {
                        resultDiv.innerHTML = `<span class="text-red-600 font-semibold">❌ Payment failed.</span>`;
                    }
                    console.log(res);
                });
            },

            onError(error) {
                console.error("Khalti Error:", error);
                alert("Something went wrong during payment.");
            },

            onClose() {
                console.log('Khalti widget is closing');
            }
        }
    };

    let checkout = new KhaltiCheckout(config);
    document.getElementById("khalti-button").onclick = function () {
        checkout.show({amount: 100});
    };
</script>
@endsection
