<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pilihan Menu</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
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
            <main class="flex-1 p-6 bg-gray-50">
  <!-- Header dan Kontrol -->
  <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
    <div>
      <h1 class="text-2xl font-bold text-gray-800">Manajemen Menu</h1>
      <p class="text-gray-500">Kelola makanan, minuman, dan stok</p>
    </div>
    
    <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
      <!-- Search -->
      <div class="relative flex-1">
        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
        <input type="text" placeholder="Cari menu..." 
              class="input input-bordered w-full pl-10 pr-4 py-2 text-sm">
      </div>
      
      <!-- Kategori -->
      <select class="select select-bordered bg-white">
        <option selected>Semua Kategori</option>
        <option>Makanan</option>
        <option>Minuman Dingin</option>
        <option>Minuman Panas</option>
        <option>Snack</option>
      </select>
      
      <!-- Tambah Menu -->
      <button class="btn btn-primary" onclick="document.getElementById('add_menu_modal').showModal()">
        <i class="fas fa-plus mr-2"></i> Tambah Menu
      </button>
    </div>
  </div>

  <!-- Statistik Penjualan -->
  <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <!-- Total Penjualan -->
    <div class="bg-white p-4 rounded-lg shadow-sm border border-blue-100">
      <div class="flex justify-between">
        <div>
          <p class="text-sm text-gray-500">Penjualan Hari Ini</p>
          <p class="text-2xl font-bold mt-1">Rp 1.240.000</p>
        </div>
        <div class="bg-blue-50 p-3 rounded-full self-start">
          <i class="fas fa-chart-line text-blue-500"></i>
        </div>
      </div>
      <p class="text-xs text-blue-500 mt-2"><i class="fas fa-arrow-up mr-1"></i> 18% dari kemarin</p>
    </div>
    
    <!-- Menu Terlaris -->
    <div class="bg-white p-4 rounded-lg shadow-sm border border-green-100">
      <div class="flex justify-between">
        <div>
          <p class="text-sm text-gray-500">Menu Terlaris</p>
          <p class="text-xl font-bold mt-1">Nasi Goreng</p>
          <p class="text-xs text-gray-400">42x terjual</p>
        </div>
        <div class="bg-green-50 p-3 rounded-full self-start">
          <i class="fas fa-star text-green-500"></i>
        </div>
      </div>
    </div>
    
    <!-- Stok Habis -->
    <div class="bg-white p-4 rounded-lg shadow-sm border border-red-100">
      <div class="flex justify-between">
        <div>
          <p class="text-sm text-gray-500">Stok Habis</p>
          <p class="text-2xl font-bold mt-1">3</p>
        </div>
        <div class="bg-red-50 p-3 rounded-full self-start">
          <i class="fas fa-exclamation-triangle text-red-500"></i>
        </div>
      </div>
      <p class="text-xs text-red-500 mt-2">Segera restock</p>
    </div>
    
    <!-- Kategori -->
    <div class="bg-white p-4 rounded-lg shadow-sm border border-purple-100">
      <div class="flex justify-between">
        <div>
          <p class="text-sm text-gray-500">Total Menu</p>
          <p class="text-2xl font-bold mt-1">28</p>
        </div>
        <div class="bg-purple-50 p-3 rounded-full self-start">
          <i class="fas fa-utensils text-purple-500"></i>
        </div>
      </div>
      <p class="text-xs text-gray-500 mt-2">4 kategori</p>
    </div>
  </div>

  <!-- Daftar Menu -->
  <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6">
    <div class="overflow-x-auto">
      <table class="w-full">
        <thead class="bg-gray-100">
          <tr>
            <th class="py-3 px-4 text-left text-sm font-medium text-gray-500">Gambar</th>
            <th class="py-3 px-4 text-left text-sm font-medium text-gray-500">Nama Menu</th>
            <th class="py-3 px-4 text-left text-sm font-medium text-gray-500">Kategori</th>
            <th class="py-3 px-4 text-left text-sm font-medium text-gray-500">Harga</th>
            <th class="py-3 px-4 text-left text-sm font-medium text-gray-500">Stok</th>
            <th class="py-3 px-4 text-left text-sm font-medium text-gray-500">Terjual</th>
            <th class="py-3 px-4 text-left text-sm font-medium text-gray-500">Status</th>
            <th class="py-3 px-4 text-left text-sm font-medium text-gray-500">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <!-- Menu 1 -->
          <tr class="hover:bg-gray-50">
            <td class="py-3 px-4">
              <div class="w-12 h-12 bg-gray-200 rounded-md overflow-hidden">
                <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMTEhUTExMVFRUXGBcXFRgYGBgYGBgVGBUYFxsXFxUaHSggGB0mGxgaITEhJSkrLi8uFx8zODMsNyguLisBCgoKDg0OGxAQGy0mICYtLS0vNTAtLS0vMC0tLzUtLS0tLS0tLS0vLTUvLS0tLS0tLS0wLS0tLS0tLS0tLS0tLf/AABEIAOEA4QMBIgACEQEDEQH/xAAbAAABBQEBAAAAAAAAAAAAAAAEAAIDBQYBB//EAEEQAAIBAgQDBQUEBwkAAwEAAAECEQADBBIhMQVBUQYiYXGBEzKRofBCscHRFBUjUlNy4QczNENigpKy8XODoiT/xAAaAQACAwEBAAAAAAAAAAAAAAACAwABBAUG/8QANBEAAgIBAwEGAwgABwAAAAAAAAECEQMEEiExIkFRYXHwBROhFDIzgZGxwdEVJDRTsuHx/9oADAMBAAIRAxEAPwCgRta9M7GcUBtLabcTlPhmAj4sB615dYMmtN2fxDpdBHuAKP8A7JLj5KfiK5eKW12drUw3Qo9TmlThrqNjqPI0orpHGGGuVLFcy1CEdIVJFKKhCMillp8UqhBmWuZakpVCEcVwjwqWuRUIRha7lp8UoqEI8tLLT4rkVCxkU2KliuEVCEZFKKfXKhBpFNpxptQgqaadFIioQr+M4n2dpiDqe6PM/wBJrz+5ck1qu2N7REnkT8dPwPxrHXLsDbnofwrnamfbrwOvo8dY78SX9XWf4a/H+tKgP0zz+vWu0v5jNPy0VS3comtRwGyRZRri98uXYc1zSqyOsKFA6kUFwvhDp33WbkZhOiW+neOjXJ9F+AbQYSxlQa5jIk8pC5dPSfifS0qRmy5FJ0jc8DP7C35GfPMaOqs7N3Jtsv7rSPJgI+YNWsV0cbuCOVkVSY2K5FPilFGAMilFPy0oqEGRXIqSKYXUc/hVkFFKKabw6E/KmG/4fOpRLJQK4YGpqE4g9BTfall160GS4xLjyyG/izyp9m/1of2eutG2l2PT5+dZYuXWxzSJHMedDM9SO1NtEaseWg86GU3KRajSHqDGtNNwUJdukmpLSUSzPoinDvYUGBFKuBQBpoKFv4sL4095UlyAoN9AljUZoL9ZTuPhUoxIImqjmhLoyPHJE9NLUxmqNrlNsGjKdrbs3T4AD5T+NZDF3IMVp+0Rm6/n+FZDGtqa5GV9tvzO/gVY0vIj9qKVC+1NKgsOjblFAUd5so95jJM8y3lOk7H3SKPY91fry0+vuquaS0k6+PL8teY56Gjvs+ojlM9em/nHWYLjnGi7PX8rkfvKPkdPvNaFb1YqxeIykbx9fh8au8Jjprbgl2aMeaPNl5np00CmI5k1G+OnRfifwFaFyILB3A3MVA2K/dHx/KggZ1OpqRaOirJsxO5n7vhUyjShwad7WKhQ5hTSaa1wmkFqFnZruHGrD1rqpTrSd4UE1aLXUYFG/wAq6rTPhTb2h/D5VGQdTED+u81ik6THpHbrchzpmIcaKNh9a02y8v5An8PxqG6+5rPGVpsdXcOsrJPQb+fSpvaSQBz0FRYfS2DzaT6Hb5AV3DtEt6DzO9HGVJeYLVsnuty3iq7E2iToKOUTqTAqG7iwNoFXKmuSK0yvbDHofhUbAjkasDjT1muDFE+FVsj4l7n4EeEPcHr99SRXcwiOlNRwTFaoTVJCmubMf2hH7W59fW9ZHH862vahIut4gH5D8qx2LTWufkXbfqdjFLsL0KzJSqf2dKq2sLcbS4veiNfoE5Yn5MPAUSDK9ec9fvn5+s6iXTG+s8o09ZOX00PQ8qmRzAHM9ZPxnXfrr6601K+Ec9hlp9Pj8/r/AN3JmENDYLDltBsNWJ+tSatAgGg2rfix0jJlnyOLk1LZeogtSKK0CA1KdnodSdqmtpVkHgk1KtuqzHcUySlsBmjUnVQem4k+VVxvYhtDcnwUEEknaAR8Irn5viGPHLalb8jVj0k5K3wjSB117w0MHXmBJHnFAYvj1pFcqSSpUAEEZsxAkeWs89KXDOyuoe6SDpAB1/3EafCfOtBZw1u37iKvkNT5nc1I5NRkjcko/V/wRxwwfFy+iMxheN3AQbls5WOhHIfXXrXcV2mRXIA7o+0dx45eYrV56bcAO4B86H5OZR2rJ+qv+SfNxOVuH1Mfie0IRgzQ6GNV3g8wOfl4Ve4bErcTOGlDz+XprU+I4Vh3ENZtn/YvyIGlUXFOyYKf/wA7+yIMqDLLPjJkTO+vlS1jz475UvoHLJikuE0ya3dy3Cp0MEetRYiSpAFZUJibDZLoysIyNqbbGNArxG8SInbyq1wvGIDZ4MaErtmjURuSKxwyJN458Gj5baU4mgxj/dQ2AuZ9OQJJqEYgOgYbEf0pcIfQxv8A1NMnJyyR8AFGovxDMdcPKhMPhSx/OiCuscztRNyFED18TTGrdsC6VEDIib6nw2rlrGAmAoHoKZ7JnMAetTW8FliT8B+NLjLI3a6FtRrnqSq4I1HnUVzDgkESI18D9bUTbK8jFNvrOo1rdCSa8RDTTMp2usmFflGU+HT8fhWIxQ1r0vHoCCrCRsR9fW1YjtDwd7Bze9b5OOQ6P0Pjt91KyQuW5G7T5Vt2Mz+WlUmYUqXSH2zULYdjJAQbDXM0eMQB5EsPOj8DhZYW01J59ANyegA6elNcRyq/4RhvZ2s59+4J8re4Hrv/AMelbseNXwcqc3RL7JVARdhz5k8ya5lp8U4LWozDQtPVKcEqPiGJFm2XPLb8/Tf0oMmSOOLnLogoxcmooZbx9v2jW2YI6lQA2mbMJBUnfmPMeUjtjS5bvRbBgQYJERJPMcxWext5rhLMpuBQpXNOwB1URrqT8TVfiOP539khHdALxMAaSCfkNpNcLNr8mWNRVd/5eZ2MOijFps0ONx4X3Mo8TFaPsVw8i3+kXAM9wkrzASYBHiwAM9I8a87wOCN66tuT3mUcx3SdT12r2VAFXQQAIA8OQqfDMO6byz7unkX8TcMUVjg+X1FcuUKL+tDYvEUHZxEMY507P8ThjyqBz4aduNlubuop5cVTvjY3FPt44TFBD4vp3La2W9LKuC2DV0mocOwI0qUmutFqStGVqnRBiMOjqVYBh0Ou1YftH2de2CbBm2CXZIlhqDKtvE69fOt4Y/GoHtZiSRtsay5sKmuVyPw55Y3a6HleA4o6yqvAOsEDTxA2+vOjMFxprRJuy6ncrAIHSNAaL7W8PFu7buLaGQsS8ZQVYQZM7zqY11HjVBdwyMSud5icug3kiARMeFciblinUn0OxHZljuS6m64dxBLrB0YFdfA5o2g6ijm1Irzvg1xrV1TbhQysCrMcrEGQREktBPLSD5Hd4HFhmhoDATAO87EH41qx5VNV3syZcTg7XQIv4jKIG1QW2ZutSeyzMKke/l7o09KLa2+0+BXCXC5ElhukeelPNqN3+FQPi50qO9d0o6hDlAPc+o7iNqVJEGpjaEQRyiocGmZGHM1LhLkrB3Bj8vlWzBJPnxEzVcAH6hw/8C1/xX8qVW1KtIu2VFnhwe4FI7u7fyjU/Hb1o7EXMzE0Tkyozc27voNT+HwoOKKKoGTs6oqVEpqCoeIWHjMjlcupA5xr9CqyScY2lZIRUnTdD+I4sWULESYMCNJ8dfqKoXxRxA9o5y21BLjMBI1AyjXlBpnEuIveTLcVbYjNrqQYIAPQ7+nxOfxFq3mFvuhftabKoJlRAGpnT/VOu1cLWZ3mk0n2UdjS4FjjyuSS9jkclywFskKijQyBroDtOg5mDpFWN7hN1B3FVrQOpDd5jEEtpG7AiD4cqr8RiLQs3HtKLuRQpEsWfMcsliZDaeJk7VYcA4qwW3YKFlST0IaSYuSf3id/GsqS28e/UdklJfdCuA4U2cRZNx5zkZEbKWUsCBEeJBAE6HlXpA1BHrXmWKcm6uIKd5GVlAMyVMx01iJjpW84FxRL9pLy+6wOnQglSD4hlI9K6Pw6a2yj5mDWQlcZSAXeZk9dPChGHyqx4ngsrZl1U6+VAqY9ef1yryGshOObZm4av8/BmnHJONxBs3OpOU10r6U3JWPgdZacGvHUchVmR40DwyxlWeutFWlOskb6AcvXnXvPhkZ49LCM+tfTu+hyNQ08jaJK6q7zXQIpMQBW9c9RBl+2NgvhrwAOYLnWNzl70DxIBHrXluOe4QXVWd2grl1ORQAZ23AzeZgV61xnE5bV640ZURz/ALQhM15JwdWzZleFhtJMkzpHIjwgVg1EE2pep0tHNqLQuC8YAuIuQls3d1GZSRBjnGu88zVziuLezuLeSVCkK66wdwWAOs975VBwO0+IVxkW0gJd2UIGLgkwDHvGNT4kdTUh4dbAce0zEjQONCBroREHcbb61z57d/g0b48p3yegcDvi5bNxSDm28F+vuo5MGDv8P61geymIe06AaWhCMCYMQYkHWQY18fh6fZeRNdLTShlj6HM1EZY5epSX8CwMrU2GwH7+vhyq3ZKhdYFNWmjutiXldUD/AKMi7afdQGIJRp5Hfz5UddoTENIjryp21LoBfiL2nnSoP2Z6n5UqP5nkVtLbiGyjwn460FFGcR9+OgH3UKBWgSPQVDj8f7MQBJPyB+8+FEoKq+1GHU2wxJB233HlBH15CsutnOGFyg6Y/TRjLIlIz2IxEEAiZkl9wPXxiPOgreGVrntD3u6O6ADuQI8p15HlrTvY5DoCSwBEmAddIJ12iYjl6m4RVJzEwTrBgHyOpgc43jevPLHStM7jaKrB8Mi9KrkYyC/dNtFJDZVWBr3VgmTJNaK3ZS3BHLy8ZbxPOapbnGCme01sl11bIAdDqJ2j66UDxPF3GzalVA7okDvErqREka/HpzCSbaRdF3xDi1oTqPxHMT0/pVv/AGfcZt3LTWQe8pZhJGqsxJI8MxIPiRWGvYDEGwLdy1BjXvKDJMc4gz99NwFtsMUdW9kUzlYVVLe7M7h1I0J3nQ6gVr001jld+X5CM+JThtR7dafkdqhxGFtnl8JEVlOzHbexiAEuMtu8DlKsYVj1RjoZGuWZ33ia1ocRz/r5V1p48WaPaSa80ch78broA/q1Z95qNw2BQcp8TTxcHrXbmKAjxpGPQ6XE90YIuWbJLiyRxXFtgbCKg/Sh1pv6WI96IrXw3YrkLdoqvxWI5ULf4gOvOstxjtXZtt7PNnuna2urebR7g89egNDknSChBtkPbzipt2ltIJa4wGUb+zUgs0ecCOcmvOL+Zl/ZPkMyYG+skAg6GAYEfnVlxRziLhuXHIuR3cpIyiWAAUkiNTvVLgrQBYvMhucgnXfwrDKd8ruOnix7VtZs+DY9BaFlHCgKTPIDTeNdyKCxr5SQxUzoCDIPLzrPW8I+dra2yC6LGYlSObNHNdtN+VFCw0EMzK6wqwIzADcT72n5VkngW7c2aYzrhI0XCnEZiwAEDJGsAEbzvt+PWvQeymPDoFzSR13jl47V5FYUgEKYAKgGf3jEjlz2869O7G8Du2jnZ9G1I6iDpPrRabHOObdHp0YrVSjLH2uvcbKh7rUSBUDjwruM44FcFRfo8n6+hRqqSfD66Vwr8uVDRdgP6M3jSqb4/D+tdq6RLOcQHfP1yodRRfEB3geoH3UKtPFEi1kO1nGiz+yQhSgZiSdCoEtMCZgbDrWxt1ie2HZhR7S8sw6FSN4JdDPWAFPyrBr4TlDh9nv/AINmklGMna57is4jbdxbX2i3NzmUZNDBzAliYgzpOkHWuYe6e8LjiMrFQgzmQTu+ukQdhvGkU/DcK9hhE/vHdAUUjMYBYZQFkgH3QAKjwuLdpa5cNotPdVQrdw85k6jKTvBPPeuJuaT549DsRdpcFdwdzfa6X0RgVLKuU5tCveB01WI/1elFcVYImdlRpAkEw/vAACREjbfcCicShJVbVpBJDAjZi2oOYCWYnWTJmiOJdgPakv7dTE65DOaPFttF+e3MorfK+iXvxBlNR694Jj8aTbuP9q4QVEyLYBYQBPM6x5dKE4ZwgAKjX3uRrB2CsJMme93tNOlA8V4ddREsvCm0g7ymQQTE7mWaCfDrrrbcNt5LMksWbVydN5jTkIj4VU+xDh94UWmc4lwi1dXIVXwjQ6TzHr4a1nsTdx2DWLGIuqBsuclQNfsmV9K1WGzHYkyN4JAjckjaJGviKgxCNcD6KwUHNm1kke7BI0Obr1010ZgyfKVC8kN/BScN/tDx66PcF0xJDovWN0yn51dWv7VWiWsSdmyvIHoVkCqWxgM1x7CW8iqiNs+s6qCTLa6iAeR6VIODsxAKi2WEkKAwEaH9oPtEGI/IxqlqIrl8fmI+zJ8cFyP7T8wzCw2xiWVRIG0gHnpVdjf7S7muWxbVvFnf1OiwfWqrivClRSzALl7wI0EjadgdY36VVY3g15US6FIznLEbkmFgHr4+FHiyQnzYnU4JYlwi5PGsRimGe+VU/ZQ+zHqUho8CTQ3EbVuw7IttCCDlLZhLmBMgEjqPOu4XgjJbF1roCcn2VjzFsn34iMw01WNDNJlLG2WUXOacxMsNVnoszy2qpwlDJ5DcGWE8VJcodgjK5SsGDlywNYJInkZFWWC4VmtfpDXGzoGKoBIBUTB6zvr4bGq3h+FzXxmurbtkTlO5IGpBO3Kd5ExVng/a3b91bFzKsKLjMAUDMzAsNZYtqYXSTqRpSp33PzGRI8Tw0XSr3XbPA1RgMpjMACY03g6E/cHh+OFFVXcMBIm4ATHKZ20HOiuL4NcMjAstzNK+7qTqQIM5QBHM+lR8GwFu7DBFIUgMW10IkCNt4EeB9QW1wuXKD5vjqS4dvb7lTpoEMcyR3usc+UV6B2P7TAp7K73XTu94jloNeZ8RvXneCtrausoMe8+VQFXcDKp5b/d1q34UVuXBpq5glR5DU+lHiyPHPs9GLyw3x5PXExynnvtTmxYjlrtWbw/AH0i60eZ2+NWOG7OoILO5j/URXWSyeByXt8Qp8cBILD0HOgMTxdSDkk/hFW9nhtpRogO+p1Oviag40FWy0ADSBpR/LfeytyM5+sn6/Ou0HPlXKHYg7Zs8asqD0kfj+NCCjyJBX1HmP6TQMU9CSRKB7QKDahhKk66kHTXSNeVHLUHFF/ZN4a+lZ9Wm8Eq8GNwOskfUxd7Ce0k+0JCwfZqcpkGQZJ1G4ieVVONwTMzXQRCkFQ2oGmsNGvkdZ9KP4ixW07agiVOUwy66ETrHOR4zWetLlcsDcIa1BUEuC+bcjnpO3nXm8XPJ3XwWXZ5bauXa6UREY5GysrbAADfmdJO2xrSXe0JNr2lhFuqF35LqeR03HTQrB2NZPg9jEXbn6IbfsiwZizRosAaAAzuBGo+BipucPxODXJ32Fy6qWnlhbYMBOQHu6sdTHXpWqOO7p0/3Fya3cmmfFG65VgMobMx5zy05COsxNEYqIgDwAGwqThPDGs2YeGbXM3UnppymPSuKocnQ7deu2noay5GoyobF2uAbCYMlz33XJyU75hBmCOnr6U7i1q2iXHZnMITlGpkayI5/OoFHsrjLOpSdSCdCs7aRJ03obH4oZHgwcrRrzymkS3Sy8Pjg1Y8VwsBw1+9AhHZg6hmOVSUUg7kwBEAmdyas8XiTAUasdAdNZMgwdR03qn7LO7W8pyw0g5iwKpESMo1kjqJykzR2Ow9mFHt8rI3vAZu6IIkCNdN5rXlilk2szRfFk3DcE2IYPiBlt2DqjRL3RDCRsVAj1McjV7jLC3EIYaHkR6iqZOJQiqsEMASwO7HvEkeJI6xFGWeICCDPIj6+FImnaroi2uLKzi/CVKpeZrjE/s3GYsFjYoGnLKwN/tVBj71ssXdCpUDK7ZYY89Z1Ejz15Va8RBdCitAJBB/1KQwINZriJ9oGw9w5WkvbadCwWI8BzMda2b5Tak36/wBmeMVFNJEGRYbv5cwOWdCWJ+yOkA9edQ2Fv2/dMHLqsiI0Igjf0q1tYh0FsqO9lyvAB1AA0MSY1GtV2Jti5C3GMrmYQCrAnQHNtpPPfoJpkZXw+n6lNd523jbvtLeWC4JENyZoPPUaD76vxxp1JLqpJXQCTl5jMo5yRoddKoOFYdmWbtpWNpSS2aNScoYkanQgwfDrRyXkErBJWZneTqd9SNFI2ERvUyJdK6BRdoAfG3JCwGgAmAMwI0In0FXPAMURcA7uhzQCJic0a6eGtUS3QL+ohW0PIgESCPXT/wAq64Lg8905u8qakjRiNYBI31g+lSW1NX6gttpnr3Bb2ZAQZHLWfnVoKreD2AiBV2G0VZCu+uhwn1HVTdpbn7ML1P3a1cVl+0V+bgUfZHzNR9C11KrL9TSrkn6NKlDDbT09KHxCayNjqPyqcimkTp128+nrRoWDqalH31HFPU0RDC8e4bdS6WyswLKUKgkmGkroOa1FhgggrKhZYiMphh3gw8Tr6aV6Dct5ljny868246WtF4EK05wZVlzMCWBMzuenrEHzet0nyZJQ6M7Ol1HzVUuqIcLxIWcSL9wyPZOCqyyDUQxgaDQg6cwKtsDeuYq4Hu+4veVCDObUTMd2OXrWfwmHCo+W3czDJmL94MDsA4EGCk/Crfh3FbZOsLcYnMGJmQY0nedSBznpQRntVeHv3Y+UL5L+/GRix25bcpmfM1l/0nRlyMVkTCzoOUxudfhpQvbHtNlUIkFo1AIEeY33B1jlVV2Y417SyRkBcsVbKTnMmFnroYGsfdVSxylH5lcdP+yRqPZfUhxFh3u3GtZbKkxEa5OqzodtdedQLwR8jXLl/RbZuEgb6SFABnUcxVjhuH3r5cBRkADEM+VjqwED3dgdyImaaA9z9jY7yNcDA94ZVCBoL66hhoNySvMk06LlVKvfmW5vuZMmBt2VupaeWYhgolmURlEgdVBiOQoNccMkQVkkMGBg7j09fuq1HD1a2twBlcMQ5MAsVbKxHUSDHXLzis52lxrNHsoZklXYQM0AghhziI/8oYR3yp9WC5bVwQY3H+z90mQDnA1gjmPAztR+BxKezDi6zuYzKSCEGukDUdeX40Dc4Yy31tbkr3ttJzajly+71MucPS1bAKBS7RoSzd3TvRyI5eIJ8HycKUe9gRcrbLezjZAjr9GKg4nhxcytEsrBhykg7T8R6mgcLw24I9mZE7kr8hv921WyYVlgXAVBBMkaQdB6zy0NKaUXaZad9SvAvoZyq2dmGujICZOnWCw8p2kU44T2rgygBgq0MZ2JWQRr4HTTnVjjuI2Ut5TbLNl0dyQCRvGX7XMbfKqe7ijkDAhUUajfQAQZncfiRQKUpc1Qaj1LbEL+j22ckPOgEAQTAAHX+nKqz2uZpy91ideeu6n4j62amOaYJz5hpsARG5IH51BjcRnuqtvMjQJiOR209fOihjff1Bcgp8OA5VRmBiJMwR+Otajs92avKxOYZWMlSNfKdooPs5wpncNcVgVM9JbT1IEfWor0zhuHgV0dNptyuZh1GocXUArBWcigUSKaKdNdM5xFibwVSx2AmsXefMxY7kzVt2ix0n2Q82/AVSTQSYcUO0pUzX6BpUIRuGFRuNKlaomqwBs5v5hv4jrTRQ+JJBBG4oizdDiRoRuPrlRJ2RokVqG4lwy1fXLdQMOU7jyNT04Go0mqZE2naPP+1XZi+new0naNdVIM7cxE1n7WGALuQA9xu8rsA4I0XSZzEyB10Nexg1TdoOD23TOBDLBmN4MwY+Nc7UaOKg5Q47zbh1ctyUuTx97NtbZJGqE59O9pCliTuZJ6ju713gzpZP7MsSSzi2MsxlCyZ5zAnSJrTYXs/bvYtZvZ7bGfZCRBJ1Bg8onXqNOdS9rey9uyfb4VcjoCCoOjqdwQRodNNfzHPxtShd9f38DbOdSSZTYGys+1dCCQuYklh+zeWUqDqDJG0eGtS8PtZWzWgwzMD7sIEE94ie7roBuRG+lBcMxAxIK3C9tkVQwKkZgRupHdC6bmfKjzdWyoXOQI7uaSch/dJ308vhSZuS7L6+A2CT5B+01r2tlHQtnsvaMCVM3GKnfUAy3lIrNNgXDM2qoCwfN9pgZhepIO+uvwq24jfvDJ7HMZJzqdQde7lO0r46VFhsIC3sva3CyLmhW7oeVkCRJ0EHlrtWnG9uPlipK5cEWDxs3NbbFMohtC2cwAxLHaARVpxHApbQXGum48S2baD9lQPkfCqhWUObbMUZmQK2bQLJ+yN9Y0028aseJYbK2S27FYyyTmhtBJHKT00kbVUl2k1wGujTKbhmR7tsJiHBZwQGYjKoknu8z4R99bhuMi0clxDoDBUEq0HcN58jtWBxotsVe4zEqQBsNQRsdiCfwqyxd+47+zUn2XMtJ70bBp03+dHmhuafd799BcJVwE4zClrisTmtxnYTsTvm5b1b2+EWTGUAErAbcSeqzBE/fyqgvJcAyMYDArGnIwZ6zM/wDlaLs3iLbWlVmh1iQ0rJHSdDPgazZoz4cWJzWnuTKVcEZ1AQIxBI0VSDBjfTflzNarg3A7Qc3EJckmCeXlpU2H4G14lWEISCSJBPOPjW04XwhLagAbfUk866ulwyfakv7EZs621F8jOF8OAEmrlFikqxXa6JhO0DxfiAtJ/qOijxp+Pxq2lLMfIdTWRxGJa4xdt+Q6DoKjdBJWNYk6nUnUnqa4Jrhc03NSwx2U/RpU2T1pVCG+mmPTprkUQsDxC61W3yynMuhFXTrQGKszQ0FY/B41bng3MflRJrLYu0VOZZBorh3aESEu6HYGiUinE0ANPU1CjhhKmRTwaIEhucJtm6t9QFuLIkbMCNQ3571muP4S9cYqFIEzPWNhWvRqc1Zsulhkav1GxzSieHfqu8oa3dGVoClVBlxp4wRB50sFdYoyP+1tKPtnvhvdAB85A1nQa8q9rv4VHEOisOhAI+dUfEux2GujRTbPIqSOsSNjvWaeilbpmyOsjStHi93BXUZ3tXCwMkSxBUkTl13Mc4FW3C8OFtyouHNmU7A+kQQDPnWtxPYC/wAr6uIggrE+O+9C2v7P8Qkst45oAA3kD97qehpU9PlkqaGrUY7tMxK8IbHMq6p3grkgSJnMYJBAAB/rVt2iwqW7yWVIChFImFDKO7EAgTIJ2rSWuB4hDBtXGlsxIA1OULOZYGw2PlXcV2BfEur3C6ZRAkqec6jX5UvHDJkltp0vIKeSEVuvkwv6NbYsrBJ0idgAfsTzjp4+NHYC2oAtAZW1KtJMmfdaJG1eicJ/s+sWjmebpiO/BHoOXlWiw3A7CQVtW1I6KB91afseSXV0Z/tcU+h5bgOB3Lrzk202jx6a9P8A2ttwvgQUe6J5mNa1NvDKNgB5VKqAVpw6WON31Zmy53kBMJhAo2owCkTTXcASTArSIH0BxTiiWVljryHMmqfjHahV7lnvN15Cs+AztnuEk9fyHKqcqGKHiFX8W95s76fujkBSzULisWiCSY9ayz9qbhuaJkQGCN3PXXYUqUq6m3S6LLqXWNGk4rxZLAGcGTsAN/XYVJw/Gi7bW4ogMNuhBgj4ipcD2bGLty0rbOqt9pjvmWdx4nqd6D4fgv0Z2tagZognZuUeB+elUnK7fQ15tJgWFxxu8keX6e/UsINdojLSphyDa0opk0pqxY4ioLqCpaaRUIVGMw4rNcSwu9ba9aBqpxmFBoWg0zIYbjF2wdCWHQ7+h/OtNwvtZauQG0bodD8OfpNUvEOHis5jMIRyqlJoLameuYfEo3usDU814zh+KXrfuuSOja/1HoavMD24uLo6n0Ib5GI+Jo1NAvGz0qa6DWRwnbiyfeIHnK/9gB86tsP2jstsfhqPiKK0DsfgXM0qr14vZP2wPOpP1la/iLVlUw2aRoI8StfxF+NRvxmyP8wVCbWWE0pqkxHafDru1VGL7fWV90ZvLX7qq0EscvA2U1HdxCqJZgPOvNsZ26vPpbWPE6f1qpu4q/ePfuNryGlU5IJYvFnoHFO19m3ITvt4fX5Vlcbxi/iDqSq9BpQOFwKjU03E8YtW5CkMw0ga69D0oHKxsMduorksLNtUEnSqPtD2gZVy2In7R3KjqOVZjjWNvPcl2MboBsBPTr41r+yfZ/8ASEDuQq7MBGY6dOQI69TS1K3SOlDRxxL5mZ8FN2X9pfuZGm4zbFjMdQSdvPwra43solpRfaHZYzAAwBsG8SDGp0jymguI8LGEYqvdT30aY26nmQef50Y/ao3bcWgMxBW4x2mNlEbHUyfgaiS5U+pvlLK9ktN9x9f/AH3yT8L7TCwTac5ie9bHOYkg/ug7z4GJ2qg7Ui5iG9t9tdgv7oP2QOYPPf5Cs7fwNwXsqyT7wadY6luUda9S7H4dMmcw10e8Y0EiJQHYHXXzqot5OyNzrFov8xFW37/JMw3654h0/wDyv51yvUf1RY/gp8K5R/Jl4nO/xHR/7K/RFrmpTXCa5mphwR00qbmrtQhwrUV2yKlpVCyqxOFB5VSY7hs8q1jpQd6zVNFpnn+N4UelVN7BEcq9HxGFHSqnFcOFDQxMwrYY1CcPWtv8NoRsB4VQSZnwbg2dx5MR9xrvt7v8R/8Am351efoHhXRw6oFZRG7dP+Y//JvzpuS4d2c+bE1ol4eKlXh4qE3GaTATRlnhtaC3gwOVcxd+3ZUs5AA+tqhFy6QDY4cByrmM4hYsDvsJ6bn4Cqe72sNxiltMo+ySdT10A+oqqxHBbt2bqgkf5jHQA9SfwoXLjg3YtDJ85OEWnGuJtdVktkqOoJGbw05Hxqi4NbYvCjunRidFHiT9aE1r+yHBLJb2d0Z2iUJmNN1y/wDvOjO1fDbVjvIR/qtrqQf3guwHXb5mI4trcbsThDJ8iMXZOvZZBaJALXR3gfHmq9J++KrOG9oFw1zm091l28iTECD57mpOH9qLlxBZXuECM095lHKeRjnvznrX8Q7OXW/aqjZCe8xBygn7U8weo5+dVKa4cB+n000pQ1T4fT3+wbx/EXMUCHbVTKAaKJ9fSTQfZzBtbcPelbZgOPtRPTlGvjofOtf2KwVte6wzXVEqx/d27g5Rt12oftuyWH9oCCWHeQbhp0YjYA+PMc5qOFrey4aqsn2SEaVe6/vxNRi+G2TYKrlQKMytMCerMdwep/CvOX7SNZeLWYD3XOgJHMKOvOfDlS4dxp7wFtzATVFGiga79SJjwEUZjezLsoxDjKojONmZdg3gOR8I86kpbuYF6XTx01w1Mrt8e++/3/UH/Wafx3/53PzpV39T2v4L/FvzpUHaNl4PP6HrS0mpUq1nhDi7040qVUQZXaVKoQYaielSqiwa9QNzelSqBICxNA3a5SoWGiI0hSpVQQ4VItKlVkY6sp2v/uX/ANn/AGpUqj6Mfpfxo+qMlwz+9Xz/AANexH/Bt/8AC3/U0qVLwd51fiHXH6lDwf8Av7XmKAxnu3f5X/6PSpVUvunQxfiP0X7so+z3+Js/zivaeKf3Fz+Q/dSpVen6SMnxz8fF77zH9nf8RZ/mb/oaouL+7f8A5mpUqqX3Dbj/ANQ/Rf8AJlP2b/xVj+da9mxn93c/lf8A6mlSo9N0Zz/j/wCNj9P5POaVKlQm8//Z" alt="Nasi Goreng" class="w-full h-full object-cover">
              </div>
            </td>
            <td class="py-3 px-4">
              <p class="font-medium">Nasi Goreng Spesial</p>
              <p class="text-xs text-gray-400">ID: F-001</p>
            </td>
            <td class="py-3 px-4">
              <span class="badge badge-outline badge-primary py-1 px-2 text-xs">Makanan</span>
            </td>
            <td class="py-3 px-4 font-medium">Rp 35.000</td>
            <td class="py-3 px-4">
              <div class="flex items-center gap-2">
                <span>12</span>
                <button class="btn btn-circle btn-xs btn-ghost text-gray-400 hover:text-primary">
                  <i class="fas fa-edit"></i>
                </button>
              </div>
            </td>
            <td class="py-3 px-4">
              <span class="font-medium">42</span>
              <span class="text-xs text-gray-400 ml-1">(30d)</span>
            </td>
            <td class="py-3 px-4">
              <span class="badge badge-success text-white py-1 px-2 text-xs">Tersedia</span>
            </td>
            <td class="py-3 px-4">
              <div class="flex space-x-1">
                <button class="btn btn-circle btn-xs btn-ghost text-blue-500" data-tip="Edit">
                  <i class="fas fa-pen"></i>
                </button>
                <button class="btn btn-circle btn-xs btn-ghost text-red-500" data-tip="Hapus">
                  <i class="fas fa-trash"></i>
                </button>
              </div>
            </td>
          </tr>
          
          <!-- Menu 2 -->
          <tr class="hover:bg-gray-50">
            <td class="py-3 px-4">
              <div class="w-12 h-12 bg-gray-200 rounded-md overflow-hidden">
                <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMTEhUSExMVFRUXFxUVFxUXFxUXFRUVFRUWFhUVFRUYHSggGBolGxUVITEhJSkrLi4uFx8zODMtNygtLisBCgoKDg0OGxAQGy0lHyUtLS0tLS4tLS0tLS0tKy0tLS0tLi0tKystLS0tLS0tKy0rLS0tLS0rLS0tLS0tLS0tLf/AABEIALoBDwMBIgACEQEDEQH/xAAbAAACAwEBAQAAAAAAAAAAAAADBAECBQYAB//EAEEQAAEDAwIDBAYHBQcFAAAAAAEAAhEDBCExQQUSUWFxgZEGEyIyobFCUmLB0eHwI3KisvEUJDNTY4LCBxU0ktL/xAAaAQACAwEBAAAAAAAAAAAAAAAAAQMEBQIG/8QALxEAAgIBAwIFAwEJAAAAAAAAAAECEQMEITESQQUTIjJRcYGRIxQzQ1JhobHR8P/aAAwDAQACEQMRAD8A+rMbCtyhABUgpjLujYKOdUkq7QgCjmKofGArVEAnKAGdlm8RMwE+9whZtyBzZTQmAYTCI25hetWic6K1W3nRMRepcBw7VQVIKpUtoyFd7AQOqAGaNfZFeJSjDCZY4nbCQHoleaF6rXa0FziA1oJJ2AGSlBcOcJMsbs0Yd3vO3cNOuwR0NPeBrAPz8FX1hOgJ8CPnCpRMaADu37+qIHlAFhP1T/D+KkH7J/h/FLXF8xkczw2dJ37uqOHnqiwKujcHyJ+SmmAdMr0olIZ5jt80WARxAxs0fLVY9R4LiTuVo1z7MfWPkB+aRdbE9vahAEoPGhPcjvqjqlG0xup9WTlMAzqgKGYQnsIQ3VIQA2KisCUo0jZMNcgAzhhAIRPX7KEAKVAoYSmHNQuQoA6HlCgqA5ULUgLwEN1QBQ8FUDUAVNRUcCmPBCc4IAsKUtgrMuWEHKM+4cHYlBqOJk/rzXSOT1Nu4RecqtB2IhVDkAHL5aSgsMt7lTm2nwhTTSAhr0ZlUhDFEIjWhAC3EGl7O5zHkfZY9rneQE+ClplaNmz2vA/IpC7tqrQfVMBOwcYb+IC4lJR3Z0lYxTQ7ysWw4FuD7QJglu8HqB1S1HhlZzv2lyGAjLWNIeewOcdO2DK1KFhSpgQJI+k48xzv0HgAqs9XGKJliM5r6nK1zdHAk7wC5pEY3A/h827UOc6eRzZknADRvoXEkzOQN8gJt1UY+Wyt/aBthU34hG7TJPJ2LNtNyfALMocTbVc5jGxyxvqiX1+WNJGwXH8N4n6oXDxl0NDBEySXfLC5hrpZM0Yp7d/wdfs/obOyqlVZUga9fz+5Z3D+JGoyXNg4zoD4fh1TNsZkrYjJPgqSi09wgcCY+Kj3dCoJjZD5iuxBXOnJS1TB7EUVVYukaIAqANlQhepPgwrzsgCtJNtCULiDhGp3PUIANCA56l75Q0AbwbCqWqSvMdlIAbgvSIRnNVHNQAs9Aq1OWBEuOjevU9gG5+8gFovCCwD1jzqQxkDoCamneR/COiTdKwSsB6onUyen0R4b95+CNUtwRjYIdrctcSNxt1AMSOqdY2ZShNTVoJRadMzA0tPYl6jslaVSmguYOrfguhCYajtasm9vnGoGUogGC6C4yPsxAG2vkmhWrg5phzSAQ8HlHlmR3HyXDyI68tmmACNFUUyNc9u6FTv6W7w3seeQz09rXwTVN7XTBBHYQV2mmc00EpEDJOx+RWJR4qGVOZxwZB7E9xG45WEDecdgaVwPE6jpLmnXXdUdZTVXTLmmhZ9FqXjSMwQfGemN0u4ARJDARzDJEjYw3AlcRw26qgEAiYAEOiASJLQdZAIx1TlHiTy72pkEd4CxpbK5bv4LflU9jprg8rXONQgDAkD2joQ2QZyCkaPEgcF7m9CeT/5SzyCIJ2mTqNBHjKz69SnyxDi4jByAM5xuq+WDbXSkkdRj8mpxe7aGFvOXTtLf+ICzbO2hoI1drgezOiQqW5GZBlalqeamWtyW9O3eVb0SSlQZI1ExrOtUZXMzOBqTPf1Xf29UOaMAbkRGd/jK4qkwueIEzEkayDrO8rreGMPtdgbjzW1hmurp7lHPF1YWuQlTV2TtajI0ygssOhVsqC5CYpVcQvf2R2hCk2pblAFH9VdhXnNQwwgoGEqMJVPVFFNcxEKaNacRlAFWNKu9iJzBecQdEAahEqzWhXaVVzAcpAXhVe1CiFHMeqAJNJUuKI5ObcSJ6g8pIPYi8yW4lU/ZROrwPDBPyXM1cWOPJz9u0gkAx7Ug4kO2j5QqcU4jXDgBviNBOQZPkfA9FS7BY89Z8xqD2iEz6/1nLiHNwIO04AmYIPRZOPIoScbLkoWrDW7ZnPNiATrM/hPmpq8Pk82WsOJBIIJk4E7ddUqLkCeY94I1xuUzLoDplsDl1AHburiyWtiPo3Fm2opjkcQZJJzrOzjkp+1YWtmRAaBy7EbRuRr5kpYOk5jONyfzXqdIn6UAfVB67t38lx1tHTghx1rTeHSOaTO0DwnSR8Vm3FvTt3Mq0uXJIqEYZmREjBIOYEkQmX0iRBh3acgg9Aca9iyOMVnOc0PcTyg8o0bqA48o+yG/FdqaYlB/YPf15c4Tzew53NoD7JiBsB965epK6MimeZ1M59VUDm+1hwySJ010HQrmatzB0/FVtTcost6ZUyLdgJiP14LVp2VR31Xd4HzSFtVaTIOVtUrtvKcHwlYbfq9RekvgA+k5pj2RpoB89U1TtGvEyQdjEHyMrGqXZLsAnKdpXBMTjuXMsqi9xeUyRwaJ5qzvANEz4Jmz4SwaidNSTnqq0WOLu/crZbT5QAuY5pSe2yE1R6lbNawuAAARfR2tzetI2c0eQP4pTiV40Uy0OzpG0bkq3og8GnUj6/nj81s+GO5spatfp2bTzOq9RblDezoUOT1W6ZRpBis5uIKTbUICt64lAAq9v2oYpwjOMobwgCr6QKC62jKuQeq82oUAKzlFYD1XqjVUSgDolBVy1VSGVKFCO5L1AgCZWX6RVi2kO8/JaACx/SeqAxk6cxHwUWZtQbR3iSc0mUPLXbOjwP1PZv2TOmiduwtfBwQdFlio5pDmOjoRqFq0eJzBewFwj2gY07IWHLLDI74Zo+XKO3KNS/4e17eaQC7BE5M79pReFENYGTlo5fJcVx70m5jys+idRp2D5qtrxGpWI5TDtCQHSR24UmLPLqe2wvIfTud+y3pn6InyQHWxB9l2OmJ7ZMZHYuPs+IVWPhzyR2jPyWyONgQJJHc0GO8qy8se5H5MlwbuAMxACweIPbUcGNacEukaDOpKBX4kXkNbJk6k4juAbp4ozqfsOZTME5dUiXE7kdIEx0Ub1EFwzuOKXcToE89UH/KqfGDn9brkuIjWF1sBtVzQIHqKk95iVyd5TlxC5xZHLE2/llmEVGdL4RmNuC06+K37DihLeV8noY+aUo8NBWnY0G08Fo71l6nJBqi6ebTk+yDGDlaIt2mBMHWMb6FJ3dIO0MZnGh7EFocPq481RdSQUbVSqKYGZ3/olK1w9xEErHZcvLs74/ot2yp4kjwQ7hsHTW7K1LMlskmVr+i1LlpPH+of5WpG4uJAjxWjwA/sier3fILd8G7md4g30GqGlLucQexS6qRoqF5Oq9AZA214IUOKWoPTBcgRIcpKoSpa5AEQg1NUbnCpUA1QAGFD2YXqvWUHm7UAdM8qFVyhx6pDLOKEVPOhuQBVrtljeltEmmzH0vhC2wxZnH2/sx3/AHFcZPYzvF70cO8uacJe9rVS2OblaenvEbiei2HuABHLJO/RIXVCRovMZcnROqN/ElJbmO2xDczKbsqDiZGiIx7Swh2DsneGXTQ32sRiVHPLPpZK0ZVWmQ8DtXR2dgaok/KVgl3O6Qd1vW3FHU2cobzE7gqGc3a6glG1sJsHJWcASQ3TaV0vDKn7MyAJ/oAufpsc5/O4xOStIXoDYnTRRQy/qHM4emhFribp7Z0ZVHgCB9yw7gQ7PVaXBKnNeunenU+MIXGrYB2Ft46WFfcg4y1/RDNmQRsrVz9j4hY1ndlhglN3t/LQB0We8VyosUz1ep2R3x8EOi8AGfikrmuJ9kmO3ruY2VP7VgCBrruVzLTutiVIepXDQc9QupoVW8oIhcDJJla1rcODYlKeFRprkU4WbnEXgRG62fR3/AB6ucfiuIdXcdSu69HhFsz/AHfzFbPheJwuzL8R2ikMVWIJTTwhFi2TIBwrB/UhEFJQ+3BQBHrO1WLwlzQcCpFJyACPcCguKMKBjKh1BAC8rzaROmiI63IR6BIEFAG65iHWpTujkBVJSGAayFJYrlQgCCMLG9J3RRno4fGVrlYnpl/4x/eb965n7WdY/cjj2XQJhFuKw5YXOOr8pUm+lYGfSuUrN/FwXumyYC16fDYaD7x1OqwvWSV01hxYGmGugHTO8bzsqeoWSKXT9yxWxmvsxq2Wn4J2jScwSSRK07WmwnUeYWo6hQ5YcR+HaY0VL1z2f9zmWRI5lzHvgSYWnacOjXPTtTVBtOZacbDdaLKrRoNt8fmuMK8yddkLJkpbI5i3pcl7A/yqh+Sz+KVpJ707a3XrL6ocQKVQCNMAadVi3+pXoIR/RS+pAt8n2QrWelAwk4VnJqzAVdvoVl1KytKzkJqlYlPcOYHHOy0azBpoqGbVSTofBkMtQmBygIzrUHUoFQhqijLrY7M+q7VfR/R9v92pfuz5klfNn5d4r6hwdkUKQ+w35L1WhVIxvEnwHIVCjEKpar5klIlU8EXlhVlAFedeaVK8GoAgqpCuWob0AeIVS1RCnlKAN8oZRHKiBlSoUyvIAo5qxPS1v92d3j71ukrJ9J2zbv8A9p+K5lwdQ9yPkt2zX9eY+9I09VpXupS1GhzHH9Fn5GqN3EXpzoAj+ocnralyjT8Sm6DwNQsjLla9qLdiFGsRrzCZIPTPkRp+sJ23us+04ujqRHgAiVnNdpp3beKyzHMdTvjbbI/oq7SycoEjoafERsfJD4nxflbytJBO/TwWPTcc8oAmNM+MqlaluXSe2VzjxQjIPL+R30bH7dx3NKr8gs+8OSmfRWvzXcf6VX5BC4jR9o962o7YkmVf4z+xnOCmjUhQSqEKo1bpl5cGzZ3ICvdXwGcLE5zEShOMqJ6WDl1MKNCpxUoBuy7dJcqJRap4YoQ3SH0j9AL6vZs5abG9GNHk0L5jw6lJC+i2V6yqwPpuDm/EdhGy1tI7TMTxPZpD0qpKpzqweFcMokuVHPVihlAHpUF6jCqQEAWFRTIQCVdpQAReEKChkFAHQqkKSFVAyCFCkqpKALwsv0mMWzz+7/MFoh6z/SNvNbVR2feEpcDjyj5bd2jiRjB0T9nbCmJcEkLstHKdtEQXnNh3msTVRnLbsegxPYJc3LcnAQqdQu3x3lJVA2dZRaVwBuq0sVR2LUTXDREmFn07PneYiNkGvfSOUK9o7oqSxThFy7kqRpf9rqNGAc4ws689mQdeiPWu3t+mR3FIXtQGSei6wY53chbjXoI2b7s9XU+S2eMWcOdGYJHj0Kyv+nrP75P+m/8A4hdH6VcPdPrqRh30twY0kbhbnkPJh25MjLm8vUb8Ucfc28FKlqcrX8Yqt5ftD2mHyyFVnK/3HNd2Agny1WfLqg/WjTx5YyWzEyvcieFk76p8kxS4Y46Nce4E/JRvPHglTSMkU0SnSW03g8f4j6dIdaj2tP8A6e8fJeffWlLFIOuqmzntLKDT+579TxgKeEMk+1fU4nqYR43+n/UZl0SynOnNhv2tnEdg69cL3COIvoO5mHvbse8IVxz1HmpUdzOPYIAGjWgYAGwC8KC0tPHy1VmVqm8rtn0XhPGWV24MO3bun3Ar5hbvcxwc0wR+srtOCcdFQcr8OVyM7MueJxNlzyvMrZVuQHIKryrsiCOqDqqEqhaqwgAharBDUh6AC8ypKH63sXnOJGiAOjcVVWcFVAyFQq5VSgCjkrxTNGoPsn4Z+5OEIN1TljwN2uHiQUnwNcnx6+ZBS1OrC1rynJWe+gsvJJNnoMK2FKhlAcnTRQX01E2i3CAtzFGpXDgo9UpFFRyaZOoDRvJ26fmqVCXFRToLVsbOVF1wiNw2NP0EpBtYk/UcPi1dlcPxByDquQo3rLZ7DqXSCNwzcjtmF1rQHtDmulpgjotjRyUsVnmPEP3zZyXG+EchLhlh26Subr8GpOyABOy+iXVIkcrs9PBchxayez2mjG6mnAixZezOdFg9vu80bQSF4ioRD3PI6FziPIlalKtOCJTLbdrpz8I1UDgi4pvuYlC1A0+UfFPUm9fgmhw47QPA/ejMsTqomqJ4zQq4BDkpx1GCquaE4s5mKlS0kZac7FFcxBc0KZMryR0nA+PHDX/kuppVQ4SF8xIjIOi2uCcaLfZcpozKmTF3R2xaqEIdpeNeNUypCAAQvBqIQqFyAKgKxKq6oEOpB3QB05KG5ysHFUqIGQHKULlKsCgCxXgvSpCAPmvHmtFxUZ7rpJjYg5lvgdFmOYuq9P8Ag/OBWA0w6NRHuuB6hcHUvKlMDmZzt2e2QY+0NCe6Fm6jTu7ia+k1KSqQ8+mlHNXqPEab/php6OBb8Yj4phrWnRzD3PYfgCqEoZFzFmvDNj/mQkYUsTothvjvWrwqyteaa1zRY3UgEud3QBqmsWSXEWOWpxxV3+N/8GRbsJ2WrbshheXBlNvvPOg7B9Zx2aMlF41xW1aQLVhqx9J45ac9Q33ndxhc9e1atYg1XSB7rAAGN/daMDv1KS0LnK8j2+EQT1vVH0L8/wCgVGuatYvMwQQ0HJAGk9q6z0b4qabvVO9w6dhXMWlIh3gU49pWtjqKpGTmj18n0k5z8UrdWXM1ZHo5xiRyPORjO66MERIz4qynZnSi4s4Di/CHMcXNB7gFnW1Ug7yOq+h3dIOH3fmuM4zwjlJcAVFOPwWsWS9mHo3AOufimWOYf6ZXPULiNRCet7vYOMSoGyykPvAOgnyyl322+P13IrHg7ohSSE2Z9S3QXW61PVqlRhUhxZkvoqnJC0HUECpbpo5D8N4iWEArqLa/mFw7qBRbO6cwxKljIgyY/g+giqT0VahkZwViWN/K1aVWf0FKVyCzoQvGexWcwobgUAdWSV4PG6EVRyBjBcEMvCG1TugC/OpCgK7UAUq0g5paRIIhfMeP8KNGoQD7JOOncvqbVyHpy0ckwNVy0d43TPnlxYdnjulzaRtK26egXrkYUDRfjJmG2gOgVuUjaE5GCgVNFGydMo2u7s8kVl07QwPBRSGfD7lWoP15LlnQ3SrQV64rkiMd6pR2RKgz4LqJDMTpvcwhwxC7fgHGOcQfFcaUzwUxUwpoMrZYJo+lNgjBSV9bEjCPYaBMV/dUpTTpnBcX4aRkfgsik4jELtuLDRcleDPmq2WNGjhlYahWTbLtZdFGGijidzRqC4UetSNI5TTNFIRBXOQyrgKQmIVqApeoxO1Es9MTBUKzmldBw++nErnnolg4zqpYsgnFHa068opKybQ4WhSOFIQH/9k=" alt="Es Teh" class="w-full h-full object-cover">
              </div>
            </td>
            <td class="py-3 px-4">
              <p class="font-medium">Es Teh Manis</p>
              <p class="text-xs text-gray-400">ID: D-005</p>
            </td>
            <td class="py-3 px-4">
              <span class="badge badge-outline badge-info py-1 px-2 text-xs">Minuman Dingin</span>
            </td>
            <td class="py-3 px-4 font-medium">Rp 15.000</td>
            <td class="py-3 px-4">
              <div class="flex items-center gap-2">
                <span class="text-red-500">0</span>
                <button class="btn btn-circle btn-xs btn-ghost text-gray-400 hover:text-primary">
                  <i class="fas fa-edit"></i>
                </button>
              </div>
            </td>
            <td class="py-3 px-4">
              <span class="font-medium">87</span>
              <span class="text-xs text-gray-400 ml-1">(30d)</span>
            </td>
            <td class="py-3 px-4">
              <span class="badge badge-error text-white py-1 px-2 text-xs">Habis</span>
            </td>
            <td class="py-3 px-4">
              <div class="flex space-x-1">
                <button class="btn btn-circle btn-xs btn-ghost text-blue-500">
                  <i class="fas fa-pen"></i>
                </button>
                <button class="btn btn-circle btn-xs btn-ghost text-red-500">
                  <i class="fas fa-trash"></i>
                </button>
              </div>
            </td>
          </tr>
          
          <!-- Menu 3 -->
          <tr class="hover:bg-gray-50">
            <td class="py-3 px-4">
              <div class="w-12 h-12 bg-gray-200 rounded-md overflow-hidden">
                <img src="data:image/jpeg;base64,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" alt="Kopi" class="w-full h-full object-cover">
              </div>
            </td>
            <td class="py-3 px-4">
              <p class="font-medium">Kopi Hitam</p>
              <p class="text-xs text-gray-400">ID: H-002</p>
            </td>
            <td class="py-3 px-4">
              <span class="badge badge-outline badge-warning py-1 px-2 text-xs">Minuman Panas</span>
            </td>
            <td class="py-3 px-4 font-medium">Rp 20.000</td>
            <td class="py-3 px-4">
              <div class="flex items-center gap-2">
                <span>25</span>
                <button class="btn btn-circle btn-xs btn-ghost text-gray-400 hover:text-primary">
                  <i class="fas fa-edit"></i>
                </button>
              </div>
            </td>
            <td class="py-3 px-4">
              <span class="font-medium">63</span>
              <span class="text-xs text-gray-400 ml-1">(30d)</span>
            </td>
            <td class="py-3 px-4">
              <span class="badge badge-success text-white py-1 px-2 text-xs">Tersedia</span>
            </td>
            <td class="py-3 px-4">
              <div class="flex space-x-1">
                <button class="btn btn-circle btn-xs btn-ghost text-blue-500">
                  <i class="fas fa-pen"></i>
                </button>
                <button class="btn btn-circle btn-xs btn-ghost text-red-500">
                  <i class="fas fa-trash"></i>
                </button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    
    <!-- Pagination -->
    <div class="flex justify-between items-center p-4 border-t">
      <div class="text-sm text-gray-500">
        Menampilkan 1 sampai 3 dari 28 menu
      </div>
      <div class="flex gap-1">
        <button class="btn btn-sm btn-ghost" disabled>
          <i class="fas fa-chevron-left"></i>
        </button>
        <button class="btn btn-sm btn-primary">1</button>
        <button class="btn btn-sm btn-ghost">2</button>
        <button class="btn btn-sm btn-ghost">3</button>
        <button class="btn btn-sm btn-ghost">
          <i class="fas fa-chevron-right"></i>
        </button>
      </div>
    </div>
  </div>


  <!-- Modal Tambah Menu -->
