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
            <main class="flex-1 p-6 bg-gray-50">
                <!-- Header dan Kontrol -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Manajemen Reservasi</h1>
                        <p class="text-gray-500">Kelola booking lapangan billiard</p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                        <!-- Date Picker -->
                        <div class="relative">
                            <input type="date" class="input input-bordered bg-white w-full">
                        </div>

                        <!-- Filter Meja -->
                        <select class="select select-bordered bg-white">
                            <option disabled selected>Pilih Meja</option>
                            <option>Semua Meja</option>
                            <option>Meja 1</option>
                            <option>Meja 2</option>
                            <option>Meja VIP</option>
                        </select>

                        <!-- Tombol Tambah Reservasi -->
                        <button class="btn btn-primary" onclick="booking_modal.showModal()">
                            <i class="fas fa-plus mr-2"></i>Tambah Reservasi
                        </button>
                    </div>
                </div>

                <!-- Sistem Booking -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <!-- Timeline Header -->
                    <div class="grid grid-cols-12 bg-gray-100 p-3 border-b">
                        <div class="col-span-2 font-medium text-gray-500">Meja</div>
                        <div class="col-span-10 grid grid-cols-12 gap-1">
                            <!-- Manual jam (karena HTML biasa, bukan blade PHP) -->
                            <div class="text-center text-xs font-medium text-gray-500">10:00</div>
                            <div class="text-center text-xs font-medium text-gray-500">11:00</div>
                            <div class="text-center text-xs font-medium text-gray-500">12:00</div>
                            <div class="text-center text-xs font-medium text-gray-500">13:00</div>
                            <div class="text-center text-xs font-medium text-gray-500">14:00</div>
                            <div class="text-center text-xs font-medium text-gray-500">15:00</div>
                            <div class="text-center text-xs font-medium text-gray-500">16:00</div>
                            <div class="text-center text-xs font-medium text-gray-500">17:00</div>
                            <div class="text-center text-xs font-medium text-gray-500">18:00</div>
                            <div class="text-center text-xs font-medium text-gray-500">19:00</div>
                            <div class="text-center text-xs font-medium text-gray-500">20:00</div>
                            <div class="text-center text-xs font-medium text-gray-500">21:00</div>
                        </div>
                    </div>

                    <!-- Daftar Meja -->
                    <div class="divide-y divide-gray-200">
                        <!-- Contoh Meja -->
                        <div class="grid grid-cols-12 p-3 hover:bg-gray-50">
                            <div class="col-span-2 font-medium flex items-center">
                                <span class="w-3 h-3 rounded-full bg-green-500 mr-2"></span>
                                Meja 1
                            </div>
                            <div class="col-span-10 grid grid-cols-12 gap-1 relative h-10">
                                <div
                                    class="col-span-3 bg-blue-100 border border-blue-200 rounded-sm absolute left-[25%] w-[25%] h-full flex items-center justify-center">
                                    <div class="text-xs text-center p-1">
                                        <p class="font-medium">John Doe</p>
                                        <p class="text-[10px]">12:00-15:00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Daftar Reservasi Hari Ini -->
                <div class="mt-8">
                    <h2 class="text-lg font-semibold mb-4 flex items-center">
                        <i class="fas fa-list-check mr-2 text-blue-500"></i>
                        Reservasi Hari Ini
                    </h2>

                    <div class="overflow-x-auto bg-white rounded-lg shadow-sm">
                        <table class="w-full">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-500">Kode</th>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-500">Nama</th>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-500">Meja</th>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-500">Waktu</th>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-500">Durasi</th>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-500">Status</th>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-500">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <!-- Contoh reservasi -->
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4 font-mono text-sm">#BILL-2389</td>
                                    <td class="py-3 px-4">
                                        <p class="font-medium">Budi Santoso</p>
                                        <p class="text-xs text-gray-400">08123456789</p>
                                    </td>
                                    <td class="py-3 px-4">Meja 2</td>
                                    <td class="py-3 px-4">
                                        <p>14:00 - 16:00</p>
                                        <p class="text-xs text-gray-400">25 Jun 2023</p>
                                    </td>
                                    <td class="py-3 px-4">2 Jam</td>
                                    <td class="py-3 px-4">
                                        <span class="badge badge-success text-white py-1 px-2 text-xs">Confirmed</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex space-x-2">
                                            <button class="btn btn-circle btn-xs btn-ghost text-blue-500">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                            <button class="btn btn-circle btn-xs btn-ghost text-red-500">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Modal Tambah Reservasi -->
                <dialog id="booking_modal" class="modal">
                    <div class="modal-box max-w-2xl bg-secondary-content ">
                        <h3 class="font-bold text-lg">Buat Reservasi Baru</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div>
                                <label class="label text-gray-700">Pilih Meja</label>
                                <select class="select select-bordered w-full bg-secondary-content text-gray-700">
                                    <option disabled selected
                                        class="bg-neutral-content bg-primary-content text-gray-700">Pilih Meja
                                    </option>
                                    <option class="text-gray-700">Meja 1</option>
                                    <option class="text-gray-700">Meja 2</option>
                                    <option class="text-gray-700">Meja Exclusive</option>
                                </select>
                            </div>
                            <div>
                                <label class="label text-gray-700">Tanggal</label>
                                <input type="date"
                                    class="input input-bordered w-full bg-primary-content text-gray-700" />
                            </div>

                            <style>
                                /* Mengubah warna ikon kalender */
                                input[type="date"]::-webkit-calendar-picker-indicator {

                                    filter: invert(1) brightness(0) saturate(100%) hue-rotate(180deg);
                                    /* Mengubah warna ikon */
                                }
                            </style>

                            <div>
                                <label class="label text-gray-700">Waktu Mulai</label>
                                <select name="waktu_mulai"
                                    class="select select-bordered w-full bg-primary-content text-gray-700" required>
                                    <option disabled selected>Pilih Jam</option>
                                    <!-- Jam mulai dari 11:00 hingga 22:00 -->
                                    <option value="11:00">11:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                    <option value="17:00">17:00</option>
                                    <option value="18:00">18:00</option>
                                    <option value="19:00">19:00</option>
                                    <option value="20:00">20:00</option>
                                    <option value="21:00">21:00</option>
                                    <option value="22:00">22:00</option>
                                </select>
                            </div>
                            <div>
                                <label class="label bg-primary-content text-gray-700">Durasi</label>
                                <select class="select select-bordered w-full bg-primary-content text-gray-700">
                                    <option class="text-gray-700">1 Jam</option>
                                    <option class="text-gray-700" selected>2 Jam</option>
                                    <option class="text-gray-700">3 Jam</option>
                                    <option class="text-gray-700">4 Jam</option>
                                </select>
                            </div>

                            <style>
                                /* Mengubah warna ikon Wa */
                                input[type="time"]::-webkit-calendar-picker-indicator {
                                    filter: invert(1) brightness(0) saturate(100%) hue-rotate(180deg);
                                    /* Mengubah warna ikon */
                                }
                            </style>

                            <div class="md:col-span-2">
                                <label class="label text-gray-700">Nama Pelanggan</label>
                                <input type="text" placeholder="Nama lengkap"
                                    class="input input-bordered w-full bg-primary-content text-gray-700">
                            </div>
                            <div class="md:col-span-2">
                                <label class="label text-gray-700">No. Telepon</label>
                                <input type="tel" placeholder="08123456789"
                                    class="input input-bordered w-full bg-primary-content text-gray-700">
                            </div>
                        </div>
                        <div class="modal-action bg-primary-content text-gray-700">
                            <button class="btn btn-ghost" onclick="booking_modal.close()">Batal</button>
                            <button class="btn btn-primary">Simpan Reservasi</button>
                        </div>
                    </div>
                </dialog>
            </main>
        </div>
    </div>
</body>

</html>