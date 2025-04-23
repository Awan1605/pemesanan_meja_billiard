<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Management</title>
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- DaisyUI -->
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
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

            <!-- Role Filter -->
            <select
              class="inline-flex items-center bg-[#2563EB] text-white text-sm font-semibold px-4 py-2 rounded-lg hover:bg-neutral-content focus:outline-none focus:ring-2 focus:ring-[#2563EB] transition-colors">

              <option value="">All Roles</option>
              <option value="admin">Admin</option>
              <option value="owner">Owner</option>
              <option value="kasir">Kasir</option>
            </select>

            <!-- Status Filter -->
            <select
              class="inline-flex items-center bg-[#2563EB] text-white text-sm font-semibold px-4 py-2 rounded-lg hover:bg-info focus:outline-none focus:ring-2 focus:ring-[#2563EB] transition-colors">
              <option value="">All Status</option>
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
            </select>

            <!-- Add User Button -->
            <button
              class="inline-flex items-center bg-[#2563EB] text-white text-sm font-semibold px-4 py-2 rounded-lg hover:bg-[#1D4ED8] focus:outline-none focus:ring-2 focus:ring-[#2563EB] transition-colors">
              <i class="fas fa-plus mr-2"></i> Add User
            </button>
          </div>

          <!-- Additional Filters -->
          <div class="flex items-center gap-4 text-sm text-gray-700">
            <!-- Sort Dropdown -->
            <div class="dropdown dropdown-bottom">
              <label tabindex="0" class="flex items-center gap-1 hover:text-gray-900 cursor-pointer">
                <span>Sort by: Name</span>
                <i class="fas fa-chevron-down text-xl"></i>
              </label>
              <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-white rounded-box w-52 mt-1">
                <li><a>Name (A-Z)</a></li>
                <li><a>Name (Z-A)</a></li>
                <li><a>Newest</a></li>
                <li><a>Oldest</a></li>
              </ul>
            </div>

            <!-- Saved Search -->
            <div class="dropdown dropdown-bottom">
              <label tabindex="0" class="flex items-center gap-1 hover:text-gray-900 cursor-pointer">
                <span>Saved search</span>
                <i class="fas fa-chevron-down text-xl"></i>
              </label>
              <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-white rounded-box w-52 mt-1">
                <li><a>Active Admins</a></li>
                <li><a>Inactive Users</a></li>
                <li><a>Recently Added</a></li>
              </ul>
            </div>

            <button aria-label="Advanced filter" class="text-gray-600 hover:text-gray-900">
              <i class="fas fa-sliders-h"></i> Advanced
            </button>
          </div>
        </div>

        <!-- Table Section -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
          <!-- Bulk Actions (hidden by default) -->
          <div id="bulk-actions" class="hidden flex items-center justify-between p-4 border-b bg-gray-50">
            <div class="text-sm text-gray-500">
              <span id="selected-count">0</span> users selected
            </div>
            <div class="flex gap-2">
              <button class="btn btn-outline btn-sm gap-1">
                <i class="fas fa-ban"></i> Deactivate
              </button>
              <button class="btn btn-outline btn-error btn-sm gap-1">
                <i class="fas fa-trash-alt"></i> Delete
              </button>
            </div>
          </div>

          <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
              <!-- Table Header -->
              <thead class="bg-[#E0E7FF] text-[#6B7280]">
                <tr>
                  <th class="py-3 px-4 font-medium w-10">
                    <input type="checkbox" id="select-all" class="checkbox checkbox-sm rounded border-gray-300">
                  </th>
                  <th class="py-3 px-4 font-medium min-w-[180px]">Name</th>
                  <th class="py-3 px-4 font-medium min-w-[120px] hidden sm:table-cell">Create Date</th>
                  <th class="py-3 px-4 font-medium min-w-[120px]">Role</th>
                  <th class="py-3 px-4 font-medium min-w-[120px]">Status</th>
                  <th class="py-3 px-4 font-medium min-w-[120px]">Action</th>
                </tr>
              </thead>

              <!-- Table Body -->
              <tbody class="divide-y divide-gray-100">
                <!-- Row 1 -->
                <tr class="hover:bg-gray-50 transition-colors">
                  <td class="py-3 px-4">
                    <input type="checkbox" class="row-checkbox checkbox checkbox-sm rounded border-gray-300">
                  </td>
                  <td class="py-3 px-4">
                    <div class="font-semibold text-gray-800">Muhammad albagir</div>
                    <div class="text-xl text-gray-400">muhammadalbagir@gmail.com</div>
                  </td>
                  <td class="py-3 px-4 hidden sm:table-cell">24 Jun, 2023</td>
                  <td class="py-3 px-4">
                    <span
                      class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xl font-medium bg-blue-100 text-blue-800">
                      Admin
                    </span>
                  </td>
                  <td class="py-3 px-4">
                    <label class="inline-flex items-center cursor-pointer">
                      <input type="checkbox" checked class="sr-only peer">
                      <div
                        class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-green-500">
                      </div>
                    </label>
                  </td>
                  <td class="py-3 px-4">
                    <div class="flex gap-3">
                      <button class="btn btn-circle btn-ghost btn-xl" data-tip="Edit">
                        <i class="fas fa-pencil-alt"></i>
                      </button>
                      <button class="btn btn-circle btn-ghost btn-xl text-red-500 hover:bg-red-50"
                        onclick="document.getElementById('delete_modal').showModal()" data-tip="Delete">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </div>
                  </td>
                </tr>

                <!-- Row 2 -->
                <tr class="hover:bg-gray-50 transition-colors">
                  <td class="py-3 px-4">
                    <input type="checkbox" class="row-checkbox checkbox checkbox-sm rounded border-gray-300">
                  </td>
                  <td class="py-3 px-4">
                    <div class="font-semibold text-gray-800">Budi Syah Putra</div>
                    <div class="text-xl text-gray-400">Putra@gmail.com</div>
                  </td>
                  <td class="py-3 px-4 hidden sm:table-cell">17 Jan, 2023</td>
                  <td class="py-3 px-4">
                    <span
                      class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xl font-medium bg-purple-100 text-purple-800">
                      Owner
                    </span>
                  </td>
                  <td class="py-3 px-4">
                    <label class="inline-flex items-center cursor-pointer">
                      <input type="checkbox" checked class="sr-only peer">
                      <div
                        class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-green-500">
                      </div>
                    </label>
                  </td>
                  <td class="py-3 px-4">
                    <div class="flex gap-3">
                      <button class="btn btn-circle btn-ghost btn-xl" data-tip="Edit">
                        <i class="fas fa-pencil-alt"></i>
                      </button>
                      <button class="btn btn-circle btn-ghost btn-xl text-red-500 hover:bg-red-50"
                        onclick="document.getElementById('delete_modal').showModal()" data-tip="Delete">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </div>
                  </td>
                </tr>

                <!-- Row 3 -->
                <tr class="hover:bg-gray-50 transition-colors">
                  <td class="py-3 px-4">
                    <input type="checkbox" class="row-checkbox checkbox checkbox-sm rounded border-gray-300">
                  </td>
                  <td class="py-3 px-4">
                    <div class="font-semibold text-gray-800">Nadyawati</div>
                    <div class="text-xl text-gray-400">nadya@gmail.com</div>
                  </td>
                  <td class="py-3 px-4 hidden sm:table-cell">22 Agu, 2023</td>
                  <td class="py-3 px-4">
                    <span
                      class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xl font-medium bg-green-100 text-green-800">
                      Kasir
                    </span>
                  </td>
                  <td class="py-3 px-4">
                    <label class="inline-flex items-center cursor-pointer">
                      <input type="checkbox" checked class="sr-only peer">
                      <div
                        class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-green-500">
                      </div>
                    </label>
                  </td>
                  <td class="py-3 px-4">
                    <div class="flex gap-3">
                      <button class="btn btn-circle btn-ghost btn-xl" data-tip="Edit">
                        <i class="fas fa-pencil-alt"></i>
                      </button>
                      <button class="btn btn-circle btn-ghost btn-xl text-red-500 hover:bg-red-50"
                        onclick="document.getElementById('delete_modal').showModal()" data-tip="Delete">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </div>
                  </td>
                </tr>

                <!-- Row 4 -->
                <tr class="hover:bg-gray-50 transition-colors">
                  <td class="py-3 px-4">
                    <input type="checkbox" class="row-checkbox checkbox checkbox-sm rounded border-gray-300">
                  </td>
                  <td class="py-3 px-4">
                    <div class="font-semibold text-gray-800">Wibo Kurniawan</div>
                    <div class="text-xl text-gray-400">wibokurniawan@gmail.com</div>
                  </td>
                  <td class="py-3 px-4 hidden sm:table-cell">22 Agu, 2023</td>
                  <td class="py-3 px-4">
                    <span
                      class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xl font-medium bg-purple-100 text-purple-800">
                      Owner
                    </span>
                  </td>
                  <td class="py-3 px-4">
                    <label class="inline-flex items-center cursor-pointer">
                      <input type="checkbox" class="sr-only peer">
                      <div
                        class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-green-500">
                      </div>
                    </label>
                  </td>
                  <td class="py-3 px-4">
                    <div class="flex gap-3">
                      <button class="btn btn-circle btn-ghost btn-xl" data-tip="Edit">
                        <i class="fas fa-pencil-alt"></i>
                      </button>
                      <button class="btn btn-circle btn-ghost btn-xl text-red-500 hover:bg-red-50"
                        onclick="document.getElementById('delete_modal').showModal()" data-tip="Delete">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- Empty State (hidden by default) -->
          <div id="empty-state" class="hidden p-8 text-center">
            <div class="mx-auto w-24 h-24 text-gray-300 mb-4">
              <i class="fas fa-users-slash text-6xl"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-700 mb-1">No users found</h3>
            <p class="text-gray-500 mb-4">Try adjusting your search or filter to find what you're looking for.</p>
            <button class="btn btn-primary btn-sm">
              <i class="fas fa-plus mr-2"></i> Add New User
            </button>
          </div>

          <!-- Pagination -->
          <div class="flex flex-col sm:flex-row justify-between items-center p-4 border-t">
            <div class="text-sm text-gray-500 mb-2 sm:mb-0">
              Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of <span
                class="font-medium">4</span> entries
            </div>
            <div class="flex gap-1">
              <button class="btn btn-sm btn-ghost">
                Previous
              </button>
              <button class="btn btn-sm btn-primary-content">
                1
              </button>
              <button class="btn btn-sm btn-ghost">
                Next
              </button>
            </div>
          </div>
        </div>
      </main>

      <!-- Delete Confirmation Modal -->
      <dialog id="delete_modal" class="modal">
        <div class="modal-box bg-primary-content">
          <h3 class="font-bold text-lg">Konfirmasi</h3>
          <p class="py-4">Are you sure you want to delete this user? This action cannot be undone.</p>
          <div class="modal-action">
            <form method="dialog">
              <button class="btn btn-ghost">Kembali</button>
              <button class="btn btn-error text-white">Hapus Permanen</button>
            </form>
          </div>
        </div>
        <form method="dialog" class="modal-backdrop">
          <button>close</button>
        </form>
      </dialog>

      <!-- Tooltip Initialization -->
      <script>
        // Initialize tooltips
        document.addEventListener('DOMContentLoaded', function () {
          // Bulk actions functionality
          const selectAll = document.getElementById('select-all');
          const rowCheckboxes = document.querySelectorAll('.row-checkbox');
          const bulkActions = document.getElementById('bulk-actions');

          selectAll.addEventListener('change', function () {
            rowCheckboxes.forEach(checkbox => {
              checkbox.checked = selectAll.checked;
            });
            updateBulkActions();
          });

          rowCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateBulkActions);
          });

          function updateBulkActions() {
            const selectedCount = document.querySelectorAll('.row-checkbox:checked').length;
            document.getElementById('selected-count').textContent = selectedCount;
            bulkActions.classList.toggle('hidden', selectedCount === 0);
            selectAll.checked = selectedCount === rowCheckboxes.length;
          }

        });     
      </script>
</body>
</html>