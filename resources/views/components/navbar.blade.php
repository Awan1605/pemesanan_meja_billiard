<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
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

    .animate-fade-in {
        animation: fadeIn 0.5s ease-out;
    }

    .cards {
        @apply max-w-fit rounded-xl flex flex-col items-center justify-center gap-4 backdrop-blur-md;
        box-shadow: inset 0 0 20px rgba(255, 255, 255, 0.192),
            inset 0 0 5px rgba(255, 255, 255, 0.274),
            0 5px 5px rgba(0, 0, 0, 0.164);
        transition: 0.5s;
    }

    .cards:hover {
        @apply bg-gray-500 bg-opacity-5;
    }

    .cards ul {
        @apply p-4 flex list-none gap-4 items-center justify-center flex-wrap flex-row;
    }

    .cards ul li {
        @apply cursor-pointer relative;
    }

    .svg {
        @apply transition-all duration-300 p-4 h-15 w-15 rounded-full text-yellow-400;
        fill: currentColor;
        box-shadow: inset 0 0 20px rgba(255, 255, 255, 0.3),
            inset 0 0 5px rgba(255, 255, 255, 0.5),
            0 5px 5px rgba(0, 0, 0, 0.164);
    }

    .texts {
        @apply opacity-0 rounded-sm p-1 transition-all duration-300 text-yellow-400 absolute -top-10 left-1/2 -translate-x-1/2 whitespace-nowrap z-50;
        background-color: rgba(255, 255, 255, 0.3);
        box-shadow: -5px 0 1px rgba(153, 153, 153, 0.2),
            -10px 0 1px rgba(153, 153, 153, 0.2),
            inset 0 0 20px rgba(255, 255, 255, 0.3),
            inset 0 0 5px rgba(255, 255, 255, 0.5),
            0 5px 5px rgba(0, 0, 0, 0.082);
    }

    .iso-pro {
        @apply transition-all duration-500 relative;
    }

    .iso-pro:hover a>.svg {
        @apply scale-110;
    }

    .iso-pro:hover .texts {
        @apply opacity-100;
        transform: translateX(-50%) translateY(-5px) skew(-3deg);
    }

    .iso-pro:hover .svg {
        @apply scale-105;
    }

    .iso-pro span {
        @apply opacity-0 absolute top-0 left-0 text-blue-600 border-blue-600 rounded-full transition-all duration-300 h-15 w-15;
        box-shadow: inset 0 0 20px rgba(255, 255, 255, 0.3),
            inset 0 0 5px rgba(255, 255, 255, 0.5),
            0 5px 5px rgba(0, 0, 0, 0.164);
    }

    .iso-pro:hover span {
        @apply opacity-100;
    }

    .iso-pro:hover span:nth-child(1) {
        @apply opacity-20;
    }

    .iso-pro:hover span:nth-child(2) {
        @apply opacity-40 scale-110;
    }

    .iso-pro:hover span:nth-child(3) {
        @apply opacity-60 scale-120;
    }

    .booking-history-modal {
        @apply max-w-4xl w-[90%];
    }

    modal-center {
        @apply flex items-center justify-center;
    }

    .modal-box {
        @apply max-h-[90vh] overflow-y-auto;
    }

    #mobile-menu {
        transition: all 0.3s ease;
        max-height: 0;
        overflow: hidden;
    }

    #mobile-menu.open {
        max-height: 1000px;
        /* Sesuaikan dengan kebutuhan */
    }
