<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=M+PLUS+2:400,500,600&display=swap" rel="stylesheet" />

        @if(request()->routeIs('facility'))<link rel="canonical" href="{{ url()->current() }}">
        @endif

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @includeIf('layouts.ga')
        @includeIf('layouts.ads')
    </head>
    <body class="font-sans antialiased relative">
        <div class="min-h-screen bg-white dark:bg-gray-900 text-black dark:text-white">
            @auth
            <livewire:layout.navigation />
            @endauth

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            @include('layouts.footer')
        </div>

    <x-back-to-top/>
    </body>
</html>
