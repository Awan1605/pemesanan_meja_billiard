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