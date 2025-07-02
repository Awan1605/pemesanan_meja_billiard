@props(['exclusiveTables', 'classicTables'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zetro Exclusive</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #111827;
            color: white;
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
</head>

<body class="p-6">
    <x-navbar2 />
    <main class="max-w-7xl mx-auto px-4">
        <!-- Reservasi Section -->
        @props(['exclusiveTables', 'classicTables'])
        <section id="reservasi" class="my-16">
            <!-- Zetro Exclusive Section -->
            <div class="mb-20">
                <h2 class="text-3xl lg:text-4xl font-extrabold text-white mb-8 text-center animate-fade-in">
                    <span class="text-yellow-400"><i class="fas fa-crown mr-2"></i></span>
                    Zetro Exclusive
                </h2>
                <div class="relative group">
                    <!-- Left Arrow -->
                    <button onclick="scrollHorizontal('exclusive-container', -300)"
                        class="absolute left-0 top-1/2 -translate-y-1/2 z-10 h-12 w-12 bg-black/60 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 hover:bg-black/80 shadow-lg">
                        <i class="fas fa-chevron-left text-xl"></i>
                    </button>
                    <!-- Card Reservasi -->

                    <div class="grid grid-flow-col auto-cols-[minmax(300px,1fr)] gap-7 overflow-x-auto pb-8 scroll-smooth hide-scrollbar"
                        id="exclusive-container">
                        @forelse ($exclusiveTables as $table)
                            <div
                                class="bg-gray-800 rounded-2xl overflow-hidden shadow-xl border border-gray-700 hover:border-blue-500 transition-all duration-300 flex-shrink-0 flex flex-col">
                                <!-- Table Image -->
                                <div class="relative h-48 overflow-hidden">
                                    <img class="w-full h-full object-cover transition-transform duration-500 hover:scale-110"
                                        src="{{ $table->foto ? (str_starts_with($table->foto, 'http') ? $table->foto : asset('storage/' . $table->foto)) : 'https://i.pinimg.com/736x/cb/78/a9/cb78a951f1600248602610489aa2465c.jpg' }}"
                                        alt="{{ $table->nama }}" loading="lazy">
                                    <div
                                        class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4">
                                        <span
                                            class="text-xs font-bold px-2 py-1 rounded-full {{ $table->status === 'tersedia'
                                                ? 'bg-green-500/20 text-green-400'
                                                : ($table->status === 'terpesan'
                                                    ? 'bg-blue-500/20 text-blue-400'
                                                    : ($table->status === 'sedang digunakan'
                                                        ? 'bg-amber-500/20 text-amber-400'
                                                        : 'bg-gray-500/20 text-gray-400')) }}">
                                            {{ App\Http\Controllers\MejaController::$statusOptions[$table->status] ?? $table->status }}
                                        </span>
                                    </div>
                                </div>
                                <!-- Table Details -->
                                <div class="p-5 flex-1 flex flex-col">
                                    <div class="flex justify-between items-start mb-2">
                                        <h3 class="text-xl font-bold text-white">{{ $table->nama }}</h3>

                                    </div>
                                    <div class="space-y-2 text-gray-300 mb-3">
                                        <div class="flex items-center gap-2">
                                            <i class="fas fa-map-marker-alt text-blue-400"></i>
                                            <span>{{ $table->lokasi }}</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <i class="fas fa-users text-purple-400"></i>
                                            <span>Maks. {{ $table->kapasitas }} orang</span>
                                        </div>
                                        @if ($table->deskripsi)
                                            <div class="flex items-start gap-2 pt-1">
                                                <i class="fas fa-info-circle text-amber-400 mt-1"></i>
                                                <p class="text-sm">{{ $table->deskripsi }}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <!-- Reservation Button -->
                                    <div class="mt-auto">
                                        @auth
                                            <a href="{{ url('/booking') }}"
                                                class="w-full flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white px-4 py-3 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg font-semibold">
                                                <i class="fas fa-calendar-plus"></i>
                                                <span>Reservasi Sekarang</span>
                                            </a>
                                        @else
                                            <button onclick="showLoginAlert()"
                                                class="w-full flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white px-4 py-3 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg font-semibold">
                                                <i class="fas fa-calendar-plus"></i>
                                                <span>Reservasi Sekarang</span>
                                            </button>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-12">
                                <div class="text-gray-400 mb-4">
                                    <i class="fas fa-table text-4xl"></i>
                                </div>
                                <h3 class="text-xl font-semibold text-white mb-2">Tidak ada meja exclusive tersedia</h3>
                                <p class="text-gray-400">Silakan cek kembali nanti</p>
                            </div>
                        @endforelse
                    </div>
                    <!-- Right Arrow -->
                    <button onclick="scrollHorizontal('exclusive-container', 300)"
                        class="absolute right-0 top-1/2 -translate-y-1/2 z-10 h-12 w-12 bg-black/60 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 hover:bg-black/80 shadow-lg">
                        <i class="fas fa-chevron-right text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Zetro Classic Section -->
            <div>
                <div class="flex flex-col md:flex-row justify-between items-center mb-8 animate-fade-in gap-4">
                    <h2 class="text-3xl font-extrabold text-white flex items-center gap-3">
                        <span class="inline-block animate-bounce text-yellow-400">
                            <i class="fas fa-star"></i>
                        </span>
                        Zetro Classic
                        <span class="inline-block animate-pulse text-blue-400">
                            <i class="fas fa-bolt"></i>
                        </span>
                    </h2>
                    <span
                        class="px-4 py-1 rounded-full bg-gradient-to-r from-blue-700 via-blue-500 to-yellow-400 text-white text-sm font-semibold shadow-lg animate-slide-up">
                        Favorit Pengunjung!
                    </span>
                </div>
                <div class="relative group">
                    <!-- Left Arrow -->
                    <button onclick="scrollHorizontal('classic-container', -300)"
                        class="absolute left-0 top-1/2 -translate-y-1/2 z-10 h-12 w-12 bg-black/60 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 hover:bg-black/80 shadow-lg">
                        <i class="fas fa-chevron-left text-xl"></i>
                    </button>
                    <!-- Card Container -->
                    <div class="grid grid-flow-col auto-cols-[minmax(260px,1fr)] gap-6 overflow-x-auto pb-4 scroll-smooth hide-scrollbar"
                        id="classic-container">
                        @forelse ($classicTables as $table)
                            <div
                                class="bg-gray-800 rounded-xl overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105 flex-shrink-0 flex flex-col">
                                <!-- Table Image -->
                                <div class="relative h-44 overflow-hidden">
                                    <img class="w-full h-full object-cover"
                                        src="{{ $table->foto ? (str_starts_with($table->foto, 'http') ? $table->foto : asset('storage/' . $table->foto)) : 'https://i.pinimg.com/736x/51/ad/20/51ad208bf51a7cdd41cee58c80ca7aa4.jpg' }}"
                                        alt="{{ $table->nama }}" loading="lazy">
                                    <div
                                        class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-2">
                                        <span
                                            class="text-xs font-bold px-2 py-1 rounded-full {{ $table->status === 'tersedia'
                                                ? 'bg-green-500/20 text-green-400'
                                                : ($table->status === 'terpesan'
                                                    ? 'bg-blue-500/20 text-blue-400'
                                                    : ($table->status === 'sedang digunakan'
                                                        ? 'bg-amber-500/20 text-amber-400'
                                                        : 'bg-gray-500/20 text-gray-400')) }}">
                                            {{ $table->status }}
                                        </span>
                                    </div>
                                </div>
                                <!-- Table Details -->
                                <div class="p-5 flex-1 flex flex-col">
                                    <div class="flex justify-between items-start mb-2">
                                        <h3 class="text-xl font-bold text-white">{{ $table->nama }}</h3>

                                    </div>

                                    <div class="space-y-2 text-gray-300 mb-3">
                                        <div class="flex items-center gap-2">
                                            <i class="fas fa-map-marker-alt text-blue-400"></i>
                                            <span>{{ $table->lokasi }}</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <i class="fas fa-users text-purple-400"></i>
                                            <span>Maks. {{ $table->kapasitas }} orang</span>
                                        </div>
                                        @if ($table->deskripsi)
                                            <div class="flex items-start gap-2 pt-1">
                                                <i class="fas fa-info-circle text-amber-400 mt-1"></i>
                                                <p class="text-sm">{{ $table->deskripsi }}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <!-- Reservation Button -->
                                    <div class="mt-auto">
                                        @auth
                                            <a href="{{ url('/booking') }}"
                                                class="w-full flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white px-4 py-3 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg font-semibold">
                                                <i class="fas fa-calendar-plus"></i>
                                                <span>Reservasi Sekarang</span>
                                            </a>
                                        @else
                                            <button onclick="showLoginAlert()"
                                                class="w-full flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white px-4 py-3 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg font-semibold">
                                                <i class="fas fa-calendar-plus"></i>
                                                <span>Reservasi Sekarang</span>
                                            </button>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-12">
                                <p class="text-gray-400">Tidak ada meja classic tersedia</p>
                            </div>
                        @endforelse
                    </div>
                    <!-- Right Arrow -->
                    <button onclick="scrollHorizontal('classic-container', 300)"
                        class="absolute right-0 top-1/2 -translate-y-1/2 z-10 h-12 w-12 bg-black/60 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 hover:bg-black/80 shadow-lg">
                        <i class="fas fa-chevron-right text-xl"></i>
                    </button>
                </div>
                <div class="mt-8 flex justify-center">
                    <a href="{{ route('Public/reservasi') }}"
                        class="inline-flex items-center gap-2 px-7 py-3 bg-gradient-to-r from-blue-700 to-blue-500 hover:from-blue-800 hover:to-blue-600 text-white text-lg font-semibold rounded-xl shadow-lg transition-all duration-300">
                        Lihat Semua Meja Tersedia
                        <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </section>
    </main>
    <script>
        // Smooth Scroll
        function scrollHorizontal(containerId, distance) {
            const container = document.getElementById(containerId);
            container.scrollBy({
                left: distance,
                behavior: 'smooth'
            });
        }

        //secroll
        document.addEventListener('DOMContentLoaded', function() {
            const containers = ['exclusive-container', 'classic-container'];

            containers.forEach(containerId => {
                const container = document.getElementById(containerId);

                container.addEventListener('focus', function() {
                    const arrows = container.parentElement.querySelectorAll('button');
                    arrows.forEach(arrow => arrow.classList.add('opacity-100'));
                });

                container.setAttribute('tabindex', '0');

                container.addEventListener('keydown', function(e) {
                    if (e.key === 'ArrowLeft') {
                        scrollHorizontal(containerId, -300);
                        e.preventDefault();
                    } else if (e.key === 'ArrowRight') {
                        scrollHorizontal(containerId, 300);
                        e.preventDefault();
                    }
                });
            });
        });
    </script>
</body>

</html>
