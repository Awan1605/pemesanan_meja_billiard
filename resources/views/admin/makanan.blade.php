<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pilihan Menu</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .image-upload-container {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .image-upload-container input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .preview-image {
            max-width: 100%;
            max-height: 200px;
            display: none;
            cursor: pointer;
        }

        .modal-box {
            max-height: 90vh;
            overflow-y: auto;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
      <x-sidebar></x-sidebar>
        <!-- Main Content -->
        <div class="p-5 flex-1 overflow-y-auto overflow-x-hidden">
        <!-- Profile -->
        <x-profile></x-profile>
        <!-- Main Content -->
        <div class="p-5 flex-1 overflow-y-auto overflow-x-hidden">
            <main class="flex-1 p-6 bg-gray-50">
                <!-- Header dan Kontrol -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Manajemen Menu</h1>
                        <p class="text-gray-500">Kelola makanan, minuman, dan stok</p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                        <!-- Search -->
                        <div class="relative flex-1">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="text" placeholder="Cari menu..."
                                class="input input-bordered w-full pl-10 pr-4 py-2 text-sm rounded-md" aria-label="Cari menu" />
                        </div>

                        <!-- Kategori -->
                        <select class="select select-bordered bg-white rounded-md" aria-label="Filter kategori">
                            <option selected>Semua Kategori</option>
                            <option>Makanan</option>
                            <option>Minuman Dingin</option>
                            <option>Minuman Panas</option>
                            <option>Snack</option>
                        </select>

                        <!-- Tambah Menu -->
                        <button id="add_menu_button" type="button" class="btn btn-primary gap-2 flex items-center justify-center whitespace-nowrap" aria-label="Tambah Menu">
                            <i class="fas fa-plus"></i>
                            Tambah Menu
                        </button>
                    </div>
                </div>

                <!-- Statistik Penjualan -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                    <!-- Total Penjualan -->
                    <div class="bg-white p-4 rounded-lg shadow-sm border border-blue-100">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Penjualan Hari Ini</p>
                                <p class="text-2xl font-bold mt-1">Rp 1.240.000</p>
                            </div>
                            <div class="bg-blue-50 p-3 rounded-full self-start">
                                <i class="fas fa-chart-line text-blue-500"></i>
                            </div>
                        </div>
                        <p class="text-xs text-blue-500 mt-2"><i class="fas fa-arrow-up mr-1"></i> 18% dari kemarin</p>
                    </div>

                    <!-- Menu Terlaris -->
                    <div class="bg-white p-4 rounded-lg shadow-sm border border-green-100">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Menu Terlaris</p>
                                <p class="text-xl font-bold mt-1">Nasi Goreng</p>
                                <p class="text-xs text-gray-400">42x terjual</p>
                            </div>
                            <div class="bg-green-50 p-3 rounded-full self-start">
                                <i class="fas fa-star text-green-500"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Stok Habis -->
                    <div class="bg-white p-4 rounded-lg shadow-sm border border-red-100">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Stok Habis</p>
                                <p class="text-2xl font-bold mt-1">3</p>
                            </div>
                            <div class="bg-red-50 p-3 rounded-full self-start">
                                <i class="fas fa-exclamation-triangle text-red-500"></i>
                            </div>
                        </div>
                        <p class="text-xs text-red-500 mt-2">Segera restock</p>
                    </div>

                    <!-- Kategori -->
                    <div class="bg-white p-4 rounded-lg shadow-sm border border-purple-100">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Total Menu</p>
                                <p class="text-2xl font-bold mt-1">28</p>
                            </div>
                            <div class="bg-purple-50 p-3 rounded-full self-start">
                                <i class="fas fa-utensils text-purple-500"></i>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-2">4 kategori</p>
                    </div>
                </div>

                <!-- Daftar Menu -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-500">Gambar</th>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-500">Nama Menu</th>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-500">Kategori</th>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-500">Harga</th>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-500">Stok</th>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-500">Terjual</th>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-500">Status</th>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-500">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200" id="menu_table_body">
                                <!-- Existing menu items here -->
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4">
                                        <div class="w-12 h-12 bg-gray-200 rounded-md overflow-hidden">
                                            <img src="https://images.unsplash.com/photo-1517701550927-30cf4ba1dba5?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Kopi Hitam" class="w-full h-full object-cover" />
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="font-medium">Kopi Hitam</p>
                                        <p class="text-xs text-gray-400">ID: H-002</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span class="badge badge-outline badge-warning py-1 px-2 text-xs">Minuman Panas</span>
                                    </td>
                                    <td class="py-3 px-4 font-medium">Rp 20.000</td>
                                    <td class="py-3 px-4">
                                        <div class="flex items-center gap-2">
                                            <span>25</span>
                                            <button class="btn btn-circle btn-xs btn-ghost text-gray-400 hover:text-primary" aria-label="Edit stok Kopi Hitam">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span class="font-medium">63</span>
                                        <span class="text-xs text-gray-400 ml-1">(30d)</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span class="badge badge-success text-white py-1 px-2 text-xs">Tersedia</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex space-x-1">
                                            <button class="btn btn-circle btn-xs btn-ghost text-blue-500" aria-label="Edit Kopi Hitam">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                            <button class="btn btn-circle btn-xs btn-ghost text-red-500" aria-label="Hapus Kopi Hitam">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- More existing items... -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="flex justify-between items-center p-4 border-t">
                        <div class="text-sm text-gray-500" aria-live="polite" aria-atomic="true">
                            Menampilkan 1 sampai 3 dari 28 menu
                        </div>
                        <div class="flex gap-1" role="navigation" aria-label="Pagination">
                            <button class="btn btn-sm btn-ghost" disabled aria-disabled="true" aria-label="Halaman sebelumnya">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="btn btn-sm btn-primary" aria-current="page" aria-label="Halaman 1">1</button>
                            <button class="btn btn-sm btn-ghost" aria-label="Halaman 2">2</button>
                            <button class="btn btn-sm btn-ghost" aria-label="Halaman 3">3</button>
                            <button class="btn btn-sm btn-ghost" aria-label="Halaman berikutnya">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal Tambah Menu -->
                <dialog id="add_menu_modal" class="modal" aria-modal="true" role="dialog" aria-labelledby="addMenuTitle">
                    <form id="add_menu_form" class="modal-box w-full max-w-3xl flex flex-col" novalidate>
                        <div class="flex justify-between items-center border-b pb-4">
                            <h3 id="addMenuTitle" class="font-bold text-xl text-gray-800 flex items-center">
                                <i class="fas fa-utensils text-primary mr-2"></i>
                                Tambah Menu Baru
                            </h3>
                            <button type="button" id="close_modal_btn" class="btn btn-circle btn-ghost btn-sm" aria-label="Tutup modal">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>

                        <div class="mt-6 flex-1 overflow-y-auto">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <!-- Informasi Dasar Menu -->
                                <section class="space-y-6" aria-labelledby="basicInfoTitle">
                                    <div class="bg-blue-50 p-4 rounded-lg">
                                        <h4 id="basicInfoTitle" class="font-semibold text-blue-800 flex items-center text-lg">
                                            <i class="fas fa-info-circle mr-3"></i>
                                            Informasi Dasar Menu
                                        </h4>
                                    </div>

                                    <div class="form-control w-full">
                                        <label for="nama_menu" class="label cursor-pointer">
                                            <span class="label-text font-semibold">Nama Menu</span>
                                            <span class="label-text-alt text-error ml-1">*</span>
                                        </label>
                                        <input id="nama_menu" name="nama_menu" type="text" placeholder="Contoh: Nasi Goreng Spesial"
                                            class="input input-bordered w-full focus:ring-2 focus:ring-primary rounded-md" maxlength="50" required aria-required="true" />
                                    </div>

                                    <div class="form-control w-full">
                                        <label for="kategori" class="label cursor-pointer">
                                            <span class="label-text font-semibold">Kategori</span>
                                            <span class="label-text-alt text-error ml-1">*</span>
                                        </label>
                                        <select id="kategori" name="kategori" class="select select-bordered w-full focus:ring-2 focus:ring-primary rounded-md" required aria-required="true">
                                            <option value="" disabled selected>Pilih Kategori</option>
                                            <option value="Makanan">Makanan</option>
                                            <option value="Minuman Dingin">Minuman Dingin</option>
                                            <option value="Minuman Panas">Minuman Panas</option>
                                            <option value="Snack">Snack</option>
                                        </select>
                                    </div>

                                    <div class="form-control w-full">
                                        <label for="harga" class="label cursor-pointer">
                                            <span class="label-text font-semibold">Harga</span>
                                            <span class="label-text-alt text-error ml-1">*</span>
                                        </label>
                                        <div class="relative">
                                            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 select-none">Rp</span>
                                            <input id="harga" name="harga" type="number" placeholder="35000"
                                                class="input input-bordered w-full pl-10 focus:ring-2 focus:ring-primary rounded-md" min="0" required aria-required="true" />
                                        </div>
                                    </div>
                                </section>

                                <!-- Detail Tambahan -->
                                <section class="space-y-6" aria-labelledby="additionalInfoTitle">
                                    <div class="bg-blue-50 p-4 rounded-lg">
                                        <h4 id="additionalInfoTitle" class="font-semibold text-blue-800 flex items-center text-lg">
                                            <i class="fas fa-cog mr-3"></i>
                                            Detail Tambahan
                                        </h4>
                                    </div>

                                    <div class="form-control w-full">
                                        <label for="stok" class="label cursor-pointer">
                                            <span class="label-text font-semibold">Stok Awal</span>
                                        </label>
                                        <input id="stok" name="stok" type="number" placeholder="10"
                                            class="input input-bordered w-full focus:ring-2 focus:ring-primary rounded-md" min="0" />
                                    </div>

                                    <div class="form-control w-full">
                                        <label class="label cursor-pointer">
                                            <span class="label-text font-semibold">Foto Produk</span>
                                            <span class="label-text-alt text-gray-500">Opsional</span>
                                        </label>
                                        <div class="image-upload-container">
                                            <div id="upload-area" tabindex="0" role="button" aria-label="Klik untuk upload gambar produk" class="flex flex-col items-center justify-center w-full border-2 border-dashed border-gray-300 rounded-lg p-6 h-40 cursor-pointer bg-gray-50 hover:bg-gray-100 transition focus:outline-none focus:ring-2 focus:ring-primary">
                                                <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                                                <p class="text-sm text-gray-600 font-medium">Klik untuk upload gambar</p>
                                                <p class="text-xs text-gray-400 mt-1">Format: JPG, PNG (max 2MB)</p>
                                                <img id="image-preview" class="preview-image mt-2 rounded-md" alt="Preview Gambar Produk" />
                                            </div>
                                            <input type="file" id="image-upload" name="foto_produk" accept="image/*" class="hidden" />
                                        </div>
                                    </div>

                                    <div class="form-control w-full">
                                        <label for="deskripsi" class="label cursor-pointer">
                                            <span class="label-text font-semibold">Deskripsi Menu</span>
                                            <span class="label-text-alt text-gray-500">Opsional</span>
                                        </label>
                                        <textarea id="deskripsi" name="deskripsi" class="textarea textarea-bordered w-full h-24 focus:ring-2 focus:ring-primary rounded-md resize-none"
                                            placeholder="Contoh: Nasi goreng dengan bumbu spesial, ditambah ayam suwir, telur, dan sayuran segar..." maxlength="200"></textarea>
                                    </div>
                                </section>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="modal-action flex justify-between gap-4 mt-8 border-t pt-4">
                            <button type="button" id="cancel_add_menu" class="btn btn-ghost hover:bg-gray-100 flex items-center" aria-label="Batal tambah menu">
                                <i class="fas fa-times mr-2"></i> Batal
                            </button>
                            <div class="flex gap-2">
                                <button type="button" id="save_draft" class="btn btn-ghost border border-gray-300 hover:bg-gray-50 flex items-center" aria-label="Simpan draft menu">
                                    <i class="fas fa-save mr-2"></i> Simpan Draft
                                </button>
                                <button type="submit" id="save_menu" class="btn btn-primary flex items-center" aria-label="Simpan menu">
                                    <i class="fas fa-check mr-2"></i> Simpan Menu
                                </button>
                            </div>
                        </div>
                    </form>
                </dialog>

                <!-- Modal Pesanan Aktif -->
                <dialog id="active_orders_modal" class="modal" aria-modal="true" role="dialog" aria-labelledby="activeOrdersTitle">
                    <div class="modal-box max-w-4xl">
                        <h3 id="activeOrdersTitle" class="font-bold text-lg flex items-center">
                            <i class="fas fa-list-alt text-blue-500 mr-2"></i>
                            Pesanan Aktif
                        </h3>

                        <div class="overflow-x-auto mt-4">
                            <table class="w-full">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="py-2 px-3 text-left text-sm">Meja</th>
                                        <th class="py-2 px-3 text-left text-sm">Menu</th>
                                        <th class="py-2 px-3 text-left text-sm">Catatan</th>
                                        <th class="py-2 px-3 text-left text-sm">Status</th>
                                        <th class="py-2 px-3 text-left text-sm">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <!-- Pesanan 1 -->
                                    <tr>
                                        <td class="py-2 px-3 font-medium">VIP 2</td>
                                        <td class="py-2 px-3">
                                            <div class="flex items-center gap-2">
                                                <div class="w-8 h-8 bg-gray-200 rounded-md overflow-hidden">
                                                    <img src="https://images.unsplash.com/photo-1631515243349-e0cb75fb8d3a?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Nasi Goreng" class="w-full h-full object-cover" />
                                                </div>
                                                <span>Nasi Goreng (x1)</span>
                                            </div>
                                        </td>
                                        <td class="py-2 px-3 text-sm text-gray-500">Pedas level 2</td>
                                        <td class="py-2 px-3">
                                            <span class="badge badge-warning text-white py-1 px-2 text-xs">Dalam Proses</span>
                                        </td>
                                        <td class="py-2 px-3">
                                            <button class="btn btn-xs btn-success" aria-label="Tandai pesanan selesai">Selesai</button>
                                        </td>
                                    </tr>

                                    <!-- Pesanan 2 -->
                                    <tr>
                                        <td class="py-2 px-3 font-medium">3</td>
                                        <td class="py-2 px-3">
                                            <div class="flex items-center gap-2">
                                                <div class="w-8 h-8 bg-gray-200 rounded-md overflow-hidden">
                                                    <img src="https://images.unsplash.com/photo-1558160074-4d7d8bdf4256?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Es Teh" class="w-full h-full object-cover" />
                                                </div>
                                                <span>Es Teh (x2), Keripik Kentang (x1)</span>
                                            </div>
                                        </td>
                                        <td class="py-2 px-3 text-sm text-gray-500">Es sedikit</td>
                                        <td class="py-2 px-3">
                                            <span class="badge badge-primary text-white py-1 px-2 text-xs">Menunggu</span>
                                        </td>
                                        <td class="py-2 px-3">
                                            <button class="btn btn-xs btn-warning mr-1" aria-label="Proses pesanan">Proses</button>
                                            <button class="btn btn-xs btn-ghost" aria-label="Batalkan pesanan">Batal</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="modal-action">
                            <button class="btn btn-ghost" type="button" onclick="document.getElementById('active_orders_modal').close()" aria-label="Tutup modal">Tutup</button>
                        </div>
                    </div>
                </dialog>
            </main>
        </div>
    </div>
</body>
<script>
    // Show modal on add menu button click
    document.getElementById("add_menu_button").addEventListener("click", () => {
        document.getElementById('add_menu_modal').showModal();
    });

    // Close modal on cancel button click
    document.getElementById("cancel_add_menu").addEventListener("click", () => {
        document.getElementById('add_menu_modal').close();
        resetForm();
    });

    // Close modal when clicking outside modal content
    document.getElementById('add_menu_modal').addEventListener('click', (event) => {
        if (event.target === document.getElementById('add_menu_modal')) {
            document.getElementById('add_menu_modal').close();
            resetForm();
        }
    });

    // Image upload functionality
    const uploadArea = document.getElementById('upload-area');
    const imageUploadInput = document.getElementById('image-upload');
    const imagePreview = document.getElementById('image-preview');

    uploadArea.addEventListener('click', () => {
        imageUploadInput.click();
    });
    uploadArea.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            imageUploadInput.click();
        }
    });

    imageUploadInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (file) {
            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran file maksimal 2MB');
                imageUploadInput.value = '';
                return;
            }
            const reader = new FileReader();
            reader.onload = (e) => {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
                uploadArea.classList.remove('border-dashed', 'border-gray-300');
                uploadArea.classList.add('border-solid', 'border-primary');
                uploadArea.querySelector('i').style.display = 'none';
                uploadArea.querySelectorAll('p').forEach(p => p.style.display = 'none');
            };
            reader.readAsDataURL(file);
        }
    });

    imagePreview.addEventListener('click', () => {
        imageUploadInput.click();
    });

    // Form submission handler
    document.getElementById('add_menu_form').addEventListener('submit', function (e) {
        e.preventDefault();

        const form = e.target;
        const namaMenu = form.nama_menu.value.trim();
        const kategori = form.kategori.value;
        const harga = form.harga.value.trim();
        const stok = form.stok.value.trim() || '0';
        const deskripsi = form.deskripsi.value.trim();
        const fotoFile = form.foto_produk.files[0];

        // Basic validation
        if (!namaMenu) {
            alert('Nama Menu wajib diisi.');
            form.nama_menu.focus();
            return;
        }
        if (!kategori) {
            alert('Kategori wajib dipilih.');
            form.kategori.focus();
            return;
        }
        if (!harga || isNaN(harga) || Number(harga) < 0) {
            alert('Harga harus berupa angka positif.');
            form.harga.focus();
            return;
        }
        if (stok && (isNaN(stok) || Number(stok) < 0)) {
            alert('Stok harus berupa angka positif atau kosong.');
            form.stok.focus();
            return;
        }
        if (fotoFile && fotoFile.size > 2 * 1024 * 1024) {
            alert('Ukuran file foto maksimal 2MB.');
            return;
        }

        // Create new table row
        const tbody = document.getElementById('menu_table_body');
        const tr = document.createElement('tr');
        tr.classList.add('hover:bg-gray-50');

        // Image cell
        const tdImage = document.createElement('td');
        tdImage.className = 'py-3 px-4';
        const divImg = document.createElement('div');
        divImg.className = 'w-12 h-12 bg-gray-200 rounded-md overflow-hidden';
        const img = document.createElement('img');
        img.className = 'w-full h-full object-cover';
        img.alt = namaMenu;
        if (fotoFile) {
            const reader = new FileReader();
            reader.onload = (e) => {
                img.src = e.target.result;
            };
            reader.readAsDataURL(fotoFile);
        } else {
            img.src = 'https://placehold.co/100x100/png?text=No+Image&font=roboto';
        }
        divImg.appendChild(img);
        tdImage.appendChild(divImg);
        tr.appendChild(tdImage);

        // Nama Menu cell
        const tdNama = document.createElement('td');
        tdNama.className = 'py-3 px-4';
        tdNama.innerHTML = `<p class="font-medium">${namaMenu}</p><p class="text-xs text-gray-400">ID: M-${Date.now()}</p>`;
        tr.appendChild(tdNama);

        // Kategori cell
        const tdKategori = document.createElement('td');
        tdKategori.className = 'py-3 px-4';
        const spanKategori = document.createElement('span');
        spanKategori.className = 'badge badge-outline py-1 px-2 text-xs';
        switch (kategori) {
            case 'Makanan':
                spanKategori.classList.add('badge-primary');
                break;
            case 'Minuman Dingin':
                spanKategori.classList.add('badge-info');
                break;
            case 'Minuman Panas':
                spanKategori.classList.add('badge-warning');
                break;
            case 'Snack':
                spanKategori.classList.add('badge-accent');
                break;
            default:
                spanKategori.classList.add('badge-secondary');
        }
        spanKategori.textContent = kategori;
        tdKategori.appendChild(spanKategori);
        tr.appendChild(tdKategori);

        // Harga cell
        const tdHarga = document.createElement('td');
        tdHarga.className = 'py-3 px-4 font-medium';
        tdHarga.textContent = `Rp ${Number(harga).toLocaleString('id-ID')}`;
        tr.appendChild(tdHarga);

        // Stok cell
        const tdStok = document.createElement('td');
        tdStok.className = 'py-3 px-4';
        const divStok = document.createElement('div');
        divStok.className = 'flex items-center gap-2';
        const spanStok = document.createElement('span');
        spanStok.textContent = stok;
        const btnEditStok = document.createElement('button');
        btnEditStok.className = 'btn btn-circle btn-xs btn-ghost text-gray-400 hover:text-primary';
        btnEditStok.setAttribute('aria-label', `Edit stok ${namaMenu}`);
        btnEditStok.innerHTML = '<i class="fas fa-edit"></i>';
        divStok.appendChild(spanStok);
        divStok.appendChild(btnEditStok);
        tdStok.appendChild(divStok);
        tr.appendChild(tdStok);

        // Terjual cell (default 0)
        const tdTerjual = document.createElement('td');
        tdTerjual.className = 'py-3 px-4';
        tdTerjual.innerHTML = `<span class="font-medium">0</span><span class="text-xs text-gray-400 ml-1">(30d)</span>`;
        tr.appendChild(tdTerjual);

        // Status cell (default Tersedia)
        const tdStatus = document.createElement('td');
        tdStatus.className = 'py-3 px-4';
        const spanStatus = document.createElement('span');
        spanStatus.className = 'badge badge-success text-white py-1 px-2 text-xs';
        spanStatus.textContent = 'Tersedia';
        tdStatus.appendChild(spanStatus);
        tr.appendChild(tdStatus);

        // Aksi cell
        const tdAksi = document.createElement('td');
        tdAksi.className = 'py-3 px-4';
        const divAksi = document.createElement('div');
        divAksi.className = 'flex space-x-1';
        const btnEdit = document.createElement('button');
        btnEdit.className = 'btn btn-circle btn-xs btn-ghost text-blue-500';
        btnEdit.setAttribute('aria-label', `Edit ${namaMenu}`);
        btnEdit.innerHTML = '<i class="fas fa-pen"></i>';
        const btnDelete = document.createElement('button');
        btnDelete.className = 'btn btn-circle btn-xs btn-ghost text-red-500';
        btnDelete.setAttribute('aria-label', `Hapus ${namaMenu}`);
        btnDelete.innerHTML = '<i class="fas fa-trash"></i>';
        divAksi.appendChild(btnEdit);
        divAksi.appendChild(btnDelete);
        tdAksi.appendChild(divAksi);
        tr.appendChild(tdAksi);

        tbody.appendChild(tr);

        alert('Menu berhasil ditambahkan!');

        // Close modal and reset form
        document.getElementById('add_menu_modal').close();
        resetForm();
    });

    // Reset form and image preview
    function resetForm() {
        const form = document.getElementById('add_menu_form');
        form.reset();
        imagePreview.src = '';
        imagePreview.style.display = 'none';
        uploadArea.classList.add('border-dashed', 'border-gray-300');
        uploadArea.classList.remove('border-solid', 'border-primary');
        uploadArea.querySelector('i').style.display = 'block';
        uploadArea.querySelectorAll('p').forEach(p => p.style.display = 'block');
    }

    // Close modal button
    document.getElementById('close_modal_btn').addEventListener('click', () => {
        document.getElementById('add_menu_modal').close();
        resetForm();
    });
</script>

</html>