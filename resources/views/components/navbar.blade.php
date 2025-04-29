<script>
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
</script>
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
                    <a class="nav-link active text-white hover:text-blue-500" href="{{ route('about') }}">
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
                <li><a class="bg-blue-900 text-white py-2 px-4 rounded hover:bg-blue-800"
                        href="{{ route('login') }}">Login</a></li>
            </ul>
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
                <li><a class="bg-blue-900 text-white py-2 px-4 rounded block text-center hover:bg-blue-800"
                        href="{{ route("login") }}">Login</a></li>
            </ul>
        </div>
</nav>