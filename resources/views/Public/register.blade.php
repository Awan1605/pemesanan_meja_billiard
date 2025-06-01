<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register - Zetro Billiard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        fade: 'fadeIn 0.7s ease-out',
                        scale: 'scaleUp 0.5s ease-out',
                    },
                    keyframes: {
                        fadeIn: {
                            from: {
                                opacity: '0'
                            },
                            to: {
                                opacity: '1'
                            }
                        },
                        scaleUp: {
                            from: {
                                transform: 'scale(0.95)',
                                opacity: '0'
                            },
                            to: {
                                transform: 'scale(1)',
                                opacity: '1'
                            }
                        }
                    }
                }
            }
        };
    </script>
    <style type="text/tailwindcss">
        @layer utilities {
            .input-focus {
                @apply border-blue-600 ring-1 ring-blue-600;
            }

            .btn-hover {
                @apply -translate-y-0.5 shadow-lg shadow-blue-600/30;
            }
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen bg-[#0e1424] px-4">
    <div class="flex flex-col md:flex-row bg-white w-full max-w-5xl rounded-xl overflow-hidden shadow-lg animate-scale">
        <!-- Left Side -->
        <div class="w-full md:w-1/2 h-64 md:h-auto relative animate-fade">
            <img src="https://storage.googleapis.com/a1aa/image/BdM59a_ixLBfeOCEjJXBFhDJiIRx_iwRtPIZEFmcf5g.jpg"
                alt="Billiard" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                <h1 class="text-white text-3xl font-bold">
                    <i class="fas fa-8-ball"></i> <span class="text-blue-500">Zetro</span>Billiard
                </h1>
            </div>
        </div>

        <!-- Right Side -->
        <div class="w-full md:w-1/2 p-6 md:p-10 animate-fade">
            <h2 class="text-2xl font-bold text-center mb-6">Register Account</h2>

            <form method="POST" action="{{ route('register.submit') }}">
                @csrf

                @if ($errors->any())
                    <div class="bg-red-500 text-white p-3 rounded-md mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Nama -->
                <div class="mb-4 relative">
                    <label for="nama" class="block text-sm mb-1 text-gray-700">Nama</label>
                    <i class="fas fa-user absolute left-3 top-[42px] text-gray-500"></i>
                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required
                        placeholder="Nama lengkap"
                        class="w-full pl-9 pr-3 py-2.5 border border-gray-300 rounded-md focus:input-focus">
                </div>

                <!-- Email -->
                <div class="mb-4 relative">
                    <label for="email" class="block text-sm mb-1 text-gray-700">Email</label>
                    <i class="fas fa-envelope absolute left-3 top-[42px] text-gray-500"></i>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                        placeholder="email@example.com"
                        class="w-full pl-9 pr-3 py-2.5 border border-gray-300 rounded-md focus:input-focus">
                </div>

                <!-- No HP -->
                <div class="mb-4 relative">
                    <label for="nomor_telepon" class="block text-sm mb-1 text-gray-700">No HP</label>
                    <i class="fas fa-phone absolute left-3 top-[42px] text-gray-500"></i>
                    <input type="tel" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}"
                        required placeholder="08xxxxxxxxxx"
                        class="w-full pl-9 pr-3 py-2.5 border border-gray-300 rounded-md focus:input-focus">
                </div>


                <!-- Username -->
                <div class="mb-4 relative">
                    <label for="username" class="block text-sm mb-1 text-gray-700">Username</label>
                    <i class="fas fa-user-circle absolute left-3 top-[42px] text-gray-500"></i>
                    <input type="text" id="username" name="username" value="{{ old('username') }}" required
                        placeholder="Username"
                        class="w-full pl-9 pr-3 py-2.5 border border-gray-300 rounded-md focus:input-focus">
                </div>

                <!-- Password -->
                <div class="mb-4 relative">
                    <label for="password" class="block text-sm mb-1 text-gray-700">Password</label>
                    <i class="fas fa-lock absolute left-3 top-[42px] text-gray-500"></i>
                    <input type="password" id="password" name="password" required placeholder="Password"
                        class="w-full pl-9 pr-3 py-2.5 border border-gray-300 rounded-md focus:input-focus">
                </div>

                <!-- Confirm Password -->
                <div class="mb-4 relative">
                    <label for="password_confirmation" class="block text-sm mb-1 text-gray-700">Konfirmasi
                        Password</label>
                    <i class="fas fa-lock absolute left-3 top-[42px] text-gray-500"></i>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        placeholder="Ulangi password"
                        class="w-full pl-9 pr-3 py-2.5 border border-gray-300 rounded-md focus:input-focus">
                </div>

                <p class="text-xs text-gray-500 mb-4">
                    Dengan mendaftar, Anda setuju dengan
                    <span class="text-blue-600 cursor-pointer hover:underline">Syarat & Ketentuan</span> Zetro Billiard.
                </p>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2.5 rounded-md transition-all duration-300 hover:btn-hover">
                    Daftar Sekarang
                </button>
            </form>

            <p class="text-center text-sm mt-4">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline">Login di sini</a>
            </p>
        </div>
    </div>
</body>
@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Registrasi Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonText: 'Login Sekarang',
                confirmButtonColor: '#3085d6',
            });
        });
    </script>
@endif
@if (session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK',
                confirmButtonColor: '#d33',
            });
        });
    </script>
@endif


</html>
