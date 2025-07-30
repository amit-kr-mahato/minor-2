@extends('layouts.app')

@push('styles')
<style>
    /* #map {
        height: 200%;
        width: 100%;
        border-radius: 8px;
    } */

    .business-list {
        overflow-y: auto;
        padding: 1rem;
        border-right: 1px solid #ccc;
    }

    .business-item:hover {
        background-color: #f8f9fa;
    }
</style>
@endpush

@section('content')
@if($businesses->isEmpty())
    <div class="alert alert-warning text-center mt-4">
        No businesses found for your search.
    </div>
@else
    <div style="display: flex;  gap: 1rem; overflow: hidden;">
        <!-- Business List -->
        <div style="flex: 1;" class="business-list">
            <h5 class="text-muted mb-3">Search Results</h5>
            @foreach ($businesses->where('status', 'approved') as $business)
                <a href="{{ route('businessdetail', $business->id) }}" style="text-decoration: none; color: inherit;">
                    <div class="business-item"
                        style="cursor: pointer; margin-bottom: 1rem; padding: 0.5rem; border: 1px solid #ddd; border-radius: 6px;"
                        onmouseover="highlightMarker({{ $business->id }})">
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

        <!-- Google Map -->
        <div style="flex: 2;  height: 100vh; gap: 1rem;">
            <div style="height: 100vh;" id="map"></div>
        </div>
    </div>

    @php
        $locations = [];
        foreach ($businesses->where('status', 'approved') as $biz) {
            if ($biz->latitude && $biz->longitude) {
                $locations[] = [
                    'id' => $biz->id,
                    'name' => $biz->business_name,
                    'lat' => $biz->latitude,
                    'lng' => $biz->longitude,
                    'city' => $biz->city,
                ];
            }
        }
    @endphp

    <script>
        let map;
        let markerMap = {};

        function initMap() {
            const centerNepal = { lat: 28.3949, lng: 84.1240 };

            map = new google.maps.Map(document.getElementById("map"), {
                center: centerNepal,
                zoom: 6,
            });

            const locations = @json($locations);
            const bounds = new google.maps.LatLngBounds();

            locations.forEach(biz => {
                const position = { lat: parseFloat(biz.lat), lng: parseFloat(biz.lng) };

                const marker = new google.maps.Marker({
                    position,
                    map,
                    title: biz.name
                });

                const infoWindow = new google.maps.InfoWindow({
                    content: `<strong>${biz.name}</strong><br>${biz.city}`
                });

                marker.addListener('click', function () {
                    infoWindow.open(map, marker);
                });

                markerMap[biz.id] = { marker, infoWindow };
                bounds.extend(position);
            });

            if (locations.length) {
                map.fitBounds(bounds);
            }
        }

        function highlightMarker(id) {
            if (markerMap[id]) {
                const { marker, infoWindow } = markerMap[id];
                map.setZoom(15);
                map.panTo(marker.getPosition());
                infoWindow.open(map, marker);
            }
        }
    </script>

    <!-- ✅ Replace with your actual Google Maps API Key -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvOvXuE9F5s5Rr7tDn3ZaBqBJjg1Txa3k&callback=initMap" async defer></script>
@endif
@endsection
