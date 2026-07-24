<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    {{ __('Dashboard Ringkasan') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">Pantau performa inventaris dan aktivitas sistem secara real-time.</p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ route('barang.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150 shadow-md hover:shadow-lg">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Kelola Barang
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Banner Welcoming -->
            <div class="bg-gradient-to-r from-indigo-600 via-indigo-700 to-purple-700 rounded-2xl p-6 sm:p-8 text-white shadow-xl relative overflow-hidden">
                <div class="absolute -right-10 -bottom-10 opacity-10">
                    <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                </div>
                <div class="relative z-10">
                    <span class="px-3 py-1 bg-white/20 backdrop-blur-md rounded-full text-xs font-semibold uppercase tracking-wider text-indigo-100">
                        Sistem Inventaris v1.0
                    </span>
                    <h3 class="text-2xl sm:text-3xl font-extrabold mt-3">
                        Selamat Datang Kembali, {{ Auth::user()->name }}! 👋
                    </h3>
                    <p class="mt-2 text-indigo-100 max-w-xl text-sm sm:text-base leading-relaxed">
                        Anda masuk sebagai <span class="font-bold uppercase tracking-wider text-yellow-300 underline">{{ Auth::user()->role }}</span>. Semua sistem berjalan normal, siap mengelola data hari ini.
                    </p>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Card 1: Total Jenis Barang -->
                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 relative overflow-hidden group">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Total Jenis Barang</p>
                            <h4 class="text-3xl font-black text-gray-800 mt-2 group-hover:text-indigo-600 transition-colors">
                                {{ $totalBarang ?? 0 }}
                            </h4>
                        </div>
                        <div class="p-3 bg-indigo-50 rounded-xl text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-xs text-gray-500">
                        <span class="text-emerald-500 font-semibold flex items-center mr-1">
                            <svg class="w-3 h-3 mr-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"/></svg>
                            Tercatat
                        </span>
                        di dalam basis data
                    </div>
                </div>

                <!-- Card 2: Total Stok Tersedia -->
                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 relative overflow-hidden group">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Total Stok Tersedia</p>
                            <h4 class="text-3xl font-black text-gray-800 mt-2 group-hover:text-emerald-600 transition-colors">
                                {{ $totalStok ?? 0 }} <span class="text-sm font-normal text-gray-400">unit</span>
                            </h4>
                        </div>
                        <div class="p-3 bg-emerald-50 rounded-xl text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/></svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-xs text-gray-500">
                        <span class="text-emerald-500 font-semibold flex items-center mr-1">
                            Aman
                        </span>
                        siap didistribusikan
                    </div>
                </div>

                <!-- Card 3: Total Pengguna -->
                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 relative overflow-hidden group">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Total Pengguna Sistem</p>
                            <h4 class="text-3xl font-black text-gray-800 mt-2 group-hover:text-purple-600 transition-colors">
                                {{ $totalUser ?? 1 }}
                            </h4>
                        </div>
                        <div class="p-3 bg-purple-50 rounded-xl text-purple-600 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-xs text-gray-500">
                        <span class="text-purple-500 font-semibold flex items-center mr-1">
                            Terverifikasi
                        </span>
                        pengguna aktif
                    </div>
                </div>

            </div>

            <!-- Quick Action Box -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex items-center space-x-4">
                    <div class="p-3 bg-amber-50 text-amber-600 rounded-xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <h5 class="font-bold text-gray-800">Manajemen Data Barang</h5>
                        <p class="text-xs text-gray-500">Tambah, perbarui, hapus, dan cetak laporan PDF data barang.</p>
                    </div>
                </div>
                <a href="{{ route('barang.index') }}" class="w-full md:w-auto text-center px-5 py-2.5 bg-gray-900 hover:bg-gray-800 text-white rounded-xl text-xs font-semibold transition-all duration-200 shadow-md">
                    Buka Tabel Barang &rarr;
                </a>
            </div>

        </div>
    </div>
</x-app-layout>