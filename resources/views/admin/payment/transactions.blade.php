@extends('adminLayout.app')

@section('content')

  <div class="ml-64 w-full h-screen p-4  shadow-md rounded bg-gray-300">
    <h2 class="text-2xl font-bold mb-6 ml-[450px] ">Transaction History</h2>

    <table class="w-full w-64 border-collapse">
    <thead>
      <tr class="bg-gray-200">
      <th class="p-2">ID</th>
      <th class="p-2">Name</th>
      <th class="p-2">Txn ID</th>
      <th class="p-2">Amount</th>
      <th class="p-2">Status</th>
      <th class="p-2">Time</th>
      </tr>
    </thead>
    <tbody>
      @foreach($transactions as $txn)
      <tr class="border-b">
      <td class="p-2">{{ $txn->id }}</td>
      <td class="p-2">{{ $txn->business?->business_name ?? 'N/A' }}</td>
      <td class="p-2">{{ $txn->transaction_id }}</td>
      <td class="p-2">Rs. {{ $txn->amount / 100 }}</td>
      <td class="p-2">
      <span
      class="px-2 py-1 rounded {{ $txn->status == 'success' ? 'bg-red-200 text-white-800' : 'bg-green-200 text-white-800' }}">
      {{ ucfirst($txn->status) }}
      </span>
      </td>
      <td class="p-2">{{ $txn->created_at->format('d M, Y h:i A') }}</td>
      </tr>
    @endforeach
    </tbody>
    </table>
  </div>
  {{ $transactions->links() }}
@endsection