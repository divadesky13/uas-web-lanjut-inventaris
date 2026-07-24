<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <div class="p-2.5 bg-indigo-600 text-white rounded-2xl shadow-md shadow-indigo-500/30">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>
            <div>
                <h2 class="font-extrabold text-2xl sm:text-3xl text-slate-800 leading-tight">
                    Kelola Akun Pengguna
                </h2>
                <p class="text-sm text-slate-500 mt-1">Tambah akun admin/user baru dan atur hak akses pengguna aplikasi.</p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Flash Alert -->
            @if(session('success'))
                <div class="p-4 text-sm text-emerald-800 rounded-2xl bg-emerald-50 border border-emerald-200 shadow-sm font-bold">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="p-4 text-sm text-rose-800 rounded-2xl bg-rose-50 border border-rose-200 shadow-sm font-bold">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Form Tambah Akun Baru -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-xl shadow-slate-200/60 border border-slate-100">
                <div class="flex items-center space-x-3 mb-6 pb-4 border-b border-slate-100">
                    <div class="p-2 bg-indigo-50 text-indigo-600 rounded-xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-6 0h3m-9 9a9 9 0 1118 0 9 9 0 01-18 0z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-black text-slate-800">Tambah Akun Baru</h3>
                        <p class="text-xs text-slate-400">Buat akun pengakses sistem untuk Admin atau User biasa.</p>
                    </div>
                </div>

                <form action="{{ route('users.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 items-end">
                    @csrf
                    <div>
                        <label class="block text-xs font-extrabold uppercase text-slate-600 mb-1">Nama Lengkap</label>
                        <input type="text" name="name" required placeholder="Nama User" class="w-full rounded-2xl border-slate-200 text-sm font-semibold py-2.5 px-4 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label class="block text-xs font-extrabold uppercase text-slate-600 mb-1">Email</label>
                        <input type="email" name="email" required placeholder="user@gmail.com" class="w-full rounded-2xl border-slate-200 text-sm font-semibold py-2.5 px-4 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label class="block text-xs font-extrabold uppercase text-slate-600 mb-1">Password</label>
                        <input type="password" name="password" required placeholder="Min 8 karakter" class="w-full rounded-2xl border-slate-200 text-sm font-semibold py-2.5 px-4 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label class="block text-xs font-extrabold uppercase text-slate-600 mb-1">Role / Peran</label>
                        <select name="role" required class="w-full rounded-2xl border-slate-200 text-sm font-semibold py-2.5 px-4 focus:ring-indigo-500">
                            <option value="user">User biasa</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    <div>
                        <button type="submit" class="w-full py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-extrabold text-sm rounded-2xl shadow-lg shadow-indigo-500/30 hover:shadow-indigo-500/50 transition-all">
                            + Tambah Akun
                        </button>
                    </div>
                </form>
            </div>

            <!-- Tabel Daftar Akun Pengguna -->
            <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/60 border border-slate-100 overflow-hidden">
                <div class="p-6 border-b border-slate-100 bg-slate-50/50">
                    <h3 class="text-lg font-black text-slate-800">Daftar Akun Terdaftar</h3>
                    <p class="text-xs text-slate-400">Daftar pengguna yang memiliki akses ke sistem.</p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-100/70 text-xs font-black text-slate-600 uppercase tracking-wider">
                                <th class="py-4 px-6 text-center w-16">No</th>
                                <th class="py-4 px-6">Nama Pengguna</th>
                                <th class="py-4 px-6">Email</th>
                                <th class="py-4 px-6 text-center">Role</th>
                                <th class="py-4 px-6 text-center w-32">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-sm font-semibold text-slate-700">
                            @foreach($users as $index => $u)
                                <tr class="hover:bg-slate-50">
                                    <td class="py-4 px-6 text-center font-bold text-slate-400">{{ $index + 1 }}</td>
                                    <td class="py-4 px-6 font-extrabold text-slate-800">{{ $u->name }}</td>
                                    <td class="py-4 px-6 text-slate-500">{{ $u->email }}</td>
                                    <td class="py-4 px-6 text-center">
                                        <span class="px-3 py-1 text-xs font-black uppercase rounded-xl {{ $u->role === 'admin' ? 'bg-amber-100 text-amber-800' : 'bg-indigo-100 text-indigo-800' }}">
                                            {{ $u->role }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        @if(auth()->user()->id !== $u->id)
                                            <form action="{{ route('users.destroy', $u->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus akun ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white rounded-xl transition-all">
                                                    🗑️ Hapus
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-xs text-slate-400 italic">(Akun Anda)</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>