<!-- Modal Tambah Menu -->
<dialog id="add_menu_modal" class="modal">
    <div class="modal-box w-full max-w-3xl">
        <h3 class="font-bold text-lg">Tambah Menu Baru</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
            <!-- Kolom Kiri -->
            <div class="space-y-4">
                <div>
                    <label class="label">Nama Menu</label>
                    <input type="text" placeholder="Contoh: Nasi Goreng Spesial" class="input input-bordered w-full">
                </div>

                <div>
                    <label class="label">Kategori</label>
                    <select class="select select-bordered w-full">
                        <option disabled selected>Pilih Kategori</option>
                        <option>Makanan</option>
                        <option>Minuman Dingin</option>
                        <option>Minuman Panas</option>
                        <option>Snack</option>
                    </select>
                </div>

                <div>
                    <label class="label">Harga</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2">Rp</span>
                        <input type="number" placeholder="35000" class="input input-bordered w-full pl-10">
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div class="space-y-4">
                <div>
                    <label class="label">Stok Awal</label>
                    <input type="number" placeholder="10" class="input input-bordered w-full">
                </div>

                <div>
                    <label class="label">Upload Gambar</label>
                    <div class="flex items-center justify-center w-full border-2 border-dashed border-gray-300 rounded-lg p-6 h-32">
                        <div class="text-center">
                            <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                            <p class="text-sm text-gray-500">Klik untuk upload gambar</p>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="label">Deskripsi</label>
                    <textarea class="textarea textarea-bordered w-full" placeholder="Tambahkan bahan atau keterangan..."></textarea>
                </div>
            </div>
        </div>

        <div class="modal-action flex justify-between gap-2">
            <button id="cancel_add_menu" class="btn btn-ghost">Batal</button>
            <button class="btn btn-primary">Simpan Menu</button>
        </div>
    </div>
