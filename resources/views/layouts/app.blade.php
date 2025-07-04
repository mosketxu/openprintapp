<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Grafiutil') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


        <!-- Styles -->
        {{-- <link rel="stylesheet" href="{{ asset('css/app-BeJQlrqp.css') }}"> --}}
        {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js']).
        {{-- <script src="{{ asset('js/app-C1-XIpUa.js') }}" defer></script> --}}
        {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="flex-grow">
                <div class="bg-blue-700"></div>
                <div class="bg-blue-600"></div>
                <div class="bg-blue-500"></div>
                <div class="bg-gray-700"></div>
                <div class="bg-gray-600"></div>
                <div class="bg-gray-500"></div>
                <div class="bg-green-700"></div>
                <div class="bg-green-600"></div>
                <div class="bg-green-500"></div>
                <div class="bg-green-300"></div>
                <div class="bg-yellow-700"></div>
                <div class="bg-yellow-600"></div>
                <div class="bg-yellow-500"></div>
                <div class="bg-orange-700"></div>
                <div class="bg-orange-600"></div>
                <div class="bg-orange-500"></div>
                <div class="bg-lime-700"></div>
                <div class="bg-lime-600"></div>
                <div class="bg-lime-500"></div>
                <div class="bg-emerald-700"></div>
                <div class="bg-emerald-600"></div>
                <div class="bg-emerald-500"></div>
                {{ $slot }}
            </main>

            <footer>
                <div class="p-2">powered by  <a href="mailto:alex.arregui@sumaempresa.com" class="text-blue-800 underline">alex.arregui@sumaempresa.com</a></div>
            </footer>

            <x-notification />
            <x-notificationred />

        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
