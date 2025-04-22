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
                    <a href="{{ route('admin.dashboard') }}" class="block py-3 px-4 flex items-center text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg mt-2 transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <span class="ml-3 text-l">Dashboard</span>
                    </a>

                    <!-- Reservasi Billiard -->
                    <a href="{{ route('admin.reservasi') }}" class="block py-3 px-4 flex items-center text-blue-600 bg-blue-50 rounded-lg mt-2 transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        <span class="ml-3 text-l     font-medium">Reservasi Billiard</span>
                    </a>

                    <!-- Manajemen Pengguna -->
                    <a href="{{ route('admin.pengguna') }}" class="block py-3 px-4 flex items-center text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg mt-2 transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="ml-3 text-l">Manajemen Pengguna</span>
                    </a>

                    <!-- Manajemen Meja Billiard -->
                    <a href="{{ route('admin.meja') }}" class="block py-3 px-4 flex items-center text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg mt-2 transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h18M3 12h18M3 20h18M12 4v16M3 4v16M21 4v16"></path>
                        </svg>
                        <span class="ml-3 text-l">Manajemen Meja Billiard</span>
                    </a>

                    <!-- Manajemen Pembayaran -->
                    <a href="{{ route('admin.pembayaran') }}" class="block py-3 px-4 flex items-center text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg mt-2 transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span class="ml-3 text-l">Manajemen Pembayaran</span>
                    </a>

                    <!-- Manajemen Makanan -->
                    <a href="{{ route('admin.makanan') }}" class="block py-3 px-4 flex items-center text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg mt-2 transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 12h12M12 2v10M4 18h16M6 18h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v9a2 2 0 002 2z"></path>
                        </svg>
                        <span class="ml-3 text-l">Manajemen Makanan</span>
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                </svg>
                <span class="absolute top-0 right-0 h-2 w-2 rounded-full bg-blue-500"></span>
                </div>
                
                <!-- Profile Dropdown -->
                <div class="relative">
                <button class="flex items-center space-x-2 focus:outline-none">
                    <img class="w-10 h-10 rounded-full" src="img/ellipse-132.png" alt="Profile">
                </button>
                
                <!-- Dropdown Menu -->
                <div class="hidden absolute right-0 mt-2 w-56 bg-white rounded-md shadow-lg py-1 z-50 border border-gray-100">
                    <div class="px-4 py-3 border-b border-gray-100">
                    <p class="text-sm font-medium">Wibo Kurniawan</p>
                    <p class="text-xs text-gray-500 truncate">wibo@example.com</p>
                    </div>
                    
                    <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Edit Profile
                    </a>
                    
                    <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Settings
                    </a>
                    
                    <div class="border-t border-gray-100"></div>
                    
                    <a href="#" class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                    <svg class="w-5 h-5 mr-3 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Keluar
                    </a>
                </div>
                </div>
            </div>
            </div>
        </header>
            <script>
                // Toggle profile dropdown
                document.addEventListener('DOMContentLoaded', function() {
                const profileButton = document.querySelector('.relative button');
                const dropdownMenu = document.querySelector('.relative .hidden');
                
                profileButton.addEventListener('click', function() {
                    dropdownMenu.classList.toggle('hidden');
                });
                
                // Close dropdown when clicking outside
                document.addEventListener('click', function(e) {
                    if (!e.target.closest('.relative')) {
                    dropdownMenu.classList.add('hidden');
                    }
                });
                });
            </script>