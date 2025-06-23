<!DOCTYPE html>
<html lang="en">

@include('adminLayout.heads')

<body>

     @include('adminLayout.sidebar')

     <div id="main">
        @yield('content')
        </div>

  @include('adminLayout.footer')
</body>

</html>