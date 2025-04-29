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
        <x-sidebar></x-sidebar>
        <!-- Main Content -->
        <div class="p-5 flex-1 overflow-y-auto overflow-x-hidden">
            <!-- Profile -->
            <x-profile></x-profile>
            <!-- Main Content -->
            <main class="flex-1 p-2">
                <div class="flex flex-col gap-2">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:gap-4 mt-2">
                        <div class="flex items-center flex-1 max-w-full">
                            <span class="relative w-full max-w-full">
                                <input type="search" placeholder="Search"
                                    class="w-full rounded-lg border border-gray-200 bg-white py-2 pl-10 pr-4 text-sm text-gray-500 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#2563EB]" />
                                <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                            </span>
                        </div>
                        <button type="button" onclick="document.getElementById('add_table_modal').showModal()"
                            class="mt-3 sm:mt-0 inline-flex items-center bg-[#2563EB] text-white text-sm font-semibold px-4 py-2 rounded hover:bg-[#1D4ED8] focus:outline-none focus:ring-2 focus:ring-[#2563EB]">
                            Tambah Meja
                        </button>
                    </div>
                </div>
                <div class="mt-5 bg-white rounded-lg shadow-sm p-4 overflow-x-auto">
                    <div id="tables-container" class="inline-grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-1 min-w-max">
                        <!-- Data meja akan ditambahkan di sini -->
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Add Table Modal -->
    <dialog id="add_table_modal" class="modal">
        <div class="modal-box w-11/12 max-w-3xl">
            <h3 class="font-bold text-lg">Tambah Meja Baru</h3>
            <div class="py-4">
                <form id="add-table-form" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Nama Meja</span>
                        </label>
                        <input type="text" id="table-name" placeholder="Contoh: Zetro Exclusive" class="input input-bordered w-full" required />
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Lantai</span>
                        </label>
                        <select id="table-floor" class="select select-bordered w-full" required>
                            <option value="" disabled selected>Pilih lantai</option>
                            <option value="Lantai 1">Lantai 1</option>
                            <option value="Lantai 2">Lantai 2</option>
                            <option value="Lantai 3">Lantai 3</option>
                        </select>
                    </div>
                    <div class="form-control md:col-span-2">
                        <label class="label">
                            <span class="label-text">Lokasi</span>
                        </label>
                        <textarea id="table-location" placeholder="Contoh: Zetro Billiard, Mitra Raya 2, Main Street, Galle" class="textarea textarea-bordered w-full" required></textarea>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Harga per Jam</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 transform -translate-y-1/2">Rp</span>
                            <input type="number" id="table-price" placeholder="35000" class="input input-bordered w-full pl-10" required />
                        </div>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Gambar Meja</span>
                        </label>
                        <input type="file" id="table-image" class="file-input file-input-bordered w-full" accept="image/*" />
                    </div>
                </form>
            </div>
            <div class="modal-action">
                <form method="dialog">
                    <button class="btn btn-ghost">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="addNewTable()">Simpan</button>
                </form>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

    <script>
        function addNewTable() {
            const name = document.getElementById('table-name').value;
            const floor = document.getElementById('table-floor').value;
            const location = document.getElementById('table-location').value;
            const price = document.getElementById('table-price').value;
            const imageInput = document.getElementById('table-image');

            if (!name || !floor || !location || !price) {
                alert('Harap isi semua field yang wajib diisi');
                return;
            }

            const tablesContainer = document.getElementById('tables-container');
            const newTableCard = document.createElement('div');
            newTableCard.className = 'w-[285px] h-[460px] rounded-lg border-2 border-gray-300 bg-white shadow-md overflow-hidden relative transform transition-all duration-300 hover:scale-[1.02] hover:shadow-lg hover:border-blue-500 hover:z-10';

            let imageUrl = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSa8Ty9cV274abHjuLEKzu9pA-cwQpkkpvXsA&s';
            if (imageInput.files && imageInput.files[0]) {
                imageUrl = URL.createObjectURL(imageInput.files[0]);
            }

            const deleteId = `delete_${Date.now()}`;

            newTableCard.innerHTML = `
                <div class="w-[265px] h-[280px] rounded-lg absolute top-[10px] left-[6px] bg-cover bg-center" style="background-image: url('${imageUrl}')">
                    <div class="absolute bottom-3 left-4 text-white">
                        <h3 class="text-xl font-bold">${name}</h3>
                        <p class="text-sm font-bold mt-1">${floor}</p>
                    </div>
                </div>
                <div class="absolute top-[300px] left-[18px]">
                    <p class="text-[#152c5b] text-base leading-relaxed">
                        ${location.replace(/\n/g, '<br>')}
                    </p>
                </div>
                <div class="absolute top-[380px] left-[18px] text-[#152c5b] text-base whitespace-nowrap">
                    Rp ${parseInt(price).toLocaleString('id-ID')} / Jam
                </div>
                <div class="absolute bottom-10 right-3 flex gap-2">
                    <button class="w-10 h-10 rounded-full bg-blue-100 hover:bg-blue-200 flex items-center justify-center transition-colors">
                        <i class="fas fa-pencil-alt text-blue-600 text-sm"></i>
                    </button>
                    <button onclick="document.getElementById('${deleteId}').showModal()" class="w-10 h-10 rounded-full bg-red-100 hover:bg-red-200 flex items-center justify-center transition-colors">
                        <i class="fas fa-trash-alt text-red-600 text-sm"></i>
                    </button>
                </div>
                <dialog id="${deleteId}" class="modal">
                    <div class="modal-box">
                        <h3 class="font-bold text-lg">Hapus Item?</h3>
                        <p class="py-4">Yakin ingin menghapus meja <strong>${name}</strong>?</p>
                        <div class="modal-action">
                            <form method="dialog">
                                <button class="btn">Batal</button>
                                <button type="button" class="btn btn-error text-white ml-2" onclick="this.closest('.modal').close(); this.closest('.modal').parentElement.remove();">Hapus</button>
                            </form>
                        </div>
                    </div>
                    <form method="dialog" class="modal-backdrop">
                        <button>close</button>
                    </form>
                </dialog>`;

            tablesContainer.appendChild(newTableCard);
            document.getElementById('add-table-form').reset();
            document.getElementById('add_table_modal').close();
        }
    </script>
</body>

</html>
