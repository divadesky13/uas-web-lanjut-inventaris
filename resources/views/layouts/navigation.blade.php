<nav x-data="{ open: false }" class="bg-slate-900 border-b-2 border-indigo-600/50 shadow-2xl relative z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20"> <!-- Tinggi Navbar -->
            <div class="flex items-center space-x-10">
                
                <!-- Logo Aplikasi -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 group">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-indigo-600 to-purple-600 flex items-center justify-center text-white shadow-lg shadow-indigo-500/50 group-hover:scale-105 transition-transform duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <span class="font-black text-2xl text-white tracking-wider hidden sm:block drop-shadow">
                            INVENTARIS<span class="text-indigo-400">APP</span>
                        </span>
                    </a>
                </div>

                <!-- Menu Navigasi Desktop -->
                <div class="hidden space-x-4 sm:-my-px sm:flex">
                    <!-- Dashboard -->
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-5 py-2.5 rounded-2xl text-base font-bold transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/40 ring-2 ring-indigo-400' : 'text-slate-200 hover:text-white hover:bg-slate-800' }}">
                        <svg class="w-5 h-5 mr-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        Dashboard
                    </a>
                    
                    <!-- Data Barang -->
                    <a href="{{ route('barang.index') }}" class="inline-flex items-center px-5 py-2.5 rounded-2xl text-base font-bold transition-all duration-200 {{ request()->routeIs('barang.*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/40 ring-2 ring-indigo-400' : 'text-slate-200 hover:text-white hover:bg-slate-800' }}">
                        <svg class="w-5 h-5 mr-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                        Data Barang
                    </a>

                    <!-- Kelola Pengguna (Khusus Admin) -->
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('users.index') }}" class="inline-flex items-center px-5 py-2.5 rounded-2xl text-base font-bold transition-all duration-200 {{ request()->routeIs('users.*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/40 ring-2 ring-indigo-400' : 'text-slate-200 hover:text-white hover:bg-slate-800' }}">
                            <svg class="w-5 h-5 mr-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                            Kelola Pengguna
                        </a>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="56">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2.5 border-2 border-indigo-500/40 text-base leading-4 font-bold rounded-2xl text-white bg-slate-800/90 hover:bg-slate-700 hover:border-indigo-400 focus:outline-none transition duration-200 shadow-md">
                            <span class="w-3 h-3 rounded-full bg-emerald-400 mr-2.5 animate-pulse"></span>
                            <span class="text-lg font-extrabold tracking-wide">{{ Auth::user()->name }}</span>
                            
                            <span class="ml-3 bg-gradient-to-r from-amber-400 to-orange-500 text-slate-950 text-xs font-black uppercase px-2.5 py-1 rounded-xl shadow-sm">
                                {{ Auth::user()->role }}
                            </span>
                            
                            <svg class="fill-current h-5 w-5 ml-2 text-indigo-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="block px-5 py-3 text-sm font-semibold text-slate-400 border-b border-slate-100">
                            {{ Auth::user()->email }}
                        </div>

                        <!-- Profil Saya -->
                        <x-dropdown-link :href="route('profile.edit')" class="text-base font-medium py-2.5">
                            {{ __('Profil Saya') }}
                        </x-dropdown-link>

                        <!-- Log Out -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="text-base font-bold text-rose-600 hover:text-rose-700 py-2.5">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger Button (Mobile) -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-3 rounded-2xl text-slate-300 hover:text-white hover:bg-slate-800 focus:outline-none transition duration-150">
                    <svg class="h-7 w-7" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Mobile Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-slate-900 border-b-2 border-indigo-600/50">
        <div class="pt-3 pb-4 space-y-2 px-3">
            <a href="{{ route('dashboard') }}" class="block px-4 py-3 rounded-2xl text-lg font-bold {{ request()->routeIs('dashboard') ? 'bg-indigo-600 text-white' : 'text-slate-200 hover:bg-slate-800' }}">
                Dashboard
            </a>
            <a href="{{ route('barang.index') }}" class="block px-4 py-3 rounded-2xl text-lg font-bold {{ request()->routeIs('barang.*') ? 'bg-indigo-600 text-white' : 'text-slate-200 hover:bg-slate-800' }}">
                Data Barang
            </a>
            @if(Auth::user()->role === 'admin')
                <a href="{{ route('users.index') }}" class="block px-4 py-3 rounded-2xl text-lg font-bold {{ request()->routeIs('users.*') ? 'bg-indigo-600 text-white' : 'text-slate-200 hover:bg-slate-800' }}">
                    Kelola Pengguna
                </a>
            @endif
        </div>

        <div class="pt-4 pb-4 border-t border-slate-800 px-5">
            <div class="flex items-center space-x-3 mb-4">
                <div class="w-10 h-10 rounded-2xl bg-indigo-600 text-white flex items-center justify-center font-black text-lg">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div>
                    <div class="font-extrabold text-lg text-white">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-slate-400">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="space-y-2">
                <a href="{{ route('profile.edit') }}" class="block w-full text-left px-4 py-3 rounded-2xl text-base font-bold text-slate-200 hover:bg-slate-800 transition-colors">
                    Profil Saya
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-3 rounded-2xl text-base font-bold text-rose-400 hover:bg-slate-800 transition-colors">
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>