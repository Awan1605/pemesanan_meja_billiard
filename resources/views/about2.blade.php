<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>ZetroBilliard</title>
    <style>
        /* Animation for navbar */
        .animate-fade-in {
            animation: fadeIn 0.5s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
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

                <!-- Shopping Cart Dropdown -->
                <div class="relative">
                    <button id="cart-button" type="button" class="relative p-2 text-gray-400 hover:text-white focus:outline-none">
                        <i class="fas fa-shopping-cart text-xl"></i>
                        <span class="cart-badge">3</span>
                    </button>
                    
                    <div id="cart-dropdown" class="dropdown-menu">
                        <div class="p-5">
                            <h3 class="font-bold text-lg mb-2">Keranjang (3)</h3>
                            <div class="space-y-2 mb-3">
                                <div class="flex justify-between items-center">
                                    <span>Meja Billiard Reguler</span>
                                    <span>Rp 50.000</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span>Minuman Soda</span>
                                    <span>Rp 15.000</span>
                                </div>
                            </div>
                            <div class="border-t border-gray-700 pt-2">
                                <div class="flex justify-between font-bold mb-3">
                                    <span>Total:</span>
                                    <span>Rp 65.000</span>
                                </div>
                                <a href="#" class="block w-full bg-blue-600 hover:bg-blue-700 text-white text-center py-2 rounded">
                                    Lihat Keranjang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Dropdown -->
                <div class="relative">
                    <button id="profile-button" type="button" class="flex items-center space-x-2 focus:outline-none">
                        <img class="w-8 h-8 rounded-full border-2 border-blue-500"
                            src="https://ui-avatars.com/api/?name=John+Doe&background=2563eb&color=fff"
                            alt="Profile">
                        <span class="text-white">{{ Auth::user()->username }}</span>
                        <i class="fas fa-chevron-down text-sm text-gray-400 ml-1"></i>
                    </button>

                    <div id="profile-dropdown" class="dropdown-menu">
                        <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-700">
                            <i class="fas fa-user-circle mr-2"></i> Profile
                        </a>
                        <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-700">
                            <i class="fas fa-history mr-2"></i> Riwayat Pemesanan
                        </a>
                        <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-700">
                            <i class="fas fa-cog mr-2"></i> Setting
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('about') }}" class="flex items-center px-4 py-2 text-red-400 hover:text-red-300">
                            <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="lg:hidden">
            <ul class="hidden flex-col space-y-2 mt-4 text-lg" id="mobile-menu">
                <li><a class="text-white text-xl hover:text-blue-500 block nav-link" href="{{route('about2')}}">Beranda</a></li>
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
                             src="https://ui-avatars.com/api/?name=John+Doe&background=2563eb&color=fff" 
                             alt="Profile">
                        <span class="text-white">{{ Auth::user()->username }}</span>
                    </div>
                    <ul class="mt-2 space-y-1">
                        <li><a href="#" class="block py-1 text-gray-300 hover:text-blue-500"><i class="fas fa-user-circle mr-2"></i>Profile</a></li>
                        <li><a href="#" class="block py-1 text-gray-300 hover:text-blue-500"><i class="fas fa-history mr-2"></i>Riwayat Pemesanan</a></li>
                        <li><a href="#" class="block py-1 text-gray-300 hover:text-blue-500"><i class="fas fa-cog mr-2"></i>Setting</a></li>
                        <li><a href="#" class="block py-1 text-red-400 hover:text-red-300"><i class="fas fa-sign-out-alt mr-2"></i>Keluar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container text-center mx-auto py-20 lg:py-32 px-4 flex flex-col-reverse lg:flex-row items-center justify-center gap-12 animate-slide-up">
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
    <main class="max-w-7xl mx-auto">

        <!-- Reservasi Section -->
        <div id="Reservasi" class="container mx-auto mt-20 mb-20 px-4">
            <h1 class="text-3xl lg:text-4xl font-bold mb-12 text-white text-center">Reservasi</h1>

            <!-- Zetro Exclusive Section -->
            <div class="mb-16">
                <h2 class="text-xl font-semibold mb-6 text-white">Zetro Exclusive</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                    @for($i = 1; $i <= 4; $i++)
                        <div
                            class="bg-gray-800 rounded-lg overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105">
                            <img class="w-full h-48 object-cover"
                                src="https://storage.googleapis.com/a1aa/image/c629de3d-3a61-474c-dff1-ddeb7063e8e1.jpg"
                                alt="Zetro Exclusive">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-white">Zetro Exclusive</h3>
                                <p class="text-gray-400 text-sm">Lantai 2 | Meja {{ $i }}</p>
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
                                src="https://storage.googleapis.com/a1aa/image/22b4dd80-6d42-4896-6852-5e5f212771a9.jpg"
                                alt="Zetro Classic">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-white">Zetro Classic</h3>
                                <p class="text-gray-400 text-sm">Lantai 1 | Meja {{ $i }}</p>
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
        <h2 class="mb-6 font-bold text-2xl text-center text-white">Galeri</h2>
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

    <!-- Tentang -->
    <div id="tentang" class="container mx-auto mt-10 mb-10 px-4">
        <section class="mb-12">
            <h2 class="text-3xl font-bold mb-4">Tentang Zetro Billiard</h2>
            <p class="text-gray-300 text-lg leading-relaxed">
                Zetro Billiard adalah tempat terbaik untuk Anda yang ingin merasakan pengalaman bermain biliar dengan
                suasana eksklusif dan nyaman.
            </p>
        </section>
        <section class="mb-12">
            <h3 class="text-2xl font-semibold mb-3">Visi Kami</h3>
            <p class="text-gray-300 leading-relaxed">
                Menjadi tempat hiburan biliar pilihan utama di Indonesia dengan standar kualitas internasional.
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


    <h2 id="hubungi_kami" class="mb-5 mt-5 font-bold text-xl text-center animate-fade-in">Hubungi Kami</h2>
    <div class="contact-info text-center bg-gray-800 p-5 rounded-lg shadow-lg animate-slide-up">
        <p class="mb-4">
            <i class="fas fa-info-circle text-blue-500 text-2xl"></i>
            <span class="block text-gray-300 mt-2">Ingin bermain atau reservasi? Hubungi kami di bawah ini!</span>
        </p>
        <p class="mb-4">
            <i class="fas fa-map-marker-alt text-red-500 text-2xl"></i>
            <span class="block text-gray-300 mt-2">Alamat: Jl. Mitra Raya 2, Batam Kota</span>
        </p>
        <p class="mb-4">
            <i class="fas fa-phone text-green-500 text-2xl"></i>
            <span class="block text-gray-300 mt-2">Telepon / WhatsApp: +62 895-3368-92177</span>
        </p>
        <p class="mb-4">
            <i class="fas fa-envelope text-yellow-500 text-2xl"></i>
            <span class="block text-gray-300 mt-2">Email: zetrobilliard@gmail.com</span>
        </p>
        <p>
            <i class="fas fa-clock text-purple-500 text-2xl"></i>
            <span class="block text-gray-300 mt-2">Jam Operasional: 10:00 - 02:00</span>
        </p>
    </div>
    </div>
    <!-- SOSMET ZetroBilliard -->
    <div class="cards text-center mx-auto mt-5 mb-5 animate-fade-in">
        <ul>
            <li class="iso-pro">
                <span></span>
                <span></span>
                <span></span>
                <a href="">
                    <svg viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg" class="svg">
                        <path
                            d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z">
                        </path>
                    </svg></a>
                <div class="texts">Facebook</div>
            </li>
            <li class="iso-pro">
                <span></span>
                <span></span>
                <span></span>
                <a href="https://discord.com/" target="_blank">
                    <svg class="svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 245 240">
                        <path
                            d="M104.4 104.5c-5.7 0-10.2 5-10.2 11.1s4.6 11.1 10.2 11.1c5.7 0 10.2-5 10.2-11.1.1-6.1-4.5-11.1-10.2-11.1zm36.3 0c-5.7 0-10.2 5-10.2 11.1s4.6 11.1 10.2 11.1c5.7 0 10.2-5 10.2-11.1s-4.5-11.1-10.2-11.1z" />
                        <path
                            d="M189.5 20h-134C36.8 20 20 36.8 20 55.6v128.7c0 18.8 16.8 35.6 35.6 35.6h114.5l-5.4-18.9 13 12.1 12.3 11.3 21.8 19.3V55.6c0-18.8-16.8-35.6-35.6-35.6zM160.2 162s-5.3-6.3-9.7-11.9c19.3-5.5 26.6-17.5 26.6-17.5-6 4-11.7 6.8-16.8 8.7-7.3 3.1-14.3 5.1-21.1 6.3-14 2.6-26.8 1.9-37.8-.1-8.3-1.6-15.4-3.9-21.3-6.3-3.3-1.3-6.9-2.9-10.5-4.9-.4-.2-.8-.4-1.2-.6-.3-.2-.5-.3-.7-.4-3.2-1.8-5-3.1-5-3.1s7.1 12 25.9 17.6c-4.4 5.6-9.8 12.1-9.8 12.1-32.4-1-44.7-22.3-44.7-22.3 0-47.2 21.1-85.5 21.1-85.5C70 47.3 86 47 86 47l2 2.3C63.8 56.6 58.4 66 58.4 66s2.4-1.3 6.5-3.2c11.8-5.2 21.1-6.6 24.9-6.9.6-.1 1.2-.2 1.8-.2 6.5-.9 13.9-1.1 21.5-0.2 10.1 1.2 20.9 4.2 31.9 10.3 0 0-5.9-10.6-18.6-16.3l2.8-3.2s16-.3 31.1 12.2c0 0 21.1 38.3 21.1 85.5 0-.1-12.4 21.2-44.9 22.2z" />
                    </svg>
                </a>
                <div class="texts">Discord</div>
            </li>
            <li class="iso-pro">
                <span></span>
                <span></span>
                <span></span>
                <a href="">
                    <svg class="svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path
                            d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                        </path>
                    </svg>
                </a>
                <div class="texts">Instagram</div>
            </li>
            <li class="iso-pro">
                <span></span>
                <span></span>
                <span></span>
                <a href="https://wa.me/62895336892177?text=Halo%2C%20saya%20ingin%20melakukan%20reservasi%20booking.%20Boleh%20minta%20informasi%20lebih%20lanjut%3F"
                    target="_blank">
                    <svg class="svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path
                            d="M380.9 97.1C339.3 55.5 283.2 32 224 32 100.3 32 0 132.3 0 256c0 45.6 12.3 90.1 35.7 129.1L0 480l98.9-34.6C137.9 467.7 181.9 480 224 480c123.7 0 224-100.3 224-224 0-59.2-23.5-115.3-67.1-158.9zM224 438.7c-38.1 0-76.1-10.4-109.2-30.1l-7.8-4.6-58.6 20.5 20.9-57.2-5.1-8.3C43.3 328.7 32 292.7 32 256c0-105.9 86.1-192 192-192 51.2 0 99.3 19.9 135.5 56.1S416 204.8 416 256c0 105.9-86.1 192-192 192zm101.1-138.5c-5.5-2.8-32.5-16-37.6-17.8-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 17.8-17.6 21.5-3.2 3.7-6.5 4.2-12 1.4-32.8-16.4-54.3-29.2-76.4-66.1-5.8-10 5.8-9.3 16.4-30.9 1.4-3.7.7-6.9-.4-9.7-1.2-2.8-12.5-30.1-17.1-41.1-4.5-10.9-9.1-9.4-12.5-9.6-3.2-.2-6.9-.2-10.6-.2s-9.7 1.4-14.8 6.9c-5.1 5.6-19.4 19-19.4 46.3s19.9 53.7 22.7 57.4c2.8 3.7 39.2 59.8 94.8 83.8 13.3 5.7 23.7 9.1 31.8 11.7 13.4 4.2 25.6 3.6 35.3 2.2 10.8-1.6 32.5-13.2 37.1-25.9 4.6-12.7 4.6-23.6 3.2-25.9-1.4-2.3-5.1-3.7-10.6-6.5z">
                        </path>
                    </svg>
                </a>
                <div class="texts">WhatsApp</div>
            </li>
        </ul>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Mobile menu toggle
        const menuButton = document.getElementById('menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        menuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });

        // Profile dropdown
        const profileButton = document.getElementById('profile-button');
        const profileDropdown = document.getElementById('profile-dropdown');

        // Cart dropdown
        const cartButton = document.getElementById('cart-button');
        const cartDropdown = document.getElementById('cart-dropdown');

        // Toggle dropdowns
        function toggleDropdown(button, dropdown, otherDropdowns = []) {
            button.addEventListener('click', function (e) {
                e.stopPropagation();
                dropdown.classList.toggle('show');
                
                // Close other dropdowns
                otherDropdowns.forEach(d => d.classList.remove('show'));
            });
        }

        toggleDropdown(profileButton, profileDropdown, [cartDropdown]);
        toggleDropdown(cartButton, cartDropdown, [profileDropdown]);

        // Close dropdowns when clicking outside
        document.addEventListener('click', function (e) {
            if (!profileDropdown.contains(e.target) && !profileButton.contains(e.target)) {
                profileDropdown.classList.remove('show');
            }
            
            if (!cartDropdown.contains(e.target) && !cartButton.contains(e.target)) {
                cartDropdown.classList.remove('show');
            }
        });

        // Close dropdowns when pressing Escape
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                profileDropdown.classList.remove('show');
                cartDropdown.classList.remove('show');
            }
        });
        
    });
    </script>
</body>
</html>