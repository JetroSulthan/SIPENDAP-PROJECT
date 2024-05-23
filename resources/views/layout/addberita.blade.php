<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test Homepage</title>
    <link rel="icon" type="image/x-icon" href="/img/sipendap.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    
    @vite(['resources/css/app.css','resources/js/app.js'])
  </head>
  <body>
    
  @if (Auth::user()->roles_id == 1)
    @include('sidebar.addberita')
  @elseif (Auth::user()->roles_id == 2)
    @include('sidebar.pemerintah')
  @elseif (Auth::user()->roles_id == 3)
    @include('sidebar.kelompoktani')
  @endif

  @yield('container')


    
  </body>
</html>