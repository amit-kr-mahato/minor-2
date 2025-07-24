@extends('BusinessLayout.app')

@section('content')
    <div class="max-w-xl mx-auto mt-10 bg-white p-8 rounded-2xl shadow-lg">
        <h2 class="text-3xl font-bold text-center text-indigo-600 mb-4">Upgrade Your Plan</h2>
        <p class="text-gray-700 text-center mb-6">Click the button below to securely pay <span class="font-semibold text-black">Rs. 100</span> using Khalti.</p>

        <div class="flex justify-center">
            <button id="khalti-button"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-6 rounded-lg shadow transition duration-300">
                Pay Now with Khalti
            </button>
        </div>

        {{-- Include Khalti SDK & SweetAlert2 --}}
        <script src="https://khalti.com/static/khalti-checkout.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            const config = {
                publicKey: "{{ config('services.khalti.public_key') }}",
                productIdentity: "123456",
                productName: "Business Plan Subscription",
                productUrl: "{{ url('/') }}",
                amount: 10000, // Rs. 100 in paisa

                eventHandler: {
                    onSuccess(payload) {
                        fetch("{{ route('businessdashboard.khalti.verify') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({
                                token: payload.token,
                                amount: payload.amount
                            })
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.idx) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Payment Successful!',
                                    text: `Reference ID: ${data.idx}`,
                                    confirmButtonText: 'Go to Dashboard'
                                }).then(() => {
                                    window.location.href = "{{ route('businessdashboard.dashboard') }}";
                                });
                            } else {
                                Swal.fire("Warning", "Payment verified but missing reference ID.", "warning");
                            }
                        })
                        .catch(() => {
                            Swal.fire("Error", "Payment verification failed!", "error");
                        });
                    },
                    onError(error) {
                        Swal.fire("Error", error?.message || "Something went wrong during payment.", "error");
                    },
                    onClose() {
                        console.log("Khalti widget closed");
                    }
                }
            };

            const checkout = new KhaltiCheckout(config);
            document.getElementById("khalti-button").addEventListener("click", () => {
                checkout.show({ amount: 10000 });
            });
        </script>
    </div>
@endsection
