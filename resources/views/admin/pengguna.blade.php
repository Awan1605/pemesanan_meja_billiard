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
    <div class="w-64 bg-white shadow-md hidden md:block">
      <div class="p-5 text-center">
        <h1 class="text-4xl font-semibold">
          <span class="text-blue-800">Zetro</span><span class="text-gray-900">Billiard</span>
        </h1>
      </div>
      <nav class="mt-4">
        <div class="px-1">
          <!-- Dashboard -->
          <a href="{{ route('admin.dashboard') }}"
            class="block py-3 px-4 flex items-center text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg mt-2 transition-colors duration-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <span class="ml-3 text-l">Dashboard</span>
          </a>

          <!-- Reservasi Billiard -->
          <a href="{{ route('admin.reservasi') }}"
            class="block py-3 px-4 flex items-center text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg mt-2 transition-colors duration-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
              </path>
            </svg>
            <span class="ml-3 text-l">Reservasi Billiard</span>
          </a>

          <!-- Manajemen Pengguna -->
          <a href="{{ route('admin.pengguna') }}"
            class="block py-3 px-4 flex items-center text-blue-600 bg-blue-50 rounded-lg mt-2 transition-colors duration-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            <span class="ml-3 text-l font-medium">Manajemen Pengguna</span>
          </a>

          <!-- Manajemen Meja Billiard -->
          <a href="{{ route('admin.meja') }}"
            class="block py-3 px-4 flex items-center text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg mt-2 transition-colors duration-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 4h18M3 12h18M3 20h18M12 4v16M3 4v16M21 4v16"></path>
            </svg>
            <span class="ml-3 text-l">Manajemen Meja Billiard</span>
          </a>

          <!-- Manajemen Pembayaran -->
          <a href="{{ route('admin.pembayaran') }}"
            class="block py-3 px-4 flex items-center text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg mt-2 transition-colors duration-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
              </path>
            </svg>
            <span class="ml-3 text-l">Manajemen Pembayaran</span>
          </a>

          <!-- Manajemen Makanan -->
          <a href="{{ route('admin.makanan') }}"
            class="block py-3 px-4 flex items-center text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg mt-2 transition-colors duration-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M6 12h12M12 2v10M4 18h16M6 18h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v9a2 2 0 002 2z"></path>
            </svg>
            <span class="ml-3 text-l">Pilihan Menu</span>
          </a>
        </div>
      </nav>
    </div>
    <!-- Main Content -->
    <div class="p-6 flex-1 overflow-y-auto overflow-x-hidden">
      <!-- Header -->
      <header class="bg-white shadow-sm p-5">
        <div class="flex justify-between items-center">
          <div>
            <h1 class="text-xl font-semibold text-gray-800">Hello, Wibo</h1>
            <p class="text-sm text-gray-500">Have a nice day</p>
          </div>

          <div class="flex items-center space-x-6">
            <!-- Notification -->
            <div class="relative">
              <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                </path>
              </svg>
              <span class="absolute top-0 right-0 h-2 w-2 rounded-full bg-blue-500"></span>
            </div>

            <!-- Profile Dropdown -->
            <div class="relative">
              <button class="flex items-center space-x-2 focus:outline-none">
                <img class="w-10 h-10 rounded-full"
                  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAASFBMVEXy8vKZmZn19fWXl5eUlJT39/fj4+Pp6env7+/Ozs7r6+ucnJzJycmjo6PDw8Ph4eHT09O9vb22tratra3b29uurq64uLihoaF/IPScAAAHE0lEQVR4nO2d2XarMAxFQbKZZwj5/z+9JqRt2pgARmCZy37OWuVUsmXJgzzv4uJCA9j+gH1IKvASL4mSKIq8KrL9OTsQBFnWFnHVF3F7C0Lbn7MDQdBldZyVVZwV2UkVQhBXVRx0XSDLkyqssj6rlQUzOKXCsFI2LGVVhsqGcWL7c/YChkhx0mBxcXFxcXFxcXFxcXFxcXFxLkDCUMUAOGctAyDpsv7WtremroLzFWwgqm6pEDgi/LwI5JlEQlSkiP4LSmRbOe+tX98PkClBb6BIs0ha/cItgBeFQRg9SqRBrtE3asQ6dNOOEGatL4TyxCyU8W///CMSm8A9Z4Wk9sVTlfBvEwb80dgHbkkEL0tfjfbBgN+/qBOHxqMM2hmjaRB+5owZZSbmjabTmAdOmBFCAwOOoChsf/0CoEqNDPg0Y5uwd9Xe1IBPM6Ylb4kwFxcW0HEejLLZLhCRsRUh3i5wkMg3+icE+gZyriemZE1hQoWomRoxSWkEKkcNbGvRQjMKR4UNTyO2G0L9HwTLkRiSmVApjBkaESpChdgyDPtQ0zmpMqJtORogJxToC4YLm4jShL5gmA4HhMNwiBfsBiJ0pAr9nJ9Cunj/IGUXEaEgHYe+z+6ctGxoFYrStqK/SMI120Nhx20ylaThUCms2CkkS52eCtmtTIF4omEY8mmDBUOFlLnT/6EQ2Y1Dci/lN5fSCuQYD4kjPrJb05CvS9ndbqPOnu7cnFRBakOGGbAHN9JKFL9gQZwCC3bp4bB/T2hDvPNzUiWRsqpfs1RI6Kais61GC93umu/b1qIHyEo1XHfXoKNSyDFWeMMZdZkTSUSGsUItvbtb09AI9FvbYnTIYjiiTiNQFAxjBenCG0t2iYXiTriiSXORcxuJxLkT+tgym02pd574bQJDRq6QWSWKXiG3auIOXspMoUe2YPtWyMxLvYBcIbOZxouIBfKrJlJvkPopMxN6kvTMF8eDbdQFYWRYqKFVyG4qJT9twrBeSuymKT8nJS2XshyGtEZkF+9HqOpQirttLVoI8wuWhRpFSCWQaTWRsOaNN5aj8DHX0BQU+Z3D+AKKvC9v203IrQr1AoCUG+ebtE25X5QtNynEBpKIt0Avum9RyK48o2HbEpzxDdlvtq3ectufv4Row2Y318XMbza5qQNOuslNOUfCV8DYggxrF1pkYWpEnkmTBtMz3yJzYZ4ZkKbHFG1/+GIM5xoX1jPfmNT4MXdIoFFBg29WqMNgXcPzwOUksDpgINsnWyZYfxKTedr7xtq3arBwTODqucapSPFg7UDkdxlvjrVe6qDClUmiG6nvK2uXpuicwrW7icj1ea9pVm61cbzJ9Zm1yzZ+p0vmCNYJdKSM+ML6DDHldsprhvXpE+cXL3Wsv27pWshfn1qw3ffVY/Q6HdO9+wkMTg8Jl/Inw1qbE3sWD8Bs9wlzV5qWyMTwcBTm3Pe3R2S1oFHAhETfgZ0ZSDY9eC2akPf6FCBON77J7mecR6NR14c3M+Zsa98y6UnOfCHydFXpFT7V6UvEmlsDIYBI2+zIXKMoOLWBABnS2e8L4dchjwZC6iu6hlzfAPpN59luWwbSC4qc6pL6u0aRFwFYEwkgk6rOSYffOwLzukrk8f6q/rFlkQ998HbVN4CoVBblsQ0TwSv7VOxrvN+oP1aXRy12lHPG+RHG+wOKNk4OMORovsPlPTWmdQn7LgVkFLeHeuebSGzj/ZY7KrD/9MOzp1EZMtwlgMioaq3LG1EjsqKedQDC2tbo06EMWVCu6SDqGkbyRgSqNR2JRhUcspydvgEh8mx7V0iQQb/LspoG4ffbWgoDVHaDwzxq1unMB6Qs7yzd8zco7qWhr9K/ObMXpjtzVF3UDkDUJgIJWhkeh+hXWxEcsuDA6nZ79K8i7Y2IV003QNva6BDWvaRB23/rGFbdmXLPRwfWXJradtHVGstvTblpQuWny43o4CgcwKVn46iffDoOXLjzKHv+y209S9/t2XJT2TL3Rfdu3HXSpZfDaPuJHsvC0+KOzqQPFs2m1I2bDmXJ4tTVcD8iqvnZlLpT47EsaTlA3ZnqYBa81edgZvjK/EB0p8CmZ/4eo/FjAUxYcLvI3SXbA5x9ndfxYTj/XJ/b0XBgLiK6HQ0HsJ8ZiC4vSkdmXteg7Cxmi48D0eg2DzM+54jU747bYOZ1BuJmojb4XPum7JxmC/x0G9XlEs0P4kMXWteX3SOf9rzpmt/Z5FMW7OiOzF8+lKOcLkL9MJ0FnyHeD0xvJJ4h3g9Mx3zS7gYW+RDzzyHQn35/0fn8/gsxcSsc4rPYcKrg5n5+/8VUni9PsOx+MtHVOznLMFRuqt0LPkdiMaLP883fN+YHatML1+v5r+BNOxDPM9H4eNfZcPXrXKwJ3yWeJbEY0U01UOCZ3PQnvfgHhE54nPKKnhwAAAAASUVORK5CYII="
                  alt="Profile">
              </button>

              <!-- Dropdown Menu -->
              <div
                class="hidden absolute right-0 mt-2 w-56 bg-white rounded-md shadow-lg py-1 z-50 border border-gray-100">
                <div class="px-4 py-3 border-b border-gray-100">
                  <p class="text-sm font-medium">Wibo Kurniawan</p>
                  <p class="text-xs text-gray-500 truncate">wibo@example.com</p>
                </div>

                <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                  <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                  </svg>
                  Edit Profile
                </a>

                <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                  <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                    </path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  </svg>
                  Settings
                </a>

                <div class="border-t border-gray-100"></div>

                <a href="#" class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                  <svg class="w-5 h-5 mr-3 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                    </path>
                  </svg>
                  Keluar
                </a>
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- Main content -->
      <main class="flex-1 p-6">
        <div class="flex flex-col gap-2">
          <div class="flex flex-col sm:flex-row sm:items-center sm:gap-4 mt-2">
            <div class="flex items-center flex-1 max-w-full">
              <span class="relative w-full max-w-full">
                <input type="search" placeholder="Search"
                  class="w-full rounded-lg border border-gray-200 bg-white py-2 pl-10 pr-4 text-sm text-gray-500 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#2563EB]" />
                <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
              </span>
            </div>
            <button type="button"
              class="mt-3 sm:mt-0 inline-flex items-center bg-[#2563EB] text-white text-sm font-semibold px-4 py-2 rounded hover:bg-[#1D4ED8] focus:outline-none focus:ring-2 focus:ring-[#2563EB]">
              Add Pengguna +
            </button>
            <div class="flex items-center gap-2 mt-3 sm:mt-0 text-sm text-gray-700">
              <span class="cursor-pointer select-none">Sort by <i class="fas fa-chevron-down text-xs"></i></span>
              <span class="cursor-pointer select-none">Saved search <i class="fas fa-chevron-down text-xs"></i></span>
              <button aria-label="Filter" class="text-gray-600 hover:text-gray-900">
                <i class="fas fa-sliders-h"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="mt-6 bg-white rounded-lg shadow-sm overflow-x-auto">
          <table class="w-full text-left text-xs text-gray-400 border-collapse">
            <thead class="bg-[#E0E7FF] text-[#6B7280]">
              <tr>
                <th class="py-3 px-4 font-normal min-w-[180px]">Name</th>
                <th class="py-3 px-4 font-normal min-w-[120px]">Create Date</th>
                <th class="py-3 px-4 font-normal min-w-[120px]">Role</th>
                <th class="py-3 px-4 font-normal min-w-[120px]">Action</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-gray-700 text-[13px]">
              <tr class="bg-white">
                <td class="py-3 px-4">
                  <div class="font-semibold leading-tight">muhammad albagir</div>
                  <div class="text-[10px] text-gray-400">muhammadalbagir@gmail.com</div>
                </td>
                <td class="py-3 px-4">24 Jun, 2023</td>
                <td class="py-3 px-4">
                  <span
                    class="inline-block bg-[#2563EB] text-white text-[11px] font-semibold px-3 py-1 rounded-full select-none">
                    Super Admin
                  </span>
                </td>
                <td class="py-3 px-4 flex gap-3 text-gray-300">
                  <button aria-label="Edit David Wagner" class="hover:text-gray-500">
                    <i class="fas fa-pencil-alt text-xs"></i>
                  </button>
                  <button aria-label="Delete David Wagner" class="hover:text-gray-500">
                    <i class="fas fa-trash-alt text-xs"></i>
                  </button>
                </td>
              </tr>
              <tr class="bg-white">
                <td class="py-3 px-4">
                  <div class="font-semibold leading-tight">budi syah putra</div>
                  <div class="text-[10px] text-gray-400">budi123@gmail.com</div>
                </td>
                <td class="py-3 px-4">24 Aug, 2023</td>
                <td class="py-3 px-4">
                  <span
                    class="inline-block bg-[#2563EB] text-white text-[11px] font-semibold px-3 py-1 rounded-full select-none">
                    Owner
                  </span>
                </td>
                <td class="py-3 px-4 flex gap-3 text-gray-300">
                  <button aria-label="Edit Ina Hogan" class="hover:text-gray-500">
                    <i class="fas fa-pencil-alt text-xs"></i>
                  </button>
                  <button aria-label="Delete Ina Hogan" class="hover:text-gray-500">
                    <i class="fas fa-trash-alt text-xs"></i>
                  </button>
                </td>
              </tr>
              <tr class="bg-white">
                <td class="py-3 px-4">
                  <div class="font-semibold leading-tight">nadyawati</div>
                  <div class="text-[10px] text-gray-400">nadya@gmail.com</div>
                </td>
                <td class="py-3 px-4">18 Dec, 2023</td>
                <td class="py-3 px-4">
                  <span
                    class="inline-block bg-[#2563EB] text-white text-[11px] font-semibold px-3 py-1 rounded-full select-none">
                    Owner
                  </span>
                </td>
                <td class="py-3 px-4 flex gap-3 text-gray-300">
                  <button aria-label="Edit Devin Harmon" class="hover:text-gray-500">
                    <i class="fas fa-pencil-alt text-xs"></i>
                  </button>
                  <button aria-label="Delete Devin Harmon" class="hover:text-gray-500">
                    <i class="fas fa-trash-alt text-xs"></i>
                  </button>
                </td>
              </tr>
              <tr class="bg-white">
                <td class="py-3 px-4">
                  <div class="font-semibold leading-tight">wibo kurniawan</div>
                  <div class="text-[10px] text-gray-400">wibo12r@gmail.com</div>
                </td>
                <td class="py-3 px-4">8 Oct, 2023</td>
                <td class="py-3 px-4">
                  <span
                    class="inline-block bg-[#E0E7FF] text-[#9CA3AF] text-[11px] font-semibold px-3 py-1 rounded-full select-none">
                    Pending
                  </span>
                </td>
                <td class="py-3 px-4 flex gap-3 text-gray-300">
                  <button aria-label="Edit Lena Page" class="hover:text-gray-500">
                    <i class="fas fa-pencil-alt text-xs"></i>
                  </button>
                  <button aria-label="Delete Lena Page" class="hover:text-gray-500">
                    <i class="fas fa-trash-alt text-xs"></i>
                  </button>
                </td>
              </tr>
              </button>
              </td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>
</body>
<script>
  // Toggle profile dropdown
  document.addEventListener('DOMContentLoaded', function () {
    const profileButton = document.querySelector('.relative button');
    const dropdownMenu = document.querySelector('.relative .hidden');

    profileButton.addEventListener('click', function () {
      dropdownMenu.classList.toggle('hidden');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function (e) {
      if (!e.target.closest('.relative')) {
        dropdownMenu.classList.add('hidden');
      }
    });
  });
</script>
</html>