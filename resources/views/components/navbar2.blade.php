<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!-- Add SweetAlert2 for better alerts -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
                    <a class="nav-link active text-white hover:text-blue-500" href="{{ route('Public/lending_page') }}">
                        <i class="fas fa-home"></i> Beranda
                    </a>
                </li>

                @auth
                    <div class="relative dropdown">
                        <button id="profile-button" type="button" class="flex items-center space-x-2 focus:outline-none"
                            data-dropdown-toggle="profile-dropdown" aria-expanded="false" aria-haspopup="true">
                            <img class="w-8 h-8 rounded-full border-2 border-blue-500"
                                src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=2563eb&color=fff"
                                alt="Profile">
                            <span class="text-white">{{ Auth::user()->username }}</span>
                            <i class="fas fa-chevron-down text-sm text-gray-400 ml-1"></i>
                        </button>

                        <div id="profile-dropdown" class="dropdown-menu">
                            <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-700">
                                <i class="fas fa-user-circle mr-2"></i> Profile
                            </a>
                            <a href="{{ route('Public/riwayat') }}" class="flex items-center px-4 py-2 hover:bg-gray-700">
                                <i class="fas fa-history mr-2"></i> Riwayat Pemesanan
                            </a>

                            <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-700">
                                <i class="fas fa-cog mr-2"></i> Setting
                            </a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                @csrf
                                <button type="button"
                                    class="flex items-center px-4 py-2 text-red-400 hover:text-red-300 w-full"
                                    onclick="confirmLogout()">
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
    <div class="lg:hidden">
        <ul class="hidden flex-col space-y-2 mt-4 text-lg" id="mobile-menu">
            <li><a class="text-white text-xl hover:text-blue-500 block nav-link"
                    href="{{ route('Public/lending_page') }}">Beranda</a></li>

            <!-- Mobile Cart -->
            <li class="pt-2 border-t border-gray-700">
                <a href="#" class="flex items-center py-2 text-gray-300 hover:text-blue-500">
                    <i class="fas fa-shopping-cart mr-2"></i> Keranjang
                    <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full">3</span>
                </a>
            </li>

            <!-- Mobile Profile Menu -->
            @auth
                <li class="pt-2 border-t border-gray-700">
                    <div class="flex items-center space-x-3">
                        <img class="w-8 h-8 rounded-full"
                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=2563eb&color=fff"
                            alt="Profile">
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
                        <li></li>
                        <form method="POST" action="{{ route('logout') }}" id="logout-form-mobile">
                            @csrf
                            <button type="submit" onclick="event.preventDefault(); confirmLogout();"
                                class="block py-1 text-red-400 hover:text-red-300 w-full text-left">
                                <i class="fas fa-sign-out-alt mr-2"></i>Keluar
                            </button>
                        </form>
                    </ul>
                </li>
            @else
                <li class="pt-2 border-t border-gray-700">
                    <a href="{{ route('login') }}" class="btn btn-primary w-full text-center">Login</a>
                </li>
            @endauth
        </ul>
    </div>
