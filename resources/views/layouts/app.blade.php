<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body class="bg-gray-100">

    @include('layouts.nav')

    <!-- Top Ads Section -->
    @isset($topAds)
        @if($topAds->count())
            <div class="top-ads mb-4">
                @foreach($topAds as $ad)
                    <img src="{{ asset('storage/' . $ad->image) }}" style="width:100%;" alt="Top Ad" class="mb-2">
                @endforeach
            </div>
        @endif
    @endisset

    <div id="main" class="max-w-screen-xl mx-auto">

        <div class="flex flex-col md:flex-row gap-4">
            <!-- Sidebar Ads Section -->
            @isset($sidebarAds)
                @if($sidebarAds->count())
                    <aside class="w-full md:w-1/4 p-4 bg-white shadow rounded">
                        @foreach($sidebarAds as $ad)
                            <img src="{{ asset('storage/' . $ad->image) }}" class="mb-3 w-full rounded" alt="Sidebar Ad">
                        @endforeach
                    </aside>
                @endif
            @endisset

            <!-- Main Page Content -->
            <main class="flex-1 p-4 bg-white shadow rounded">
                @yield('content')
            </main>
        </div>

        <!-- Bottom Ads Section -->
        @isset($bottomAds)
            @if($bottomAds->count())
                <footer class="bottom-ads mt-6 p-4 bg-white shadow rounded text-center">
                    @foreach($bottomAds as $ad)
                        <img src="{{ asset('storage/' . $ad->image) }}" style="width:100%;" class="mb-2" alt="Bottom Ad">
                    @endforeach
                </footer>
            @endif
        @endisset

    </div>

    @include('layouts.footer')


</body>

</html>