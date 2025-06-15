<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi | Zetro Billiard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    @keyframes fade-in {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fade-in 1s ease-out forwards;
    }

    .animate-fade-in-up {
        animation: fade-in-up 0.8s ease-out forwards;
    }
</style>

<body class="bg-gray-900 text-white">

    <!-- Navbar -->
    <x-navbar2></x-navbar2>
    <main class="p-6">
        @yield('content')
    </main>

    <!-- Content -->
    <main class="max-w-7xl mx-auto px-4">
        <!-- Reservasi Section -->
        <div id="reservasi" class="mt-10 mb-20">
            <h1 class="text-4xl lg:text-5xl font-extrabold text-white text-center mb-12 animate-fade-in">
                Reservasi
            </h1>

            <!-- Zetro Exclusive Section -->
            <section class="mb-20 animate-fade-in-up">
                <div class="flex justify-between items-center mb-6 animate-fade-in">
                    <h2 class="text-2xl lg:text-3xl font-extrabold text-white flex items-center gap-3">
                        <span class="inline-block animate-bounce text-yellow-400">
                            <i class="fas fa-crown"></i>
                        </span>
                        Zetro Exclusive
                        <span class="inline-block animate-pulse text-blue-400">
                            <i class="fas fa-gem"></i>
                        </span>
                    </h2>

                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6" id="exclusive-container">
                    @for ($i = 1; $i <= 16; $i++)
                        <div
                            class="exclusive-item bg-gray-800 rounded-xl shadow-md overflow-hidden transform transition duration-500 hover:scale-105 hover:shadow-xl @if ($i > 4) hidden @endif">
                            <img class="w-full h-48 object-cover"
                                src="https://i.pinimg.com/736x/cb/78/a9/cb78a951f1600248602610489aa2465c.jpg"
                                alt="Zetro Exclusive">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-white">Zetro Exclusive</h3>
                                <p class="text-sm text-gray-400">Lantai 2 | Meja {{ $i }}</p>
                                <p class="text-sm text-gray-400">Rp 50.000 / Jam</p>
                                @auth
                                    <a href="{{ route('Public/booking', ['meja' => $i, 'tipe' => 'Exclusive', 'lantai' => 2]) }}"
                                        class="mt-3 inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-all duration-300 shadow-sm">
                                        Reservasi
                                    </a>
                                @endauth
                                @guest
                                    <a href="javascript:void(0);" onclick="showLoginAlert()"
                                        class="mt-3 inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-all duration-300 shadow-sm">
                                        Reservasi
                                    </a>
                                @endguest
                            </div>
                        </div>
                    @endfor
                </div>

                <!-- Tombol Lihat Semua Exclusive -->
                @if (16 > 4)
                    <div class="text-center mt-8">
                        <button onclick="toggleTables('exclusive')"
                            class="group inline-flex items-center bg-gray-700 hover:bg-blue-600 text-white px-6 py-3 rounded-full transition duration-300 shadow-md hover:shadow-lg">
                            Lihat Semua Exclusive
                            <svg class="w-5 h-5 ml-2 transition-transform group-hover:translate-x-1" fill="none"
                                stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                @endif
            </section>

            <!-- Zetro Classic Section -->
            <section class="animate-fade-in-up">
                <div>
                    <div class="flex justify-between items-center mb-6 animate-fade-in">
                        <h2 class="text-xl lg:text-2xl font-extrabold text-white flex items-center gap-3">
                            <span class="inline-block animate-bounce text-yellow-400">
                                <i class="fas fa-star"></i>
                            </span>
                            Zetro Classic
                            <span class="inline-block animate-pulse text-blue-400">
                                <i class="fas fa-bolt"></i>
                            </span>
                        </h2>

                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6"
                        id="classic-container">
                        @for ($i = 1; $i <= 30; $i++)
                            <div
                                class="classic-item bg-gray-800 rounded-xl shadow-md overflow-hidden transform transition duration-500 hover:scale-105 hover:shadow-xl @if ($i > 4) hidden @endif">
                                <img class="w-full h-48 object-cover"
                                    src="https://i.pinimg.com/736x/51/ad/20/51ad208bf51a7cdd41cee58c80ca7aa4.jpg"
                                    alt="Zetro Classic">
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold text-white">Zetro Classic</h3>
                                    <p class="text-sm text-gray-400">Lantai 1 | Meja {{ $i }}</p>
                                    <p class="text-sm text-gray-400">Rp 35.000 / Jam</p>
                                    @auth
                                        <a href="{{ route('Public/booking', ['meja' => $i, 'tipe' => 'Classic', 'lantai' => 1]) }}"
                                            class="mt-3 inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-all duration-300 shadow-sm">
                                            Reservasi
                                        </a>
                                    @endauth
                                    @guest
                                        <a href="javascript:void(0);" onclick="showLoginAlert()"
                                            class="mt-3 inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-all duration-300 shadow-sm">
                                            Reservasi
                                        </a>
                                    @endguest
                                </div>
                            </div>
                        @endfor
                    </div>

                    <!-- Tombol Lihat Semua Classic -->
                    @if (12 > 4)
                        <div class="text-center mt-8">
                            <button onclick="toggleTables('classic')"
                                class="group inline-flex items-center bg-gray-700 hover:bg-blue-600 text-white px-6 py-3 rounded-full transition duration-300 shadow-md hover:shadow-lg">
                                Lihat Semua Classic
                                <svg class="w-5 h-5 ml-2 transition-transform group-hover:translate-x-1" fill="none"
                                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    @endif
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 mt-16 px-6 py-8 border-t border-gray-700 text-sm">
        <div class="flex justify-between items-center flex-wrap">
            <div>
                <p class="font-bold">Zetro<span class="text-blue-400">Billiard.</span></p>
                <p class="text-gray-400">Membangun hubungan, tapi menang dengan sportivitas dan respect itu lebih
                    berarti</p>
            </div>

        </div>
        <div class="text-center text-gray-500 mt-4">&copy; 2025 Zetro Billiard. All rights reserved</div>
    </footer>
