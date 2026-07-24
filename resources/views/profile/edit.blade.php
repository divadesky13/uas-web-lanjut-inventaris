<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <div class="p-2.5 bg-indigo-600 text-white rounded-2xl shadow-md shadow-indigo-500/30">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
            <div>
                <h2 class="font-extrabold text-2xl sm:text-3xl text-slate-800 leading-tight">
                    Pengaturan Profil
                </h2>
                <p class="text-sm text-slate-500 mt-1">Kelola informasi akun, kata sandi, dan privasi kamu.</p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Banner Profile Baru (Ikon Vektor Orang) -->
            <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 sm:p-8 shadow-xl relative overflow-hidden">
                <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-6">
                    
                    <!-- Ikon Gambar Orang -->
                    <div class="w-20 h-20 aspect-square shrink-0 rounded-2xl bg-gradient-to-tr from-indigo-600 to-purple-600 text-white flex items-center justify-center shadow-lg shadow-indigo-500/30 ring-4 ring-indigo-500/20">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>

                    <!-- Informasi Akun -->
                    <div class="text-center sm:text-left space-y-1">
                        <div class="flex flex-wrap items-center justify-center sm:justify-start gap-3">
                            <h3 class="text-2xl font-extrabold text-white tracking-wide">{{ Auth::user()->name }}</h3>
                            <span class="bg-gradient-to-r from-amber-400 to-orange-500 text-slate-950 text-xs font-black uppercase px-3 py-1 rounded-xl shadow-sm">
                                {{ Auth::user()->role }}
                            </span>
                        </div>
                        <p class="text-slate-400 text-sm font-medium">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>

            <!-- Form Edit Informasi Profil -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-xl shadow-slate-200/60 border border-slate-100">
                <div class="max-w-xl">
                    <div class="mb-6 pb-4 border-b border-slate-100">
                        <h3 class="text-lg font-black text-slate-800">Informasi Pengguna</h3>
                        <p class="text-xs text-slate-400">Perbarui nama pengguna dan alamat email akun kamu.</p>
                    </div>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Form Ubah Password -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-xl shadow-slate-200/60 border border-slate-100">
                <div class="max-w-xl">
                    <div class="mb-6 pb-4 border-b border-slate-100">
                        <h3 class="text-lg font-black text-slate-800">Ubah Kata Sandi</h3>
                        <p class="text-xs text-slate-400">Pastikan akun kamu menggunakan kata sandi acak dan aman.</p>
                    </div>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Form Hapus Akun -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-xl shadow-slate-200/60 border border-rose-100">
                <div class="max-w-xl">
                    <div class="mb-6 pb-4 border-b border-rose-100">
                        <h3 class="text-lg font-black text-rose-600">Hapus Akun</h3>
                        <p class="text-xs text-slate-400">Setelah akun dihapus, semua sumber daya dan data akan dihapus secara permanen.</p>
                    </div>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>