<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pilihan Menu</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
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
              class="input input-bordered w-full pl-10 pr-4 py-2 text-sm">
      </div>
      
      <!-- Kategori -->
      <select class="select select-bordered bg-white">
        <option selected>Semua Kategori</option>
        <option>Makanan</option>
        <option>Minuman Dingin</option>
        <option>Minuman Panas</option>
        <option>Snack</option>
      </select>
      
      <!-- Tambah Menu -->
      <button class="btn btn-primary" onclick="document.getElementById('add_menu_modal').showModal()">
        <i class="fas fa-plus mr-2"></i> Tambah Menu
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
        <tbody class="divide-y divide-gray-200">
          <!-- Menu 1 -->
          <tr class="hover:bg-gray-50">
            <td class="py-3 px-4">
              <div class="w-12 h-12 bg-gray-200 rounded-md overflow-hidden">
                <img src="https://via.placeholder.com/100" alt="Nasi Goreng" class="w-full h-full object-cover">
              </div>
            </td>
            <td class="py-3 px-4">
              <p class="font-medium">Nasi Goreng Spesial</p>
              <p class="text-xs text-gray-400">ID: F-001</p>
            </td>
            <td class="py-3 px-4">
              <span class="badge badge-outline badge-primary py-1 px-2 text-xs">Makanan</span>
            </td>
            <td class="py-3 px-4 font-medium">Rp 35.000</td>
            <td class="py-3 px-4">
              <div class="flex items-center gap-2">
                <span>12</span>
                <button class="btn btn-circle btn-xs btn-ghost text-gray-400 hover:text-primary">
                  <i class="fas fa-edit"></i>
                </button>
              </div>
            </td>
            <td class="py-3 px-4">
              <span class="font-medium">42</span>
              <span class="text-xs text-gray-400 ml-1">(30d)</span>
            </td>
            <td class="py-3 px-4">
              <span class="badge badge-success text-white py-1 px-2 text-xs">Tersedia</span>
            </td>
            <td class="py-3 px-4">
              <div class="flex space-x-1">
                <button class="btn btn-circle btn-xs btn-ghost text-blue-500" data-tip="Edit">
                  <i class="fas fa-pen"></i>
                </button>
                <button class="btn btn-circle btn-xs btn-ghost text-red-500" data-tip="Hapus">
                  <i class="fas fa-trash"></i>
                </button>
              </div>
            </td>
          </tr>
          
          <!-- Menu 2 -->
          <tr class="hover:bg-gray-50">
            <td class="py-3 px-4">
              <div class="w-12 h-12 bg-gray-200 rounded-md overflow-hidden">
                <img src="https://via.placeholder.com/100" alt="Es Teh" class="w-full h-full object-cover">
              </div>
            </td>
            <td class="py-3 px-4">
              <p class="font-medium">Es Teh Manis</p>
              <p class="text-xs text-gray-400">ID: D-005</p>
            </td>
            <td class="py-3 px-4">
              <span class="badge badge-outline badge-info py-1 px-2 text-xs">Minuman Dingin</span>
            </td>
            <td class="py-3 px-4 font-medium">Rp 15.000</td>
            <td class="py-3 px-4">
              <div class="flex items-center gap-2">
                <span class="text-red-500">0</span>
                <button class="btn btn-circle btn-xs btn-ghost text-gray-400 hover:text-primary">
                  <i class="fas fa-edit"></i>
                </button>
              </div>
            </td>
            <td class="py-3 px-4">
              <span class="font-medium">87</span>
              <span class="text-xs text-gray-400 ml-1">(30d)</span>
            </td>
            <td class="py-3 px-4">
              <span class="badge badge-error text-white py-1 px-2 text-xs">Habis</span>
            </td>
            <td class="py-3 px-4">
              <div class="flex space-x-1">
                <button class="btn btn-circle btn-xs btn-ghost text-blue-500">
                  <i class="fas fa-pen"></i>
                </button>
                <button class="btn btn-circle btn-xs btn-ghost text-red-500">
                  <i class="fas fa-trash"></i>
                </button>
              </div>
            </td>
          </tr>
          
          <!-- Menu 3 -->
          <tr class="hover:bg-gray-50">
            <td class="py-3 px-4">
              <div class="w-12 h-12 bg-gray-200 rounded-md overflow-hidden">
                <img src="https://via.placeholder.com/100" alt="Kopi" class="w-full h-full object-cover">
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
                <button class="btn btn-circle btn-xs btn-ghost text-gray-400 hover:text-primary">
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
                <button class="btn btn-circle btn-xs btn-ghost text-blue-500">
                  <i class="fas fa-pen"></i>
                </button>
                <button class="btn btn-circle btn-xs btn-ghost text-red-500">
                  <i class="fas fa-trash"></i>
                </button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    
    <!-- Pagination -->
    <div class="flex justify-between items-center p-4 border-t">
      <div class="text-sm text-gray-500">
        Menampilkan 1 sampai 3 dari 28 menu
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


  <!-- Modal Tambah Menu -->
