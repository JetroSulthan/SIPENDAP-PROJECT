<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="/img/sipendap.png">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>SIPENDAP</title>
</head>
<body>

    <iframe src="/public/fotolahan/{{ $files->foto_lahan }}" class="h-screen w-screen"></iframe>

</body>
</html>