</body>
<script>
    function toggleTables(type) {
        const container = document.getElementById(`${type}-container`);
        const items = container.getElementsByClassName(`${type}-item`);
        const button = event.target;

        let allVisible = true;

        // Check if any items are hidden
        for (let item of items) {
            if (item.classList.contains('hidden')) {
                allVisible = false;
                break;
            }
        }

        // Toggle visibility
        for (let item of items) {
            if (allVisible) {
                // Hide items beyond the initial count
                const initialCount = type === 'exclusive' ? 4 : 12;
                if (Array.from(items).indexOf(item) >= initialCount) {
                    item.classList.add('hidden');
                }
            } else {
                item.classList.remove('hidden');
            }
        }

        // Update button text
        button.textContent = allVisible ?
            `Lihat Semua ${type.charAt(0).toUpperCase() + type.slice(1)}` :
            'Lihat Lebih Sedikit';
    }


    //Alert saat reservasi tapi belum login
    function showLoginAlert() {
        Swal.fire({
            title: '<span style="color:#facc15"><i class="fas fa-lock mr-2"></i> Login Diperlukan!</span>',
            html: '<div style="color:#f9fafb;font-size:1.1rem;">Anda harus login untuk melakukan reservasi.<br><br><span style="font-size:2rem;">🎱</span></div>',
            icon: 'warning',
            background: '#1f2937',
            color: '#f9fafb',
            iconColor: '#facc15',
            showCancelButton: true,
            confirmButtonColor: '#2563eb',
            cancelButtonColor: '#dc2626',
            confirmButtonText: '<i class="fas fa-sign-in-alt mr-2"></i> Login Sekarang',
            cancelButtonText: 'Batal',
            customClass: {
                popup: 'animate__animated animate__fadeInDown',
                confirmButton: 'swal2-confirm-custom',
                cancelButton: 'swal2-cancel-custom'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('login') }}";
            }
        });
    }

    const style = document.createElement('style');
    style.innerHTML = `
    .swal2-confirm-custom {
        background: linear-gradient(90deg, #2563eb 0%, #1e40af 100%) !important;
        border: none !important;
        font-weight: bold !important;
        font-size: 1rem !important;
    }
    .swal2-cancel-custom {
        background: #374151 !important;
        color: #f9fafb !important;
        border: none !important;
        font-weight: bold !important;
        font-size: 1rem !important;
    }
    `;
    document.head.appendChild(style);

    // (Removed duplicate toggleTables function to prevent conflict)
</script>

</html>
