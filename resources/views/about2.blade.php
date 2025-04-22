<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>ZetroBilliard</title>
    <style>
        /* [Previous CSS styles remain the same] */
        
        /* Add these new styles for dropdown */
        .profile-dropdown {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;  b
            background-color: #1a202c;
            min-width: 200px;
            border-radius: 0.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            z-index: 50;
        }
        
        .profile-dropdown a {
            display: block;
            padding: 0.75rem 1rem;
            color: #e2e8f0;
            text-decoration: none;
            transition: all 0.2s;
        }
        
        .profile-dropdown a:hover {
            background-color: #2d3748;
            color: #4299e1;
        }
        
        .profile-dropdown.show {
            display: block;
        }
        
        .profile-dropdown-divider {
            border-top: 1px solid #4a5568;
            margin: 0.25rem 0;
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
            <ul class="hidden lg:flex space-x-4 items-center" id="menu">
                <li>
                    <a class="text-white hover:text-blue-500 nav-link" href="#">
                        Beranda
                    </a>
                </li>
                <li>
                    <a class="text-white hover:text-blue-500 nav-link" href="{{ route("home") }}">
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
                <div class="dropdown dropdown-end">
      <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
        <div class="indicator">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /> </svg>
          <span class="badge badge-sm indicator-item">8</span>
        </div>
      </div>
      <div
        tabindex="0"
        class="card card-compact dropdown-content bg-base-100 z-1 mt-3 w-52 shadow">
        <div class="card-body">
          <span class="text-lg font-bold">8 Items</span>
          <span class="text-info">Subtotal: $999</span>
          <div class="card-actions">
            <button class="btn btn-primary btn-block">View cart</button>
          </div>
        </div>
      </div>
    </div>
        <!-- Profile Dropdown Trigger -->
        <li class="relative">
            <button id="profile-menu-button" type="button" class="flex items-center space-x-2 focus:outline-none">
                <img class="w-8 h-8 rounded-full border-2 border-blue-500"
                    src="https://ui-avatars.com/api/?name=John+Doe&background=2563eb&color=fff"
                    alt="Profile">
                <span class="text-white">John Doe</span>
                <i class="fas fa-chevron-down text-sm text-gray-400 ml-1"></i>
            </button>

            <!-- This is the dropdown -->
            <div id="profile-dropdown" class="absolute right-0 mt-2 hidden bg-gray-800 rounded-md shadow-lg z-50">
                <a href="#" class="flex items-center px-4 py-2 text-sm hover:bg-gray-700">
                    <i class="fas fa-user-circle mr-2"></i> Profile
                </a>
                <a href="#" class="flex items-center px-4 py-2 text-sm hover:bg-gray-700">
                    <i class="fas fa-history mr-2"></i> Riwayat Pemesanan
                </a>
                <a href="#" class="flex items-center px-4 py-2 text-sm hover:bg-gray-700">
                    <i class="fas fa-cog mr-2"></i> Setting
                </a>
                <div class="border-t border-gray-600 my-1"></div>
                <a href="#" class="flex items-center px-4 py-2 text-sm text-red-400 hover:text-red-300">
                    <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                </a>
            </div>
        </li>

        <div class="lg:hidden">
            <ul class="hidden flex-col space-y-2 mt-4 text-lg" id="mobile-menu">
                <li><a class="text-white text-xl hover:text-blue-500 block nav-link" href="#">Beranda</a></li>
                <li><a class="text-white hover:text-blue-500 block nav-link" href="{{ route('home') }}">Reservasi</a></li>
                <li><a class="text-white hover:text-blue-500 block nav-link" href="#">Galeri</a></li>
                <li><a class="text-white hover:text-blue-500 block nav-link" href="#">Tentang</a></li>
                <li><a class="text-white hover:text-blue-500 block nav-link" href="#">Hubungi Kami</a></li>
                <!-- Mobile Profile Menu -->
                <li class="pt-2 border-t border-gray-700">
                    <div class="flex items-center space-x-3">
                        <img class="w-8 h-8 rounded-full" 
                             src="https://ui-avatars.com/api/?name=John+Doe&background=2563eb&color=fff" 
                             alt="Profile">
                        <span class="text-white">John Doe</span>
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
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const profileButton = document.getElementById('profile-menu-button');
        const profileDropdown = document.getElementById('profile-dropdown');

        // Toggle dropdown saat klik tombol
        profileButton.addEventListener('click', function (e) {
            e.stopPropagation(); // Jangan trigger event click global
            profileDropdown.classList.toggle('hidden');
        });

        // Tutup dropdown saat klik di luar area
        document.addEventListener('click', function (e) {
            if (!profileDropdown.classList.contains('hidden') &&
                !profileDropdown.contains(e.target) &&
                !profileButton.contains(e.target)) {
                profileDropdown.classList.add('hidden');
            }
        });
    });
    </script>
</body>
</html>