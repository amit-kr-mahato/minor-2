{{-- resources/views/menu-book.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="menu-book py-5 px-3 mx-auto" style="max-width: 1200px;">
        <h1 class="text-center mb-5 text-dark display-5">Our Menu</h1>

        @php
            $grouped = $menuItems->groupBy('category');
        @endphp

        @foreach($grouped->chunk(2) as $chunk)
            <div class="book-spread d-grid gap-4 mb-5" style="grid-template-columns: 1fr 1fr;">
                @foreach($chunk as $category => $items)
                    <div class="page bg-white shadow rounded p-4">
                        <h3 class="category-heading border-bottom pb-2 mb-4 text-danger">{{ $category }}</h3>
                        @foreach($items as $item)
                            <div class="menu-item mb-4 d-flex align-items-start gap-3">
                                @if(!empty($item->image))
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                                        style="width: 80px; height: 80px; object-fit: cover;" class="rounded shadow-sm">
                                @else
                                    <img src="{{ asset('images/placeholder.png') }}" alt="No image"
                                        style="width: 80px; height: 80px; object-fit: cover;" class="rounded shadow-sm">
                                @endif
                                <div>
                                    <h5 class="mb-1">{{ $item->name }}</h5>
                                    <p class="text-muted mb-0">Rs.{{ number_format($item->price, 2) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach

                @if($chunk->count() === 1)
                    <div class="page bg-light border rounded"></div>
                @endif
            </div>
        @endforeach
    </div>
@endsection

@push('styles')
    <style>
        body {
            background-color: #f4f1ea;
            font-family: 'Playfair Display', serif;
        }

        .page {
            min-height: 500px;
        }

        .category-heading {
            font-size: 1.5rem;
        }

        .menu-item h5 {
            font-weight: 600;
        }

        .menu-item img {
            border-radius: 8px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
@endpush