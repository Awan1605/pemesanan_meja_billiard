<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "zetro_billiard");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil data
$exclusive = $koneksi->query("SELECT * FROM meja WHERE kategori = 'Exclusive'");
$classic = $koneksi->query("SELECT * FROM meja WHERE kategori = 'Classic'");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Reservasi Meja - Zetro Billiard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white font-sans">

  <!-- Konten Utama -->
  <main class="px-8 py-10">
    
    <!-- Zetro Exclusive -->
    <section>
      <h2 class="text-2xl font-bold mb-4">Zetro Exclusive</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
        <?php while ($meja = $exclusive->fetch_assoc()): ?>
          <div class="bg-gray-900 p-2 rounded-lg">
            <img src="img/<?= $meja['gambar'] ?>" alt="<?= $meja['nama'] ?>" class="rounded w-full h-40 object-cover mb-2">
            <p class="font-semibold"><?= $meja['nama'] ?></p>
            <p class="text-sm text-gray-400"><?= $meja['lokasi'] ?></p>
          </div>
        <?php endwhile; ?>
      </div>
    </section>

    <!-- Zetro Classic -->
    <section class="mt-12">
      <h2 class="text-2xl font-bold mb-4">Zetro Classic</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
        <?php while ($meja = $classic->fetch_assoc()): ?>
          <div class="bg-gray-900 p-2 rounded-lg">
            <img src="img/<?= $meja['gambar'] ?>" alt="<?= $meja['nama'] ?>" class="rounded w-full h-40 object-cover mb-2">
            <p class="font-semibold"><?= $meja['nama'] ?></p>
            <p class="text-sm text-gray-400"><?= $meja['lokasi'] ?></p>
          </div>
        <?php endwhile; ?>
      </div>
    </section>
  </main>

</body>
</html>
