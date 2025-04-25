<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Pesan &amp; Tentukan Tanggal
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   /* Custom scrollbar for horizontal scroll on time buttons */
    .scrollbar-hide::-webkit-scrollbar {
      display: none;
    }
    .scrollbar-hide {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }
  </style>
 </head>
 <body class="bg-black font-sans text-[13px] text-white">
  <div class="max-w-4xl mx-auto p-4">
   <h1 class="text-center text-[14px] font-semibold mb-4 select-none">
    Pesan &amp; Tentukan Tanggal
   </h1>
   <form class="bg-[#121212] rounded-md p-4 shadow-[0_0_15px_0_rgba(255,255,255,0.1)]" id="bookingForm" onsubmit="return false;">
    <!-- Info Booking -->
    <fieldset class="border border-[#334155] rounded-md p-3 mb-4 select-none">
     <legend class="text-[12px] font-semibold text-[#3b82f6] px-2">
      Info Booking
     </legend>
     <!-- Ruangan -->
     <div class="mb-3">
      <label class="block text-[11px] font-semibold mb-1" for="ruangan">
       Ruangan
      </label>
      <div class="flex gap-2">
       <button class="text-[11px] font-semibold text-[#3b82f6] border border-[#3b82f6] rounded px-2 py-[2px] select-none cursor-pointer hover:bg-[#1e40af] transition" id="regulerBtn" type="button">
        Reguler
       </button>
       <button class="text-[11px] font-semibold text-[#3b82f6] border border-[#3b82f6] rounded px-2 py-[2px] select-none cursor-pointer hover:bg-[#1e40af] transition" id="vipBtn" type="button">
        Exclusive
       </button>
      </div>
     </div>
     <!-- Tanggal -->
     <div class="mb-3 max-w-xs">
      <label class="block text-[11px] font-semibold mb-1" for="tanggal">
       Tanggal
      </label>
      <input class="w-full text-[11px] border border-[#475569] rounded px-2 py-1 bg-black text-white placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-[#3b82f6]" id="tanggal" name="tanggal" type="date" min="2023-01-01" max="2099-12-31"/>
     </div>
     <!-- Jam Mulai -->
     <div class="mb-3">
      <label class="block text-[11px] font-semibold mb-1 select-none">
       Jam Mulai
      </label>
      <div class="flex flex-wrap gap-1 overflow-x-auto scrollbar-hide" id="jamMulaiContainer">
       <button class="text-[11px] font-semibold text-[#3b82f6] border border-[#3b82f6] rounded px-2 py-[2px] min-w-[38px] select-none cursor-pointer hover:bg-[#1e40af] transition" data-time="11:00" type="button">
        11:00
       </button>
       <button class="text-[11px] font-semibold text-[#3b82f6] border border-[#3b82f6] rounded px-2 py-[2px] min-w-[38px] select-none cursor-pointer hover:bg-[#1e40af] transition" data-time="12:00" type="button">
        12:00
       </button>
       <button class="text-[11px] font-semibold text-[#3b82f6] border border-[#3b82f6] rounded px-2 py-[2px] min-w-[38px] select-none cursor-pointer hover:bg-[#1e40af] transition" data-time="13:00" type="button">
        13:00
       </button>
       <button class="text-[11px] font-semibold text-[#3b82f6] border border-[#3b82f6] rounded px-2 py-[2px] min-w-[38px] select-none cursor-pointer hover:bg-[#1e40af] transition" data-time="14:00" type="button">
        14:00
       </button>
       <button class="text-[11px] font-semibold text-[#3b82f6] border border-[#3b82f6] rounded px-2 py-[2px] min-w-[38px] select-none cursor-pointer hover:bg-[#1e40af] transition" data-time="15:00" type="button">
        15:00
       </button>
       <button class="text-[11px] font-semibold text-[#3b82f6] border border-[#3b82f6] rounded px-2 py-[2px] min-w-[38px] select-none cursor-pointer hover:bg-[#1e40af] transition" data-time="16:00" type="button">
        16:00
       </button>
       <button class="text-[11px] font-semibold text-[#3b82f6] border border-[#3b82f6] rounded px-2 py-[2px] min-w-[38px] select-none cursor-pointer hover:bg-[#1e40af] transition" data-time="17:00" type="button">
        17:00
       </button>
       <button class="text-[11px] font-semibold text-[#3b82f6] border border-[#3b82f6] rounded px-2 py-[2px] min-w-[38px] select-none cursor-pointer hover:bg-[#1e40af] transition" data-time="18:00" type="button">
        18:00
       </button>
       <button class="text-[11px] font-semibold text-[#3b82f6] border border-[#3b82f6] rounded px-2 py-[2px] min-w-[38px] select-none cursor-pointer hover:bg-[#1e40af] transition" data-time="19:00" type="button">
        19:00
       </button>
       <button class="text-[11px] font-semibold text-[#3b82f6] border border-[#3b82f6] rounded px-2 py-[2px] min-w-[38px] select-none cursor-pointer hover:bg-[#1e40af] transition" data-time="20:00" type="button">
        20:00
       </button>
       <button class="text-[11px] font-semibold text-[#3b82f6] border border-[#3b82f6] rounded px-2 py-[2px] min-w-[38px] select-none cursor-pointer hover:bg-[#1e40af] transition" data-time="21:00" type="button">
        21:00
       </button>
       <button class="text-[11px] font-semibold text-[#3b82f6] border border-[#3b82f6] rounded px-2 py-[2px] min-w-[38px] select-none cursor-pointer hover:bg-[#1e40af] transition" data-time="22:00" type="button">
        22:00
       </button>
      </div>
     </div>
     <!-- Durasi -->
     <div class="mb-3">
      <label class="block text-[11px] font-semibold mb-1 select-none">
       Durasi
      </label>
      <div class="flex gap-2" id="durasiContainer">
       <button class="text-[11px] font-semibold text-[#3b82f6] border border-[#3b82f6] rounded px-2 py-[2px] select-none cursor-pointer hover:bg-[#1e40af] transition" data-duration="1 Jam" type="button">
        1 Jam
       </button>
       <button class="text-[11px] font-semibold text-[#3b82f6] border border-[#3b82f6] rounded px-2 py-[2px] select-none cursor-pointer hover:bg-[#1e40af] transition" data-duration="2 Jam" type="button">
        2 Jam
       </button>
       <button class="text-[11px] font-semibold text-[#3b82f6] border border-[#3b82f6] rounded px-2 py-[2px] select-none cursor-pointer hover:bg-[#1e40af] transition" data-duration="3 Jam" type="button">
        3 Jam
       </button>
      </div>
     </div>
     <!-- Jam Selesai -->
     <div class="text-[11px] font-semibold select-none">
      Jam Selesai
     </div>
     <div class="text-[11px] font-normal mt-1 select-none" id="jamSelesai">
      00:00
     </div>
    </fieldset>
    <!-- Tambah Makanan -->
    <fieldset class="border border-[#334155] rounded-md p-3 mb-4 select-none shadow-[0_0_15px_0_rgba(255,255,255,0.1)]">
     <legend class="text-[11px] font-semibold text-[#3b82f6] px-2 flex justify-between items-center">
      <span>
       Tambah Makanan
      </span>
      <span class="text-[11px] font-normal text-[#3b82f6]" id="makananCount">
       0 dipilih
      </span>
     </legend>
     <div class="flex items-center border border-[#3b82f6] rounded p-1 mt-2">
      <img alt="Nasi Goreng on a plate with garnish and side dishes" class="w-[50px] h-[50px] rounded border border-[#475569]" height="50" src="https://storage.googleapis.com/a1aa/image/96915b91-2b51-4feb-74e1-e2d574d86e31.jpg" width="50"/>
      <div class="ml-2 flex-1 text-[11px] text-white">
       <div class="font-semibold text-[#3b82f6]">
        Nasi Goreng
       </div>
       <div class="text-white font-normal">
        Rp 20.000 / pcs
       </div>
      </div>
      <div class="flex flex-col gap-1 ml-2">
       <button aria-label="Add Nasi Goreng" class="text-[#3b82f6] border border-[#3b82f6] rounded-full w-6 h-6 flex items-center justify-center select-none hover:bg-[#1e40af] transition" data-action="add" data-item="Nasi Goreng" type="button">
        <i class="fas fa-plus text-[11px]">
        </i>
       </button>
       <button aria-label="Remove Nasi Goreng" class="text-[#3b82f6] border border-[#3b82f6] rounded-full w-6 h-6 flex items-center justify-center select-none hover:bg-[#1e40af] transition" data-action="remove" data-item="Nasi Goreng" type="button">
        <i class="fas fa-minus text-[11px]">
        </i>
       </button>
      </div>
     </div>
    </fieldset>
    <!-- Tambah Minuman -->
    <fieldset class="border border-[#334155] rounded-md p-3 mb-4 select-none shadow-[0_0_15px_0_rgba(255,255,255,0.1)]">
     <legend class="text-[11px] font-semibold text-[#3b82f6] px-2 flex justify-between items-center">
      <span>
       Tambah Minuman
      </span>
      <span class="text-[11px] font-normal text-[#3b82f6]" id="minumanCount">
       0 dipilih
      </span>
     </legend>
     <div class="flex items-center border border-[#3b82f6] rounded p-1 mt-2">
      <img alt="Root Calm Blend drink in a transparent cup with blue label" class="w-[50px] h-[50px] rounded border border-[#475569]" height="50" src="https://storage.googleapis.com/a1aa/image/05d5fd62-65a3-4bbb-e731-7612f67473f0.jpg" width="50"/>
      <div class="ml-2 flex-1 text-[11px] text-white">
       <div class="font-semibold text-[#3b82f6]">
        Root Calm Blend
       </div>
       <div class="text-white font-normal">
        Rp 18.000 / pcs
       </div>
      </div>
      <div class="flex flex-col gap-1 ml-2">
       <button aria-label="Add Root Calm Blend" class="text-[#3b82f6] border border-[#3b82f6] rounded-full w-6 h-6 flex items-center justify-center select-none hover:bg-[#1e40af] transition" data-action="add" data-item="Root Calm Blend" type="button">
        <i class="fas fa-plus text-[11px]">
        </i>
       </button>
       <button aria-label="Remove Root Calm Blend" class="text-[#3b82f6] border border-[#3b82f6] rounded-full w-6 h-6 flex items-center justify-center select-none hover:bg-[#1e40af] transition" data-action="remove" data-item="Root Calm Blend" type="button">
        <i class="fas fa-minus text-[11px]">
        </i>
       </button>
      </div>
     </div>
     <div class="flex items-center border border-[#3b82f6] rounded p-1 mt-2">
      <img alt="Es Dagen drink in a glass with ice and garnish" class="w-[50px] h-[50px] rounded border border-[#475569]" height="50" src="https://storage.googleapis.com/a1aa/image/db26154d-63af-4d31-5ca9-4e9d0df21109.jpg" width="50"/>
      <div class="ml-2 flex-1 text-[11px] text-white">
       <div class="font-semibold text-[#3b82f6]">
        Es Dagen
       </div>
       <div class="text-white font-normal">
        Rp 22.000 / pcs
       </div>
      </div>
      <div class="flex flex-col gap-1 ml-2">
       <button aria-label="Add Es Dagen" class="text-[#3b82f6] border border-[#3b82f6] rounded-full w-6 h-6 flex items-center justify-center select-none hover:bg-[#1e40af] transition" data-action="add" data-item="Es Dagen" type="button">
        <i class="fas fa-plus text-[11px]">
        </i>
       </button>
       <button aria-label="Remove Es Dagen" class="text-[#3b82f6] border border-[#3b82f6] rounded-full w-6 h-6 flex items-center justify-center select-none hover:bg-[#1e40af] transition" data-action="remove" data-item="Es Dagen" type="button">
        <i class="fas fa-minus text-[11px]">
        </i>
       </button>
      </div>
     </div>
     <div class="flex items-center border border-[#3b82f6] rounded p-1 mt-2">
      <img alt="Ice Tea drink in a glass with ice cubes" class="w-[50px] h-[50px] rounded border border-[#475569]" height="50" src="https://storage.googleapis.com/a1aa/image/b76cc65f-9b19-4a57-71d1-6211c536b0b8.jpg" width="50"/>
      <div class="ml-2 flex-1 text-[11px] text-white">
       <div class="font-semibold text-[#3b82f6]">
        Ice Tea
       </div>
       <div class="text-white font-normal">
        Rp 14.000 / pcs
       </div>
      </div>
      <div class="flex flex-col gap-1 ml-2">
       <button aria-label="Add Ice Tea" class="text-[#3b82f6] border border-[#3b82f6] rounded-full w-6 h-6 flex items-center justify-center select-none hover:bg-[#1e40af] transition" data-action="add" data-item="Ice Tea" type="button">
        <i class="fas fa-plus text-[11px]">
        </i>
       </button>
       <button aria-label="Remove Ice Tea" class="text-[#3b82f6] border border-[#3b82f6] rounded-full w-6 h-6 flex items-center justify-center select-none hover:bg-[#1e40af] transition" data-action="remove" data-item="Ice Tea" type="button">
        <i class="fas fa-minus text-[11px]">
        </i>
       </button>
      </div>
     </div>
    </fieldset>
    <!-- Buttons -->
    <div class="flex flex-col gap-2">
     <button class="w-full text-[11px] font-semibold text-[#3b82f6] border border-[#3b82f6] rounded px-2 py-1 flex justify-center items-center gap-1 hover:bg-[#1e40af] transition select-none" id="lanjutkanBtn" type="submit">
      Lanjutkan Pemesanan
      <i class="fas fa-arrow-right text-[11px]">
      </i>
     </button>
     <button class="w-full text-[11px] font-semibold text-[#3b82f6] border border-[#3b82f6] rounded px-2 py-1 flex justify-center items-center gap-1 hover:bg-[#1e40af] transition select-none" id="batalBtn" type="button">
      <i class="fas fa-trash-alt text-[11px]">
      </i>
      Batal &amp; Hapus Booking
     </button>
    </div>
   </form>
  </div>
  <script>
   // Set tanggal input default to today
   const tanggalInput = document.getElementById('tanggal');
   const today = new Date().toISOString().split('T')[0];
   tanggalInput.value = today;

   // Variables to hold selected values
   let selectedRuangan = null;
   let selectedJamMulai = null;
   let selectedDurasi = null;
   let makananCount = 0;
   let minumanCount = 0;

   // Ruangan buttons
   const regulerBtn = document.getElementById('regulerBtn');
   const vipBtn = document.getElementById('vipBtn');

   function updateRuanganSelection(selectedBtn) {
     [regulerBtn, vipBtn].forEach(btn => {
       if (btn === selectedBtn) {
         btn.classList.add('bg-[#1e40af]');
         btn.classList.remove('hover:bg-[#1e40af]');
       } else {
         btn.classList.remove('bg-[#1e40af]');
         btn.classList.add('hover:bg-[#1e40af]');
       }
     });
     selectedRuangan = selectedBtn.textContent.trim();
   }

   regulerBtn.addEventListener('click', () => updateRuanganSelection(regulerBtn));
   vipBtn.addEventListener('click', () => updateRuanganSelection(vipBtn));

   // Jam Mulai buttons
   const jamMulaiContainer = document.getElementById('jamMulaiContainer');
   const jamButtons = jamMulaiContainer.querySelectorAll('button');
   const jamSelesaiDisplay = document.getElementById('jamSelesai');

   // Durasi buttons
   const durasiContainer = document.getElementById('durasiContainer');
   const durasiButtons = durasiContainer.querySelectorAll('button');

   function clearSelection(buttons) {
     buttons.forEach(btn => {
       btn.classList.remove('bg-[#1e40af]');
       btn.classList.add('hover:bg-[#1e40af]');
     });
   }

   function addSelection(buttons, selectedBtn) {
     selectedBtn.classList.add('bg-[#1e40af]');
     selectedBtn.classList.remove('hover:bg-[#1e40af]');
   }

   function timeToMinutes(timeStr) {
     const [h, m] = timeStr.split(':').map(Number);
     return h * 60 + m;
   }

   function minutesToTime(mins) {
     const h = Math.floor(mins / 60);
     const m = mins % 60;
     return `${h.toString().padStart(2, '0')}:${m.toString().padStart(2, '0')}`;
   }

   function updateJamSelesai() {
     if (!selectedJamMulai || !selectedDurasi) {
       jamSelesaiDisplay.textContent = '00:00';
       return;
     }
     const startMins = timeToMinutes(selectedJamMulai);
     const durasiJam = parseInt(selectedDurasi);
     let endMins = startMins + durasiJam * 60;
     if (endMins >= 24 * 60) endMins -= 24 * 60; // wrap around midnight
     jamSelesaiDisplay.textContent = minutesToTime(endMins);
   }

   jamButtons.forEach(btn => {
     btn.addEventListener('click', () => {
       clearSelection(jamButtons);
       addSelection(jamButtons, btn);
       selectedJamMulai = btn.getAttribute('data-time');
       updateJamSelesai();
     });
   });

   durasiButtons.forEach(btn => {
     btn.addEventListener('click', () => {
       clearSelection(durasiButtons);
       addSelection(durasiButtons, btn);
       selectedDurasi = btn.getAttribute('data-duration').split(' ')[0]; // get number only
       updateJamSelesai();
     });
   });

   // Makanan and Minuman counts
   const makananCountDisplay = document.getElementById('makananCount');
   const minumanCountDisplay = document.getElementById('minumanCount');

   function updateCountDisplays() {
     makananCountDisplay.textContent = `${makananCount} dipilih`;
     minumanCountDisplay.textContent = `${minumanCount} dipilih`;
   }

   // Add and Remove buttons for makanan and minuman
   const itemButtons = document.querySelectorAll('button[data-item][data-action]');
   itemButtons.forEach(btn => {
     btn.addEventListener('click', () => {
       const item = btn.getAttribute('data-item');
       const action = btn.getAttribute('data-action');
       if (item === 'Nasi Goreng') {
         if (action === 'add') makananCount++;
         else if (action === 'remove' && makananCount > 0) makananCount--;
       } else {
         if (action === 'add') minumanCount++;
         else if (action === 'remove' && minumanCount > 0) minumanCount--;
       }
       updateCountDisplays();
     });
   });

   // Lanjutkan Pemesanan button
   const lanjutkanBtn = document.getElementById('lanjutkanBtn');
   lanjutkanBtn.addEventListener('click', () => {
     if (!selectedRuangan) {
       alert('Silakan pilih Ruangan.');
       return;
     }
     if (!tanggalInput.value) {
       alert('Silakan tentukan Tanggal.');
       return;
     }
     if (!selectedJamMulai) {
       alert('Silakan pilih Jam Mulai.');
       return;
     }
     if (!selectedDurasi) {
       alert('Silakan pilih Durasi.');
       return;
     }
     alert('Pemesanan berhasil!\n' +
       `Ruangan: ${selectedRuangan}\n` +
       `Tanggal: ${tanggalInput.value}\n` +
       `Jam Mulai: ${selectedJamMulai}\n` +
       `Durasi: ${selectedDurasi} Jam\n` +
       `Jam Selesai: ${jamSelesaiDisplay.textContent}\n` +
       `Makanan dipilih: ${makananCount}\n` +
       `Minuman dipilih: ${minumanCount}`);
   });

   // Batal & Hapus Booking button
   const batalBtn = document.getElementById('batalBtn');
   batalBtn.addEventListener('click', () => {
     // Reset all selections and inputs
     selectedRuangan = null;
     selectedJamMulai = null;
     selectedDurasi = null;
     makananCount = 0;
     minumanCount = 0;
     tanggalInput.value = today;
     clearSelection([regulerBtn, vipBtn]);
     clearSelection(jamButtons);
     clearSelection(durasiButtons);
     jamSelesaiDisplay.textContent = '00:00';
     updateCountDisplays();
   });
  </script>
 </body>
</html>