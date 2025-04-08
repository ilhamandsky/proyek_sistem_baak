<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Admin Template CSS (bisa kamu ubah sesuai kebutuhan) -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <!-- Tailwind / Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
    @stack('styles')
</head>

<body class="bg-gray-100 font-sans antialiased">
    <x-banner />

    <div class="min-h-screen flex flex-row">

        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r shadow-md">
            <div class="p-4 font-bold text-lg border-b">
                {{ config('app.name', 'Laravel') }}
            </div>
            <nav class="mt-4 px-4">
                <ul class="space-y-2">
                    <li><a href="{{ route('dashboard') }}"
                            class="block py-2 text-gray-700 hover:text-blue-600">Dashboard</a></li>
                    <li><a href="{{ route('mahasiswa.index') }}"
                            class="block py-2 text-gray-700 hover:text-blue-600">Mahasiswa</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">

            <!-- Top Navbar -->
            <header class="bg-white border-b shadow px-6 py-4 flex justify-between items-center">
                <div>
                    @if (isset($header))
                        <h1 class="text-xl font-semibold text-gray-800">{{ $header }}</h1>
                    @endif
                </div>
                <div>
                    @livewire('navigation-menu')
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-6 bg-gray-100 flex-1">
                {{ $slot }}
            </main>
        </div>
    </div>

    @stack('modals')
    @livewireScripts
    @stack('scripts')
</body>

</html>
