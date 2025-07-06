<!DOCTYPE html>
<html lang="en">

@include('BusinessLayout.head')

<body class="bg-gray-100 font-sans">

  <div id="main">
    <div class="flex">

    @include('BusinessLayout.sidebar')
    @yield('content')
  </div>
  </div>

  @include('BusinessLayout.footer')
</body>

</html>