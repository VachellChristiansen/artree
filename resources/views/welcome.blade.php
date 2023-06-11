<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Artree</title>

        <!-- Styles -->
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    <body class="antialiased">
        <x-header></x-header>
        <livewire:chat-bot></livewire:chat-bot>
        <x-main.content></x-main.content>
        <x-footer></x-footer>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
        @livewireScripts
    </body>
</html>
