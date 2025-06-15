<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <x-sidebar></x-sidebar>
        <!-- Main Content -->
        <div class="p-5 flex-1 overflow-y-auto overflow-x-hidden">
            <!-- Profile -->
            <x-profile></x-profile>
            <main class="flex-1 p-6 bg-gray-50">
                <!-- Header dan Filter -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Manajemen Pembayaran</h1>
                        <p class="text-gray-500">Track pembayaran reservasi billiard</p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                        <!-- Date Range Picker -->
                        <div class="flex items-center gap-2 bg-white p-2 rounded-lg border">
                            <i class="fas fa-calendar text-gray-400 ml-2"></i>
                            <span class="text-sm">01 Jun - 30 Jun 2023</span>
                            <i class="fas fa-chevron-down text-gray-400"></i>
                        </div>

                        <!-- Filter Status -->
                        <select class="select select-bordered bg-white">
                            <option selected>Semua Status</option>
                            <option>Lunas</option>
                            <option>Pending</option>
                            <option>Gagal</option>
                        </select>

                        <!-- Export Button -->
                        <button class="btn btn-ghost border border-gray-300 bg-white">
                            <i class="fas fa-file-export mr-2"></i> Export
                        </button>
                    </div>
                </div>

                <!-- Statistik Pembayaran -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                    <!-- Total Pendapatan -->
                    <div class="bg-white p-4 rounded-lg shadow-sm border border-green-100">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Total Pendapatan</p>
                                <p class="text-2xl font-bold mt-1">Rp 8.250.000</p>
                            </div>
                            <div class="bg-green-50 p-3 rounded-full self-start">
                                <i class="fas fa-wallet text-green-500"></i>
                            </div>
                        </div>
                        <p class="text-xs text-green-500 mt-2"><i class="fas fa-arrow-up mr-1"></i> 12% dari bulan lalu
                        </p>
                    </div>

                    <!-- Pembayaran Lunas -->
                    <div class="bg-white p-4 rounded-lg shadow-sm border border-blue-100">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Lunas</p>
                                <p class="text-2xl font-bold mt-1">42</p>
                            </div>
                            <div class="bg-blue-50 p-3 rounded-full self-start">
                                <i class="fas fa-check-circle text-blue-500"></i>
                            </div>
                        </div>
                        <p class="text-xs text-blue-500 mt-2">80% dari total transaksi</p>
                    </div>

                    <!-- Pembayaran Pending -->
                    <div class="bg-white p-4 rounded-lg shadow-sm border border-yellow-100">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Pending</p>
                                <p class="text-2xl font-bold mt-1">8</p>
                            </div>
                            <div class="bg-yellow-50 p-3 rounded-full self-start">
                                <i class="fas fa-clock text-yellow-500"></i>
                            </div>
                        </div>
                        <p class="text-xs text-yellow-500 mt-2">15% dari total transaksi</p>
                    </div>

                    <!-- Pembayaran Gagal -->
                    <div class="bg-white p-4 rounded-lg shadow-sm border border-red-100">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Gagal</p>
                                <p class="text-2xl font-bold mt-1">3</p>
                            </div>
                            <div class="bg-red-50 p-3 rounded-full self-start">
                                <i class="fas fa-times-circle text-red-500"></i>
                            </div>
                        </div>
                        <p class="text-xs text-red-500 mt-2">5% dari total transaksi</p>
                    </div>
                </div>

                <!-- Tabel Transaksi -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-500">ID Transaksi</th>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-500">Reservasi</th>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-500">Tanggal</th>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-500">Metode</th>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-500">Jumlah</th>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-500">Status</th>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-500">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <!-- Transaksi 1 -->
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4 font-mono text-sm">#PAY-78923</td>
                                    <td class="py-3 px-4">
                                        <p class="font-medium">Meja VIP (2 Jam)</p>
                                        <p class="text-xs text-gray-400">#BOOK-7821 - Budi Santoso</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p>25 Jun 2023</p>
                                        <p class="text-xs text-gray-400">14:30 WIB</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex items-center gap-2">
                                            <i class="fab fa-cc-visa text-blue-500"></i>
                                            <span>VISA •••• 8890</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4 font-medium">Rp 150.000</td>
                                    <td class="py-3 px-4">
                                        <span class="badge badge-success text-white py-1 px-2 text-xs">
                                            <i class="fas fa-check-circle mr-1"></i> Lunas
                                        </span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <button class="btn btn-ghost btn-xs text-gray-500 hover:text-primary">
                                            <i class="fas fa-receipt"></i> Invoice
                                        </button>
                                    </td>
                                </tr>

                                <!-- Transaksi 2 -->
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4 font-mono text-sm">#PAY-78924</td>
                                    <td class="py-3 px-4">
                                        <p class="font-medium">Meja 3 (3 Jam)</p>
                                        <p class="text-xs text-gray-400">#BOOK-7822 - Ani Wijaya</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p>25 Jun 2023</p>
                                        <p class="text-xs text-gray-400">18:15 WIB</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex items-center gap-2">
                                            <i class="fas fa-money-bill-wave text-green-500"></i>
                                            <span>Tunai</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4 font-medium">Rp 120.000</td>
                                    <td class="py-3 px-4">
                                        <span class="badge badge-warning text-white py-1 px-2 text-xs">
                                            <i class="fas fa-clock mr-1"></i> Pending
                                        </span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <button class="btn btn-ghost btn-xs text-gray-500 hover:text-green-500 mr-1">
                                            <i class="fas fa-check"></i> Konfirmasi
                                        </button>
                                        <button class="btn btn-ghost btn-xs text-gray-500 hover:text-red-500">
                                            <i class="fas fa-times"></i> Tolak
                                        </button>
                                    </td>
                                </tr>

                                <!-- Transaksi 3 -->
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4 font-mono text-sm">#PAY-78925</td>
                                    <td class="py-3 px-4">
                                        <p class="font-medium">Meja 1 (1 Jam)</p>
                                        <p class="text-xs text-gray-400">#BOOK-7823 - John Doe</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p>26 Jun 2023</p>
                                        <p class="text-xs text-gray-400">10:00 WIB</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex items-center gap-2">
                                            <i class="fab fa-gopay text-purple-500"></i>
                                            <span>Gopay</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4 font-medium">Rp 50.000</td>
                                    <td class="py-3 px-4">
                                        <span class="badge badge-error text-white py-1 px-2 text-xs">
                                            <i class="fas fa-times-circle mr-1"></i> Gagal
                                        </span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <button class="btn btn-ghost btn-xs text-gray-500 hover:text-primary">
                                            <i class="fas fa-sync-alt"></i> Retry
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="flex justify-between items-center p-4 border-t">
                        <div class="text-sm text-gray-500">
                            Menampilkan 1 sampai 3 dari 53 transaksi
                        </div>
                        <div class="flex gap-1">
                            <button class="btn btn-sm btn-ghost" disabled>
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="btn btn-sm btn-primary">1</button>
                            <button class="btn btn-sm btn-ghost">2</button>
                            <button class="btn btn-sm btn-ghost">3</button>
                            <button class="btn btn-sm btn-ghost">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal Konfirmasi Pembayaran -->
                <dialog id="payment_modal" class="modal">
                    <div class="modal-box max-w-md">
                        <h3 class="font-bold text-lg">Konfirmasi Pembayaran</h3>

                        <div class="mt-4 space-y-4">
                            <div class="flex justify-between">
                                <span class="text-gray-500">ID Reservasi:</span>
                                <span class="font-medium">#BOOK-7822</span>
                            </div>

                            <div class="flex justify-between">
                                <span class="text-gray-500">Nama:</span>
                                <span class="font-medium">Ani Wijaya</span>
                            </div>

                            <div class="flex justify-between">
                                <span class="text-gray-500">Total:</span>
                                <span class="font-medium text-lg">Rp 120.000</span>
                            </div>

                            <div class="flex justify-between">
                                <span class="text-gray-500">Metode:</span>
                                <span class="font-medium">Tunai</span>
                            </div>

                            <div class="pt-4 border-t">
                                <label class="label">Upload Bukti Pembayaran</label>
                                <div
                                    class="flex items-center justify-center w-full border-2 border-dashed border-gray-300 rounded-lg p-4">
                                    <div class="text-center">
                                        <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                                        <p class="text-sm text-gray-500">Drag & drop file atau klik untuk upload</p>
                                        <p class="text-xs text-gray-400 mt-1">Format: JPG, PNG (max 5MB)</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-action">
                            <button class="btn btn-ghost">Batal</button>
                            <button class="btn btn-primary">Konfirmasi Pembayaran</button>
                        </div>
                    </div>
                </dialog>
            </main>
