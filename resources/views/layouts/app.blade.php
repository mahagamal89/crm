<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body>
        @yield('body')

        @livewireScripts
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>

