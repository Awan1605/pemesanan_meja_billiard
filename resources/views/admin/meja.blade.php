<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">
    <div class="flex h-screen overflow-hidden">
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
            <!-- Main Content -->
            <main class="flex-1 p-2">
                <div class="flex flex-col gap-2">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:gap-4 mt-2">
                        <div class="flex items-center flex-1 max-w-full">
                            <span class="relative w-full max-w-full">
                                <input type="search" placeholder="Search"
                                    class="w-full rounded-lg border border-gray-200 bg-white py-2 pl-10 pr-4 text-sm text-gray-500 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#2563EB]" />
                                <i
                                    class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                            </span>
                        </div>
                        <button type="button"
                            class="mt-3 sm:mt-0 inline-flex items-center bg-[#2563EB] text-white text-sm font-semibold px-4 py-2 rounded hover:bg-[#1D4ED8] focus:outline-none focus:ring-2 focus:ring-[#2563EB]">
                            Tambah Meja
                        </button>
                        <div class="flex items-center gap-2 mt-3 sm:mt-0 text-sm text-gray-700">
                            <span class="cursor-pointer select-none">Sort by <i
                                    class="fas fa-chevron-down text-xs"></i></span>
                            <span class="cursor-pointer select-none">Saved search <i
                                    class="fas fa-chevron-down text-xs"></i></span>
                            <button aria-label="Filter" class="text-gray-600 hover:text-gray-900">
                                <i class="fas fa-sliders-h"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="mt-5 bg-white rounded-lg shadow-sm p-4 overflow-x-auto">
                    <div class="inline-grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-1 min-w-max">
                        <!-- CARD 1 -->
                        <div class="w-[285px] h-[460px] rounded-lg border-2 border-gray-300 bg-white shadow-md overflow-hidden relative transform transition-all duration-300 hover:scale-[1.02] hover:shadow-lg hover:border-blue-500 hover:z-10">
                            <!-- Gambar dan konten utama -->
                            <div class="w-[265px] h-[280px] rounded-lg absolute top-[10px] left-[6px] bg-cover bg-center"
                                style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSa8Ty9cV274abHjuLEKzu9pA-cwQpkkpvXsA&s')">
                                <div class="absolute bottom-3 left-4 text-white">
                                    <h3 class="text-xl font-bold">Zetro Exclusive</h3>
                                    <p class="text-sm font-bold mt-1">Lantai 3</p>
                                </div>
                            </div>
                            <div class="absolute top-[300px] left-[18px]">
                                <p class="text-[#152c5b] text-base leading-relaxed">
                                    Zetro Billiard, Mitra Raya 2<br>Main Street, Galle.
                                </p>
                            </div>
                            <div class="absolute top-[380px] left-[18px] text-[#152c5b] text-base whitespace-nowrap">
                                Rp 35.000 / Jam
                            </div>

                            <!-- Tombol aksi -->
                            <div class="absolute bottom-10 right-3 flex gap-2">
                                <button
                                    class="w-10 h-10 rounded-full bg-blue-100 hover:bg-blue-200 flex items-center justify-center transition-colors">
                                    <i class="fas fa-pencil-alt text-blue-600 text-sm"></i>
                                </button>

                                <!-- Tombol Delete dengan modal trigger -->
                                <button onclick="document.getElementById('delete_modal').showModal()"
                                    class="w-10 h-10 rounded-full bg-red-100 hover:bg-red-200 flex items-center justify-center transition-colors">
                                    <i class="fas fa-trash-alt text-red-600 text-sm"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Modal Delete DaisyUI -->
                        <dialog id="delete_modal" class="modal">
                            <div class="modal-box bg-primary-content text-[#152c5b] text-base leading-relaxed">
                                <h3 class="font-bold text-lg">Hapus Item?</h3>
                                <p class="py-4">Apakah Anda yakin ingin menghapus "Zetro Exclusive"? Tindakan ini tidak
                                    dapat dibatalkan.</p>
                                <div class="modal-action">
                                    <form method="dialog">
                                        <!-- Tombol cancel -->
                                        <button class="btn">Batal</button>
                                        <!-- Tombol delete -->
                                        <button class="btn btn-error text-white ml-2">Hapus</button>
                                    </form>
                                </div>
                            </div>

                            <!-- Klik di luar modal untuk menutup -->
                            <form method="dialog" class="modal-backdrop">
                                <button>close</button>
                            </form>
                        </dialog>

                        <!-- CARD 2 -->
                        <div class="w-[285px] h-[460px] rounded-lg border-2 border-gray-300 bg-white shadow-md overflow-hidden relative transform transition-all duration-300 hover:scale-[1.02] hover:shadow-lg hover:border-blue-500 hover:z-10">
                            <!-- Gambar dan konten utama -->
                            <div class="w-[265px] h-[280px] rounded-lg absolute top-[10px] left-[6px] bg-cover bg-center"
                                style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSa8Ty9cV274abHjuLEKzu9pA-cwQpkkpvXsA&s')">
                                <div class="absolute bottom-3 left-4 text-white">
                                    <h3 class="text-xl font-bold">Zetro Exclusive</h3>
                                    <p class="text-sm font-bold mt-1">Lantai 3</p>
                                </div>
                            </div>
                            <div class="absolute top-[300px] left-[18px]">
                                <p class="text-[#152c5b] text-base leading-relaxed">
                                    Zetro Billiard, Mitra Raya 2<br>Main Street, Galle.
                                </p>
                            </div>
                            <div class="absolute top-[380px] left-[18px] text-[#152c5b] text-base whitespace-nowrap">
                                Rp 35.000 / Jam
                            </div>

                            <!-- Tombol aksi -->
                            <div class="absolute bottom-10 right-3 flex gap-2">
                                <button
                                    class="w-10 h-10 rounded-full bg-blue-100 hover:bg-blue-200 flex items-center justify-center transition-colors">
                                    <i class="fas fa-pencil-alt text-blue-600 text-sm"></i>
                                </button>

                                <!-- Tombol Delete dengan modal trigger -->
                                <button onclick="document.getElementById('delete_modal').showModal()"
                                    class="w-10 h-10 rounded-full bg-red-100 hover:bg-red-200 flex items-center justify-center transition-colors">
                                    <i class="fas fa-trash-alt text-red-600 text-sm"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Modal Delete DaisyUI -->
                        <dialog id="delete_modal" class="modal">
                            <div class="modal-box bg-primary-content text-[#152c5b] text-base leading-relaxed">
                                <h3 class="font-bold text-lg">Hapus Item?</h3>
                                <p class="py-4">Apakah Anda yakin ingin menghapus "Zetro Exclusive"? Tindakan ini tidak
                                    dapat dibatalkan.</p>
                                <div class="modal-action">
                                    <form method="dialog">
                                        <!-- Tombol cancel -->
                                        <button class="btn">Batal</button>
                                        <!-- Tombol delete -->
                                        <button class="btn btn-error text-white ml-2">Hapus</button>
                                    </form>
                                </div>
                            </div>

                            <!-- Klik di luar modal untuk menutup -->
                            <form method="dialog" class="modal-backdrop">
                                <button>close</button>
                            </form>
                        </dialog>

                        <!-- CARD 3 -->
                        <div class="w-[285px] h-[460px] rounded-lg border-2 border-gray-300 bg-white shadow-md overflow-hidden relative transform transition-all duration-300 hover:scale-[1.02] hover:shadow-lg hover:border-blue-500 hover:z-10">
                            <!-- Gambar dan konten utama -->
                            <div class="w-[265px] h-[280px] rounded-lg absolute top-[10px] left-[6px] bg-cover bg-center"
                                style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSa8Ty9cV274abHjuLEKzu9pA-cwQpkkpvXsA&s')">
                                <div class="absolute bottom-3 left-4 text-white">
                                    <h3 class="text-xl font-bold">Zetro Exclusive</h3>
                                    <p class="text-sm font-bold mt-1">Lantai 3</p>
                                </div>
                            </div>
                            <div class="absolute top-[300px] left-[18px]">
                                <p class="text-[#152c5b] text-base leading-relaxed">
                                    Zetro Billiard, Mitra Raya 2<br>Main Street, Galle.
                                </p>
                            </div>
                            <div class="absolute top-[380px] left-[18px] text-[#152c5b] text-base whitespace-nowrap">
                                Rp 35.000 / Jam
                            </div>

                            <!-- Tombol aksi -->
                            <div class="absolute bottom-10 right-3 flex gap-2">
                                <button
                                    class="w-10 h-10 rounded-full bg-blue-100 hover:bg-blue-200 flex items-center justify-center transition-colors">
                                    <i class="fas fa-pencil-alt text-blue-600 text-sm"></i>
                                </button>

                                <!-- Tombol Delete dengan modal trigger -->
                                <button onclick="document.getElementById('delete_modal').showModal()"
                                    class="w-10 h-10 rounded-full bg-red-100 hover:bg-red-200 flex items-center justify-center transition-colors">
                                    <i class="fas fa-trash-alt text-red-600 text-sm"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Modal Delete DaisyUI -->
                        <dialog id="delete_modal" class="modal">
                            <div class="modal-box bg-primary-content text-[#152c5b] text-base leading-relaxed">
                                <h3 class="font-bold text-lg">Hapus Item?</h3>
                                <p class="py-4">Apakah Anda yakin ingin menghapus "Zetro Exclusive"? Tindakan ini tidak
                                    dapat dibatalkan.</p>
                                <div class="modal-action">
                                    <form method="dialog">
                                        <!-- Tombol cancel -->
                                        <button class="btn">Batal</button>
                                        <!-- Tombol delete -->
                                        <button class="btn btn-error text-white ml-2">Hapus</button>
                                    </form>
                                </div>
                            </div>

                            <!-- Klik di luar modal untuk menutup -->
                            <form method="dialog" class="modal-backdrop">
                                <button>close</button>
                            </form>
                        </dialog>

                        <!-- CARD 4 -->
                        <div class="w-[285px] h-[460px] rounded-lg border-2 border-gray-300 bg-white shadow-md overflow-hidden relative transform transition-all duration-300 hover:scale-[1.02] hover:shadow-lg hover:border-blue-500 hover:z-10">
                            <!-- Gambar dan konten utama -->
                            <div class="w-[265px] h-[280px] rounded-lg absolute top-[10px] left-[6px] bg-cover bg-center"
                                style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSa8Ty9cV274abHjuLEKzu9pA-cwQpkkpvXsA&s')">
                                <div class="absolute bottom-3 left-4 text-white">
                                    <h3 class="text-xl font-bold">Zetro Exclusive</h3>
                                    <p class="text-sm font-bold mt-1">Lantai 3</p>
                                </div>
                            </div>
                            <div class="absolute top-[300px] left-[18px]">
                                <p class="text-[#152c5b] text-base leading-relaxed">
                                    Zetro Billiard, Mitra Raya 2<br>Main Street, Galle.
                                </p>
                            </div>
                            <div class="absolute top-[380px] left-[18px] text-[#152c5b] text-base whitespace-nowrap">
                                Rp 35.000 / Jam
                            </div>

                            <!-- Tombol aksi -->
                            <div class="absolute bottom-10 right-3 flex gap-2">
                                <button
                                    class="w-10 h-10 rounded-full bg-blue-100 hover:bg-blue-200 flex items-center justify-center transition-colors">
                                    <i class="fas fa-pencil-alt text-blue-600 text-sm"></i>
                                </button>

                                <!-- Tombol Delete dengan modal trigger -->
                                <button onclick="document.getElementById('delete_modal').showModal()"
                                    class="w-10 h-10 rounded-full bg-red-100 hover:bg-red-200 flex items-center justify-center transition-colors">
                                    <i class="fas fa-trash-alt text-red-600 text-sm"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Modal Delete DaisyUI -->
                        <dialog id="delete_modal" class="modal">
                            <div class="modal-box bg-primary-content text-[#152c5b] text-base leading-relaxed">
                                <h3 class="font-bold text-lg">Hapus Item?</h3>
                                <p class="py-4">Apakah Anda yakin ingin menghapus "Zetro Exclusive"? Tindakan ini tidak
                                    dapat dibatalkan.</p>
                                <div class="modal-action">
                                    <form method="dialog">
                                        <!-- Tombol cancel -->
                                        <button class="btn">Batal</button>
                                        <!-- Tombol delete -->
                                        <button class="btn btn-error text-white ml-2">Hapus</button>
                                    </form>
                                </div>
                            </div>

                            <!-- Klik di luar modal untuk menutup -->
                            <form method="dialog" class="modal-backdrop">
                                <button>close</button>
                            </form>
                        </dialog>

                        <!-- CARD 5 -->
                        <div class="w-[285px] h-[460px] rounded-lg border-2 border-gray-300 bg-white shadow-md overflow-hidden relative transform transition-all duration-300 hover:scale-[1.02] hover:shadow-lg hover:border-blue-500 hover:z-10">
                            <!-- Gambar dan konten utama -->
                            <div class="w-[265px] h-[280px] rounded-lg absolute top-[10px] left-[6px] bg-cover bg-center"
                                style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSa8Ty9cV274abHjuLEKzu9pA-cwQpkkpvXsA&s')">
                                <div class="absolute bottom-3 left-4 text-white">
                                    <h3 class="text-xl font-bold">Zetro Exclusive</h3>
                                    <p class="text-sm font-bold mt-1">Lantai 3</p>
                                </div>
                            </div>
                            <div class="absolute top-[300px] left-[18px]">
                                <p class="text-[#152c5b] text-base leading-relaxed">
                                    Zetro Billiard, Mitra Raya 2<br>Main Street, Galle.
                                </p>
                            </div>
                            <div class="absolute top-[380px] left-[18px] text-[#152c5b] text-base whitespace-nowrap">
                                Rp 35.000 / Jam
                            </div>

                            <!-- Tombol aksi -->
                            <div class="absolute bottom-10 right-3 flex gap-2">
                                <button
                                    class="w-10 h-10 rounded-full bg-blue-100 hover:bg-blue-200 flex items-center justify-center transition-colors">
                                    <i class="fas fa-pencil-alt text-blue-600 text-sm"></i>
                                </button>

                                <!-- Tombol Delete dengan modal trigger -->
                                <button onclick="document.getElementById('delete_modal').showModal()"
                                    class="w-10 h-10 rounded-full bg-red-100 hover:bg-red-200 flex items-center justify-center transition-colors">
                                    <i class="fas fa-trash-alt text-red-600 text-sm"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Modal Delete DaisyUI -->
                        <dialog id="delete_modal" class="modal">
                            <div class="modal-box bg-primary-content text-[#152c5b] text-base leading-relaxed">
                                <h3 class="font-bold text-lg">Hapus Item?</h3>
                                <p class="py-4">Apakah Anda yakin ingin menghapus "Zetro Exclusive"? Tindakan ini tidak
                                    dapat dibatalkan.</p>
                                <div class="modal-action">
                                    <form method="dialog">
                                        <!-- Tombol cancel -->
                                        <button class="btn">Batal</button>
                                        <!-- Tombol delete -->
                                        <button class="btn btn-error text-white ml-2">Hapus</button>
                                    </form>
                                </div>
                            </div>

                            <!-- Klik di luar modal untuk menutup -->
                            <form method="dialog" class="modal-backdrop">
                                <button>close</button>
                            </form>
                        </dialog>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>