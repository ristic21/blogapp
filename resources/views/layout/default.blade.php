<!DOCTYPE html>
<html lang="en">
<head>
  @include('layout.head')
</head>
<body>
  
  @include('layout.header')

  <main class="container">
    @yield('content')
  </main>

  @include('layout.footer')

</body>
</html>