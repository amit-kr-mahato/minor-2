<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Business Dashboard</title>

 {{-- Favicon --}}
    @php
        $favicon = setting('favicon');
    @endphp
    @if ($favicon && file_exists(public_path('storage/' . $favicon)))
        <link rel="icon" href="{{ asset('storage/' . $favicon) }}" type="image/x-icon" />
    @else
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
    @endif
 <script src="https://cdn.tailwindcss.com"></script>


  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    crossorigin="anonymous"
  />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Alpine.js -->
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>



</head>