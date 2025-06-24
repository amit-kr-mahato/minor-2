<!DOCTYPE html>
<html lang="en">

@include('adminLayout.heads')

<body class="bg-gray-100 font-sans">

  <div id="main">
    <div class="flex">

    @include('adminLayout.sidebar')
    @yield('content')
  </div>
  </div>

  @include('adminLayout.footer')
</body>

</html>