</style>
<nav class="bg-gray-900 p-4 fixed top-0 left-0 w-full z-50 animate-fade-in">
    <div class="container mx-auto flex justify-between items-center">
        <a class="text-blue-500 font-bold text-2xl" href="#">
            <span class="text-blue-500">Zetro</span><span class="text-white">Billiard</span>
        </a>

        <!-- Tombol Hamburger untuk Mobile -->
        <button class="text-white lg:hidden text-2xl focus:outline-none" id="hamburger-button">
            <i class="fas fa-bars" id="hamburger-icon"></i>
        </button>
        <div class="hidden lg:flex items-center space-x-6">
            <ul class="flex space-x-6 items-center">
                <li>
                    <a class="nav-link active text-white hover:text-blue-500 transition-colors duration-300 relative after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-blue-500 after:bottom-[-4px] after:left-0 hover:after:w-full after:transition-all after:duration-300"
                        href="{{ route('Public/lending_page') }}">
                        Beranda
                    </a>
                </li>
                <li>
                    <a class="nav-link text-white hover:text-blue-500 transition-colors duration-300 relative after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-blue-500 after:bottom-[-4px] after:left-0 hover:after:w-full after:transition-all after:duration-300"
                        href="#reservasi">
                        Reservasi
                    </a>
                </li>
                <li>
                    <a class="nav-link text-white hover:text-blue-500 transition-colors duration-300 relative after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-blue-500 after:bottom-[-4px] after:left-0 hover:after:w-full after:transition-all after:duration-300"
                        href="#galeri">
                        Galeri
                    </a>
                </li>
                <li>
                    <a class="nav-link text-white hover:text-blue-500 transition-colors duration-300 relative after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-blue-500 after:bottom-[-4px] after:left-0 hover:after:w-full after:transition-all after:duration-300"
                        href="#tentang">
                        Tentang
                    </a>
                </li>
                <li>
                    <a class="nav-link text-white hover:text-blue-500 transition-colors duration-300 relative after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-blue-500 after:bottom-[-4px] after:left-0 hover:after:w-full after:transition-all after:duration-300"
                        href="#hubungi_kami">
                        Hubungi Kami
                    </a>
                </li>
            </ul>

            @auth
                <div class="relative">
                    <button id="profile-button" type="button" class="flex items-center space-x-2 focus:outline-none"
                        aria-expanded="false" aria-haspopup="true">
                        <img class="w-8 h-8 rounded-full border-2 border-blue-500"
                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=2563eb&color=fff"
                            alt="Profile">
                        <span class="text-white">{{ Auth::user()->username }}</span>
                        <i class="fas fa-chevron-down text-sm text-gray-400 ml-1"></i>
                    </button>

                    <div id="profile-dropdown"
                        class="hidden absolute right-0 mt-2 w-48 bg-gray-800 rounded-md shadow-lg py-1 z-50">
                        <a href="#"
                            class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-blue-400 transition-colors duration-200">
                            <i class="fas fa-user-circle mr-2"></i> Profile
                        </a>
                        <a href="{{ route('Public/riwayat') }}"
                            class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-blue-400 transition-colors duration-200">
                            <i class="fas fa-history mr-2"></i> Riwayat Pemesanan
                        </a>
                        <a href="#"
                            class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-blue-400 transition-colors duration-200">
                            <i class="fas fa-cog mr-2"></i> Setting
                        </a>
                        <div class="border-t border-gray-700 my-1"></div>
                        <form method="POST" action="{{ route('logout') }}" id="logout-form">
                            @csrf
                            <button type="button" onclick="confirmLogout('logout-form')"
                                class="flex items-center px-4 py-2 text-red-400 hover:text-red-300 w-full transition-colors duration-200">
                                <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                            </button>
                        </form>

                    </div>
                </div>
            @else
                <a href="{{ route('login') }}"
                    class="ml-4 px-4 py-2 rounded-lg bg-blue-900 hover:bg-blue-800 text-white font-semibold transition-colors duration-300">Login</a>
            @endauth
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="lg:hidden bg-gray-800 mt-2 rounded-lg" id="mobile-menu">
        <ul class="flex flex-col space-y-2 p-4">
            <li><a class="text-white hover:text-blue-500 block py-2 transition-colors"
                    href="{{ route('Public/lending_page') }}">Beranda</a></li>
            <li><a class="text-white hover:text-blue-500 block py-2 transition-colors" href="#reservasi">Reservasi</a>
            </li>
            <li><a class="text-white hover:text-blue-500 block py-2 transition-colors" href="#galeri">Galeri</a></li>
            <li><a class="text-white hover:text-blue-500 block py-2 transition-colors" href="#tentang">Tentang</a></li>
            <li><a class="text-white hover:text-blue-500 block py-2 transition-colors" href="#hubungi_kami">Hubungi
                    Kami</a></li>

            @auth
                <li class="pt-2 border-t border-gray-700">
                    <div class="flex items-center space-x-3 py-2">
                        <img class="w-8 h-8 rounded-full"
                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=2563eb&color=fff"
                            alt="Profile">
                        <span class="text-white">{{ Auth::user()->username }}</span>
                    </div>
                    <ul class="mt-2 space-y-1">
                        <li><a href="#" class="block py-2 text-gray-300 hover:text-blue-500"><i
                                    class="fas fa-user-circle mr-2"></i>Profile</a></li>
                        <li><a href="Public/riwayat" class="block py-2 text-gray-300 hover:text-blue-500"><i
                                    class="fas fa-history mr-2"></i>Riwayat Pemesanan</a></li>
                        <li><a href="#" class="block py-2 text-gray-300 hover:text-blue-500"><i
                                    class="fas fa-cog mr-2"></i>Setting</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" id="logout-form-mobile">
                                @csrf
                                <button type="button" onclick="confirmLogout('logout-form-mobile')"
                                    class="block w-full text-left py-2 text-red-400 hover:text-red-300">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Keluar
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            @else
                <li class="pt-2 border-t border-gray-700">
                    <a href="{{ route('login') }}"
                        class="block w-full text-center py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors">Login</a>
                </li>
            @endauth
        </ul>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const hamburgerButton = document.getElementById('hamburger-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const hamburgerIcon = document.getElementById('hamburger-icon');
        const profileButton = document.getElementById('profile-button');
        const profileDropdown = document.getElementById('profile-dropdown');

        if (hamburgerButton && mobileMenu) {
            hamburgerButton.addEventListener('click', function(e) {
                e.stopPropagation();
                mobileMenu.classList.toggle('open');

                // Ganti ikon antara bars dan times
                if (mobileMenu.classList.contains('open')) {
                    hamburgerIcon.classList.remove('fa-bars');
                    hamburgerIcon.classList.add('fa-times');
                } else {
                    hamburgerIcon.classList.remove('fa-times');
                    hamburgerIcon.classList.add('fa-bars');
                }
            });

            // Tutup menu saat klik di luar
            document.addEventListener('click', function(e) {
                if (!mobileMenu.contains(e.target) && !hamburgerButton.contains(e.target)) {
                    mobileMenu.classList.remove('open');
                    hamburgerIcon.classList.remove('fa-times');
                    hamburgerIcon.classList.add('fa-bars');
                }
            });
        }

        // Desktop profile dropdown toggle
        if (profileButton && profileDropdown) {
            profileButton.addEventListener('click', function(e) {
                e.stopPropagation();
                profileDropdown.classList.toggle('hidden');
            });

            // Tutup dropdown saat klik di luar
            document.addEventListener('click', function(e) {
                if (!profileDropdown.contains(e.target) && !profileButton.contains(e.target)) {
                    profileDropdown.classList.add('hidden');
                }
            });
        }

        // Logout confirmation function
        window.confirmLogout = function(formId = 'logout-form') {
            Swal.fire({
                title: '<span style="color: #fff;">Keluar dari akun?</span>',
                text: "Anda yakin ingin logout dari akun ini?",
                icon: 'warning',
                background: '#1e293b',
                color: '#fff',
                showCancelButton: true,
                confirmButtonText: '<span style="color: #fff;">Ya, Logout</span>',
                cancelButtonText: '<span style="color: #fff;">Batal</span>',
                customClass: {
                    popup: 'swal2-dark',
                    title: 'text-white',
                    htmlContainer: 'text-white',
                    confirmButton: 'swal2-confirm bg-blue-600 text-white hover:bg-blue-700 border-0',
                    cancelButton: 'swal2-cancel bg-gray-600 text-white hover:bg-gray-700 border-0'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        };
    });
</script>