</dialog>
 
  <!-- Modal Pesanan Aktif -->
  <dialog id="active_orders_modal" class="modal">
    <div class="modal-box max-w-4xl">
      <h3 class="font-bold text-lg flex items-center">
        <i class="fas fa-list-alt text-blue-500 mr-2"></i>
        Pesanan Aktif
      </h3>
      
      <div class="overflow-x-auto mt-4">
        <table class="w-full">
          <thead class="bg-gray-100">
            <tr>
              <th class="py-2 px-3 text-left text-sm">Meja</th>
              <th class="py-2 px-3 text-left text-sm">Menu</th>
              <th class="py-2 px-3 text-left text-sm">Catatan</th>
              <th class="py-2 px-3 text-left text-sm">Status</th>
              <th class="py-2 px-3 text-left text-sm">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <!-- Pesanan 1 -->
            <tr>
              <td class="py-2 px-3 font-medium">VIP 2</td>
              <td class="py-2 px-3">
                <div class="flex items-center gap-2">
                  <div class="w-8 h-8 bg-gray-200 rounded-md overflow-hidden">
                    <img src="https://via.placeholder.com/100" class="w-full h-full object-cover">
                  </div>
                  <span>Nasi Goreng (x1)</span>
                </div>
              </td>
              <td class="py-2 px-3 text-sm text-gray-500">Pedas level 2</td>
              <td class="py-2 px-3">
                <span class="badge badge-warning text-white py-1 px-2 text-xs">Dalam Proses</span>
              </td>
              <td class="py-2 px-3">
                <button class="btn btn-xs btn-success">Selesai</button>
              </td>
            </tr>
            
            <!-- Pesanan 2 -->
            <tr>
              <td class="py-2 px-3 font-medium">3</td>
              <td class="py-2 px-3">
                <div class="flex items-center gap-2">
                  <div class="w-8 h-8 bg-gray-200 rounded-md overflow-hidden">
                    <img src="https://via.placeholder.com/100" class="w-full h-full object-cover">
                  </div>
                  <span>Es Teh (x2), Keripik Kentang (x1)</span>
                </div>
              </td>
              <td class="py-2 px-3 text-sm text-gray-500">Es sedikit</td>
              <td class="py-2 px-3">
                <span class="badge badge-primary text-white py-1 px-2 text-xs">Menunggu</span>
              </td>
              <td class="py-2 px-3">
                <button class="btn btn-xs btn-warning mr-1">Proses</button>
                <button class="btn btn-xs btn-ghost">Batal</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      
      <div class="modal-action">
        <button class="btn btn-ghost">Tutup</button>
      </div>
    </div>
  </dialog>
</main>
        </div>
    </div>
</body>
<script>
    // Menampilkan modal tambah menu
    document.getElementById("add_menu_button").addEventListener("click", function() {
        document.getElementById('add_menu_modal').showModal();
    });

    // Menutup modal tambah menu
    document.getElementById("cancel_add_menu").addEventListener("click", function() {
        document.getElementById('add_menu_modal').close();
    });

    // Menutup modal tambah menu saat klik luar modal
    document.getElementById('add_menu_modal').addEventListener('click', function(event) {
        if (event.target === document.getElementById('add_menu_modal')) {
            document.getElementById('add_menu_modal').close();
        }
    });
</script>

</html>