<!-- Modal Tambah Menu -->
<dialog id="add_menu_modal" class="modal">
    <div class="modal-box w-full max-w-3xl">
        <h3 class="font-bold text-lg">Tambah Menu Baru</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
            <!-- Kolom Kiri -->
            <div class="space-y-4">
                <div>
                    <label class="label">Nama Menu</label>
                    <input type="text" placeholder="Contoh: Nasi Goreng Spesial" class="input input-bordered w-full">
                </div>

                <div>
                    <label class="label">Kategori</label>
                    <select class="select select-bordered w-full">
                        <option disabled selected>Pilih Kategori</option>
                        <option>Makanan</option>
                        <option>Minuman Dingin</option>
                        <option>Minuman Panas</option>
                        <option>Snack</option>
                    </select>
                </div>

                <div>
                    <label class="label">Harga</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2">Rp</span>
                        <input type="number" placeholder="35000" class="input input-bordered w-full pl-10">
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div class="space-y-4">
                <div>
                    <label class="label">Stok Awal</label>
                    <input type="number" placeholder="10" class="input input-bordered w-full">
                </div>

                <div>
                    <label class="label">Upload Gambar</label>
                    <div class="flex items-center justify-center w-full border-2 border-dashed border-gray-300 rounded-lg p-6 h-32">
                        <div class="text-center">
                            <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                            <p class="text-sm text-gray-500">Klik untuk upload gambar</p>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="label">Deskripsi</label>
                    <textarea class="textarea textarea-bordered w-full" placeholder="Tambahkan bahan atau keterangan..."></textarea>
                </div>
            </div>
        </div>

        <div class="modal-action flex justify-between gap-2">
            <button id="cancel_add_menu" class="btn btn-ghost">Batal</button>
            <button class="btn btn-primary">Simpan Menu</button>
        </div>
    </div>
</dialog>
 
  <!-- Modal Pesanan Aktif -->
  <dialog id="active_orders_modal" class="modal">
    <div class="modal-box max-w-4xl">
      <h3 class="font-bold text-lg flex items-center">
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
                    <img src="https://via.placeholder.com/100" class="w-full h-full object-cover">
                  </div>
                  <span>Nasi Goreng (x1)</span>
                </div>
              </td>
              <td class="py-2 px-3 text-sm text-gray-500">Pedas level 2</td>
              <td class="py-2 px-3">
                <span class="badge badge-warning text-white py-1 px-2 text-xs">Dalam Proses</span>
              </td>
              <td class="py-2 px-3">
                <button class="btn btn-xs btn-success">Selesai</button>
              </td>
            </tr>
            
            <!-- Pesanan 2 -->
            <tr>
              <td class="py-2 px-3 font-medium">3</td>
              <td class="py-2 px-3">
                <div class="flex items-center gap-2">
                  <div class="w-8 h-8 bg-gray-200 rounded-md overflow-hidden">
                    <img src="https://via.placeholder.com/100" class="w-full h-full object-cover">
                  </div>
                  <span>Es Teh (x2), Keripik Kentang (x1)</span>
                </div>
              </td>
              <td class="py-2 px-3 text-sm text-gray-500">Es sedikit</td>
              <td class="py-2 px-3">
                <span class="badge badge-primary text-white py-1 px-2 text-xs">Menunggu</span>
              </td>
              <td class="py-2 px-3">
                <button class="btn btn-xs btn-warning mr-1">Proses</button>
                <button class="btn btn-xs btn-ghost">Batal</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      
      <div class="modal-action">
        <button class="btn btn-ghost">Tutup</button>
      </div>
    </div>
  </dialog>
</main>
        </div>
    </div>
</body>
<script>
    // Menampilkan modal tambah menu
    document.getElementById("add_menu_button").addEventListener("click", function() {
        document.getElementById('add_menu_modal').showModal();
    });

    // Menutup modal tambah menu
    document.getElementById("cancel_add_menu").addEventListener("click", function() {
        document.getElementById('add_menu_modal').close();
    });

    // Menutup modal tambah menu saat klik luar modal
    document.getElementById('add_menu_modal').addEventListener('click', function(event) {
        if (event.target === document.getElementById('add_menu_modal')) {
            document.getElementById('add_menu_modal').close();
        }
    });
</script>

</html>
