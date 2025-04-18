<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zetro Billiard Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.8s ease-out',
                        'scale-up': 'scaleUp 0.6s ease-out',
                    },
                    keyframes: {
                        fadeIn: {
                            'from': { opacity: '0' },
                            'to': { opacity: '1' },
                        },
                        scaleUp: {
                            'from': { transform: 'scale(0.95)', opacity: '0' },
                            'to': { transform: 'scale(1)', opacity: '1' },
                        },
                    },
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        @layer utilities {
            .input-focus {
                @apply border-blue-600 ring-1 ring-blue-600 ring-opacity-10;
            }
            .btn-hover {
                @apply -translate-y-0.5 shadow-lg shadow-blue-600/30;
            }
        }
    </style>
</head>
<body class="flex justify-center items-center min-h-screen bg-[#0e1424] px-4">
    <div class="container flex flex-col md:flex-row w-full max-w-5xl bg-white shadow-md rounded-xl overflow-hidden animate-scale-up">
        <!-- Left Section -->
        <div class="relative w-full md:w-1/2 h-64 md:h-auto animate-fade-in">
            <img 
                src="https://storage.googleapis.com/a1aa/image/BdM59a_ixLBfeOCEjJXBFhDJiIRx_iwRtPIZEFmcf5g.jpg" 
                alt="Billiard Hall" 
                class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                <h1 class="text-white text-2xl md:text-3xl font-bold">
                    <i class="fas fa-8-ball"></i> <span class="text-blue-600">Zetro</span>Billiard.
                </h1>
            </div>
        </div>

        <!-- Right Section -->
        <div class="w-full md:w-1/2 p-6 md:p-12 flex flex-col justify-center animate-fade-in animation-delay-200">
            <h2 class="text-2xl md:text-3xl mb-6 md:mb-7 text-center animate-fade-in animation-delay-400">
                Register Account
            </h2>

            <form method="POST" action="">
                @csrf

                <!-- Nama -->
                <div class="mb-4 relative">
                    <label for="nama" class="block text-sm mb-1.5 text-gray-700">Nama</label>
                    <i class="fas fa-user absolute left-3 top-[40px] text-gray-500"></i>
                    <input 
                        type="text" 
                        id="nama" 
                        name="nama" 
                        placeholder="Masukkan Nama" 
                        required
                        class="w-full pl-9 pr-3 py-2.5 border border-gray-300 rounded-md transition-all duration-300 focus:input-focus">
                </div>

                <!-- Email -->
                <div class="mb-4 relative">
                    <label for="email" class="block text-sm mb-1.5 text-gray-700">Email</label>
                    <i class="fas fa-envelope absolute left-3 top-[40px] text-gray-500"></i>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="email@gmail.com" 
                        required
                        class="w-full pl-9 pr-3 py-2.5 border border-gray-300 rounded-md transition-all duration-300 focus:input-focus">
                </div>

                <!-- No HP -->
                <div class="mb-4 relative">
                    <label for="phone" class="block text-sm mb-1.5 text-gray-700">No HP</label>
                    <i class="fas fa-phone absolute left-3 top-[40px] text-gray-500"></i>
                    <input 
                        type="tel" 
                        id="phone" 
                        name="phone" 
                        placeholder="Phone Number" 
                        required
                        class="w-full pl-9 pr-3 py-2.5 border border-gray-300 rounded-md transition-all duration-300 focus:input-focus">
                </div>

                <!-- Username -->
                <div class="mb-4 relative">
                    <label for="username" class="block text-sm mb-1.5 text-gray-700">Username</label>
                    <i class="fas fa-user absolute left-3 top-[40px] text-gray-500"></i>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        placeholder="Masukkan Username" 
                        required
                        class="w-full pl-9 pr-3 py-2.5 border border-gray-300 rounded-md transition-all duration-300 focus:input-focus">
                </div>

                <!-- Password -->
                <div class="mb-4 relative">
                    <label for="password" class="block text-sm mb-1.5 text-gray-700">Password</label>
                    <i class="fas fa-lock absolute left-3 top-[40px] text-gray-500"></i>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Password" 
                        required
                        class="w-full pl-9 pr-9 py-2.5 border border-gray-300 rounded-md transition-all duration-300 focus:input-focus">
                    <i 
                        class="fas fa-eye absolute right-3 top-[40px] text-gray-500 cursor-pointer z-10" 
                        id="togglePassword"></i>
                </div>

                <p class="text-xs text-gray-500 mb-4">
                    Dengan melakukan pendaftaran, Anda setuju terhadap <span class="text-blue-600 cursor-pointer">syarat dan ketentuan</span> yang berlaku di Zetro Billiard.
                </p>

                <button 
                    type="submit" 
                    class="w-full bg-blue-600 text-white py-3 px-4 text-base rounded-md transition-all duration-300 hover:bg-blue-700 hover:btn-hover flex items-center justify-center gap-2">
                    Register
                </button>
            </form>

            <p class="text-center text-sm mt-4">
                Already have an account? 
                <a href="{{ route('login') }}" class="font-bold text-black no-underline">Login here</a>
            </p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');

            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        });
    </script>
</body>
</html>
