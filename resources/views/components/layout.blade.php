<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- @vite('resources/js/app.js') --}}
    <link rel="stylesheet" href="{{ URL::to('/') }}/style.css">
    <link rel="shortcut icon" href="{{ URL::to('/') }}/images/imdb.png" type="image/x-icon">
    <title>Top Movies</title>
</head>
<body>
    <x-header movies="$movies"></x-header>
    {{ $slot }}
</body>
</html>