<div class="md:hidden fixed top-0 left-0 w-full bg-white shadow-md z-50">
    <div class="flex justify-between items-center p-4">
        <h1 class="text-2xl font-semibold">
            <span class="text-blue-800">Zetro</span><span class="text-gray-900">Billiard</span>
        </h1>
        <button id="mobile-menu-button" class="text-gray-600 hover:text-gray-900 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </button>
    </div>
    <div id="mobile-menu" class="hidden px-4 pb-4">
        <nav class="mt-2">
            <a href="{{ route('admin.dashboard') }}"
                class="block py-2 px-4 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'text-blue-600 bg-blue-50 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">Dashboard</a>
            <a href="{{ route('admin.reservasi') }}"
                class="block py-2 px-4 rounded-lg mt-1 {{ request()->routeIs('admin.reservasi') ? 'text-blue-600 bg-blue-50 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">Reservasi
                Billiard</a>
            <a href="{{ route('admin.pengguna') }}"
                class="block py-2 px-4 rounded-lg mt-1 {{ request()->routeIs('admin.pengguna') ? 'text-blue-600 bg-blue-50 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">Manajemen
                Pengguna</a>
            <a href="{{ route('admin.meja') }}"
                class="block py-2 px-4 rounded-lg mt-1 {{ request()->routeIs('admin.meja') ? 'text-blue-600 bg-blue-50 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">Manajemen
                Meja Billiard</a>
            <a href="{{ route('admin.pembayaran') }}"
                class="block py-2 px-4 rounded-lg mt-1 {{ request()->routeIs('admin.pembayaran') ? 'text-blue-600 bg-blue-50 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">Manajemen
                Pembayaran</a>
            <a href="{{ route('admin.makanan') }}"
                class="block py-2 px-4 rounded-lg mt-1 {{ request()->routeIs('admin.makanan') ? 'text-blue-600 bg-blue-50 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">Pilihan
                Menu</a>
        </nav>
    </div>
</div>

<!-- Your existing sidebar (unchanged) -->
<div class="w-64 bg-white shadow-md hidden md:block">
    <div class="p-5 text-center">
        <h1 class="text-4xl font-semibold">
            <span class="text-blue-800">Zetro</span><span class="text-gray-900">Billiard</span>
        </h1>
    </div>

    <nav class="mt-4">
        <div class="px-1">
            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}"
                class="block py-3 px-4 flex items-center rounded-lg mt-2 transition-colors duration-200
                    {{ request()->routeIs('admin.dashboard') ? 'text-blue-600 bg-blue-50 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
                <span class="ml-3 text-l">Dashboard</span>
            </a>

            <!-- Reservasi Billiard -->
            <a href="{{ route('admin.reservasi') }}"
                class="block py-3 px-4 flex items-center rounded-lg mt-2 transition-colors duration-200
                            {{ request()->routeIs('admin.reservasi') ? 'text-blue-600 bg-blue-50 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">

                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                    </path>
                </svg>
                <span class="ml-3 text-l">Reservasi Billiard</span>
            </a>


            <!-- Manajemen Pengguna -->
            <a href="{{ route('admin.pengguna') }}"
                class="block py-3 px-4 flex items-center rounded-lg mt-2 transition-colors duration-200
                            {{ request()->routeIs('admin.pengguna') ? 'text-blue-600 bg-blue-50 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span class="ml-3 text-l">Manajemen Pengguna</span>
            </a>

            <!-- Manajemen Meja Billiard -->
            <a href="{{ route('admin.meja') }}"
                class="block py-3 px-4 flex items-center rounded-lg mt-2 transition-colors duration-200
                    {{ request()->routeIs('admin.meja') ? 'text-blue-600 bg-blue-50 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 4h18M3 12h18M3 20h18M12 4v16M3 4v16M21 4v16"></path>
                </svg>
                <span class="ml-3 text-l">Manajemen Meja Billiard</span>
            </a>

            <!-- Manajemen Pembayaran -->
            <a href="{{ route('admin.pembayaran') }}"
                class="block py-3 px-4 flex items-center rounded-lg mt-2 transition-colors duration-200
                    {{ request()->routeIs('admin.pembayaran') ? 'text-blue-600 bg-blue-50 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
                <span class="ml-3 text-l">Manajemen Pembayaran</span>
            </a>

            <!-- Manajemen Makanan -->
            <a href="{{ route('admin.makanan') }}"
                class="block py-3 px-4 flex items-center rounded-lg mt-2 transition-colors duration-200
                    {{ request()->routeIs('admin.makanan') ? 'text-blue-600 bg-blue-50 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 12h12M12 2v10M4 18h16M6 18h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v9a2 2 0 002 2z">
                    </path>
                </svg>
                <span class="ml-3 text-l">Pilihan Menu</span>
            </a>
        </div>
    </nav>
</div>

<script>
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>
