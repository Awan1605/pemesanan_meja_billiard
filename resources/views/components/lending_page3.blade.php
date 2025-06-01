<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Add SweetAlert2 for better alerts -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>ZetroBilliard</title>
    <style>
        /* Animation for navbar */
        .animate-fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Nav link hover effect */
        .nav-link {
            position: relative;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #3b82f6;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: #3b82f6;
            transition: width 0.3s;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* Dropdown styles */
        .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background-color: #1a202c;
            min-width: 200px;
            border-radius: 0.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            z-index: 50;
        }

        .dropdown-menu a {
            display: block;
            padding: 0.75rem 1rem;
            color: #e2e8f0;
            text-decoration: none;
            transition: all 0.2s;
        }

        .dropdown-menu a:hover {
            background-color: #2d3748;
            color: #4299e1;
        }

        .dropdown-menu.show {
            display: block;
            animation: fadeIn 0.2s ease-out;
        }

        .dropdown-divider {
            border-top: 1px solid #4a5568;
            margin: 0.25rem 0;
        }

        /* Cart badge */
        .cart-badge {
            position: absolute;
            top: -6px;
            right: -6px;
            background-color: #ef4444;
            color: white;
            border-radius: 9999px;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: bold;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .animate-fade-in {
            animation: fadeIn 1s ease-in-out;
        }

        .animate-slide-up {
            animation: slideUp 0.8s ease-in-out;
        }

        .cards {
            max-width: fit-content;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            align-content: center;
            justify-content: center;
            gap: 1rem;
            backdrop-filter: blur(15px);
            box-shadow: inset 0 0 20px rgba(255, 255, 255, 0.192),
                inset 0 0 5px rgba(255, 255, 255, 0.274), 0 5px 5px rgba(0, 0, 0, 0.164);
            transition: 0.5s;
        }

        .cards:hover {
            animation: ease-out 5s;
            background: rgba(173, 173, 173, 0.05);
        }

        .cards ul {
            padding: 1rem;
            display: flex;
            list-style: none;
            gap: 1rem;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            flex-direction: row;
        }

        .cards ul li {
            cursor: pointer;
            position: relative;
        }

        .svg {
            transition: all 0.3s;
            padding: 1rem;
            height: 60px;
            width: 60px;
            border-radius: 100%;
            color: rgb(255, 174, 0);
            fill: currentColor;
            box-shadow: inset 0 0 20px rgba(255, 255, 255, 0.3),
                inset 0 0 5px rgba(255, 255, 255, 0.5), 0 5px 5px rgba(0, 0, 0, 0.164);
        }

        .texts {
            opacity: 0;
            border-radius: 5px;
            padding: 5px;
            transition: all 0.3s ease;
            color: rgb(255, 174, 0);
            background-color: rgba(255, 255, 255, 0.3);
            position: absolute;
            top: -40px;
            /* Naik ke atas */
            left: 50%;
            transform: translateX(-50%);
            white-space: nowrap;
            z-index: 9999;
            box-shadow: -5px 0 1px rgba(153, 153, 153, 0.2),
                -10px 0 1px rgba(153, 153, 153, 0.2),
                inset 0 0 20px rgba(255, 255, 255, 0.3),
                inset 0 0 5px rgba(255, 255, 255, 0.5), 0 5px 5px rgba(0, 0, 0, 0.082);
        }

        .iso-pro {
            transition: 0.5s;
            position: relative;
        }

        .iso-pro:hover a>.svg {
            transform: scale(1.1);
            /* Efek hover lebih stabil */
        }

        .iso-pro:hover .texts {
            opacity: 1;
            transform: translateX(-50%) translateY(-5px) skew(-3deg);
        }

        .iso-pro:hover .svg {
            transform: scale(1.05);
        }

        .iso-pro span {
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
            color: #1877f2;
            border-color: #1877f2;
            box-shadow: inset 0 0 20px rgba(255, 255, 255, 0.3),
                inset 0 0 5px rgba(255, 255, 255, 0.5), 0 5px 5px rgba(0, 0, 0, 0.164);
            border-radius: 50%;
            transition: all 0.3s;
            height: 60px;
            width: 60px;
        }

        .iso-pro:hover span {
            opacity: 1;
        }

        .iso-pro:hover span:nth-child(1) {
            opacity: 0.2;
        }

        .iso-pro:hover span:nth-child(2) {
            opacity: 0.4;
            transform: scale(1.1);
        }

        .iso-pro:hover span:nth-child(3) {
            opacity: 0.6;
            transform: scale(1.2);
        }

        /* Booking history modal */
        .booking-history-modal {
            max-width: 800px;
            width: 90%;
        }

        modal-center {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-box {
            max-height: 90vh;
            overflow-y: auto;
        }

        /* Custom styling for scrollable containers */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Smooth transitions */
        .transition-opacity {
            transition-property: opacity;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Card styling */
        .bg-gray-800 {
            background-color: #1f2937;
        }

        .bg-gray-700 {
            background-color: #374151;
        }

        .bg-gray-600 {
            background-color: #4b5563;
        }

        .bg-blue-600 {
            background-color: #2563eb;
        }

        .bg-blue-700 {
            background-color: #1d4ed8;
        }

        .hover\:scale-105:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body class="bg-gray-900 text-white font-sans">

    <div
        class="container text-center mx-auto py-20 lg:py-32 px-4 flex flex-col-reverse lg:flex-row items-center justify-center gap-12 animate-slide-up">
        <!-- Text Section -->
        <div class="lg:w-1/2 text-center lg:text-left">
            <h1 class="text-5xl font-extrabold text-white leading-tight mb-6">
                Mainkan Gaya, Kuasai Meja!
            </h1>
            <p class="text-gray-300 text-lg mb-8">
                Nikmati permainan tanpa antre! Pilih meja, tentukan waktu, dan lakukan reservasi hanya dalam
                hitungan
                detik.
            </p>
            <a href="#reservasi"
                class="inline-block bg-blue-900 hover:bg-blue-800 transition-colors duration-300 text-white text-lg font-medium py-3 px-6 rounded-xl shadow-lg">
                Reservasi Sekarang
            </a>
        </div>

        <!-- Gambar Section -->
        <div class="lg:w-1/2 flex justify-center relative group">
            <img src="{{ asset('img/zetro.jpeg') }}"
                alt="A person playing billiards focuses intently on striking the cue ball on a green felt table in a modern billiard hall with warm lighting and a relaxed atmosphere"
                class="rounded-2xl shadow-2xl w-full max-w-md transition-transform duration-500 group-hover:scale-105 group-hover:rotate-1" />
            <div
                class="absolute inset-0 rounded-2xl bg-black bg-opacity-60 transition-all duration-500 group-hover:bg-opacity-40 pointer-events-none">
            </div>

            <div
                class="absolute inset-0 rounded-2xl pointer-events-none group-hover:ring-4 group-hover:ring-blue-700 group-hover:ring-opacity-40 transition-all duration-500">
            </div>
        </div>
    </div>
    <main class="max-w-8xl mx-auto">
        <main class="max-w-8xl mx-auto">
            <!-- Reservasi Section -->
            <div id="reservasi" class="container mx-auto mt-10 mb-10 px-4">
                <h1 class="text-3xl lg:text-5xl font-bold mb-12 text-white text-center">Reservasi</h1>

                <!-- Zetro Exclusive Section -->
                <div class="mb-16">
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
                        <span
                            class="hidden md:inline-block px-4 py-1 rounded-full bg-gradient-to-r from-red-300 via-blue-500 to-blue-700 text-white text-sm font-semibold shadow-lg animate-slide-up">
                            Premium Experience!
                        </span>
                    </div>

                    <div class="relative group">

                        <button onclick="scrollHorizontal('exclusive-container', -300)"
                            class="absolute left-0 top-1/2 -translate-y-1/2 z-10 h-12 w-12 bg-black bg-opacity-50 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 hover:bg-opacity-75 focus:opacity-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>

                        <!-- Card Reservasi -->
                        <div class="grid grid-flow-col auto-cols-[minmax(280px,1fr)] gap-6 overflow-x-auto pb-4 scroll-smooth hide-scrollbar"
                            id="exclusive-container">
                            @for ($i = 1; $i <= 4; $i++)
                                <div
                                    class="bg-gray-800 rounded-lg overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105 flex-shrink-0">
                                    <img class="w-full h-48 object-cover"
                                        src="https://i.pinimg.com/736x/cb/78/a9/cb78a951f1600248602610489aa2465c.jpg"
                                        alt="Zetro Exclusive">
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold text-white">Zetro Exclusive</h3>
                                        <p class="text-gray-400 text-sm">Lantai 2 | Meja {{ $i }}</p>
                                        <p class="text-gray-400 text-sm">Rp 50.000 / Jam</p>
                                        @auth
                                            <a href="{{ route('Public/booking', ['meja' => $i, 'tipe' => 'Exclusive', 'lantai' => 2]) }}"
                                                class="mt-3 inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-300">
                                                Reservasi
                                            </a>
                                        @endauth
                                        @guest
                                            <a href="javascript:void(0);" onclick="showLoginAlert()"
                                                class="mt-3 inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-300">
                                                Reservasi
                                            </a>
                                        @endguest
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <a href="{{ route('Public/reservasi') }}"
                            class="inline-flex items-center justify-center w-full px-6 py-3 bg-blue-500 text-white text-lg font-medium rounded-xl shadow-md hover:bg-blue-600 hover:shadow-lg transition-all duration-300">
                            Lihat Semua Meja Tersedia
                            <svg class="w-5 h-5 ml-2 transition-transform duration-300 group-hover:translate-x-1"
                                fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3">
                                </path>
                            </svg>
                        </a>

                        <!-- Right Arrow -->
                        <button onclick="scrollHorizontal('exclusive-container', 300)"
                            class="absolute right-0 top-1/2 -translate-y-1/2 z-10 h-12 w-12 bg-black bg-opacity-50 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 hover:bg-opacity-75 focus:opacity-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Zetro Classic Section -->
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
                        <span
                            class="hidden md:inline-block px-4 py-1 rounded-full bg-gradient-to-r from-blue-700 via-blue-500 to-yellow-400 text-white text-sm font-semibold shadow-lg animate-slide-up">
                            Favorit Pengunjung!
                        </span>
                    </div>

                    <div class="relative group">
                        <!-- Left Arrow -->
                        <button onclick="scrollHorizontal('classic-container', -300)"
                            class="absolute left-0 top-1/2 -translate-y-1/2 z-10 h-12 w-12 bg-black bg-opacity-50 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 hover:bg-opacity-75 focus:opacity-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>

                        <!-- Card Container -->
                        <div class="grid grid-flow-col auto-cols-[minmax(280px,1fr)] gap-6 overflow-x-auto pb-4 scroll-smooth hide-scrollbar"
                            id="classic-container">
                            @for ($i = 1; $i <= 12; $i++)
                                <div
                                    class="bg-gray-800 rounded-lg overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105 flex-shrink-0">
                                    <img class="w-full h-48 object-cover"
                                        src="https://i.pinimg.com/736x/51/ad/20/51ad208bf51a7cdd41cee58c80ca7aa4.jpg"
                                        alt="Zetro Classic">
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold text-white">Zetro Classic</h3>
                                        <p class="text-gray-400 text-sm">Lantai 1 | Meja {{ $i }}</p>
                                        <p class="text-gray-400 text-sm">Rp35.000 / Jam</p>
                                        @auth
                                            <a href="{{ route('Public/booking', ['meja' => $i, 'tipe' => 'Classic', 'lantai' => 1]) }}"
                                                class="mt-3 inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-300">
                                                Reservasi
                                            </a>
                                        @endauth
                                        @guest
                                            <a href="javascript:void(0);" onclick="showLoginAlert()"
                                                class="mt-3 inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-300">
                                                Reservasi
                                            </a>
                                        @endguest
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <a href="{{ route('Public/reservasi') }}"
                            class="inline-flex items-center justify-center w-full px-6 py-3 bg-blue-500 text-white text-lg font-medium rounded-xl shadow-md hover:bg-blue-600 hover:shadow-lg transition-all duration-300">
                            Lihat Semua Meja Tersedia
                            <svg class="w-5 h-5 ml-2 transition-transform duration-300 group-hover:translate-x-1"
                                fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3">
                                </path>
                            </svg>
                        </a>

                        <!-- Right Arrow -->
                        <button onclick="scrollHorizontal('classic-container', 300)"
                            class="absolute right-0 top-1/2 -translate-y-1/2 z-10 h-12 w-12 bg-black bg-opacity-50 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 hover:bg-opacity-75 focus:opacity-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </main>
    <div id="galeri" class="container mx-auto mt-10 mb-10 px-4">
        <h2 class="mb-6 font-bold text-5xl text-center text-white">Galeri</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-5">
            <!-- Ulangi untuk semua gambar -->
            <div class="aspect-w-1 aspect-h-1">
                <img class="rounded-xl object-cover w-full h-full shadow-md transition-transform duration-300 hover:scale-105 hover:opacity-80"
                    src="{{ asset('img/zetro.jpeg') }}" alt="Billiard table with balls arranged for a game" />
            </div>
            <div class="aspect-w-1 aspect-h-1">
                <img class="rounded-xl object-cover w-full h-full shadow-md transition-transform duration-300 hover:scale-105 hover:opacity-80"
                    src="{{ asset('img/zetro (3).jpeg') }}" alt="Interior of a billiard hall with multiple tables" />
            </div>
            <div class="aspect-w-1 aspect-h-1">
                <img class="rounded-xl object-cover w-full h-full shadow-md transition-transform duration-300 hover:scale-105 hover:opacity-80"
                    src="{{ asset('img/zetro (4).jpeg') }}" alt="Close-up of billiard balls in motion" />
            </div>
            <div class="aspect-w-1 aspect-h-1">
                <img class="rounded-xl object-cover w-full h-full shadow-md transition-transform duration-300 hover:scale-105 hover:opacity-80"
                    src="{{ asset('img/zetro (7).jpeg') }}"
                    alt="Billiard table with neon lights and 'Pilihan terbaik' text" />
            </div>
            <!-- Duplikat lagi jika gambar lebih dari 4 -->
            <div class="aspect-w-1 aspect-h-1">
                <img class="rounded-xl object-cover w-full h-full shadow-md transition-transform duration-300 hover:scale-105 hover:opacity-80"
                    src="{{ asset('img/zetro (5).jpeg') }}" alt="Billiard table with balls arranged for a game" />
            </div>
            <div class="aspect-w-1 aspect-h-1">
                <img class="rounded-xl object-cover w-full h-full shadow-md transition-transform duration-300 hover:scale-105 hover:opacity-80"
                    src="{{ asset('img/zetro2.jpeg') }}" alt="Interior of a billiard hall with multiple tables" />
            </div>
            <div class="aspect-w-1 aspect-h-1">
                <img class="rounded-xl object-cover w-full h-full shadow-md transition-transform duration-300 hover:scale-105 hover:opacity-80"
                    src="https://storage.googleapis.com/a1aa/image/BdM59a_ixLBfeOCEjJXBFhDJiIRx_iwRtPIZEFmcf5g.jpg"
                    alt="Close-up of billiard balls in motion" />
            </div>
            <div class="aspect-w-1 aspect-h-1">
                <img class="rounded-xl object-cover w-full h-full shadow-md transition-transform duration-300 hover:scale-105 hover:opacity-80"
                    src="https://storage.googleapis.com/a1aa/image/p3wYTFXYRei18-RaEwRAiS8lfWf696rnobIJ__iVb-A.jpg"
                    alt="Billiard table with neon lights and 'Pilihan terbaik' text" />
            </div>
        </div>
    </div>

    <!-- Halaman Footer-->
    <footer class="bg-gray-900 text-white pt-12 pb-8 px-4">
        <div id="hubungi_kami" class="container mx-auto max-w-9xl">
            <!-- Grid Layout -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Info Kontak -->
                <div class="space-y-4 animate-fadeIn">
                    <h3 class="text-xl font-bold text-white border-b border-blue-600 pb-2">Hubungi Kami</h3>
                    <div class="space-y-3">
                        <div class="flex items-start hover:scale-[1.02] transition-transform duration-300">
                            <i class="fas fa-map-marker-alt mt-1 text-blue-400 mr-3"></i>
                            <div>
                                <p class="font-medium">Alamat</p>
                                <p class="text-gray-400">Jl. Mitra Raya 2, Batam Kota, Kepulauan Riau</p>
                            </div>
                        </div>
                        <div class="flex items-center hover:scale-[1.02] transition-transform duration-300">
                            <i class="fas fa-phone text-blue-400 mr-3"></i>
                            <div>
                                <p class="font-medium">Telepon/WhatsApp</p>
                                <p class="text-gray-400">+62 895-3368-92177</p>
                            </div>
                        </div>
                        <div class="flex items-center hover:scale-[1.02] transition-transform duration-300">
                            <i class="fas fa-envelope text-blue-400 mr-3"></i>
                            <div>
                                <p class="font-medium">Email</p>
                                <p class="text-gray-400">zetrobilliard@gmail.com</p>
                            </div>
                        </div>
                        <div class="flex items-center hover:scale-[1.02] transition-transform duration-300">
                            <i class="fas fa-clock text-blue-400 mr-3"></i>
                            <div>
                                <p class="font-medium">Jam Operasional</p>
                                <p class="text-gray-400">10:00 - 02:00 (Setiap Hari)</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Maps Untuk mobile -->
                <div class="flex flex-col animate-slideUp">
                    <h3 class="text-xl font-bold text-white border-b border-blue-600 pb-2">Lokasi Kami</h3>
                    <div class="flex-1 relative rounded-xl overflow-hidden shadow-lg mt-2 h-64 min-h-[200px]">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1193.5082249109348!2d104.0399493570298!3d1.1278893961545275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d9893bb51c671f%3A0x1a8d3c7126d88d7c!2sMitra%20Billiard!5e1!3m2!1sid!2sid!4v1747236832809!5m2!1sid!2sid"
                            class="absolute top-0 left-0 w-full h-full border-0" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <a href="https://maps.google.com/?q=Mitra+Billiard" target="_blank"
                        class="mt-3 inline-block bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition-all duration-300 transform hover:scale-105 text-center">
                        Buka di Google Maps
                    </a>
                </div>

                <!-- Tentang Zetro Billiard -->
                <div id="tentang" class="animate-fadeIn">
                    <h3 class="text-xl font-bold text-white border-b border-blue-600 pb-2">Tentang Zetro</h3>
                    <p class="mt-3 text-gray-400">
                        Zetro Billiard menyediakan pengalaman bermain biliar premium dengan fasilitas terbaik dan
                        suasana eksklusif.
                    </p>
                    <div class="mt-6 space-y-6">
                        <div
                            class="bg-gray-800 p-4 rounded-lg hover:bg-gray-700 transition-all duration-300 hover:shadow-lg">
                            <h3 class="text-lg font-semibold mb-2 text-blue-400">Visi Kami</h3>
                            <p class="text-gray-300 leading-relaxed">
                                Menjadi tempat hiburan biliar pilihan utama di Indonesia dengan standar kualitas
                                internasional.
                            </p>
                        </div>
                        <div
                            class="bg-gray-800 p-4 rounded-lg hover:bg-gray-700 transition-all duration-300 hover:shadow-lg">
                            <h3 class="text-lg font-semibold mb-2 text-blue-400">Misi Kami</h3>
                            <ul class="list-disc list-inside text-gray-300 space-y-2">
                                <li class="hover:text-white transition-colors">Menyediakan fasilitas dan peralatan
                                    biliar terbaik.</li>
                                <li class="hover:text-white transition-colors">Mengutamakan kenyamanan dan keamanan
                                    pengunjung.</li>
                                <li class="hover:text-white transition-colors">Mendorong sportivitas dan komunitas
                                    biliar yang positif.</li>
                                <li class="hover:text-white transition-colors">Memberikan layanan pelanggan yang
                                    profesional dan ramah.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Animasi di Footer Bottom -->
        <div
            class="border-t border-gray-800 mt-8 pt-6 flex flex-col md:flex-row justify-between items-center animate-fadeIn">
            <div class="flex items-center space-x-4 mb-4 md:mb-0">
                <a href="#"
                    class="text-blue-400 hover:text-blue-300 transform hover:scale-125 transition-transform duration-300">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#"
                    class="text-blue-400 hover:text-blue-300 transform hover:scale-125 transition-transform duration-300">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#"
                    class="text-blue-400 hover:text-blue-300 transform hover:scale-125 transition-transform duration-300">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>

            <div class="text-center md:text-right">
                <p class="text-gray-500 text-sm">
                    &copy; 2025 Zetro Billiard. All rights reserved.
                    <span class="block md:inline-block mt-1 md:mt-0">Kelompok 3 - PBL</span>
                </p>
            </div>
        </div>
    </footer>
</body>

@if (session('success'))
    <script>
        // Smooth Scroll
        function scrollHorizontal(containerId, distance) {
            const container = document.getElementById(containerId);
            container.scrollBy({
                left: distance,
                behavior: 'smooth'
            });
        }

        //secroll
        document.addEventListener('DOMContentLoaded', function() {
            const containers = ['exclusive-container', 'classic-container'];

            containers.forEach(containerId => {
                const container = document.getElementById(containerId);

                container.addEventListener('focus', function() {
                    const arrows = container.parentElement.querySelectorAll('button');
                    arrows.forEach(arrow => arrow.classList.add('opacity-100'));
                });

                container.setAttribute('tabindex', '0');

                container.addEventListener('keydown', function(e) {
                    if (e.key === 'ArrowLeft') {
                        scrollHorizontal(containerId, -300);
                        e.preventDefault();
                    } else if (e.key === 'ArrowRight') {
                        scrollHorizontal(containerId, 300);
                        e.preventDefault();
                    }
                });
            });
        });

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


        Swal.fire({
            icon: 'success',
            title: 'Selamat Datang, {{ session('username') ?? '' }}!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#facc15', // Ubah warna tombol "OK" jadi kuning agar kontras dengan bg gelap
            color: '#f9fafb', // Warna teks konten
            background: '#1f2937', // Pastikan background tetap gelap
            customClass: {
                confirmButton: 'swal2-confirm-custom'
            }
        });

        // Tambahkan style custom untuk tombol OK jika ingin lebih menonjol
        const styleSuccess = document.createElement('style');
        styleSuccess.innerHTML = `
        .swal2-confirm-custom {
            background: linear-gradient(90deg, #facc15 0%, #fbbf24 100%) !important;
            color: #1f2937 !important;
            font-weight: bold !important;
            font-size: 1rem !important;
            border: none !important;
        }
        `;
        document.head.appendChild(styleSuccess);
    </script>
@endif

</html>
