<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        .modal-overlay {
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(3px);
        }

        .animate-fade {
            animation: fadeIn 0.3s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .role-badge {
            @apply px-2 py-1 rounded-full text-xs font-medium whitespace-nowrap;
        }

        .role-admin {
            @apply bg-red-100 text-red-800;
        }

        .role-pengguna {
            @apply bg-blue-100 text-blue-800;
        }

        @media (max-width: 640px) {
            .table-responsive {
                display: block;
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen font-sans" x-data="userManagement()">
    <div class="flex flex-col md:flex-row h-screen overflow-hidden">
        <!-- Sidebar -->
        <x-sidebar class="w-full md:w-64 flex-shrink-0"></x-sidebar>

        <!-- Main Content -->
        <div class="flex-1 overflow-y-auto overflow-x-hidden p-4 md:p-6">
            <!-- Profile -->
            <x-profile class="mb-4"></x-profile>

            <div class="pt-7 container mx-auto">
                <!-- Header -->
                <div class="bg-white rounded-lg shadow p-4 md:p-6 mb-4 md:mb-6">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-3">
                        <div>
                            <h1 class="text-xl md:text-2xl font-bold text-indigo-700">
                                <i class="fas fa-users mr-2"></i>Manajemen Pengguna
                            </h1>
                            <p class="text-gray-600 text-sm md:text-base">
                                Total: <span x-text="users.length"></span> pengguna |
                                Admin: <span x-text="users.filter(u => u.role === 'admin').length"></span> |
                                Pengguna: <span x-text="users.filter(u => u.role === 'pengguna').length"></span>
                            </p>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                            <select x-model="roleFilter"
                                class="w-full md:w-40 px-3 py-2 border rounded-lg text-sm md:text-base">
                                <option value="">Semua Role</option>
                                <option value="admin">Admin</option>
                                <option value="pengguna">Pengguna</option>
                            </select>
                            <button @click="openModal('add')"
                                class="w-full md:w-auto bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition-all text-sm md:text-base">
                                <i class="fas fa-plus mr-2"></i>Tambah Pengguna
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Notifikasi -->
                @if (session('success'))
                    <div
                        class="bg-green-100 border-l-4 border-green-500 text-green-700 p-3 md:p-4 mb-4 md:mb-6 rounded text-sm md:text-base">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle mr-2"></i>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                <!-- Tabel Pengguna -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="table-responsive">
                        <table class="w-full">
                            <thead class="bg-indigo-600 text-white">
                                <tr>
                                    <th class="p-2 md:p-4 text-left text-sm md:text-base">Nama</th>
                                    <th class="p-2 md:p-4 text-left text-sm md:text-base hidden md:table-cell">Username
                                    </th>
                                    <th class="p-2 md:p-4 text-left text-sm md:text-base hidden sm:table-cell">Email
                                    </th>
                                    <th class="p-2 md:p-4 text-left text-sm md:text-base hidden lg:table-cell">Telepon
                                    </th>
                                    <th class="p-2 md:p-4 text-left text-sm md:text-base">Role</th>
                                    <th class="p-2 md:p-4 text-left text-sm md:text-base hidden xl:table-cell">Dibuat
                                    </th>
                                    <th class="p-2 md:p-4 text-center text-sm md:text-base">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <template x-for="user in filteredUsers" :key="user.id">
                                    <tr class="hover:bg-indigo-50 transition-colors">
                                        <td class="p-2 md:p-4 text-sm md:text-base">
                                            <div class="font-medium" x-text="user.nama"></div>
                                            <div class="text-gray-500 text-xs md:hidden" x-text="user.username"></div>
                                            <div class="text-gray-500 text-xs sm:hidden" x-text="user.email"></div>
                                        </td>
                                        <td class="p-2 md:p-4 text-sm md:text-base hidden md:table-cell"
                                            x-text="user.username"></td>
                                        <td class="p-2 md:p-4 text-sm md:text-base hidden sm:table-cell"
                                            x-text="user.email"></td>
                                        <td class="p-2 md:p-4 text-sm md:text-base hidden lg:table-cell"
                                            x-text="user.nomor_telepon || '-'"></td>
                                        <td class="p-2 md:p-4 text-sm md:text-base">
                                            <span class="role-badge"
                                                :class="user.role === 'admin' ? 'role-admin' : 'role-pengguna'"
                                                x-text="user.role"></span>
                                        </td>
                                        <td class="p-2 md:p-4 text-sm md:text-base hidden xl:table-cell"
                                            x-text="formatDate(user.dibuat_pada)"></td>
                                        <td class="p-2 md:p-4 text-center">
                                            <div class="flex justify-center space-x-1 md:space-x-3">
                                                <button @click="openModal('edit', user)"
                                                    class="text-yellow-600 hover:text-yellow-800 text-sm md:text-base">
                                                    <i class="fas fa-edit"></i>
                                                    <span class="md:hidden ml-1">Edit</span>
                                                </button>
                                                <button @click="confirmDelete(user)"
                                                    class="text-red-600 hover:text-red-800 text-sm md:text-base">
                                                    <i class="fas fa-trash"></i>
                                                    <span class="md:hidden ml-1">Hapus</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Modal Form -->
                <div id="userModal" class="fixed inset-0 z-50 flex items-center justify-center modal-overlay hidden">
                    <div
                        class="bg-white rounded-xl shadow-xl w-full max-w-md mx-4 animate-fade max-h-[90vh] overflow-y-auto">
                        <div class="p-4 md:p-6 border-b">
                            <h2 id="modalTitle" class="text-lg md:text-xl font-semibold text-gray-800"></h2>
                        </div>
                        <form id="userForm" method="POST" class="p-4 md:p-6">
                            @csrf
                            <input type="hidden" id="formMethod" name="_method" value="POST">
                            <input type="hidden" id="userId" name="id" value="">

                            <div class="space-y-3 md:space-y-4">
                                <div>
                                    <label class="block text-sm md:text-base font-medium text-gray-700 mb-1">Nama
                                        Lengkap</label>
                                    <input type="text" name="nama" id="nama" required
                                        class="w-full px-3 md:px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm md:text-base">
                                </div>
                                <div>
                                    <label
                                        class="block text-sm md:text-base font-medium text-gray-700 mb-1">Username</label>
                                    <input type="text" name="username" id="username" required
                                        class="w-full px-3 md:px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm md:text-base">
                                </div>
                                <div>
                                    <label
                                        class="block text-sm md:text-base font-medium text-gray-700 mb-1">Email</label>
                                    <input type="email" name="email" id="email" required
                                        class="w-full px-3 md:px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm md:text-base">
                                </div>
                                <div>
                                    <label class="block text-sm md:text-base font-medium text-gray-700 mb-1">Nomor
                                        Telepon</label>
                                    <input type="text" name="nomor_telepon" id="nomor_telepon"
                                        class="w-full px-3 md:px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm md:text-base">
                                </div>
                                <div>
                                    <label
                                        class="block text-sm md:text-base font-medium text-gray-700 mb-1">Role</label>
                                    <select name="role" id="role"
                                        class="w-full px-3 md:px-4 py-2 border rounded-lg text-sm md:text-base">
                                        <option value="pengguna">Pengguna</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                                <div id="passwordField">
                                    <label
                                        class="block text-sm md:text-base font-medium text-gray-700 mb-1">Password</label>
                                    <input type="password" name="password" id="password"
                                        class="w-full px-3 md:px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm md:text-base">
                                    <small id="passwordHelp" class="text-xs text-gray-500">Kosongkan jika tidak ingin
                                        mengubah password</small>
                                </div>
                            </div>
                            <div class="flex justify-end space-x-2 md:space-x-3 mt-4 md:mt-6 pt-3 md:pt-4 border-t">
                                <button type="button" onclick="closeModal()"
                                    class="px-3 md:px-4 py-1 md:py-2 text-gray-600 hover:text-gray-800 text-sm md:text-base">
                                    Batal
                                </button>
                                <button type="submit"
                                    class="px-3 md:px-4 py-1 md:py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors text-sm md:text-base">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Modal Konfirmasi Hapus -->
                <div id="deleteModal"
                    class="fixed inset-0 z-50 flex items-center justify-center modal-overlay hidden">
                    <div class="bg-white rounded-xl shadow-xl w-full max-w-md mx-4 animate-fade">
                        <div class="p-4 md:p-6 border-b">
                            <h2 class="text-lg md:text-xl font-semibold text-gray-800">Konfirmasi Hapus</h2>
                        </div>
                        <div class="p-4 md:p-6">
                            <p class="text-gray-700 text-sm md:text-base">Anda yakin ingin menghapus pengguna <span
                                    id="deleteUserName" class="font-semibold"></span>?</p>
                            <form id="deleteForm" method="POST" class="mt-4 md:mt-6 pt-3 md:pt-4 border-t">
                                @csrf
                                @method('DELETE')
                                <div class="flex justify-end space-x-2 md:space-x-3">
                                    <button type="button" onclick="closeDeleteModal()"
                                        class="px-3 md:px-4 py-1 md:py-2 text-gray-600 hover:text-gray-800 text-sm md:text-base">
                                        Batal
                                    </button>
                                    <button type="submit"
                                        class="px-3 md:px-4 py-1 md:py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors text-sm md:text-base">
                                        Hapus
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('userManagement', () => ({
                users: @json($pengguna),
                roleFilter: '',

                get filteredUsers() {
                    if (!this.roleFilter) return this.users;
                    return this.users.filter(user => user.role === this.roleFilter);
                },

                formatDate(dateString) {
                    if (!dateString) return '-';
                    const date = new Date(dateString);
                    return date.toLocaleDateString('id-ID', {
                        day: '2-digit',
                        month: '2-digit',
                        year: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                },

                openModal(mode, user = null) {
                    const modal = document.getElementById('userModal');
                    const form = document.getElementById('userForm');
                    const title = document.getElementById('modalTitle');
                    const passwordField = document.getElementById('passwordField');
                    const passwordHelp = document.getElementById('passwordHelp');

                    if (mode === 'edit' && user) {
                        title.textContent = 'Edit Pengguna';
                        document.getElementById('formMethod').value = 'PUT';
                        document.getElementById('userId').value = user.id;
                        document.getElementById('nama').value = user.nama;
                        document.getElementById('username').value = user.username;
                        document.getElementById('email').value = user.email;
                        document.getElementById('nomor_telepon').value = user.nomor_telepon || '';
                        document.getElementById('role').value = user.role;
                        passwordField.classList.remove('hidden');
                        passwordHelp.classList.remove('hidden');
                        document.getElementById('password').required = false;
                        form.action = `/admin/pengguna/${user.id}`;
                    } else {
                        title.textContent = 'Tambah Pengguna';
                        document.getElementById('formMethod').value = 'POST';
                        document.getElementById('userId').value = '';
                        form.reset();
                        passwordField.classList.remove('hidden');
                        passwordHelp.classList.add('hidden');
                        document.getElementById('password').required = true;
                        form.action = `/admin/pengguna`;
                    }

                    modal.classList.remove('hidden');
                },

                confirmDelete(user) {
                    document.getElementById('deleteUserName').textContent = user.nama;
                    document.getElementById('deleteForm').action = `/admin/pengguna/${user.id}`;
                    document.getElementById('deleteModal').classList.remove('hidden');
                }
            }));
        });

        function closeModal() {
            document.getElementById('userModal').classList.add('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        // Tutup modal saat klik di luar area modal
        window.onclick = function(event) {
            const userModal = document.getElementById('userModal');
            const deleteModal = document.getElementById('deleteModal');

            if (event.target === userModal) {
                closeModal();
            }

            if (event.target === deleteModal) {
                closeDeleteModal();
            }
        }
    </script>
</body>

</html>
