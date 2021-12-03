<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script defer src="https://unpkg.com/alpinejs@3.6.1/dist/cdn.min.js"></script>
    <title>Admin Panel Reflection</title>
</head>

<body >

<x-header></x-header>

<main class="flex justify-center items-center h-screen w-screen bg-gray-400">

{{ $slot }}

</main>

<x-flash />

</body>

</html>
