<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body>

    @include('layouts.nav')

    <div id="main">
        @yield('content')
    </div>

    @include('layouts.footer')

</body>

</html>