</nav>
<script>
    // Dropdown desktop fix
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle dropdown on profile button click
        const profileBtn = document.getElementById('profile-button');
        const profileDropdown = document.getElementById('profile-dropdown');
        if (profileBtn && profileDropdown) {
            profileBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                profileDropdown.classList.toggle('show');
            });
            // Close dropdown if click outside
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.dropdown')) {
                    profileDropdown.classList.remove('show');
                }
            });
        }

        // toggle menu mobile
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.getElementById('menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            if (menuButton && mobileMenu) {
                menuButton.addEventListener('click', function(e) {
                    e.stopPropagation();
                    mobileMenu.classList.toggle('hidden');
                    mobileMenu.classList.toggle('block');

                    // Animasi fade in
                    if (!mobileMenu.classList.contains('hidden')) {
                        mobileMenu.style.opacity = '0';
                        mobileMenu.style.transform = 'translateY(-10px)';
                        setTimeout(() => {
                            mobileMenu.style.opacity = '1';
                            mobileMenu.style.transform = 'translateY(0)';
                            mobileMenu.style.transition = 'all 0.3s ease';
                        }, 50);
                    }
                });

                // Tutup saat klik di luar
                document.addEventListener('click', function(e) {
                    if (!e.target.closest('#menu-button') && !e.target.closest(
                            '#mobile-menu')) {
                        mobileMenu.classList.add('hidden');
                        mobileMenu.classList.remove('block');
                    }
                });
            }
        });

        // Booking history data
        let bookings = JSON.parse(localStorage.getItem('bookings')) || [{
                id: 1,
                meja: "Zetro Exclusive - Meja 3",
                tanggal: "15 Juni 2025",
                waktu: "19:00 - 21:00",
                status: "Confirmed",
                total: "Rp 100.000",
                details: {
                    roomType: "exclusive",
                    duration: 2,
                    foods: {
                        nasi_goreng: 0
                    },
                    drinks: {
                        root_calm: 1,
                        es_dagen: 0,
                        ice_tea: 0
                    }
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
                    foods: {
                        nasi_goreng: 1
                    },
                    drinks: {
                        root_calm: 0,
                        es_dagen: 1,
                        ice_tea: 0
                    }
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

        // Perbaikan fungsi renderBookingHistory
        function renderBookingHistory() {
            const bookingHistoryBody = document.getElementById('booking-history-body');
            if (bookingHistoryBody) {
                bookingHistoryBody.innerHTML = bookings.map((booking, index) => `
            <div class="border-b border-gray-700 py-4">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="font-bold text-blue-400">${booking.meja}</h3>
                        <p class="text-sm text-gray-300">${booking.tanggal} • ${booking.waktu}</p>
                    </div>
                    <span class="px-2 py-1 text-xs rounded-full ${
                        booking.status === 'Confirmed' ? 'bg-green-500' : 
                        booking.status === 'Completed' ? 'bg-blue-500' : 'bg-yellow-500'
                    }">${booking.status}</span>
                </div>
                
                <div class="mt-2 flex justify-between items-center">
                    <p class="text-white">${booking.total}</p>
                    <button onclick="viewBookingDetail(${booking.id})" 
                            class="text-blue-400 hover:text-blue-300 text-sm">
                        <i class="fas fa-info-circle mr-1"></i> Detail
                    </button>
                </div>
            </div>
        `).join('');
            }
        }

        // Perbaikan modal detail
        window.viewBookingDetail = function(id) {
            const booking = bookings.find(b => b.id === id);

            if (booking) {
                Swal.fire({
                    title: 'Detail Pemesanan',
                    html: `
                <div class="text-left space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-gray-400">Meja</p>
                            <p class="text-white">${booking.meja}</p>
                        </div>
                        <div>
                            <p class="text-gray-400">Tanggal</p>
                            <p class="text-white">${booking.tanggal}</p>
                        </div>
                        <div>
                            <p class="text-gray-400">Waktu</p>
                            <p class="text-white">${booking.waktu}</p>
                        </div>
                        <div>
                            <p class="text-gray-400">Status</p>
                            <p class="${
                                booking.status === 'Confirmed' ? 'text-green-400' : 
                                booking.status === 'Completed' ? 'text-blue-400' : 'text-yellow-400'
                            }">${booking.status}</p>
                        </div>
                    </div>
                    
                    <div class="pt-4 border-t border-gray-700">
                        <h4 class="font-bold text-blue-400 mb-2">Detail Pesanan</h4>
                        <div class="space-y-2">
                            ${Object.entries(booking.details.foods).map(([item, qty]) => 
                                qty > 0 ? `<p class="flex justify-between">
                                    <span>${item.replace('_', ' ')}</span>
                                    <span>${qty}x</span>
                                </p>` : ''
                            ).join('')}
                            ${Object.entries(booking.details.drinks).map(([item, qty]) => 
                                qty > 0 ? `<p class="flex justify-between">
                                    <span>${item.replace('_', ' ')}</span>
                                    <span>${qty}x</span>
                                </p>` : ''
                            ).join('')}
                        </div>
                    </div>
                    
                    <div class="pt-4 border-t border-gray-700 text-right">
                        <p class="text-xl font-bold text-white">Total: ${booking.total}</p>
                    </div>
                </div>
            `,
                    width: '90%',
                    background: '#1F2937',
                    customClass: {
                        title: 'text-white text-left',
                        htmlContainer: 'text-left',
                        confirmButton: 'bg-blue-600 hover:bg-blue-700'
                    },
                    showConfirmButton: true,
                    confirmButtonText: 'Tutup'
                });
            }
        };

        // Panggil fungsi render saat modal dibuka
        document.getElementById('booking-history-modal').addEventListener('show', renderBookingHistory);

        // Initial render
        renderBookingHistory();
    });


    //Alert Untuk logout
    function confirmLogout() {
        Swal.fire({
            title: 'Konfirmasi Logout',
            text: "Anda yakin ingin keluar dari sistem?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, Logout',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }
</script>
