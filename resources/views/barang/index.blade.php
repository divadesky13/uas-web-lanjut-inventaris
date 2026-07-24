<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="font-extrabold text-2xl sm:text-3xl text-slate-800 leading-tight flex items-center gap-3">
                    <span class="p-2.5 bg-indigo-600 text-white rounded-2xl shadow-md shadow-indigo-500/30">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    </span>
                    Manajemen Inventaris Barang
                </h2>
                <p class="text-sm text-slate-500 mt-1.5 ml-1">Kelola seluruh stok barang, tambah produk baru, edit, dan unduh laporan resmi.</p>
            </div>
            
            <!-- Tombol Export PDF -->
            <div class="mt-4 md:mt-0">
                <a href="{{ route('barang.pdf') }}" target="_blank" class="inline-flex items-center px-5 py-3 bg-gradient-to-r from-rose-600 to-red-600 hover:from-rose-700 hover:to-red-700 text-white font-bold text-sm rounded-2xl shadow-lg shadow-rose-500/30 hover:shadow-rose-500/50 transition-all duration-200 active:scale-95 group">
                    <svg class="w-5 h-5 mr-2.5 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    📄 Cetak Laporan PDF
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Flash Alert Success -->
            @if(session('success'))
                <div class="p-4 mb-4 text-sm text-emerald-800 rounded-2xl bg-emerald-50 border border-emerald-200 shadow-sm flex items-center justify-between" role="alert">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span class="font-bold">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <!-- Form Tambah Barang (Hanya Admin) -->
            @if(Auth::user()->role === 'admin')
                <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-xl shadow-slate-200/60 border border-slate-100 relative overflow-hidden">
                    <div class="flex items-center space-x-3 mb-6 pb-4 border-b border-slate-100">
                        <div class="p-2 bg-indigo-50 text-indigo-600 rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-6 0h3m-9 9a9 9 0 1118 0 9 9 0 01-18 0z"/></svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-slate-800">Tambah Data Barang Baru</h3>
                            <p class="text-xs text-slate-400">Isi detail nama, jumlah stok, dan nominal harga barang di bawah ini.</p>
                        </div>
                    </div>

                    <form action="{{ route('barang.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-4 gap-5 items-end">
                        @csrf
                        <div>
                            <label class="block text-xs font-extrabold uppercase tracking-wider text-slate-600 mb-2">Nama Barang</label>
                            <input type="text" name="nama_barang" required placeholder="Contoh: Laptop Asus ROG" class="w-full rounded-2xl border-slate-200 text-sm font-semibold focus:border-indigo-500 focus:ring-indigo-500 py-3 px-4 shadow-sm transition-all">
                        </div>

                        <div>
                            <label class="block text-xs font-extrabold uppercase tracking-wider text-slate-600 mb-2">Jumlah Stok</label>
                            <input type="number" name="stok" required placeholder="0" class="w-full rounded-2xl border-slate-200 text-sm font-semibold focus:border-indigo-500 focus:ring-indigo-500 py-3 px-4 shadow-sm transition-all">
                        </div>

                        <div>
                            <label class="block text-xs font-extrabold uppercase tracking-wider text-slate-600 mb-2">Harga Satuan (Rp)</label>
                            <input type="number" name="harga" required placeholder="Rp 0" class="w-full rounded-2xl border-slate-200 text-sm font-semibold focus:border-indigo-500 focus:ring-indigo-500 py-3 px-4 shadow-sm transition-all">
                        </div>

                        <div>
                            <button type="submit" class="w-full py-3.5 px-6 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-extrabold text-sm rounded-2xl shadow-lg shadow-indigo-500/30 hover:shadow-indigo-500/50 transition-all duration-200 active:scale-95 flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Simpan Barang
                            </button>
                        </div>
                    </form>
                </div>
            @endif

            <!-- Tabel Data Barang -->
            <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/60 border border-slate-100 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
                    <div>
                        <h3 class="text-lg font-black text-slate-800">Daftar Stok Barang</h3>
                        <p class="text-xs text-slate-400">Total data tercatat dalam sistem inventaris.</p>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-100/70 border-b border-slate-200/80 text-xs font-black text-slate-600 uppercase tracking-wider">
                                <th class="py-4 px-6 text-center w-16">No</th>
                                <th class="py-4 px-6">Nama Barang</th>
                                <th class="py-4 px-6 text-center">Stok Available</th>
                                <th class="py-4 px-6">Harga Satuan</th>
                                @if(Auth::user()->role === 'admin')
                                    <th class="py-4 px-6 text-center w-48">Aksi Management</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-sm font-semibold text-slate-700">
                            @forelse($barangs as $index => $item)
                                <tr class="hover:bg-indigo-50/40 transition-colors duration-150" x-data="{ openEdit: false }">
                                    <td class="py-4 px-6 text-center font-bold text-slate-400">{{ $index + 1 }}</td>
                                    <td class="py-4 px-6">
                                        <div class="font-extrabold text-slate-800 text-base">{{ $item->nama_barang }}</div>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-black {{ $item->stok > 5 ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800' }}">
                                            <span class="w-2 h-2 rounded-full {{ $item->stok > 5 ? 'bg-emerald-500' : 'bg-amber-500' }} mr-1.5"></span>
                                            {{ $item->stok }} Unit
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 font-bold text-indigo-600">
                                        Rp {{ number_format($item->harga, 0, ',', '.') }}
                                    </td>
                                    @if(Auth::user()->role === 'admin')
                                        <td class="py-4 px-6 text-center">
                                            <div class="flex items-center justify-center space-x-2">
                                                <!-- Tombol Edit (Kuning/Amber) -->
                                                <button @click="openEdit = true" class="p-2.5 bg-amber-50 hover:bg-amber-500 text-amber-600 hover:text-white rounded-xl transition-all duration-200 shadow-sm hover:shadow-md" title="Edit Barang">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                                </button>

                                                <!-- Tombol Hapus (Merah/Rose) -->
                                                <form action="{{ route('barang.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="p-2.5 bg-rose-50 hover:bg-rose-600 text-rose-600 hover:text-white rounded-xl transition-all duration-200 shadow-sm hover:shadow-md" title="Hapus Barang">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                    </button>
                                                </form>
                                            </div>

                                            <!-- Modal Pop-Up Edit Data Barang -->
                                            <div x-show="openEdit" x-cloak class="fixed inset-0 z-50 overflow-y-auto bg-slate-900/60 backdrop-blur-sm flex items-center justify-center p-4" x-transition>
                                                <div @click.away="openEdit = false" class="bg-white rounded-3xl max-w-md w-full p-6 text-left shadow-2xl border border-slate-100">
                                                    <div class="flex justify-between items-center pb-3 mb-4 border-b border-slate-100">
                                                        <h3 class="text-lg font-black text-slate-800">Edit Data Barang</h3>
                                                        <button @click="openEdit = false" class="text-slate-400 hover:text-slate-600 font-bold text-xl">&times;</button>
                                                    </div>

                                                    <form action="{{ route('barang.update', $item->id) }}" method="POST" class="space-y-4">
                                                        @csrf
                                                        @method('PUT')
                                                        
                                                        <div>
                                                            <label class="block text-xs font-extrabold uppercase tracking-wider text-slate-600 mb-1">Nama Barang</label>
                                                            <input type="text" name="nama_barang" value="{{ $item->nama_barang }}" required class="w-full rounded-2xl border-slate-200 text-sm font-semibold focus:border-indigo-500 focus:ring-indigo-500 py-2.5 px-4 shadow-sm">
                                                        </div>

                                                        <div>
                                                            <label class="block text-xs font-extrabold uppercase tracking-wider text-slate-600 mb-1">Jumlah Stok</label>
                                                            <input type="number" name="stok" value="{{ $item->stok }}" required class="w-full rounded-2xl border-slate-200 text-sm font-semibold focus:border-indigo-500 focus:ring-indigo-500 py-2.5 px-4 shadow-sm">
                                                        </div>

                                                        <div>
                                                            <label class="block text-xs font-extrabold uppercase tracking-wider text-slate-600 mb-1">Harga Satuan (Rp)</label>
                                                            <input type="number" name="harga" value="{{ $item->harga }}" required class="w-full rounded-2xl border-slate-200 text-sm font-semibold focus:border-indigo-500 focus:ring-indigo-500 py-2.5 px-4 shadow-sm">
                                                        </div>

                                                        <div class="pt-3 flex justify-end space-x-2">
                                                            <button type="button" @click="openEdit = false" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold rounded-xl text-xs">Batal</button>
                                                            <button type="submit" class="px-5 py-2 bg-amber-500 hover:bg-amber-600 text-white font-bold rounded-xl text-xs shadow-md shadow-amber-500/30">Update Data</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-12 text-center text-slate-400">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-12 h-12 text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                                            <p class="font-bold text-slate-500">Belum Ada Data Barang</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>