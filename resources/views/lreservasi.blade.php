<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservasi | Zetro Billiard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">

  <!-- Navbar -->
  @include('partials.navbar')
            <main class="p-6">
                @yield('content')
            </main>

  <!-- Content -->
  <main class="px-6 py-10 max-w-7xl mx-auto">
    <h2 class="text-white text-3xl font-semibold mb-6">Reservasi</h2>

    <!-- Zetro Exclusive -->
    <section class="mb-10">
        <h3 class="text-2xl font-bold mb-4 text-white">Zetro Exclusive</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            @for($i = 19; $i <= 22; $i++)
            <div class="bg-gray-800 rounded-xl overflow-hidden shadow-md">
                <img src="{{ asset('img/image-' . ($i - 18) . '.png') }}" alt="" class="w-full h-40 object-cover">
                <div class="p-3">
                    <h4 class="font-semibold text-white">Zetro Exclusive</h4>
                    <p class="text-gray-400 text-sm">Lantai 3 Meja {{ $i }}</p>
                    <a href="{{ route('booking', ['meja' => $i, 'tipe' => 'Exclusive', 'lantai' => 3]) }}" class="inline-block bg-blue-500 text-white text-xs px-4 py-2 rounded mt-2">
                        Reservasi
                    </a>
                </div>
            </div>
            @endfor
        </div>
    </section>

    <!-- Zetro Classic -->
    <section>
        <h3 class="text-2xl font-bold mb-4 text-white">Zetro Classic</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            @for($i = 1; $i <= 12; $i++)
            <div class="bg-gray-800 rounded-xl overflow-hidden shadow-md">
                <img src="{{ asset('img/image.png') }}" alt="" class="w-full h-40 object-cover">
                <div class="p-3">
                    <h4 class="font-semibold text-white">Zetro Classic</h4>
                    <p class="text-gray-400 text-sm">
                        Lantai {{ $i <= 9 ? 1 : 2 }} Meja {{ $i }}
                    </p>
                    <a href="{{ route('booking', ['meja' => $i, 'tipe' => 'Classic', 'lantai' => $i <= 9 ? 1 : 2]) }}" class="inline-block bg-blue-500 text-white text-xs px-4 py-2 rounded mt-2">
                        Reservasi
                    </a>
                </div>
            </div>
            @endfor
        </div>
    </section>
</main>


  <!-- Footer -->
  <footer class="bg-gray-800 mt-16 px-6 py-8 border-t border-gray-700 text-sm">
    <div class="flex justify-between items-center flex-wrap">
      <div>
        <p class="font-bold">Zetro<span class="text-blue-400">Billiard.</span></p>
        <p class="text-gray-400">Membangun hubungan, tapi menang dengan sportivitas dan respect itu lebih berarti</p>
      </div>
      <div>
        <p class="text-white mb-2">Become Hostel Owner</p>
        <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Daftar Now</button>
      </div>
    </div>
    <div class="text-center text-gray-500 mt-4">&copy; 2024 Zetro Billiard. All rights reserved</div>
  </footer>

</body>
</html>
