@extends('BusinessLayout.app')

@section('content')
<div class="ml-64 p-8 min-h-screen bg-gray-50 w-full">
    <div class="w-full bg-white shadow-md rounded-lg p-8">
        <h2 class="text-3xl font-semibold text-purple-800 mb-8 border-b pb-3">💳 Payment History</h2>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200 text-left text-gray-700">
                <thead class="bg-purple-100 text-purple-800 uppercase text-sm font-semibold">
                    <tr>
                        <th class="border px-4 py-3">#</th>
                        <th class="border px-4 py-3">Amount (Rs)</th>
                        <th class="border px-4 py-3">Status</th>
                        <th class="border px-4 py-3">Token</th>
                        <th class="border px-4 py-3">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($payments as $i => $payment)
                        <tr class="hover:bg-purple-50 transition duration-150">
                            <td class="border px-4 py-3">{{ $i + 1 }}</td>
                            <td class="border px-4 py-3 text-green-700 font-semibold">
                                {{ number_format($payment->amount / 100, 2) }}
                            </td>
                            <td class="border px-4 py-3">
                                <span class="px-3 py-1 text-xs font-bold rounded-full
                                    {{ $payment->status === 'Completed' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ ucfirst($payment->status) }}
                                </span>
                            </td>
                            <td class="border px-4 py-3 truncate" title="{{ $payment->token }}">
                                {{ Str::limit($payment->token, 40) }}
                            </td>
                            <td class="border px-4 py-3">
                                {{ $payment->created_at->format('Y-m-d H:i') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-6 text-gray-500 italic">
                                No payment history available.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $payments->links() }}
        </div>
    </div>
</div>
@endsection
