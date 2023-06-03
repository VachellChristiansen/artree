<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Styles -->
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    <body class="antialiased">
        <div class="w-full h-screen overflow-y-hidden flex bg-[#f8f8f8]">
            @if($current == 'login')
                <x-admin.login :$errors></x-admin.login>
            @else
                <x-admin.sidebar :$current></x-admin.sidebar>
                <x-admin.main :$current :$user></x-admin.main>
            @endif
        </div>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
        @livewireScripts
    </body>
</html>
