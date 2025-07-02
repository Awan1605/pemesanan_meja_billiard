<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZetroBilliard - Meja Exclusive</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .table-card {
            transition: all 0.3s ease;
        }

        .table-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body class="bg-gray-900 text-white font-sans min-h-screen">
    <x-navbar />

    <main class="py-12 px-4 sm:px-6 lg:px-8">
        <x-lending_page3 :exclusiveTables="$exclusiveTables ?? collect()" :classicTables="$classicTables ?? collect()" />

        {{-- <div class="text-center py-12">
            <div
                class="inline-block bg-gray-800 rounded-xl p-8 max-w-md border border-gray-700 transform transition-all hover:scale-105">
                <div class="text-yellow-400 mb-4">
                    <i class="fas fa-exclamation-circle text-5xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Maaf, meja sedang penuh</h3>
                <p class="text-gray-300 mb-4">Silakan coba lagi nanti atau hubungi kami untuk reservasi</p>
                <a href="tel:+6281234567890"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded-lg text-white transition-colors">
                    <i class="fas fa-phone-alt mr-2"></i> Hubungi Admin
                </a>
            </div>
        </div>
        </div> --}}
    </main>
    <script>
        // Horizontal scroll function
        function scrollHorizontal(containerId, scrollAmount) {
            const container = document.getElementById(containerId);
            container.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
        }

        // Mobile menu toggle
        document.getElementById('menu-button')?.addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
            menu.classList.toggle('animate-slide-down');
        });

        // Login alert
        function showLoginAlert() {
            Swal.fire({
                title: 'Login Required',
                text: 'You need to login first to make a reservation',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Login Now',
                cancelButtonText: 'Later',
                background: '#1f2937',
                color: '#fff',
                confirmButtonColor: '#3b82f6',
                cancelButtonColor: '#6b7280'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('login') }}";
                }
            });
        }
    </script>
</body>

</html>
