<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Manajemen Meja</title>

    <!-- Tailwind + DaisyUI -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .status-badge {
            padding-left: 0.5rem;
            padding-right: 0.5rem;
            padding-top: 0.25rem;
            padding-bottom: 0.25rem;
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 9999px;
            display: inline-block;
        }

        .status-tersedia {
            background-color: #d1fae5;
            color: #065f46;
        }

        .status-terpesan {
            background-color: #fef3c7;
            color: #92400e;
        }

        .status-digunakan {
            background-color: #dbeafe;
            color: #1e40af;
        }

        .status-maintenance {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .table-row-hover:hover {
            background-color: #f9fafb;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body x-data="mejaManagement" class="bg-gray-100 font-sans">

    <div class="flex flex-col md:flex-row h-screen overflow-hidden">
        <!-- Sidebar -->
        <x-sidebar class="w-full md:w-64 flex-shrink-0"></x-sidebar>

        <!-- Main Content -->
        <div class="flex-1 overflow-y-auto overflow-x-hidden p-4 md:p-6">
            <!-- Profile -->
            <x-profile class="mb-4"></x-profile>

            <div class="container mx-auto pt-7">
                <!-- Header -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Manajemen Meja</h1>
                    <div class="pt-3">
                        <button @click="showAddModal = true" class="btn btn-primary">
                            <i class="fas fa-plus mr-2"></i> Tambah Meja
                        </button>
                    </div>
                </div>

                <!-- Notifikasi -->
                @if (session('success'))
                    <div
                        class="flex items-center gap-3 bg-gradient-to-r from-green-400 to-emerald-500 text-white px-6 py-4 rounded-lg shadow-lg mb-6 animate__animated animate__fadeInDown">
                        <i class="fas fa-check-circle text-2xl"></i>
                        <span class="font-semibold text-base">{{ session('success') }}</span>
                        <button class="ml-auto text-white hover:text-green-100 focus:outline-none"
                            onclick="this.parentElement.style.display='none'">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                <!-- Filter dan Pencarian -->
                <div class="bg-white rounded-lg shadow p-4 mb-6">
                    <form id="filterForm" method="GET" action="{{ route('admin.meja') }}"
                        class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <!-- Pencarian -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Cari Meja</span>
                            </label>
                            <div class="relative">
                                <input type="text" name="search" placeholder="Cari nama atau lokasi..."
                                    class="input input-bordered w-full pl-10" value="{{ request('search') }}">
                                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                            </div>
                        </div>

                        <!-- Filter Status -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Status</span>
                            </label>
                            <select name="status" class="select select-bordered">
                                <option value="">Semua Status</option>
                                @foreach (App\Models\Meja::$statusOptions as $key => $value)
                                    <option value="{{ $key }}"
                                        {{ request('status') == $key ? 'selected' : '' }}>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Filter Kapasitas -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Kapasitas</span>
                            </label>
                            <select name="capacity" class="select select-bordered">
                                <option value="">Semua Kapasitas</option>
                                <option value="1-2" {{ request('capacity') == '1-2' ? 'selected' : '' }}>1-2 Orang
                                </option>
                                <option value="3-4" {{ request('capacity') == '3-4' ? 'selected' : '' }}>3-4 Orang
                                </option>
                                <option value="5+" {{ request('capacity') == '5+' ? 'selected' : '' }}>5+ Orang
                                </option>
                            </select>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="form-control self-end">
                            <div class="flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-filter mr-2"></i> Filter
                                </button>
                                <a href="{{ route('admin.meja') }}" class="btn btn-ghost">
                                    <i class="fas fa-sync-alt mr-2"></i> Reset
                                </a>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 hidden md:table-header-group">
                                <tr>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Kapasitas</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Lokasi</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Dibuat</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Diperbarui</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($meja as $m)
                                    <tr x-data="{ expanded: false }" class="hover:bg-gray-50">
                                        <!-- Mobile View - Enhanced Nama Column -->
                                        <td class="px-4 py-4">
                                            <!-- Label "Nama" for mobile -->
                                            <div class="md:hidden font-medium text-gray-500 mb-1">Nama</div>

                                            <!-- Clickable content -->
                                            <div @click="expanded = !expanded"
                                                class="flex items-center justify-between cursor-pointer md:cursor-auto">
                                                <span class="font-medium">{{ $m->nama }}</span>
                                                <i class="fas fa-chevron-down text-gray-400 transition-transform duration-200 md:hidden"
                                                    :class="{ 'rotate-180': expanded }"></i>
                                            </div>

                                            <!-- Expanded Content - Mobile Only -->
                                            <div x-show="expanded" x-collapse class="mt-3 space-y-3 md:hidden">
                                                <div class="grid grid-cols-2 gap-4">
                                                    <div>
                                                        <p class="text-sm font-medium text-gray-500">Kapasitas</p>
                                                        <p>{{ $m->kapasitas }} orang</p>
                                                    </div>
                                                    <div>
                                                        <p class="text-sm font-medium text-gray-500">Lokasi</p>
                                                        <p>{{ $m->lokasi }}</p>
                                                    </div>
                                                    <div>
                                                        <p class="text-sm font-medium text-gray-500">Status</p>
                                                        <span
                                                            class="status-badge 
                                        @if ($m->status == 'tersedia') status-tersedia
                                        @elseif($m->status == 'terpesan') status-terpesan
                                        @elseif($m->status == 'sedang digunakan') status-digunakan
                                        @else status-maintenance @endif">
                                                            {{ $m->status_label ?? (\App\Models\Meja::$statusOptions[$m->status] ?? ucfirst($m->status)) }}
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <p class="text-sm font-medium text-gray-500">Dibuat</p>
                                                        <p>{{ $m->created_at ? $m->created_at->timezone('Asia/Jakarta')->format('d-m-Y H:i:s') : '-' }}
                                                        </p>
                                                    </div>
                                                    <div>
                                                        <p class="text-sm font-medium text-gray-500">Diperbarui</p>
                                                        <p>{{ $m->updated_at ? $m->updated_at->timezone('Asia/Jakarta')->format('d-m-Y H:i:s') : '-' }}
                                                        </p>
                                                    </div>
                                                    <div class="col-span-2">
                                                        <p class="text-sm font-medium text-gray-500">Aksi</p>
                                                        <div class="flex flex-wrap gap-2 mt-1">
                                                            <button @click.stop="showDetail({{ $m->id }})"
                                                                class="btn btn-sm btn-info">
                                                                <i class="fas fa-eye mr-1"></i> Detail
                                                            </button>
                                                            <button @click.stop="editMeja({{ json_encode($m) }})"
                                                                class="btn btn-sm btn-warning">
                                                                <i class="fas fa-edit mr-1"></i> Edit
                                                            </button>
                                                            <form id="delete-form-{{ $m->id }}"
                                                                action="{{ route('admin.meja.destroy', $m->id) }}"
                                                                method="POST" class="inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button"
                                                                    onclick="confirmDelete({{ $m->id }})"
                                                                    class="btn btn-sm btn-error">
                                                                    <i class="fas fa-trash mr-1"></i> Hapus
                                                                </button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Desktop Columns -->
                                        <td class="px-4 py-4 hidden md:table-cell">{{ $m->kapasitas }} orang</td>
                                        <td class="px-4 py-4 hidden md:table-cell">{{ $m->lokasi }}</td>
                                        <td class="px-4 py-4 hidden md:table-cell">
                                            <span
                                                class="status-badge 
                            @if ($m->status == 'tersedia') status-tersedia
                            @elseif($m->status == 'terpesan') status-terpesan
                            @elseif($m->status == 'sedang digunakan') status-digunakan
                            @else status-maintenance @endif">
                                                {{ $m->status_label ?? (\App\Models\Meja::$statusOptions[$m->status] ?? ucfirst($m->status)) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-4 hidden md:table-cell">
                                            {{ $m->created_at ? $m->created_at->timezone('Asia/Jakarta')->format('d-m-Y H:i:s') : '-' }}
                                        </td>
                                        <td class="px-4 py-4 hidden md:table-cell">
                                            {{ $m->updated_at ? $m->updated_at->timezone('Asia/Jakarta')->format('d-m-Y H:i:s') : '-' }}
                                        </td>
                                        <td class="px-4 py-4 hidden md:table-cell">
                                            <div class="flex flex-wrap gap-2">
                                                <button @click="showDetail({{ $m->id }})"
                                                    class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button @click="editMeja({{ json_encode($m) }})"
                                                    class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <form id="delete-form-{{ $m->id }}"
                                                    action="{{ route('admin.meja.destroy', $m->id) }}" method="POST"
                                                    class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                        onclick="confirmDelete({{ $m->id }})"
                                                        class="btn btn-sm btn-error">
                                                        <i class="fas fa-trash mr-1"></i>
                                                    </button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                                            <div class="flex flex-col items-center justify-center">
                                                <i class="fas fa-inbox text-4xl mb-3 text-gray-400"></i>
                                                <p class="text-lg">Tidak ada data meja</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if ($meja->hasPages())
                        <div class="px-6 py-3 border-t border-gray-200">
                            {{ $meja->appends(request()->query())->links() }}
                        </div>
                    @endif
                </div>

                <!-- Modal Tambah Meja -->
                <div x-show="showAddModal" x-cloak
                    class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center p-4 z-50">
                    <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full max-h-screen overflow-y-auto"
                        @click.away="showAddModal = false">
                        <form action="{{ route('admin.meja.store') }}" method="POST" enctype="multipart/form-data"
                            class="p-6">
                            @csrf
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-bold">Tambah Meja</h3>
                                <button type="button" @click="showAddModal = false"
                                    class="text-gray-400 hover:text-gray-600">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Nama Meja <span class="text-red-500">*</span></span>
                                    </label>
                                    <input type="text" name="nama" class="input input-bordered" required>
                                </div>

                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Kapasitas <span class="text-red-500">*</span></span>
                                    </label>
                                    <input type="number" name="kapasitas" min="1"
                                        class="input input-bordered" required>
                                </div>

                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Lokasi <span class="text-red-500">*</span></span>
                                    </label>
                                    <select name="lokasi" class="select select-bordered" required>
                                        <option value="Lantai 1">Lantai 1</option>
                                        <option value="Lantai 2">Lantai 2</option>
                                        <option value="Teras">Teras</option>
                                        <option value="VIP Room">VIP Room</option>
                                    </select>
                                </div>

                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Status <span class="text-red-500">*</span></span>
                                    </label>
                                    <select name="status" class="select select-bordered" required>
                                        @foreach (\App\Models\Meja::$statusOptions as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-control md:col-span-2">
                                    <label class="label">
                                        <span class="label-text">Foto Meja</span>
                                    </label>
                                    <input type="file" name="foto" accept="image/*"
                                        class="file-input file-input-bordered w-full">
                                    @error('foto')
                                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-control md:col-span-2">
                                    <label class="label">
                                        <span class="label-text">Deskripsi</span>
                                    </label>
                                    <textarea name="deskripsi" class="textarea textarea-bordered h-24"></textarea>
                                </div>
                            </div>

                            <div class="flex justify-end gap-2 mt-6">
                                <button type="button" @click="showAddModal = false"
                                    class="btn btn-ghost">Batal</button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save mr-2"></i> Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Modal Edit Meja -->
                <div x-show="showEditModal" x-cloak
                    class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center p-4 z-50">
                    <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full max-h-screen overflow-y-auto"
                        @click.away="showEditModal = false">
                        <form x-bind:action="'/admin/meja/' + currentMeja.id" method="POST" class="p-6">
                            @csrf
                            @method('PUT')
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-bold">Edit Meja</h3>
                                <button type="button" @click="showEditModal = false"
                                    class="text-gray-400 hover:text-gray-600">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Nama Meja <span class="text-red-500">*</span></span>
                                    </label>
                                    <input type="text" name="nama" x-model="currentMeja.nama"
                                        class="input input-bordered" required>
                                </div>

                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Kapasitas <span class="text-red-500">*</span></span>
                                    </label>
                                    <input type="number" name="kapasitas" x-model="currentMeja.kapasitas"
                                        min="1" class="input input-bordered" required>
                                </div>

                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Lokasi <span class="text-red-500">*</span></span>
                                    </label>
                                    <select name="lokasi" x-model="currentMeja.lokasi"
                                        class="select select-bordered" required>
                                        <option value="Lantai 1">Lantai 1</option>
                                        <option value="Lantai 2">Lantai 2</option>
                                        <option value="Teras">Teras</option>
                                        <option value="VIP Room">VIP Room</option>
                                    </select>
                                </div>

                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Status <span class="text-red-500">*</span></span>
                                    </label>
                                    <select name="status" x-model="currentMeja.status"
                                        class="select select-bordered" required>
                                        @foreach (\App\Models\Meja::$statusOptions as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-control md:col-span-2">
                                    <label class="label">
                                        <span class="label-text">Foto Meja</span>
                                    </label>
                                    <input type="file" name="foto" accept="image/*"
                                        class="file-input file-input-bordered w-full">
                                    <!-- Tampilkan foto lama jika ada -->
                                    <template x-if="currentMeja.foto">
                                        <div class="mt-2">
                                            <img :src="currentMeja.foto.startsWith('http') ? currentMeja.foto : '/storage/' +
                                                currentMeja.foto"
                                                alt="Foto Meja" class="w-64 h-40 object-cover rounded border">
                                            <p class="text-xs text-gray-500 mt-1">Foto saat ini</p>
                                        </div>
                                    </template>
                                    @error('foto')
                                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-control md:col-span-2">
                                    <label class="label">
                                        <span class="label-text">Deskripsi</span>
                                    </label>
                                    <textarea name="deskripsi" x-model="currentMeja.deskripsi" class="textarea textarea-bordered h-24"></textarea>
                                </div>
                            </div>

                            <div class="flex justify-end gap-2 mt-6">
                                <button type="button" @click="showEditModal = false"
                                    class="btn btn-ghost">Batal</button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save mr-2"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div x-show="showDetailModal" x-cloak x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-200 transform"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                    class="fixed inset-0 bg-black/40 flex items-center justify-center z-50 p-4">

                    <!-- Modal Card -->
                    <div class="bg-white/90 backdrop-blur-md rounded-2xl shadow-xl border border-gray-200 w-full max-w-md overflow-hidden"
                        @click.away="showDetailModal = false">

                        <!-- Header -->
                        <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200">
                            <h3 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                                <i class="fas fa-couch text-blue-500"></i> Informasi Meja
                            </h3>
                            <button @click="showDetailModal = false"
                                class="text-gray-400 hover:text-gray-600 transition text-xl">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <!-- Menampilkan Gambar -->
                        <template x-if="currentMeja.foto">
                            <img :src="currentMeja.foto" alt="Foto Meja"
                                class="w-full h-64 object-cover bg-gray-100 rounded-none">
                        </template>

                        <template x-if="!currentMeja.foto">
                            <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                                <i class="fas fa-couch text-gray-400 text-5xl"></i>
                            </div>
                        </template>


                        <!-- Body -->
                        <div class="px-6 py-5 space-y-4 text-sm text-gray-700">
                            <div class="flex items-start gap-3">
                                <i class="fas fa-chair text-blue-400 mt-0.5"></i>
                                <div>
                                    <p class="text-gray-500 text-xs">Nama Meja</p>
                                    <p class="font-semibold text-base" x-text="currentMeja.nama || '-'"></p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <i class="fas fa-users text-green-400 mt-0.5"></i>
                                <div>
                                    <p class="text-gray-500 text-xs">Kapasitas</p>
                                    <p class="font-semibold text-base"
                                        x-text="(currentMeja.kapasitas || 0) + ' Orang'"></p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <i class="fas fa-map-marker-alt text-red-400 mt-0.5"></i>
                                <div>
                                    <p class="text-gray-500 text-xs">Lokasi Penempatan</p>
                                    <p class="font-semibold text-base" x-text="currentMeja.lokasi || '-'"></p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <i class="fas fa-info-circle text-yellow-400 mt-0.5"></i>
                                <div>
                                    <p class="text-gray-500 text-xs">Status Meja</p>
                                    <span x-text="currentMeja.status_label || currentMeja.status || '-'"
                                        class="inline-block mt-1 px-3 py-1 rounded-full text-xs font-semibold tracking-wide"
                                        :class="{
                                            'bg-green-100 text-green-700': currentMeja.status === 'tersedia',
                                            'bg-yellow-100 text-yellow-700': currentMeja.status === 'terpesan',
                                            'bg-blue-100 text-blue-700': currentMeja.status === 'sedang digunakan',
                                            'bg-red-100 text-red-700': currentMeja.status === 'maintenance'
                                        }"></span>
                                </div>
                            </div>

                            <template x-if="currentMeja.deskripsi">
                                <div class="flex items-start gap-3">
                                    <i class="fas fa-align-left text-purple-400 mt-0.5"></i>
                                    <div>
                                        <p class="text-gray-500 text-xs">Deskripsi Singkat</p>
                                        <p class="text-gray-800 mt-1 leading-relaxed text-sm"
                                            x-text="currentMeja.deskripsi"></p>
                                    </div>
                                </div>
                            </template>
                        </div>

                        <!-- Footer -->
                        <div class="px-6 py-4 bg-white/80 border-t flex justify-end">
                            <button @click="showDetailModal = false"
                                class="bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-blue-600 hover:to-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-medium shadow-md transition-all duration-200">
                                Tutup
                            </button>
                        </div>
                    </div>
                </div>


                <script>
                    document.addEventListener('alpine:init', () => {
                        Alpine.data('mejaManagement', () => ({
                            showAddModal: false,
                            showEditModal: false,
                            showDetailModal: false,

                            currentMeja: {
                                id: '',
                                nama: '',
                                kapasitas: '',
                                lokasi: '',
                                status: '',
                                foto: '',
                                deskripsi: '',
                                status_label: ''
                            },

                            editUrl: '',

                            // Ambil data meja via API (by ID)
                            showDetail(id) {
                                fetch(`/meja/${id}`)
                                    .then(res => res.json())
                                    .then(data => {
                                        console.log('DATA DARI SERVER:', data);
                                        this.currentMeja = data;
                                        this.showDetailModal = true;
                                    })
                                    .catch(err => console.error('Gagal ambil data meja:', err));
                            },

                            // Edit langsung berdasarkan objek meja
                            editMeja(meja) {
                                this.currentMeja = {
                                    id: meja.id,
                                    nama: meja.nama,
                                    kapasitas: meja.kapasitas,
                                    lokasi: meja.lokasi,
                                    status: meja.status,
                                    foto: meja.foto || '',
                                    deskripsi: meja.deskripsi || '',
                                    status_label: meja.status_label || ''
                                };
                                this.editUrl = `/admin/meja/${meja.id}`;
                                this.showEditModal = true;
                            }
                        }));
                    });

                    window.editMeja = function(data) {
                        Alpine.store('editModal').editingMeja = data;
                        Alpine.store('editModal').showEditModal = true;
                    };
                    window.showDetail = function(id) {
                        console.log('Showing detail for meja:', id);
                    };
                    document.addEventListener('alpine:init', () => {
                        Alpine.store('editModal', {
                            showEditModal: false,
                            editingMeja: null
                        });
                    });

                    // Alert saat delet meja
                    function confirmDelete(id) {
                        Swal.fire({
                            title: 'Yakin ingin menghapus?',
                            text: "Data meja akan dihapus secara permanen!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#dc2626',
                            cancelButtonColor: '#f3f4f6',
                            confirmButtonText: '<span class="text-white">Ya, hapus!</span>',
                            cancelButtonText: '<span class="text-gray-700">Batal</span>',
                            customClass: {
                                confirmButton: 'swal2-confirm btn btn-error',
                                cancelButton: 'swal2-cancel btn btn-ghost'
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('delete-form-' + id).submit();
                            }
                        });
                    }
                </script>
</body>

</html>
