<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>ZetroBilliard</title>
    <style>
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

        /* icont Sosmet */
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
                <span class="text-blue-500">Zetro</span><span class="text-white">Billiard</span>.
            </a>
            <button class="text-white block lg:hidden text-2xl" id="menu-button">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="hidden lg:flex space-x-4" id="menu">
                <li>
                    <a class="text-white hover:text-blue-500 nav-link" href="about">
                        Beranda
                    </a>
                </li>
                <li>
                    <a class="text-white hover:text-blue-500 nav-link" href="#Reservasi">
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
                <li><a class="bg-blue-900 text-white py-2 px-4 rounded hover:bg-blue-800"
                        href="{{ route('login') }}">Login</a></li>
            </ul>
        </div>
        <div class="lg:hidden">
            <ul class="hidden flex-col space-y-2 mt-4 text-lg" id="mobile-menu">
                <li><a class="text-white text-xl hover:text-blue-500 block nav-link" href="#">Beranda</a></li>
                <li><a class="text-white hover:text-blue-500 block nav-link" href="{{ route('home') }}">Reservasi</a>
                </li>
                <li><a class="text-white hover:text-blue-500 block nav-link" href="#galeri">Galeri</a></li>
                <li><a class="text-white hover:text-blue-500 block nav-link" href="#">Tentang</a></li>
                <li><a class="text-white hover:text-blue-500 block nav-link" href="#hubungi_kami">Hubungi Kami</a></li>
                <li><a class="bg-blue-900 text-white py-2 px-4 rounded block text-center hover:bg-blue-800"
                        href="{{ route("login") }}">Login</a></li>
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
            <a href="#"
                class="inline-block bg-blue-900 hover:bg-blue-800 transition-colors duration-300 text-white text-lg font-medium py-3 px-6 rounded-xl shadow-lg">
                Reservasi Sekarang
            </a>
        </div>

        <!-- Image Section -->
        <div class="lg:w-1/2 flex justify-center">
            <img src="https://storage.googleapis.com/a1aa/image/xSzf_KTh4Is-efoDBD3lCtLO51IenIs65R9dHug5LgE.jpg"
                alt="Seseorang bermain billiard dengan fokus pada bola di meja"
                class="rounded-2xl shadow-2xl w-full max-w-md transition-transform duration-500 hover:scale-105" />
        </div>
    </div>
    
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>Zetro Gallery</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>
<main class="max-w-7xl mx-auto">

<!--Reservasi -->
<div id="Reservasi" class="container mx-auto mt-10 mb-10 px-4">
    <h1 class="text-2xl lg:text-3xl font-bold mb-8 text-white text-center">Reservasi</h1>

    <!-- Zetro Exclusive Section -->
    <section>
        <h2 class="text-white font-semibold text-base mb-4">Zetro Exclusive</h2>
        <div class="flex space-x-4 overflow-x-auto no-scrollbar pb-2">
            @for($i = 1; $i <= 4; $i++)
            <article class="min-w-[120px] flex-shrink-0">
                <img class="rounded-md w-full h-[400px] object-cover" src="https://storage.googleapis.com/a1aa/image/c629de3d-3a61-474c-dff1-ddeb7063e8e1.jpg" alt="Zetro Exclusive" />
                <h3 class="text-xs font-semibold mt-2">Zetro Exclusive</h3>
                <p class="text-[9px] text-gray-300">Lantai2 | Meja {{ $i }}</p>
                <a href="{{ route('booking', ['meja' => $i, 'tipe' => 'Exclusive', 'lantai' => 2]) }}" class="inline-block bg-blue-500 text-white text-xs px-4 py-2 rounded mt-2">Reservasi</a>
            </article>
            @endfor
        </div>
    </section>

    <!-- Zetro Classic Section -->
    <section class="mt-8">
        <h2 class="text-white font-semibold text-base mb-4">Zetro Classic</h2>
        <div class="grid grid-cols-4 gap-4">
            @for($i = 1; $i <= 16; $i++)
            <article>
                <img class="rounded-md w-full h-auto object-cover" src="https://storage.googleapis.com/a1aa/image/22b4dd80-6d42-4896-6852-5e5f212771a9.jpg" alt="Zetro Classic" />
                <h3 class="text-xs font-semibold mt-2">Zetro Classic</h3>
                <p class="text-[9px] text-gray-300">Lantai1 | Meja {{ $i }}</p>
                <a href="{{ route('booking', ['meja' => $i, 'tipe' => 'Classic', 'lantai' => 1]) }}" class="inline-block bg-blue-500 text-white text-xs px-4 py-2 rounded mt-2">Reservasi</a>
            </article>
            @endfor
        </div>
    </section>
