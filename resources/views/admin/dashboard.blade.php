<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans min-h-screen overflow-hidden">
    <div class="flex min-h-screen overflow-hidden">
        <!-- Sidebar -->
        @include('partials.sidebar')
            <main class="p-6">
                @yield('content')
            </main>
        <!-- Main Content -->
        <div class="p-5 flex-1 overflow-y-auto overflow-x-hidden">
        <!-- Profile -->
        @include('partials.profile')
            <main class="p-1">
                @yield('content')
            </main>

            <!-- Content -->
            <main class="p-6 flex-1 overflow-y-auto">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                    <!-- Kartu 1 - Total Pengguna -->
                    <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500 text-sm font-semibold">Total Pengguna</p>
                                <h3 class="text-xl font-bold text-gray-800 mt-1" id="total-users">0</h3>
                                <div class="flex items-center mt-2">
                                    <span class="text-green-500 text-sm font-semibold" id="user-growth">0%</span>
                                    <span class="text-gray-500 text-sm ml-1">Up from past week</span>
                                </div>
                            </div>
                            <div class="bg-purple-100 rounded-xl p-4">
                                <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Kartu 2 - Total Reservasi -->
                    <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500 text-sm font-semibold">Total Reservasi</p>
                                <h3 class="text-xl font-bold text-gray-800 mt-1" id="total-reservations">0</h3>
                                <div class="flex items-center mt-2">
                                    <span class="text-green-500 text-sm font-semibold" id="reservation-growth">0%</span>
                                    <span class="text-gray-500 text-sm ml-1">Up from past week</span>
                                </div>
                            </div>
                            <div class="bg-yellow-100 rounded-xl p-4">
                                <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Kartu 3 - Total Terjual -->
                    <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500 text-sm font-semibold">Total Terjual</p>
                                <h3 class="text-xl font-bold text-gray-800 mt-1" id="total-sales">0</h3>
                                <div class="flex items-center mt-2">
                                    <span class="text-green-500 text-sm font-semibold" id="sales-growth">0%</span>
                                    <span class="text-gray-500 text-sm ml-1">Up from past week</span>
                                </div>
                            </div>
                            <div class="bg-green-100 rounded-xl p-4">
                                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                // Fungsi animasi penghitungan
                function animateValue(id, start, end, duration) {
                    const obj = document.getElementById(id);
                    let startTimestamp = null;
                    const step = (timestamp) => {
                        if (!startTimestamp) startTimestamp = timestamp;
                        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                        const value = Math.floor(progress * (end - start) + start);
                        obj.innerHTML = formatNumber(value);
                        if (progress < 1) {
                            window.requestAnimationFrame(step);
                        }
                    };
                    window.requestAnimationFrame(step);
                }

                // Fungsi animasi untuk persentase
                function animatePercentage(id, end, duration) {
                    const obj = document.getElementById(id);
                    let start = 0;
                    let startTimestamp = null;
                    const step = (timestamp) => {
                        if (!startTimestamp) startTimestamp = timestamp;
                        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                        const value = (progress * (end - start) + start).toFixed(1);
                        obj.innerHTML = value + '%';
                        
                        // Ubah warna jika negatif
                        if (end < 0) {
                            obj.classList.remove('text-green-500');
                            obj.classList.add('text-red-500');
                        }
                        
                        if (progress < 1) {
                            window.requestAnimationFrame(step);
                        }
                    };
                    window.requestAnimationFrame(step);
                }

                // Fungsi untuk memformat angka dengan separator ribuan
                function formatNumber(num) {
                    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }

                // Fungsi untuk mengambil data
                function fetchDashboardData() {
                    // Data contoh (bisa diganti dengan API nyata)
                    const data = {
                        totalUsers: 5923,
                        userGrowth: 28.0,
                        totalReservations: 10293,
                        reservationGrowth: 1.3,
                        totalSales: 8500000,
                        salesGrowth: 1.3
                    };
                    
                    // Animasi angka
                    animateValue('total-users', 0, data.totalUsers, 2000);
                    animatePercentage('user-growth', data.userGrowth, 1500);
                    
                    animateValue('total-reservations', 0, data.totalReservations, 2000);
                    animatePercentage('reservation-growth', data.reservationGrowth, 1500);
                    
                    animateValue('total-sales', 0, data.totalSales, 2000);
                    animatePercentage('sales-growth', data.salesGrowth, 1500);
                }

                // Jalankan saat halaman dimuat
                document.addEventListener('DOMContentLoaded', function() {
                    // Tambahkan delay kecil untuk efek lebih smooth
                    setTimeout(fetchDashboardData, 500);
                    
                    // Tambahkan efek hover pada kartu
                    const cards = document.querySelectorAll('.bg-white');
                    cards.forEach(card => {
                        card.addEventListener('mouseenter', function() {
                            this.style.transform = 'translateY(-5px)';
                            this.style.transition = 'transform 0.3s ease';
                        });
                        card.addEventListener('mouseleave', function() {
                            this.style.transform = 'translateY(0)';
                        });
                    });
                });
                </script>

                <style>
                /* Tambahkan sedikit animasi untuk transisi */
                .bg-white {
                    transition: all 0.3s ease;
                }
                </style>

                <!-- Chart -->
                <div class="bg-white rounded-xl shadow-sm p-4">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-bold text-gray-800">Total Reservasi</h2>
                        <div class="relative w-36">
                            <select class="w-full px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 appearance-none">
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10" selected>Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="w-full h-[600px]">
                        <canvas id="reservasiChart" class="w-full h-full"></canvas>
                    </div>
                </div>
            </main>
        </div>
    </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                const ctx = document.getElementById('reservasiChart').getContext('2d');
                const reservasiChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['1', '5', '10', '15', '20', '25', '30', '35', '40', '45', '50'], // Tanggal
                        datasets: [{
                            label: 'Jumlah Reservasi',
                            data: [5, 25, 43, 10, 59, 33, 18, 50, 5 , 15, 75], // Data dummy
                            fill: true,
                            borderColor: '#3b82f6',
                            backgroundColor: 'rgba(59, 130, 246, 0.1)',
                            tension: 0.4,
                            pointRadius: 3,
                            pointHoverRadius: 6
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        layout: {
                            padding: 0
                        },
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        elements: {
                            line: {
                                borderCapStyle: 'round'
                            },
                            point: {
                                hitRadius: 10
                            }
                        },
                        clip: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 10
                                }
                            }
                        }
                    }
                });
            </script>
        </body>
</html>