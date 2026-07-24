<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-xl font-extrabold text-slate-800">Buat Akun Pengguna</h2>
        <p class="text-xs text-slate-500 mt-1">Lengkapi data di bawah untuk mendaftar.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-xs font-bold uppercase text-slate-600 mb-1">Nama Lengkap</label>
            <input id="name" class="block w-full rounded-xl border-slate-200 text-sm focus:border-indigo-500 focus:ring-indigo-500 shadow-sm transition-all py-2.5 px-3" type="text" name="name" :value="old('name')" required autofocus placeholder="Contoh: Budi Santoso" />
            <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs text-rose-500" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-xs font-bold uppercase text-slate-600 mb-1">Email</label>
            <input id="email" class="block w-full rounded-xl border-slate-200 text-sm focus:border-indigo-500 focus:ring-indigo-500 shadow-sm transition-all py-2.5 px-3" type="email" name="email" :value="old('email')" required placeholder="nama@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-rose-500" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-xs font-bold uppercase text-slate-600 mb-1">Password</label>
            <input id="password" class="block w-full rounded-xl border-slate-200 text-sm focus:border-indigo-500 focus:ring-indigo-500 shadow-sm transition-all py-2.5 px-3" type="password" name="password" required autocomplete="new-password" placeholder="Minimal 8 Karakter" />
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-rose-500" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-xs font-bold uppercase text-slate-600 mb-1">Konfirmasi Password</label>
            <input id="password_confirmation" class="block w-full rounded-xl border-slate-200 text-sm focus:border-indigo-500 focus:ring-indigo-500 shadow-sm transition-all py-2.5 px-3" type="password" name="password_confirmation" required placeholder="Ulangi Password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-xs text-rose-500" />
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
            <button type="submit" class="w-full py-3 px-4 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-bold text-sm rounded-xl shadow-lg shadow-indigo-500/30 hover:shadow-indigo-500/50 transition-all duration-200 active:scale-[0.98]">
                Daftar Sekarang &rarr;
            </button>
        </div>

        <div class="text-center pt-3 border-t border-slate-100">
            <p class="text-xs text-slate-500">
                Sudah punya akun? 
                <a href="{{ route('login') }}" class="font-bold text-indigo-600 hover:text-indigo-800 transition-colors">Masuk Disini</a>
            </p>
        </div>
    </form>
</x-guest-layout>