</div>


    <!-- Red dot indicator -->
    <div aria-hidden="true" class="fixed top-1/2 right-6 -translate-y-1/2 w-2.5 h-2.5 rounded-full bg-[#d40000]"></div>

</main>


        <!-- Red dot indicator -->
        <div aria-hidden="true" class="fixed top-1/2 right-6 -translate-y-1/2 w-2.5 h-2.5 rounded-full bg-[#d40000]"></div>

    <div class="container mx-auto py-8 px-4 animate-fade-in">
        <h1 class="text-2xl lg:text-3xl font-bold mb-8 text-white text-center">Layanan Sering Dibooking</h1>

        <div class="max-w-5xl mx-auto space-y-6">
            <!-- Card Zetro Exclusive -->
            <div
                class="w-full h-80 relative hover:scale-[1.01] transition-transform duration-300 border border-gray-700 rounded-lg overflow-hidden">
                <img class="w-full h-full object-cover"
                    src="https://storage.googleapis.com/a1aa/image/2_gwMICPmhC1roJsjAzp4xc_s1pkeiqy9KjfNP22p0U.jpg"
                    alt="Zetro Exclusive">
                <div class="absolute top-2 left-2 bg-blue-900 text-white py-1 px-2 text-sm rounded">50.000 / jam</div>
                <div class="absolute bottom-0 left-0 w-full bg-blue-900 bg-opacity-90 p-3">
                    <h5 class="text-blue-400 font-semibold text-lg">Zetro Exclusive</h5>
                    <p class="text-gray-300 text-sm">Lantai 3</p>
                </div>
            </div>

            <!-- Card Zetro Classic - grid 2 kolom -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6">
                <!-- Classic Card -->
                <div
                    class="relative h-56 hover:scale-[1.01] transition-transform duration-300 border border-gray-700 rounded-lg overflow-hidden">
                    <img class="w-full h-full object-cover"
                        src="https://storage.googleapis.com/a1aa/image/jTCwR_cc4GItaSD_yNsKF2MLX-rwCoPdq9OMEfTltBA.jpg"
                        alt="Zetro Classic">
                    <div class="absolute top-2 left-2 bg-blue-900 text-white py-1 px-2 text-sm rounded">35.000 / jam
                    </div>
                    <div class="absolute bottom-0 left-0 w-full bg-blue-900 bg-opacity-90 p-2">
                        <h5 class="text-blue-400 font-semibold text-sm">Zetro Classic</h5>
                        <p class="text-gray-300 text-xs">Lantai 1 - Meja 1</p>
                    </div>
                </div>
                <div
                    class="relative h-56 hover:scale-[1.01] transition-transform duration-300 border border-gray-700 rounded-lg overflow-hidden">
                    <img class="w-full h-full object-cover"
                        src="https://storage.googleapis.com/a1aa/image/jTCwR_cc4GItaSD_yNsKF2MLX-rwCoPdq9OMEfTltBA.jpg"
                        alt="Zetro Classic">
                    <div class="absolute top-2 left-2 bg-blue-900 text-white py-1 px-2 text-sm rounded">35.000 / jam
                    </div>
                    <div class="absolute bottom-0 left-0 w-full bg-blue-900 bg-opacity-90 p-2">
                        <h5 class="text-blue-400 font-semibold text-sm">Zetro Classic</h5>
                        <p class="text-gray-300 text-xs">Lantai 1 - Meja 2</p>
                    </div>
                </div>
                <div
                    class="relative h-56 hover:scale-[1.01] transition-transform duration-300 border border-gray-700 rounded-lg overflow-hidden">
                    <img class="w-full h-full object-cover"
                        src="https://storage.googleapis.com/a1aa/image/jTCwR_cc4GItaSD_yNsKF2MLX-rwCoPdq9OMEfTltBA.jpg"
                        alt="Zetro Classic">
                    <div class="absolute top-2 left-2 bg-blue-900 text-white py-1 px-2 text-sm rounded">35.000 / jam
                    </div>
                    <div class="absolute bottom-0 left-0 w-full bg-blue-900 bg-opacity-90 p-2">
                        <h5 class="text-blue-400 font-semibold text-sm">Zetro Classic</h5>
                        <p class="text-gray-300 text-xs">Lantai 1 - Meja 3</p>
                    </div>
                </div>
                <div
                    class="relative h-56 hover:scale-[1.01] transition-transform duration-300 border border-gray-700 rounded-lg overflow-hidden">
                    <img class="w-full h-full object-cover"
                        src="https://storage.googleapis.com/a1aa/image/jTCwR_cc4GItaSD_yNsKF2MLX-rwCoPdq9OMEfTltBA.jpg"
                        alt="Zetro Classic">
                    <div class="absolute top-2 left-2 bg-blue-900 text-white py-1 px-2 text-sm rounded">35.000 / jam
                    </div>
                    <div class="absolute bottom-0 left-0 w-full bg-blue-900 bg-opacity-90 p-2">
                        <h5 class="text-blue-400 font-semibold text-sm">Zetro Classic</h5>
                        <p class="text-gray-300 text-xs">Lantai 1 - Meja 4</p>
                    </div>
                </div>
            </div>

            <!-- Tombol -->
            <a href="#"
                class="block bg-blue-900 text-white text-center py-3 rounded-lg hover:bg-blue-800 transition-colors duration-300 w-full">
                Lihat Selengkapnya
            </a>
        </div>
    </div>

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

   <!-- tentang -->

    <div id="tentang" class="container mx-auto mt-10 mb-10 px-4">
      <section class="mb-12">
        <h2 class="text-3xl font-bold mb-4">Tentang Zetro Billiard</h2>
        <p class="text-gray-300 text-lg leading-relaxed">
          Zetro Billiard adalah tempat terbaik untuk Anda yang ingin merasakan pengalaman bermain biliar dengan suasana eksklusif dan nyaman. Berdiri sejak 2024, kami berkomitmen untuk menyediakan fasilitas terbaik, mulai dari meja berkualitas, pencahayaan modern, hingga layanan pelanggan yang ramah dan profesional.
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
                <a href="">
                    <svg class="svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path
                            d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                        </path>
                    </svg>
                </a>
                <div class="texts">Twitter</div>
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
                <a href="https://wa.me/62895336892177" target="_blank">
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
    <div class="footer mt-5 bg-gray-900 p-10 text-center text-gray-400">
        <div class="footer-links mb-4">
            <a href="#" class="mx-2 hover:text-blue-500">Home</a>
            <a href="#" class="mx-2 hover:text-blue-500">About</a>
            <a href="#" class="mx-2 hover:text-blue-500">Services</a>
            <a href="#" class="mx-2 hover:text-blue-500">Contact</a>
        </div>
        <p class="mb-2"><a href="#" class="hover:text-blue-500">ZetroBilliard</a></p>
        <p class="mb-2">Biliar bukan hanya tentang keberuntungan tapi tentang fokus, strategi, dan ketenangan</p>
        <p class="mb-4">Copyright 2025 • KELOMPOK 3 • PBL</p>
        <a class="bg-gray-700 text-white py-2 px-4 rounded hover:bg-blue-800" href="{{ route("registration") }}">Register Now</a>
    </div>
    <script>
        document.getElementById('menu-button').addEventListener('click', function() {
            var menu = document.getElementById('mobile-menu');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
