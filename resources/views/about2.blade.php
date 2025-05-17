<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Add SweetAlert2 for better alerts -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
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
    </style>
</head>

<body class="bg-gray-900 text-white font-sans">
    <nav class="bg-gray-900 p-4 fixed top-0 left-0 w-full z-50 animate-fade-in">
        <div class="container mx-auto flex justify-between items-center">
            <a class="text-blue-500 font-bold text-2xl" href="#">
                <span class="text-blue-500">Zetro</span><span class="text-white">Billiard</span>
            </a>
            <button class="text-white block lg:hidden text-2xl" id="menu-button">
                <i class="fas fa-bars"></i>
            </button>
            <div class="hidden lg:flex items-center space-x-6" id="menu">
                <ul class="flex space-x-6 items-center">
                    <li>
                        <a class="nav-link active text-white hover:text-blue-500" href="{{ route('about2') }}">
                            Beranda
                        </a>
                    </li>
                    <li>
                        <a class="text-white hover:text-blue-500 nav-link" href="#reservasi">
                            Reservasi
                        </a>
                    </li>
                    <li>
                        <a class="text-white hover:text-blue-500 nav-link" href="#galeri">
                            Galeri
                        </a>
                    </li>
                    <li>
                        <a class="text-white hover:text-blue-500 nav-link" href="#tentang">
                            Tentang
                        </a>
                    </li>
                    <li>
                        <a class="text-white hover:text-blue-500 nav-link" href="#hubungi_kami">
                            Hubungi Kami
                        </a>
                    </li>
                </ul>


                <div class="relative dropdown">
                    <button id="profile-button" type="button" class="flex items-center space-x-2 focus:outline-none"
                        data-dropdown-toggle="profile-dropdown" aria-expanded="false" aria-haspopup="true">
                        <img class="w-8 h-8 rounded-full border-2 border-blue-500"
                            src="https://ui-avatars.com/api/?name=John+Doe&background=2563eb&color=fff" alt="Profile">
                        <span class="text-white">{{ Auth::user()->username }}</span>
                        <i class="fas fa-chevron-down text-sm text-gray-400 ml-1"></i>
                    </button>

                    <div id="profile-dropdown" class="dropdown-menu">
                        <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-700">
                            <i class="fas fa-user-circle mr-2"></i> Profile
                        </a>
                        <a href="#booking-history" class="flex items-center px-4 py-2 hover:bg-gray-700"
                            onclick="document.getElementById('booking-history-modal').showModal()">
                            <i class="fas fa-history mr-2"></i> Riwayat Pemesanan
                        </a>
                        <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-700">
                            <i class="fas fa-cog mr-2"></i> Setting
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('about') }}"
                            class="flex items-center px-4 py-2 text-red-400 hover:text-red-300">
                            <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="lg:hidden">
            <ul class="hidden flex-col space-y-2 mt-4 text-lg" id="mobile-menu">
                <li><a class="text-white text-xl hover:text-blue-500 block nav-link"
                        href="{{route('about2')}}">Beranda</a></li>
                <li><a class="text-white hover:text-blue-500 block nav-link" href="#reservasi">Reservasi</a></li>
                <li><a class="text-white hover:text-blue-500 block nav-link" href="#galeri">Galeri</a></li>
                <li><a class="text-white hover:text-blue-500 block nav-link" href="#tentang">Tentang</a></li>
                <li><a class="text-white hover:text-blue-500 block nav-link" href="#hubungi_kami">Hubungi Kami</a></li>

                <!-- Mobile Cart -->
                <li class="pt-2 border-t border-gray-700">
                    <a href="#" class="flex items-center py-2 text-gray-300 hover:text-blue-500">
                        <i class="fas fa-shopping-cart mr-2"></i> Keranjang
                        <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full">3</span>
                    </a>
                </li>

                <!-- Mobile Profile Menu -->
                <li class="pt-2 border-t border-gray-700">
                    <div class="flex items-center space-x-3">
                        <img class="w-8 h-8 rounded-full"
                            src="https://ui-avatars.com/api/?name=John+Doe&background=2563eb&color=fff" alt="Profile">
                        <span class="text-white">{{ Auth::user()->username }}</span>
                    </div>
                    <ul class="mt-2 space-y-1">
                        <li><a href="#" class="block py-1 text-gray-300 hover:text-blue-500"><i
                                    class="fas fa-user-circle mr-2"></i>Profile</a></li>
                        <li><a href="#booking-history" class="block py-1 text-gray-300 hover:text-blue-500"
                                onclick="document.getElementById('booking-history-modal').showModal()"><i
                                    class="fas fa-history mr-2"></i>Riwayat Pemesanan</a></li>
                        <li><a href="#" class="block py-1 text-gray-300 hover:text-blue-500"><i
                                    class="fas fa-cog mr-2"></i>Setting</a></li>
                        <li><a href="#" class="block py-1 text-red-400 hover:text-red-300"><i
                                    class="fas fa-sign-out-alt mr-2"></i>Keluar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div
        class="container text-center mx-auto py-20 lg:py-32 px-4 flex flex-col-reverse lg:flex-row items-center justify-center gap-12 animate-slide-up">
        <!-- Text Section -->
        <div class="lg:w-1/2 text-center lg:text-left">
            <h1 class="text-5xl font-extrabold text-white leading-tight mb-6">
                Mainkan Gaya, Kuasai Meja!
            </h1>
            <p class="text-gray-300 text-lg mb-8">
                Nikmati permainan tanpa antre! Pilih meja, tentukan waktu, dan lakukan reservasi hanya dalam hitungan
                detik.
            </p>
        </div>

        <!-- Image Section -->
        <div class="lg:w-1/2 flex justify-center">
            <img src="https://storage.googleapis.com/a1aa/image/xSzf_KTh4Is-efoDBD3lCtLO51IenIs65R9dHug5LgE.jpg"
                alt="Seseorang bermain billiard dengan fokus pada bola di meja"
                class="rounded-2xl shadow-2xl w-full max-w-md transition-transform duration-500 hover:scale-105" />
        </div>
    </div>
    <main class="max-w-8xl mx-auto">
        <!-- Reservasi Section -->
        <div id="reservasi" class="container mx-auto mt-10 mb-10 px-4">
            <h1 class="text-3xl lg:text-5xl font-bold mb-12 text-white text-center">Reservasi</h1>
            <!-- Zetro Exclusive Section -->
            <div class="mb-16">
                <h2 class="text-xl font-semibold mb-6 text-white">Zetro Exclusive</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                    @for($i = 1; $i <= 4; $i++)
                        <div
                            class="bg-gray-800 rounded-lg overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105">
                            <img class="w-full h-48 object-cover"
                                src="https://i.pinimg.com/736x/cb/78/a9/cb78a951f1600248602610489aa2465c.jpg"
                                alt="Zetro Exclusive">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-white">Zetro Exclusive</h3>
                                <p class="text-gray-400 text-sm">Lantai 2 | Meja {{ $i }}</p>
                                <p class="text-gray-400 text-sm">Rp 50.000 / Jam </p>
                                <a href="{{ route('booking', ['meja' => $i, 'tipe' => 'Exclusive', 'lantai' => 2]) }}"
                                    class="mt-3 inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-300">
                                    Reservasi
                                </a>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            <!-- Zetro Classic Section -->
            <div>
                <h2 class="text-xl font-semibold mb-6 text-white">Zetro Classic</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @for($i = 1; $i <= 12; $i++)
                        <div
                            class="bg-gray-800 rounded-lg overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105">
                            <img class="w-full h-48 object-cover"
                                src="https://i.pinimg.com/736x/51/ad/20/51ad208bf51a7cdd41cee58c80ca7aa4.jpg"
                                alt="Zetro Classic">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-white">Zetro Classic</h3>
                                <p class="text-gray-400 text-sm">Lantai 1 | Meja {{ $i }}</p>
                                <p class="text-gray-400 text-sm">Rp35.000 / Jam</p>
                                <a href="{{ route('booking', ['meja' => $i, 'tipe' => 'Classic', 'lantai' => 1]) }}"
                                    class="mt-3 inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-300">
                                    Reservasi
                                </a>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </main>
    <div id="galeri" class="container mx-auto mt-10 mb-10 px-4">
        <h2 class="mb-6 font-bold text-5xl text-center text-white">Galeri</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-5">
            <!-- Ulangi untuk semua gambar -->
            <div class="aspect-w-1 aspect-h-1">
                <img class="rounded-xl object-cover w-full h-full shadow-md transition-transform duration-300 hover:scale-105 hover:opacity-80"
                    src="https://storage.googleapis.com/a1aa/image/PVGPQGGOSv0wd-EiqYX8y_9iHCSgoQPv6CVCxJQ4CI0.jpg"
                    alt="Billiard table with balls arranged for a game" />
            </div>
            <div class="aspect-w-1 aspect-h-1">
                <img class="rounded-xl object-cover w-full h-full shadow-md transition-transform duration-300 hover:scale-105 hover:opacity-80"
                    src="https://storage.googleapis.com/a1aa/image/XzahZEZq5BP6FqGbSVS265xknizHlV43F8Et-b23MIg.jpg"
                    alt="Interior of a billiard hall with multiple tables" />
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
            <!-- Duplikat lagi jika gambar lebih dari 4 -->
            <div class="aspect-w-1 aspect-h-1">
                <img class="rounded-xl object-cover w-full h-full shadow-md transition-transform duration-300 hover:scale-105 hover:opacity-80"
                    src="https://storage.googleapis.com/a1aa/image/PVGPQGGOSv0wd-EiqYX8y_9iHCSgoQPv6CVCxJQ4CI0.jpg"
                    alt="Billiard table with balls arranged for a game" />
            </div>
            <div class="aspect-w-1 aspect-h-1">
                <img class="rounded-xl object-cover w-full h-full shadow-md transition-transform duration-300 hover:scale-105 hover:opacity-80"
                    src="https://storage.googleapis.com/a1aa/image/XzahZEZq5BP6FqGbSVS265xknizHlV43F8Et-b23MIg.jpg"
                    alt="Interior of a billiard hall with multiple tables" />
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




    <!-- Footer Section -->
    <footer class="bg-gray-900 text-white pt-12 pb-8 px-4">
        <div class="container mx-auto max-w-9xl">
            <!-- Grid Layout -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Contact Info (Left) -->
                <div class="space-y-4">
                    <h3 class="text-xl font-bold text-white border-b border-blue-600 pb-2">Hubungi Kami</h3>
                    <div class="space-y-3">
                        <div class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 text-blue-400 mr-3"></i>
                            <div>
                                <p class="font-medium">Alamat</p>
                                <p class="text-gray-400">Jl. Mitra Raya 2, Batam Kota, Kepulauan Riau</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-phone text-blue-400 mr-3"></i>
                            <div>
                                <p class="font-medium">Telepon/WhatsApp</p>
                                <p class="text-gray-400">+62 895-3368-92177</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-envelope text-blue-400 mr-3"></i>
                            <div>
                                <p class="font-medium">Email</p>
                                <p class="text-gray-400">zetrobilliard@gmail.com</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-clock text-blue-400 mr-3"></i>
                            <div>
                                <p class="font-medium">Jam Operasional</p>
                                <p class="text-gray-400">10:00 - 02:00 (Setiap Hari)</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map (Middle) -->
                <div class="flex flex-col">
                    <h3 class="text-xl font-bold text-white border-b border-blue-600 pb-2">Lokasi Kami</h3>
                    <div class="flex-1 relative rounded-xl overflow-hidden shadow-lg mt-2 h-64">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1193.5082249109348!2d104.0399493570298!3d1.1278893961545275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d9893bb51c671f%3A0x1a8d3c7126d88d7c!2sMitra%20Billiard!5e1!3m2!1sid!2sid!4v1747236832809!5m2!1sid!2sid"
                            class="absolute top-0 left-0 w-full h-full border-0" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

                <!-- Quick Links & About (Right) -->


                <div class="#tentang">
                    <h3 class="text-xl font-bold text-whiteborder-b border-blue-600 pb-2">Tentang Zetro</h3>
                    <p class="mt-3 text-gray-400">
                        Zetro Billiard menyediakan pengalaman bermain biliar premium dengan fasilitas terbaik dan
                        suasana eksklusif.
                    </p>
                    <!-- Tentang -->
                    <div id="tentang" class="container mx-auto mt-10 mb-10 px-4">
                        <section class="mb-12">
                            <h3 class="text-2xl font-semibold mb-3">Visi Kami</h3>
                            <p class="text-gray-300 leading-relaxed">
                                Menjadi tempat hiburan biliar pilihan utama di Indonesia dengan standar kualitas
                                internasional.
                            </p>
                        </section>
                        <section>
                            <h3 class="text-2xl font-semibold mb-3">Misi Kami</h3>
                            <ul class="list-disc list-inside text-gray-300 space-y-2">
                                <li>Menyediakan fasilitas dan peralatan biliar terbaik.</li>
                                <li>Mengutamakan kenyamanan dan keamanan pengunjung.</li>
                                <li>Mendorong sportivitas dan komunitas biliar yang positif.</li>
                                <li>Memberikan layanan pelanggan yang profesional dan ramah.</li>
                            </ul>
                        </section>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="border-t border-gray-800 mt-8 pt-6 flex flex-col md:flex-row justify-between items-center">
            <div class="flex items-center space-x-4 mb-4 md:mb-0">
                <a href="#" class="text-blue-400 hover:text-blue-300">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="text-blue-400 hover:text-blue-300">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="text-blue-400 hover:text-blue-300">
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
        </div>
    </footer>

    <!-- Booking History Modal -->
    <!-- Booking History Modal -->
    <dialog id="booking-history-modal" class="modal modal-center">
        <div class="modal-box bg-gray-800 text-white max-w-6xl">
            <h3 class="font-bold text-2xl mb-6">Riwayat Pemesanan</h3>
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <!-- head -->
                    <thead>
                        <tr class="text-gray-300">
                            <th>No</th>
                            <th>Meja</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="booking-history-body">
                        <!-- Data akan dimasukkan di sini oleh JavaScript -->
                    </tbody>
                </table>
            </div>
            <div class="modal-action">
                <form method="dialog">
                    <button class="btn btn-primary">Tutup</button>
                </form>
            </div>
        </div>
        <!-- Backdrop click to close -->
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

    <!-- Add SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Dropdown Functionality
            function setupDropdown() {
                // Close all dropdowns when clicking outside
                document.addEventListener('click', function (e) {
                    if (!e.target.closest('.dropdown')) {
                        document.querySelectorAll('.dropdown-menu').forEach(menu => {
                            menu.classList.remove('show');
                        });
                    }
                });

                // Handle dropdown toggle
                document.addEventListener('click', function (e) {
                    const dropdownButton = e.target.closest('[data-dropdown-toggle]');
                    if (dropdownButton) {
                        e.preventDefault();
                        const dropdownId = dropdownButton.getAttribute('data-dropdown-toggle');
                        const dropdownMenu = document.getElementById(dropdownId);

                        // Close all other dropdowns first
                        document.querySelectorAll('.dropdown-menu').forEach(menu => {
                            if (menu.id !== dropdownId) {
                                menu.classList.remove('show');
                            }
                        });

                        // Toggle current dropdown
                        dropdownMenu.classList.toggle('show');
                    }
                });
            }

            // Initialize dropdowns
            setupDropdown();

            // Mobile menu toggle
            const menuButton = document.getElementById('menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            menuButton?.addEventListener('click', function (e) {
                e.stopPropagation();
                mobileMenu.classList.toggle('hidden');
            });

            // Close mobile menu when clicking outside
            document.addEventListener('click', function (e) {
                if (!e.target.closest('#menu-button') && !e.target.closest('#mobile-menu')) {
                    mobileMenu.classList.add('hidden');
                }
            });

            // Booking history data
            let bookings = JSON.parse(localStorage.getItem('bookings')) || [
                {
                    id: 1,
                    meja: "Zetro Exclusive - Meja 3",
                    tanggal: "15 Juni 2025",
                    waktu: "19:00 - 21:00",
                    status: "Confirmed",
                    total: "Rp 100.000",
                    details: {
                        roomType: "exclusive",
                        duration: 2,
                        foods: { nasi_goreng: 0 },
                        drinks: { root_calm: 1, es_dagen: 0, ice_tea: 0 }
                    }
                },
                {
                    id: 2,
                    meja: "Zetro Classic - Meja 5",
                    tanggal: "10 Juni 2025",
                    waktu: "15:00 - 17:00",
                    status: "Completed",
                    total: "Rp 70.000",
                    details: {
                        roomType: "classic",
                        duration: 2,
                        foods: { nasi_goreng: 1 },
                        drinks: { root_calm: 0, es_dagen: 1, ice_tea: 0 }
                    }
                }
            ];

            // Render booking history
            function renderBookingHistory() {
                const bookingHistoryBody = document.getElementById('booking-history-body');
                if (bookingHistoryBody) {
                    bookingHistoryBody.innerHTML = bookings.map((booking, index) => `
                            <tr>
                                <th>${index + 1}</th>
                                <td>${booking.meja}</td>
                                <td>${booking.tanggal}</td>
                                <td>${booking.waktu}</td>
                                <td>
                                    <span class="badge ${booking.status === 'Confirmed' ? 'badge-success' :
                            booking.status === 'Pending' ? 'badge-warning' : 'badge-info'}">
                                        ${booking.status}
                                    </span>
                                </td>
                                <td>${booking.total}</td>
                                <td>
                                    <button class="btn btn-xs btn-info" onclick="viewBookingDetail(${booking.id})">
                                        Detail
                                    </button>
                                </td>
                            </tr>
                        `).join('');
                }
            }

            // View booking detail
            window.viewBookingDetail = function (id) {
                const booking = bookings.find(b => b.id === id);

                if (booking) {
                    // Format detail makanan
                    let foodDetails = '';
                    if (booking.details.foods) {
                        for (const [item, qty] of Object.entries(booking.details.foods)) {
                            if (qty > 0) {
                                foodDetails += `${qty} ${item.replace('_', ' ')}, `;
                            }
                        }
                        foodDetails = foodDetails.slice(0, -2); // Hapus koma terakhir
                    }

                    // Format detail minuman
                    let drinkDetails = '';
                    if (booking.details.drinks) {
                        for (const [item, qty] of Object.entries(booking.details.drinks)) {
                            if (qty > 0) {
                                drinkDetails += `${qty} ${item.replace('_', ' ')}, `;
                            }
                        }
                        drinkDetails = drinkDetails.slice(0, -2); // Hapus koma terakhir
                    }

                    // Tampilkan modal detail
                    Swal.fire({
                        title: 'Detail Pemesanan',
                        html: `
        <div class="text-left space-y-6 w-full max-w-5xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="font-bold text-blue-400 text-lg mb-2">Informasi Booking</h4>
                    <p><strong>Meja:</strong> ${booking.meja}</p>
                    <p><strong>Tanggal:</strong> ${formatDate(booking.tanggal)}</p>
                    <p><strong>Waktu:</strong> ${booking.waktu}</p>
                    <p><strong>Durasi:</strong> ${booking.details.duration} Jam</p>
                </div>
                <div>
                    <h4 class="font-bold text-blue-400 text-lg mb-2">Status Pembayaran</h4>
                    <p><strong>Status:</strong> 
                        <span class="${booking.status.includes('Konfirmasi') ? 'text-green-500' :
                                booking.status.includes('Menunggu') ? 'text-yellow-500' : 'text-red-500'
                            }">${booking.status}</span>
                    </p>
                    <p><strong>Metode:</strong> ${booking.paymentMethod || '-'}</p>
                    <p><strong>Total:</strong> ${booking.total}</p>
                </div>
            </div>

            ${(foodItems || drinkItems) ? `
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                ${foodItems ? `
                <div>
                    <h4 class="font-bold text-blue-400 text-lg mb-2">Makanan</h4>
                    <ul class="list-disc pl-5">${foodItems}</ul>
                </div>` : ''}
                ${drinkItems ? `
                <div>
                    <h4 class="font-bold text-blue-400 text-lg mb-2">Minuman</h4>
                    <ul class="list-disc pl-5">${drinkItems}</ul>
                </div>` : ''}
            </div>` : ''}

            ${booking.paymentProof ? `
            <div>
                <h4 class="font-bold text-blue-400 text-lg mb-2">Bukti Pembayaran</h4>
                <img src="${booking.paymentProof}" alt="Bukti Pembayaran" 
                     class="mt-2 rounded-lg border border-gray-600 max-h-80 w-full object-contain">
            </div>` : ''}
        </div>
    `,
                        customClass: {
                            popup: 'w-full max-w-6xl !p-6' // Mengatur lebar maksimum dan padding swal
                        },
                        showCloseButton: true,
                        confirmButtonText: 'Tutup',
                        focusConfirm: false
                    });
                }
            }

            // Panggil fungsi render saat modal dibuka
            document.getElementById('booking-history-modal').addEventListener('show', renderBookingHistory);

            // Initial render
            renderBookingHistory();
        });
    </script>
</body>

</html>