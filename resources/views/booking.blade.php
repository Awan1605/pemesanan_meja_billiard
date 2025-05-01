<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Pesan & Tentukan Tanggal</title>
    
    <!-- Tailwind CSS with DaisyUI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    
    <!-- Custom styles -->
    <style>
        .time-btn {
            min-width: 4.5rem;
        }
        
        .item-card {
            transition: all 0.2s ease;
        }
        
        .item-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
    </style>
</head>
<body class="bg-base-100 min-h-screen">
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-primary">Pesan & Tentukan Tanggal</h1>
            <p class="text-sm text-gray-500 mt-2">Booking ruangan karaoke dengan mudah</p>
        </div>
        
        <!-- Booking Form -->
        <form id="bookingForm" class="bg-base-200 rounded-lg shadow-lg p-6" method="POST">
            @csrf
            
            <!-- Room Selection -->
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-4 flex items-center">
                    <i class="fas fa-door-open mr-2"></i>
                    Pilih Ruangan
                </h2>
                <div class="flex flex-wrap gap-4">
                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <input type="radio" name="room_type" value="regular" class="radio radio-primary" checked />
                            <span class="label-text ml-2">Classic</span> 
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <input type="radio" name="room_type" value="vip" class="radio radio-primary" />
                            <span class="label-text ml-2">Exclusive</span> 
                        </label>
                    </div>
                </div>
            </div>
            
            <!-- Date Picker -->
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-4 flex items-center">
                    <i class="far fa-calendar-alt mr-2"></i>
                    Pilih Tanggal
                </h2>
                <input 
                    type="date" 
                    name="booking_date" 
                    class="input input-bordered input-primary w-full" 
                    min="{{ date('Y-m-d') }}" 
                    max="{{ date('Y-m-d', strtotime('+3 months')) }}"
                    value="{{ date('Y-m-d') }}"
                    required
                />
            </div>
            
            <!-- Time Selection -->
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-4 flex items-center">
                    <i class="far fa-clock mr-2"></i>
                    Pilih Waktu
                </h2>
                
                <div class="mb-4">
                    <label class="label">
                        <span class="label-text">Jam Mulai</span>
                    </label>
                    <div class="flex flex-wrap gap-2">
                        @foreach(['11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00'] as $time)
                            <button 
                                type="button" 
                                class="btn btn-outline btn-sm time-btn time-option" 
                                data-time="{{ $time }}"
                            >
                                {{ $time }}
                            </button>
                        @endforeach
                    </div>
                    <input type="hidden" name="start_time" id="startTimeInput" required>
                </div>
                
                <div class="mb-4">
                    <label class="label">
                        <span class="label-text">Durasi</span>
                    </label>
                    <div class="flex flex-wrap gap-2">
                        @foreach([1, 2, 3] as $hours)
                            <button 
                                type="button" 
                                class="btn btn-outline btn-sm duration-option" 
                                data-duration="{{ $hours }}"
                            >
                                {{ $hours }} Jam
                            </button>
                        @endforeach
                    </div>
                    <input type="hidden" name="duration" id="durationInput" required>
                </div>
                
                <div class="bg-base-300 p-3 rounded-lg">
                    <div class="flex justify-between items-center">
                        <span class="font-medium">Jam Selesai:</span>
                        <span id="endTimeDisplay" class="font-bold">--:--</span>
                    </div>
                </div>
            </div>
            
            <!-- Food Selection -->
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-4 flex items-center justify-between">
                    <span><i class="fas fa-utensils mr-2"></i>Tambah Makanan</span>
                    <span class="badge badge-primary" id="foodCountBadge">0 dipilih</span>
                </h2>
                
                <div class="space-y-3">
                    <!-- Food Item 1 -->
                    <div class="item-card card card-side bg-base-100 shadow-sm border border-primary/20">
                        <figure class="p-2">
                            <img src="https://storage.googleapis.com/a1aa/image/96915b91-2b51-4feb-74e1-e2d574d86e31.jpg" 
                                 alt="Nasi Goreng" 
                                 class="w-16 h-16 object-cover rounded-lg"/>
                        </figure>
                        <div class="card-body p-3">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="card-title text-sm">Nasi Goreng</h3>
                                    <p class="text-xs text-gray-500">Rp 20.000 / pcs</p>
                                </div>
                                <div class="flex items-center gap-2">
                                    <button type="button" class="btn btn-circle btn-xs btn-outline btn-primary decrement-food" data-item="nasi_goreng">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <span class="text-sm w-4 text-center" id="nasi_goreng_qty">0</span>
                                    <button type="button" class="btn btn-circle btn-xs btn-outline btn-primary increment-food" data-item="nasi_goreng">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Drink Selection -->
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-4 flex items-center justify-between">
                    <span><i class="fas fa-glass-whiskey mr-2"></i>Tambah Minuman</span>
                    <span class="badge badge-primary" id="drinkCountBadge">0 dipilih</span>
                </h2>
                
                <div class="space-y-3">
                    <!-- Drink Item 1 -->
                    <div class="item-card card card-side bg-base-100 shadow-sm border border-primary/20">
                        <figure class="p-2">
                            <img src="https://storage.googleapis.com/a1aa/image/05d5fd62-65a3-4bbb-e731-7612f67473f0.jpg" 
                                 alt="Root Calm Blend" 
                                 class="w-16 h-16 object-cover rounded-lg"/>
                        </figure>
                        <div class="card-body p-3">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="card-title text-sm">Root Calm Blend</h3>
                                    <p class="text-xs text-gray-500">Rp 18.000 / pcs</p>
                                </div>
                                <div class="flex items-center gap-2">
                                    <button type="button" class="btn btn-circle btn-xs btn-outline btn-primary decrement-drink" data-item="root_calm">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <span class="text-sm w-4 text-center" id="root_calm_qty">0</span>
                                    <button type="button" class="btn btn-circle btn-xs btn-outline btn-primary increment-drink" data-item="root_calm">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Drink Item 2 -->
                    <div class="item-card card card-side bg-base-100 shadow-sm border border-primary/20">
                        <figure class="p-2">
                            <img src="https://storage.googleapis.com/a1aa/image/db26154d-63af-4d31-5ca9-4e9d0df21109.jpg" 
                                 alt="Es Dagen" 
                                 class="w-16 h-16 object-cover rounded-lg"/>
                        </figure>
                        <div class="card-body p-3">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="card-title text-sm">Es Dagen</h3>
                                    <p class="text-xs text-gray-500">Rp 22.000 / pcs</p>
                                </div>
                                <div class="flex items-center gap-2">
                                    <button type="button" class="btn btn-circle btn-xs btn-outline btn-primary decrement-drink" data-item="es_dagen">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <span class="text-sm w-4 text-center" id="es_dagen_qty">0</span>
                                    <button type="button" class="btn btn-circle btn-xs btn-outline btn-primary increment-drink" data-item="es_dagen">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Drink Item 3 -->
                    <div class="item-card card card-side bg-base-100 shadow-sm border border-primary/20">
                        <figure class="p-2">
                            <img src="https://storage.googleapis.com/a1aa/image/b76cc65f-9b19-4a57-71d1-6211c536b0b8.jpg" 
                                 alt="Ice Tea" 
                                 class="w-16 h-16 object-cover rounded-lg"/>
                        </figure>
                        <div class="card-body p-3">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="card-title text-sm">Ice Tea</h3>
                                    <p class="text-xs text-gray-500">Rp 14.000 / pcs</p>
                                </div>
                                <div class="flex items-center gap-2">
                                    <button type="button" class="btn btn-circle btn-xs btn-outline btn-primary decrement-drink" data-item="ice_tea">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <span class="text-sm w-4 text-center" id="ice_tea_qty">0</span>
                                    <button type="button" class="btn btn-circle btn-xs btn-outline btn-primary increment-drink" data-item="ice_tea">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Form Actions -->
            <div class="flex flex-col gap-3 mt-8">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-arrow-right mr-2"></i>
                    Lanjutkan Pemesanan
                </button>
                <button type="button" id="resetBtn" class="btn btn-outline btn-error">
                    <i class="fas fa-trash-alt mr-2"></i>
                    Batal & Hapus Booking
                </button>
            </div>
        </form>
    </div>

    <!-- Confirmation Modal -->
    <dialog id="confirmModal" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Konfirmasi Pemesanan</h3>
            <div class="py-4 space-y-2">
                <p><span class="font-semibold">Ruangan:</span> <span id="confirmRoom"></span></p>
                <p><span class="font-semibold">Tanggal:</span> <span id="confirmDate"></span></p>
                <p><span class="font-semibold">Waktu:</span> <span id="confirmTime"></span></p>
                <p><span class="font-semibold">Durasi:</span> <span id="confirmDuration"></span></p>
                <p><span class="font-semibold">Makanan:</span> <span id="confirmFood"></span></p>
                <p><span class="font-semibold">Minuman:</span> <span id="confirmDrink"></span></p>
            </div>
            <div class="modal-action">
                <form method="dialog">
                    <button class="btn btn-outline">Kembali</button>
                </form>
                <button id="finalSubmit" class="btn btn-primary">Konfirmasi</button>
            </div>
        </div>
    </dialog>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Time selection
            const timeOptions = document.querySelectorAll('.time-option');
            const durationOptions = document.querySelectorAll('.duration-option');
            const endTimeDisplay = document.getElementById('endTimeDisplay');
            const startTimeInput = document.getElementById('startTimeInput');
            const durationInput = document.getElementById('durationInput');
            
            // Food and drink counters
            const incrementFoodBtns = document.querySelectorAll('.increment-food');
            const decrementFoodBtns = document.querySelectorAll('.decrement-food');
            const incrementDrinkBtns = document.querySelectorAll('.increment-drink');
            const decrementDrinkBtns = document.querySelectorAll('.decrement-drink');
            const foodCountBadge = document.getElementById('foodCountBadge');
            const drinkCountBadge = document.getElementById('drinkCountBadge');
            
            // Form elements
            const bookingForm = document.getElementById('bookingForm');
            const resetBtn = document.getElementById('resetBtn');
            const confirmModal = document.getElementById('confirmModal');
            const finalSubmit = document.getElementById('finalSubmit');
            
            // Initialize counters
            let foodItems = {
                nasi_goreng: 0
            };
            
            let drinkItems = {
                root_calm: 0,
                es_dagen: 0,
                ice_tea: 0
            };
            
            // Time selection functions
            function timeToMinutes(timeStr) {
                const [h, m] = timeStr.split(':').map(Number);
                return h * 60 + m;
            }
            
            function minutesToTime(mins) {
                const h = Math.floor(mins / 60);
                const m = mins % 60;
                return `${h.toString().padStart(2, '0')}:${m.toString().padStart(2, '0')}`;
            }
            
            function updateEndTime() {
                if (!startTimeInput.value || !durationInput.value) {
                    endTimeDisplay.textContent = '--:--';
                    return;
                }
                
                const startMins = timeToMinutes(startTimeInput.value);
                const durationMins = parseInt(durationInput.value) * 60;
                let endMins = startMins + durationMins;
                
                if (endMins >= 24 * 60) endMins -= 24 * 60;
                
                endTimeDisplay.textContent = minutesToTime(endMins);
            }
            
            // Time option selection
            timeOptions.forEach(option => {
                option.addEventListener('click', function() {
                    timeOptions.forEach(btn => btn.classList.remove('btn-primary', 'text-white'));
                    this.classList.add('btn-primary', 'text-white');
                    startTimeInput.value = this.dataset.time;
                    updateEndTime();
                });
            });
            
            // Duration option selection
            durationOptions.forEach(option => {
                option.addEventListener('click', function() {
                    durationOptions.forEach(btn => btn.classList.remove('btn-primary', 'text-white'));
                    this.classList.add('btn-primary', 'text-white');
                    durationInput.value = this.dataset.duration;
                    updateEndTime();
                });
            });
            
            // Food and drink quantity handlers
            function updateQuantity(item, type, change) {
                const qtyElement = document.getElementById(`${item}_qty`);
                let newQty = parseInt(qtyElement.textContent) + change;
                
                if (newQty < 0) newQty = 0;
                
                qtyElement.textContent = newQty;
                
                if (type === 'food') {
                    foodItems[item] = newQty;
                    updateCounterBadge(foodCountBadge, foodItems);
                } else {
                    drinkItems[item] = newQty;
                    updateCounterBadge(drinkCountBadge, drinkItems);
                }
            }
            
            function updateCounterBadge(badge, items) {
                const total = Object.values(items).reduce((sum, qty) => sum + qty, 0);
                badge.textContent = `${total} dipilih`;
            }
            
            incrementFoodBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    updateQuantity(this.dataset.item, 'food', 1);
                });
            });
            
            decrementFoodBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    updateQuantity(this.dataset.item, 'food', -1);
                });
            });
            
            incrementDrinkBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    updateQuantity(this.dataset.item, 'drink', 1);
                });
            });
            
            decrementDrinkBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    updateQuantity(this.dataset.item, 'drink', -1);
                });
            });
            
            // Form submission
            bookingForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Validate form
                if (!startTimeInput.value) {
                    showToast('Silakan pilih jam mulai', 'error');
                    return;
                }
                
                if (!durationInput.value) {
                    showToast('Silakan pilih durasi', 'error');
                    return;
                }
                
                // Populate confirmation modal
                document.getElementById('confirmRoom').textContent = 
                    document.querySelector('input[name="room_type"]:checked').nextElementSibling.textContent;
                
                document.getElementById('confirmDate').textContent = 
                    document.querySelector('input[name="booking_date"]').value;
                
                document.getElementById('confirmTime').textContent = 
                    `${startTimeInput.value} - ${endTimeDisplay.textContent}`;
                
                document.getElementById('confirmDuration').textContent = 
                    `${durationInput.value} Jam`;
                
                document.getElementById('confirmFood').textContent = 
                    foodItems.nasi_goreng > 0 ? `${foodItems.nasi_goreng} Nasi Goreng` : 'Tidak ada';
                
                const drinkSummary = [];
                if (drinkItems.root_calm > 0) drinkSummary.push(`${drinkItems.root_calm} Root Calm`);
                if (drinkItems.es_dagen > 0) drinkSummary.push(`${drinkItems.es_dagen} Es Dagen`);
                if (drinkItems.ice_tea > 0) drinkSummary.push(`${drinkItems.ice_tea} Ice Tea`);
                
                document.getElementById('confirmDrink').textContent = 
                    drinkSummary.length > 0 ? drinkSummary.join(', ') : 'Tidak ada';
                
                // Show modal
                confirmModal.showModal();
            });
            
            // Final submission
            finalSubmit.addEventListener('click', function() {
                // Here you would typically submit the form to the server
                // For demo, we'll just show a success message
                confirmModal.close();
                showToast('Pemesanan berhasil!', 'success');
                
                // Reset form after successful submission
                resetForm();
            });
            
            // Reset form
            resetBtn.addEventListener('click', resetForm);
            
            function resetForm() {
                // Reset room selection
                document.querySelector('input[name="room_type"][value="regular"]').checked = true;
                
                // Reset date to today
                document.querySelector('input[name="booking_date"]').value = new Date().toISOString().split('T')[0];
                
                // Reset time selection
                timeOptions.forEach(btn => btn.classList.remove('btn-primary', 'text-white'));
                durationOptions.forEach(btn => btn.classList.remove('btn-primary', 'text-white'));
                startTimeInput.value = '';
                durationInput.value = '';
                endTimeDisplay.textContent = '--:--';
                
                // Reset food and drink counters
                for (let item in foodItems) {
                    foodItems[item] = 0;
                    document.getElementById(`${item}_qty`).textContent = '0';
                }
                
                for (let item in drinkItems) {
                    drinkItems[item] = 0;
                    document.getElementById(`${item}_qty`).textContent = '0';
                }
                
                updateCounterBadge(foodCountBadge, foodItems);
                updateCounterBadge(drinkCountBadge, drinkItems);
            }
            
            // Toast notification function
            function showToast(message, type = 'info') {
                const toast = document.createElement('div');
                toast.className = `alert alert-${type} fixed top-4 right-4 max-w-xs shadow-lg`;
                toast.innerHTML = `
                    <div>
                        <span>${message}</span>
                    </div>
                `;
                
                document.body.appendChild(toast);
                
                setTimeout(() => {
                    toast.classList.add('opacity-0', 'transition-opacity', 'duration-300');
                    setTimeout(() => toast.remove(), 300);
                }, 3000);
            }
        });
    </script>
</body>
</html>