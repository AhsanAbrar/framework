<!DOCTYPE html>
<html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">
    <link rel="icon" href="/favicon.png" type="image/x-icon">

    <title>{{ nameCapital }}</title>

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    {{ vite_tags('vendor/{{ name }}') }}
</head>
<body>
    {{ $slot }}
</body>
</html>
