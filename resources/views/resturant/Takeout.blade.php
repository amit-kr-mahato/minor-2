@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-sA+zN1b+gKldvDX7J6ZZWnWo3wY6ZP3prWwslrYxPtk=" crossorigin="" />
@endpush

@section('content')
@if($businesses->isEmpty())
    <div class="alert alert-warning text-center mt-4">
        No approved businesses found for your search.
    </div>
@else
    <div style="display: flex; height: 90vh; gap: 1rem; overflow: hidden;">
        <!-- Business List -->
        <div style="flex: 1; overflow-y: auto; padding: 1rem; border-right: 1px solid #ccc;">
            <h5 class="text-muted mb-3">Search Results</h5>
            @foreach ($businesses->where('status', 'approved') as $business)
                <a href="{{ route('businessdetail', $business->id) }}" style="text-decoration: none; color: inherit;">
                    <div
                        style="cursor: pointer; margin-bottom: 1rem; padding: 0.5rem; border: 1px solid #ddd; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);"
                        onmouseover="highlightBusiness({{ $business->id }})">
                        <div style="display: flex; gap: 1rem; align-items: center;">
                            <img src="{{ $business->logo ? asset('storage/' . $business->logo) : 'https://via.placeholder.com/80x80?text=No+Logo' }}"
                                alt="{{ $business->business_name }}"
                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 6px;" />
                            <div>
                                <h6 style="margin: 0;">{{ $business->business_name }}</h6>
                                <small>📍 {{ $business->city }}</small><br>
                                <small class="text-muted">{{ $business->categories }}</small>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <!-- Leaflet Map Container -->
        <div id="map" style="flex: 2; height: 100%; border-radius: 8px;"></div>
    </div>

    @php
        $locations = [];
        foreach ($businesses->where('status', 'approved') as $business) {
            if ($business->latitude && $business->longitude) {
                $locations[] = [
                    'id' => $business->id,
                    'name' => $business->business_name,
                    'lat' => $business->latitude,
                    'lng' => $business->longitude,
                    'city' => $business->city,
                ];
            }
        }
    @endphp

    <script>
        let map, markerMap = {};

        document.addEventListener("DOMContentLoaded", function () {
            map = L.map('map').setView([28.3949, 84.1240], 6); // Nepal center

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            const markers = @json($locations);
            let bounds = [];

            markers.forEach(biz => {
                const marker = L.marker([biz.lat, biz.lng]).addTo(map)
                    .bindPopup(`<b>${biz.name}</b><br>${biz.city}`);
                bounds.push([biz.lat, biz.lng]);
                markerMap[biz.id] = marker;
            });

            if (bounds.length) {
                map.fitBounds(bounds, { padding: [50, 50] });
            }
        });

        function highlightBusiness(id) {
            if (markerMap[id]) {
                map.setView(markerMap[id].getLatLng(), 15);
                markerMap[id].openPopup();
            }
        }
    </script>
@endif
@endsection

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-o9N1jZ8l+cLe/5xuhRy1JZLC1fZdb1BWD+GnWiw1xR0=" crossorigin=""></script>
@endpush
