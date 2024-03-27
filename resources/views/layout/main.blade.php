<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test Homepage</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
  </head>
  <body>

    @include('navbar.nav')

  @yield('container')


    
  </body>
</html>