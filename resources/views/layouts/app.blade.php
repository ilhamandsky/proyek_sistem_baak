<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SIAKMAH') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @stack('styles')
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen">
        @include('layouts.navigation') {{-- opsional, jika masih dipakai --}}

        <!-- Page Heading -->
        @hasSection('header')
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    @yield('header')
                </div>
            </header>
        @endif

        <!-- Flash Messages -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            @if(session('success'))
                <div class="flash-message bg-green-100 text-green-700 p-3 rounded-md mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="flash-message bg-red-100 text-red-700 p-3 rounded-md mb-4">
                    {{ session('error') }}
                </div>
            @endif
        </div>

        <!-- Page Content -->
        <main class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>
    </div>

    @stack('modals')
    @livewireScripts
    @stack('scripts')

    <!-- JavaScript -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Flash message auto-hide
            setTimeout(() => {
                document.querySelectorAll(".flash-message").forEach(msg => msg.style.display = "none");
            }, 5000);

            // Konfirmasi penghapusan
            document.querySelectorAll(".delete-btn").forEach(button => {
                button.addEventListener("click", function (event) {
                    if (!confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                        event.preventDefault();
                    }
                });
            });
        });
    </script>
</body>

</html>
