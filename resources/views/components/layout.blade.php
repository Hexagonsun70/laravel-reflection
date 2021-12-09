<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet"
          href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
          crossorigin="anonymous"/>
    <script defer src="https://unpkg.com/alpinejs@3.6.1/dist/cdn.min.js"></script>
    <title>Admin Panel Reflection</title>
</head>

<body class=" m-0 w-screen">

<x-header></x-header>

<main class="flex justify-center items-center min-h-screen bg-gray-500 m-0">

@guest

    <x-login />

@else

{{ $slot }}

@endguest

</main>

<x-flash />

</body>

</html>
