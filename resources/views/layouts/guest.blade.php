<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased selection:bg-indigo-500 selection:text-white">
        <!-- Background Gradient Modern -->
        <div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-slate-900 via-indigo-950 to-slate-900 relative overflow-hidden px-4">
            
            <!-- Ornamen Lingkaran Glow Latar Belakang -->
            <div class="absolute -top-24 -left-20 w-96 h-96 bg-indigo-600/30 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-24 -right-20 w-96 h-96 bg-purple-600/30 rounded-full blur-3xl pointer-events-none"></div>

            <div class="w-full sm:max-w-md relative z-10">
                <!-- Header Logo / Judul Web -->
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-indigo-600 text-white shadow-lg shadow-indigo-500/40 mb-3">
                        <svg class="w-9 h-9" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-black text-white tracking-wide">INVENTARIS APP</h1>
                    <p class="text-sm text-indigo-200/80 mt-1">Sistem Manajemen & Pelaporan Barang</p>
                </div>

                <!-- Box Form Interaktif -->
                <div class="bg-white/95 backdrop-blur-xl px-8 py-10 shadow-2xl rounded-3xl border border-white/20">
                    {{ $slot }}
                </div>

                <p class="text-center text-xs text-slate-400 mt-6">
                    &copy; {{ date('Y') }} Sistem Inventaris Web Lanjut. All rights reserved.
                </p>
            </div>
        </div>
    </body>
</html>