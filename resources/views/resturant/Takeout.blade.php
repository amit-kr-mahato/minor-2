@extends('layouts.app')

@section('content')
@if($businesses->isEmpty())
    <div class="alert alert-warning text-center mt-4">
        No businesses found for your search.
    </div>
@else
    <div style="display: flex; height: 90vh; gap: 1rem; overflow: hidden;">
        <!-- Business List -->
        <div style="flex: 1; overflow-y: auto; padding: 1rem; border-right: 1px solid #ccc;">
            <h5 class="text-muted mb-3">Search Results</h5>
            @foreach ($businesses as $business)
                <div onclick="highlightBusiness({{ $business->id }})"
                    style="cursor: pointer; margin-bottom: 1rem; padding: 0.5rem; border: 1px solid #ddd; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
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
            @endforeach
        </div>

        <!-- Map Container -->
        <div id="map" style="flex: 2; height: 100%; border-radius: 8px;"></div>
    </div>
@endif
@endsection

@push('scripts')
    <!-- Leaflet CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

    <!-- MarkerCluster CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.5.3/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.5.3/dist/MarkerCluster.Default.css" />
    <script src="https://unpkg.com/leaflet.markercluster@1.5.3/dist/leaflet.markercluster.js"></script>

    <script>
        const map = L.map('map').setView([27.7, 85.3], 12);

        // OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors',
            maxZoom: 19,
        }).addTo(map);

        const defaultIcon = L.icon({
            iconUrl: 'https://unpkg.com/leaflet@1.9.3/dist/images/marker-icon.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
        });

        const highlightIcon = L.icon({
            iconUrl: 'https://unpkg.com/leaflet@1.9.3/dist/images/marker-icon-red.png',
            iconSize: [30, 45],
            iconAnchor: [15, 45],
            popupAnchor: [1, -34],
        });

        const markers = {};
        const markerCluster = L.markerClusterGroup();

        @foreach ($businesses as $business)
            const marker{{ $business->id }} = L.marker(
                [{{ $business->latitude }}, {{ $business->longitude }}],
                { icon: defaultIcon }
            ).bindPopup(`
                <strong>{{ addslashes($business->business_name) }}</strong><br>
                {{ addslashes($business->address1) }}<br>
                📍 {{ addslashes($business->city) }}
            `);
            markers[{{ $business->id }}] = marker{{ $business->id }};
            markerCluster.addLayer(marker{{ $business->id }});
        @endforeach

        map.addLayer(markerCluster);

        // Zoom to and highlight marker on list click
        function highlightBusiness(id) {
            const marker = markers[id];
            if (!marker) return;

            map.setView(marker.getLatLng(), 15);
            marker.openPopup();
            marker.setIcon(highlightIcon);

            setTimeout(() => {
                marker.setIcon(defaultIcon);
            }, 3000);
        }

        // Fix map sizing after page load
        window.addEventListener('load', () => {
            setTimeout(() => {
                map.invalidateSize();
            }, 100);
        });
    </script>
@endpush
