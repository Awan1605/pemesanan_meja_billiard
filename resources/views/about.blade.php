<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>ZetroBilliard</title>
    <style>
        body {
            background-color: #1a1a1a;
            color: #ffffff;
            font-family: Arial, sans-serif;
        }

        .btn-primary {
            background-color: #001f3f;
            border: none;
        }

        .btn-primary:hover {
            background-color: #001a35;
        }

        .card {
            background-color: #333;
            border: none;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            width: 100%;
            height: auto;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 0.9rem;
            color: #ccc;
        }

        .price-tag {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #003366;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.9rem;
        }

        .view-more {
            background-color: #003366;
            color: white;
            text-align: center;
            padding: 10px;
            border-radius: 10px;
            margin-top: 20px;
            text-decoration: none;
            display: block;
        }

        .card-body {
            background-color: #003366;
            padding: 10px;
        }

        a {
            text-decoration: none;
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

        @media (max-width: 768px) {
            .container.mx-auto.py-16 {
                padding-top: 6rem;
            }
        }

        .nav-link {
            transition: color 0.3s ease-in-out;
        }

        .nav-link:hover {
            color: #568a9b !important;
        }

        .gallery img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
        }

        .gallery img:hover {
            transform: scale(1.1);
            opacity: 0.8;
        }

        .contact-info i {
            margin-right: 10px;
        }

        .footer {
            background-color: #0d0d0d;
            padding: 40px 20px;
            text-align: center;
            color: #b3b3b3;
        }

        .footer a {
            color: #007bff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .footer p {
            margin: 5px 0;
        }

        .footer .footer-links {
            margin-bottom: 20px;
        }

        .footer .footer-links a {
            margin: 0 15px;
            color: #b3b3b3;
        }

        .footer .footer-links a:hover {
            color: #007bff;
        }

        .register-btn {
            background-color: #56585a;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }

        .register-btn:hover {
            background-color: #0056b3;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <nav class="bg-gray-900 p-4 fixed top-0 left-0 w-full z-50 animate-fade-in">
        <div class="container mx-auto flex justify-between items-center">
            <a class="text-blue-500 font-bold text-xl" href="#">
                <span class="text-blue-500">Zetro</span><span class="text-white">Billiard</span>.
            </a>
            <button class="text-white block lg:hidden" id="menu-button">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="hidden lg:flex space-x-4" id="menu">
                <li>
                    <a class="text-white hover:text-blue-500 nav-link" href="#">
                        Home
                    </a>
                </li>
                <li>
                    <a class="text-white hover:text-blue-500 nav-link" href="#">
                        Reservasi
                    </a>
                </li>
                <li>
                    <a class="text-white hover:text-blue-500 nav-link" href="#">
                        Galeri
                    </a>
                </li>
                <li>
                    <a class="text-white hover:text-blue-500 nav-link" href="#">
                        Tentang
                    </a>
                </li>
                <li>
                    <a class="text-white hover:text-blue-500 nav-link" href="#">
                        Hubungi Kami
                    </a>
                </li>
                <li>
                    <a class="btn-primary text-white py-2 px-4 rounded" href="#">
                        Login
                    </a>
                </li>
            </ul>
        </div>
        <div class="lg:hidden">
            <ul class="hidden flex-col space-y-2 mt-4" id="mobile-menu">
                <li>
                    <a class="text-white hover:text-blue-500 block nav-link" href="#">
                        Beranda
                    </a>
                </li>
                <li>
                    <a class="text-white hover:text-blue-500 block nav-link" href="#">
                        Reservasi
                    </a>
                </li>
                <li>
                    <a class="text-white hover:text-blue-500 block nav-link" href="#">
                        Galeri
                    </a>
                </li>
                <li>
                    <a class="text-white hover:text-blue-500 block nav-link" href="#">
                        Tentang
                    </a>
                </li>
                <li>
                    <a class="text-white hover:text-blue-500 block nav-link" href="#">
                        Hubungi Kami
                    </a>
                </li>
                <li>
                    <a class="btn-primary text-white py-2 px-4 rounded block text-center" href="#">
                        Login
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mx-auto py-16 flex flex-col lg:flex-row items-center animate-slide-up">
        <div class="lg:w-1/2 text-center lg:text-left">
            <h1 class="text-4xl font-bold mb-4">
                Mainkan Gaya Kuasai Meja!
            </h1>
            <p class="text-gray-400 mb-8">
                Nikmati permainan tanpa antre! Pilih meja, tentukan waktu, dan reservasi dalam hitungan detik.
            </p>
            <a class="btn-primary text-white py-2 px-4 rounded" href="#">
                Reservasi Sekarang
            </a>
        </div>
        <div class="lg:w-1/2 mt-8 lg:mt-0 text-center">
            <img alt="A person playing billiards with a focus on the billiard balls on the table" class="rounded-lg"
                src="https://storage.googleapis.com/a1aa/image/xSzf_KTh4Is-efoDBD3lCtLO51IenIs65R9dHug5LgE.jpg" />
        </div>
    </div>
    <div class="container py-5 animate-fade-in">
        <h2 class="mb-4">Layanan Sering Dibooking</h2>
        <div class="row g-4">
            <div class="col-lg-6">
                <div
                    class="card position-relative animate-slide-up hover:shadow-lg hover:scale-105 transition-transform duration-300">
                    <img src="https://storage.googleapis.com/a1aa/image/2_gwMICPmhC1roJsjAzp4xc_s1pkeiqy9KjfNP22p0U.jpg"
                        alt="Zetro Exclusive pool table with blue lighting and people playing">
                    <div class="price-tag">50.000 / jam</div>
                    <div class="card-body">
                        <h5 class="card-title" style="color: #568a9b;">Zetro Exclusive</h5>
                        <p class="card-text">Lantai 3</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card position-relative animate-slide-up">
                            <img src="https://storage.googleapis.com/a1aa/image/jTCwR_cc4GItaSD_yNsKF2MLX-rwCoPdq9OMEfTltBA.jpg"
                                alt="Zetro Classic pool table with balls arranged">
                            <div class="price-tag">35.000 / jam</div>
                            <div class="card-body">
                                <h5 class="card-title" style="color: #568a9b;">Zetro Classic</h5>
                                <p class="card-text">Lantai 1 - Meja 1</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card position-relative animate-slide-up">
                            <img src="https://storage.googleapis.com/a1aa/image/jTCwR_cc4GItaSD_yNsKF2MLX-rwCoPdq9OMEfTltBA.jpg"
                                alt="Zetro Classic pool table with balls arranged">
                            <div class="price-tag">35.000 / jam</div>
                            <div class="card-body">
                                <h5 class="card-title" style="color: #568a9b;">Zetro Classic</h5>
                                <p class="card-text">Lantai 1 - Meja 2</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card position-relative animate-slide-up">
                            <img src="https://storage.googleapis.com/a1aa/image/jTCwR_cc4GItaSD_yNsKF2MLX-rwCoPdq9OMEfTltBA.jpg"
                                alt="Zetro Classic pool table with balls arranged">
                            <div class="price-tag">35.000 / jam</div>
                            <div class="card-body">
                                <h5 class="card-title" style="color: #568a9b;">Zetro Classic</h5>
                                <p class="card-text">Lantai 1 - Meja 3</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card position-relative animate-slide-up">
                            <img src="https://storage.googleapis.com/a1aa/image/jTCwR_cc4GItaSD_yNsKF2MLX-rwCoPdq9OMEfTltBA.jpg"
                                alt="Zetro Classic pool table with balls arranged">
                            <div class="price-tag">35.000 / jam</div>
                            <div class="card-body">
                                <h5 class="card-title" style="color: #568a9b;">Zetro Classic</h5>
                                <p class="card-text">Lantai 1 - Meja 4</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="#"
            class="view-more animate-slide-up hover:bg-blue-700 hover:text-gray-200 transition-colors duration-300">Lihat
            Selengkapnya</a>
    </div>
    <div class="container mt-5">
        <h2 class="mb-4">
            Galeri
        </h2>
        <div class="row gallery">
            <div class="col-md-3 col-6 mb-4">
                <img alt="Billiard table with balls arranged for a game" height="200"
                    src="https://storage.googleapis.com/a1aa/image/PVGPQGGOSv0wd-EiqYX8y_9iHCSgoQPv6CVCxJQ4CI0.jpg"
                    width="300" />
            </div>
            <div class="col-md-3 col-6 mb-4">
                <img alt="Interior of a billiard hall with multiple tables" height="200"
                    src="https://storage.googleapis.com/a1aa/image/XzahZEZq5BP6FqGbSVS265xknizHlV43F8Et-b23MIg.jpg"
                    width="300" />
            </div>
            <div class="col-md-3 col-6 mb-4">
                <img alt="Close-up of billiard balls in motion" height="200"
                    src="https://storage.googleapis.com/a1aa/image/BdM59a_ixLBfeOCEjJXBFhDJiIRx_iwRtPIZEFmcf5g.jpg"
                    width="300" />
            </div>
            <div class="col-md-3 col-6 mb-4">
                <img alt="Billiard table with neon lights and 'Pilihan terbaik' text" height="200"
                    src="https://storage.googleapis.com/a1aa/image/p3wYTFXYRei18-RaEwRAiS8lfWf696rnobIJ__iVb-A.jpg"
                    width="300" />
            </div>
            <div class="col-md-3 col-6 mb-4">
                <img alt="Billiard table with balls arranged for a game" height="200"
                    src="https://storage.googleapis.com/a1aa/image/PVGPQGGOSv0wd-EiqYX8y_9iHCSgoQPv6CVCxJQ4CI0.jpg"
                    width="300" />
            </div>
            <div class="col-md-3 col-6 mb-4">
                <img alt="Interior of a billiard hall with multiple tables" height="200"
                    src="https://storage.googleapis.com/a1aa/image/XzahZEZq5BP6FqGbSVS265xknizHlV43F8Et-b23MIg.jpg"
                    width="300" />
            </div>
            <div class="col-md-3 col-6 mb-4">
                <img alt="Close-up of billiard balls in motion" height="200"
                    src="https://storage.googleapis.com/a1aa/image/BdM59a_ixLBfeOCEjJXBFhDJiIRx_iwRtPIZEFmcf5g.jpg"
                    width="300" />
            </div>
            <div class="col-md-3 col-6 mb-4">
                <img alt="Billiard table with neon lights and 'Pilihan terbaik' text" height="200"
                    src="https://storage.googleapis.com/a1aa/image/p3wYTFXYRei18-RaEwRAiS8lfWf696rnobIJ__iVb-A.jpg"
                    width="300" />
            </div>
        </div>
        <h2 class="mb-4 text-center animate-fade-in">
            Hubungi Kami
        </h2>
        <div class="contact-info text-center bg-gray-800 p-5 rounded-lg shadow-lg animate-slide-up">
            <p class="mb-4">
                <i class="fas fa-info-circle text-blue-500 text-2xl"></i>
                <span class="block text-gray-300 mt-2">
                    Ingin bermain atau reservasi? Hubungi kami di bawah ini!
                </span>
            </p>
            <p class="mb-4">
                <i class="fas fa-map-marker-alt text-red-500 text-2xl"></i>
                <span class="block text-gray-300 mt-2">
                    Alamat: Jl. Mitra Raya 2, Batam Kota
                </span>
            </p>
            <p class="mb-4">
                <i class="fas fa-phone text-green-500 text-2xl"></i>
                <span class="block text-gray-300 mt-2">
                    Telepon / WhatsApp: +62 895-3368-92177
                </span>
            </p>
            <p class="mb-4">
                <i class="fas fa-envelope text-yellow-500 text-2xl"></i>
                <span class="block text-gray-300 mt-2">
                    Email: zetrobilliard@gmail.com
                </span>
            </p>
            <p>
                <i class="fas fa-clock text-purple-500 text-2xl"></i>
                <span class="block text-gray-300 mt-2">
                    Jam Operasional: 10:00 - 02:00
                </span>
            </p>
        </div>
    </div>
    <div class="footer mt-5">
        <div class="footer-links">
            <a href="#">
                Home
            </a>
            <a href="#">
                About
            </a>
            <a href="#">
                Services
            </a>
            <a href="#">
                Contact
            </a>
        </div>
        <p>
            <a href="#">
                ZetroBilliard
            </a>
        </p>
        <p>
            Biliar bukan hanya tentang keberuntungan tapi tentang fokus, strategi, dan ketenangan
        </p>
        <p>
            Copyright 2025 • KELOMPOK 3 • PBL
        </p>
        <a class="register-btn" href="#">
            Register Now
        </a>
    </div>
    <script>
        document.getElementById('menu-button').addEventListener('click', function () {
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