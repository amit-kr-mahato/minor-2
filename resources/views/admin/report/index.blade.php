@extends('adminLayout.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">🛡️ Admin Report Dashboard</h1>

    {{-- Filter & Bulk Action Form --}}
    <form method="POST" action="{{ route('admin.reports.bulk-action') }}">
        @csrf

        <div class="flex flex-wrap items-center justify-between gap-4 mb-4">
            {{-- Filters --}}
            <div class="flex gap-4 flex-wrap">
                <select name="status" class="border px-3 py-1 rounded text-sm">
                    <option value="">All Statuses</option>
                    @foreach(['pending', 'under_review', 'dismissed', 'action_taken'] as $s)
                        <option value="{{ $s }}" {{ request('status') == $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                    @endforeach
                </select>

                <input type="text" name="search" placeholder="Search reports"
                       class="border px-3 py-1 rounded text-sm w-64"
                       value="{{ request('search') }}">
            </div>

            {{-- Bulk Actions --}}
            <div class="flex gap-2">
                <select name="bulk_action" class="border px-3 py-1 rounded text-sm" required>
                    <option value="">-- Bulk Action --</option>
                    <option value="dismiss">Dismiss</option>
                    <option value="action_taken">Mark as Action Taken</option>
                    <option value="delete">Delete Reports</option>
                </select>

                <button type="submit" class="bg-red-600 text-white px-4 py-1 rounded text-sm hover:bg-red-500">
                    Apply
                </button>
            </div>
        </div>

        {{-- Report Cards --}}
        @forelse($reports as $report)
            <div class="flex items-start gap-3 bg-white shadow rounded p-4 mb-4">
                <input type="checkbox" name="report_ids[]" value="{{ $report->id }}" class="mt-1">

                <div class="flex-1">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm text-gray-500">Report #{{ $report->id }} ·
                            <strong>{{ $report->reporter->name ?? 'Anonymous' }}</strong></span>
                        <span class="text-xs px-2 py-1 rounded
                            @if($report->status == 'pending') bg-yellow-100 text-yellow-700
                            @elseif($report->status == 'under_review') bg-blue-100 text-blue-700
                            @elseif($report->status == 'action_taken') bg-green-100 text-green-700
                            @else bg-gray-200 text-gray-800 @endif">
                            {{ ucfirst($report->status) }}
                        </span>
                    </div>

                    <div class="text-sm text-gray-800">
                        <p><strong>Type:</strong> {{ class_basename($report->reportable_type) }} (ID: {{ $report->reportable_id }})</p>
                        <p><strong>Reason:</strong> {{ $report->reason }}</p>
                        <p><strong>Description:</strong> {{ $report->description ?: 'No description' }}</p>
                    </div>

                    {{-- Single Report Status Update --}}
                    <form action="{{ route('admin.reports.update', $report->id) }}" method="POST" class="mt-3 flex items-center gap-2">
                        @csrf @method('PUT')
                        <select name="status" class="border px-2 py-1 text-sm rounded">
                            @foreach(['pending', 'under_review', 'action_taken', 'dismissed'] as $status)
                                <option value="{{ $status }}" {{ $report->status == $status ? 'selected' : '' }}>
                                    {{ ucfirst($status) }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="bg-gray-700 text-white px-3 py-1 rounded text-sm hover:bg-gray-600">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="text-center text-gray-500 py-10">No reports found.</div>
        @endforelse

        {{ $reports->links() }}
    </form>
</div>
@endsection
