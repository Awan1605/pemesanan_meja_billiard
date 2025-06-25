<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pesan & Tentukan Tanggal</title>

    <!-- Tailwind CSS with DaisyUI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

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

        .payment-method {
            transition: all 0.2s ease;
            border: 2px solid transparent;
        }

        .payment-method:hover {
            transform: translateY(-2px);
            border-color: hsl(var(--p));
        }

        .payment-method.selected {
            border-color: hsl(var(--p));
            background-color: hsl(var(--p)/0.1);
        }
    </style>
</head>

<body class="bg-base-100 min-h-screen">
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-primary">Pesan & Tentukan Tanggal</h1>
            <p class="text-sm text-gray-500 mt-2">Reservasi Meja Billiard Dengan Mudah</p>
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
                            <input type="radio" name="room_type" value="regular" class="radio radio-primary"
                                checked />
                            <span class="label-text ml-2">Classic (Rp 35.000/jam)</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <input type="radio" name="room_type" value="vip" class="radio radio-primary" />
                            <span class="label-text ml-2">Exclusive (Rp 50.000/jam)</span>
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
                <input type="date" name="booking_date" class="input input-bordered input-primary w-full"
                    min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+3 months')) }}"
                    value="{{ date('Y-m-d') }}" required />
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
                    <div class="flex flex-wrap gap-2" id="timeOptionsContainer">
                        @foreach (['11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00', '00:00'] as $time)
                            <button type="button" class="btn btn-outline btn-sm time-btn time-option"
                                data-time="{{ $time }}">
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
                        @foreach ([1, 2, 3] as $hours)
                            <button type="button" class="btn btn-outline btn-sm duration-option"
                                data-duration="{{ $hours }}">
                                {{ $hours }} Jam
                            </button>
                        @endforeach
                    </div>
                    <input type="hidden" name="duration" id="durationInput" required>
                </div>
                <div class="mb-4 bg-base-300 p-3 rounded-lg">
                    <div class="flex justify-between items-center">
                        <span class="font-medium">Harga:</span>
                        <span id="priceDisplay" class="font-bold">Rp 0</span>
                    </div>
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
                                alt="Nasi Goreng" class="w-16 h-16 object-cover rounded-lg" />
                        </figure>
                        <div class="card-body p-3">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="card-title text-sm">Nasi Goreng</h3>
                                    <p class="text-xs text-gray-500">Rp 20.000 / pcs</p>
                                </div>
                                <div class="flex items-center gap-2">
                                    <button type="button"
                                        class="btn btn-circle btn-xs btn-outline btn-primary decrement-food"
                                        data-item="nasi_goreng">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <span class="text-sm w-4 text-center" id="nasi_goreng_qty">0</span>
                                    <button type="button"
                                        class="btn btn-circle btn-xs btn-outline btn-primary increment-food"
                                        data-item="nasi_goreng">
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
                                alt="Root Calm Blend" class="w-16 h-16 object-cover rounded-lg" />
                        </figure>
                        <div class="card-body p-3">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="card-title text-sm">Root Calm Blend</h3>
                                    <p class="text-xs text-gray-500">Rp 18.000 / pcs</p>
                                </div>
                                <div class="flex items-center gap-2">
                                    <button type="button"
                                        class="btn btn-circle btn-xs btn-outline btn-primary decrement-drink"
                                        data-item="root_calm">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <span class="text-sm w-4 text-center" id="root_calm_qty">0</span>
                                    <button type="button"
                                        class="btn btn-circle btn-xs btn-outline btn-primary increment-drink"
                                        data-item="root_calm">
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
                                alt="Es Dagen" class="w-16 h-16 object-cover rounded-lg" />
                        </figure>
                        <div class="card-body p-3">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="card-title text-sm">Es Dagen</h3>
                                    <p class="text-xs text-gray-500">Rp 22.000 / pcs</p>
                                </div>
                                <div class="flex items-center gap-2">
                                    <button type="button"
                                        class="btn btn-circle btn-xs btn-outline btn-primary decrement-drink"
                                        data-item="es_dagen">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <span class="text-sm w-4 text-center" id="es_dagen_qty">0</span>
                                    <button type="button"
                                        class="btn btn-circle btn-xs btn-outline btn-primary increment-drink"
                                        data-item="es_dagen">
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
                                alt="Ice Tea" class="w-16 h-16 object-cover rounded-lg" />
                        </figure>
                        <div class="card-body p-3">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="card-title text-sm">Ice Tea</h3>
                                    <p class="text-xs text-gray-500">Rp 14.000 / pcs</p>
                                </div>
                                <div class="flex items-center gap-2">
                                    <button type="button"
                                        class="btn btn-circle btn-xs btn-outline btn-primary decrement-drink"
                                        data-item="ice_tea">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <span class="text-sm w-4 text-center" id="ice_tea_qty">0</span>
                                    <button type="button"
                                        class="btn btn-circle btn-xs btn-outline btn-primary increment-drink"
                                        data-item="ice_tea">
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
                    <a href="lending_page">Batal & Hapus Booking</a>
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
                <p><span class="font-semibold">Harga Ruangan:</span> <span id="confirmPrice"></span></p>
                <p><span class="font-semibold">Makanan:</span> <span id="confirmFood"></span></p>
                <p><span class="font-semibold">Minuman:</span> <span id="confirmDrink"></span></p>
                <p class="pt-2 border-t"><span class="font-semibold">Total Harga:</span> <span id="confirmTotal"
                        class="text-lg font-bold text-primary"></span></p>
            </div>
            <div class="modal-action">
                <form method="dialog">
                    <button class="btn btn-outline">Kembali</button>
                </form>
                <button id="finalSubmit" class="btn btn-primary">Konfirmasi</button>
            </div>
        </div>
    </dialog>

    <!-- Payment Method Modal -->
    <dialog id="paymentModal" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Pilih Metode Pembayaran</h3>
            <div class="py-4 space-y-4">
                <div class="flex flex-col gap-3">
                    <!-- QRIS Payment -->
                    <div class="payment-method card bg-base-100 cursor-pointer" id="qrisMethod">
                        <div class="card-body p-4">
                            <div class="flex items-center gap-4">
                                <div class="bg-primary/10 p-3 rounded-lg">
                                    <i class="fas fa-qrcode text-primary text-2xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold">QRIS</h4>
                                    <p class="text-sm text-gray-500">Scan kode QR untuk pembayaran</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bank Transfer -->
                    <div class="payment-method card bg-base-100 cursor-pointer" id="bankMethod">
                        <div class="card-body p-4">
                            <div class="flex items-center gap-4">
                                <div class="bg-primary/10 p-3 rounded-lg">
                                    <i class="fas fa-university text-primary text-2xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold">Transfer Bank</h4>
                                    <p class="text-sm text-gray-500">Transfer ke rekening kami</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Details (will be shown after method selection) -->
                <div id="paymentDetails" class="hidden mt-4 p-4 bg-base-200 rounded-lg">
                    <div id="qrisDetails" class="hidden">
                        <div class="text-center">
                            <p class="font-medium mb-2">Scan QR Code berikut untuk pembayaran:</p>
                            <div class="bg-white p-4 rounded-lg inline-block">
                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://example.com/pay/12345"
                                    alt="QR Code Pembayaran" class="w-40 h-40 mx-auto" />
                            </div>
                            <p class="text-sm mt-2 text-gray-500">Total: <span id="qrisAmount"
                                    class="font-bold"></span>
                            </p>
                        </div>
                    </div>

                    <div id="bankDetails" class="hidden">
                        <div class="space-y-2">
                            <p class="font-medium">Silakan transfer ke rekening berikut:</p>
                            <div class="bg-base-100 p-3 rounded-lg">
                                <p class="font-semibold">Bank ABC</p>
                                <p class="text-lg font-bold">1234 5678 9012 3456</p>
                                <p class="text-sm">a/n Karaoke Happy</p>
                            </div>
                            <p class="text-sm">Total: <span id="bankAmount" class="font-bold"></span></p>
                            <p class="text-xs text-gray-500">*Konfirmasi pembayaran akan diproses dalam 1x24 jam</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-action">
                <form method="dialog">
                    <button class="btn btn-outline">Kembali</button>
                </form>
                <button id="completePaymentBtn" class="btn btn-primary hidden">
                    <i class="fas fa-check-circle mr-2"></i>
                    Saya Sudah Bayar
                </button>
            </div>
        </div>
    </dialog>

    <!-- Success Modal -->
    <dialog id="successModal" class="modal">
        <div class="modal-box text-center">
            <div class="flex justify-center">
                <div class="bg-success/10 p-4 rounded-full">
                    <i class="fas fa-check-circle text-success text-5xl"></i>
                </div>
            </div>
            <h3 class="font-bold text-lg mt-4">Pembayaran Berhasil!</h3>
            <p class="py-4">Terima kasih telah melakukan pemesanan. Detail booking telah dikirim ke email Anda.</p>
            <div class="modal-action justify-center">
                <button class="btn btn-primary" onclick="window.location.href='lending_page'">
                    <i class="fas fa-home mr-2"></i>
                    Kembali ke Beranda
                </button>
            </div>
        </div>
    </dialog>

    <script>
        //Pilih Jam
        document.addEventListener('DOMContentLoaded', function() {
            function disablePastTimes() {
                const dateInput = document.querySelector('input[name="booking_date"]');
                const today = new Date();
                const selectedDate = new Date(dateInput.value);
                const nowHour = today.getHours();
                const nowMinute = today.getMinutes();

                document.querySelectorAll('.time-option').forEach(btn => {
                    const [h, m] = btn.dataset.time.split(':').map(Number);
                    let disable = false;
                    if (
                        selectedDate.toDateString() === today.toDateString() &&
                        (h < nowHour || (h === nowHour && m <= nowMinute))
                    ) {
                        disable = true;
                    }
                    btn.disabled = disable;
                    if (disable) {
                        btn.classList.add('btn-disabled', 'opacity-50', 'cursor-not-allowed');
                    } else {
                        btn.classList.remove('btn-disabled', 'opacity-50', 'cursor-not-allowed');
                    }
                });
            }

            // Initial check
            disablePastTimes();

            // Re-check on date change
            document.querySelector('input[name="booking_date"]').addEventListener('change', function() {
                disablePastTimes();
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Price constants
            const ROOM_PRICES = {
                regular: 35000,
                vip: 50000
            };

            const FOOD_PRICES = {
                nasi_goreng: 20000
            };

            const DRINK_PRICES = {
                root_calm: 18000,
                es_dagen: 22000,
                ice_tea: 14000
            };

            // Elements
            const timeOptions = document.querySelectorAll('.time-option');
            const durationOptions = document.querySelectorAll('.duration-option');
            const endTimeDisplay = document.getElementById('endTimeDisplay');
            const priceDisplay = document.getElementById('priceDisplay');
            const startTimeInput = document.getElementById('startTimeInput');
            const durationInput = document.getElementById('durationInput');
            const roomTypeRadios = document.querySelectorAll('input[name="room_type"]');
            const foodCountBadge = document.getElementById('foodCountBadge');
            const drinkCountBadge = document.getElementById('drinkCountBadge');

            // Form elements
            const bookingForm = document.getElementById('bookingForm');
            const resetBtn = document.getElementById('resetBtn');
            const confirmModal = document.getElementById('confirmModal');
            const finalSubmit = document.getElementById('finalSubmit');
            const paymentModal = document.getElementById('paymentModal');
            const successModal = document.getElementById('successModal');

            // Payment elements
            const qrisMethod = document.getElementById('qrisMethod');
            const bankMethod = document.getElementById('bankMethod');
            const paymentDetails = document.getElementById('paymentDetails');
            const qrisDetails = document.getElementById('qrisDetails');
            const bankDetails = document.getElementById('bankDetails');
            const qrisAmount = document.getElementById('qrisAmount');
            const bankAmount = document.getElementById('bankAmount');
            const completePaymentBtn = document.getElementById('completePaymentBtn');

            // Payment proof elements
            const paymentProofContainer = document.createElement('div');
            paymentProofContainer.className = 'mt-4';
            paymentProofContainer.innerHTML = `
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Upload Bukti Pembayaran</span>
                    <span class="label-text-alt text-error">*wajib</span>
                </label>
                <input type="file" id="paymentProof" class="file-input file-input-bordered file-input-primary w-full" 
                       accept="image/*,.pdf" required />
                <div class="mt-2">
                    <img id="proofPreview" class="max-w-full h-40 hidden mt-2 rounded-lg border" />
                    <button type="button" id="removeProofBtn" class="btn btn-error btn-xs mt-2 hidden">
                        <i class="fas fa-times mr-1"></i> Hapus
                    </button>
                </div>
                <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, atau PDF (maks. 5MB)</p>
            </div>
        `;
            paymentDetails.appendChild(paymentProofContainer);
            const paymentProofInput = document.getElementById('paymentProof');
            const proofPreview = document.getElementById('proofPreview');
            const removeProofBtn = document.getElementById('removeProofBtn');

            // Initialize counters
            let foodItems = {
                nasi_goreng: 0
            };

            let drinkItems = {
                root_calm: 0,
                es_dagen: 0,
                ice_tea: 0
            };

            let selectedPaymentMethod = null;
            let totalPrice = 0;
            let paymentProofFile = null;

            // Initialize counters display
            updateCounterBadge(foodCountBadge, foodItems);
            updateCounterBadge(drinkCountBadge, drinkItems);

            // Setup increment/decrement buttons
            document.querySelectorAll('.increment-food').forEach(btn => {
                btn.addEventListener('click', function() {
                    const item = this.dataset.item;
                    updateQuantity(item, 'food', 1);
                });
            });

            document.querySelectorAll('.decrement-food').forEach(btn => {
                btn.addEventListener('click', function() {
                    const item = this.dataset.item;
                    updateQuantity(item, 'food', -1);
                });
            });

            document.querySelectorAll('.increment-drink').forEach(btn => {
                btn.addEventListener('click', function() {
                    const item = this.dataset.item;
                    updateQuantity(item, 'drink', 1);
                });
            });

            document.querySelectorAll('.decrement-drink').forEach(btn => {
                btn.addEventListener('click', function() {
                    const item = this.dataset.item;
                    updateQuantity(item, 'drink', -1);
                });
            });

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
                updatePrice();
            }

            function updatePrice() {
                if (!durationInput.value) {
                    priceDisplay.textContent = 'Rp 0';
                    return;
                }

                const roomType = document.querySelector('input[name="room_type"]:checked').value;
                const duration = parseInt(durationInput.value);
                const price = ROOM_PRICES[roomType] * duration;

                priceDisplay.textContent = `Rp ${price.toLocaleString('id-ID')}`;
            }

            // Quantity update functions
            function updateQuantity(item, type, change) {
                const qtyElement = document.getElementById(`${item}_qty`);
                let newQty = parseInt(qtyElement.textContent) + change;

                // Ensure quantity doesn't go below 0
                newQty = Math.max(0, newQty);

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

            // Calculate total price
            function calculateTotalPrice() {
                const roomType = document.querySelector('input[name="room_type"]:checked').value;
                const duration = parseInt(durationInput.value);
                let total = ROOM_PRICES[roomType] * duration;

                // Add food prices
                for (const [item, qty] of Object.entries(foodItems)) {
                    if (FOOD_PRICES[item] && qty > 0) {
                        total += FOOD_PRICES[item] * qty;
                    }
                }

                // Add drink prices
                for (const [item, qty] of Object.entries(drinkItems)) {
                    if (DRINK_PRICES[item] && qty > 0) {
                        total += DRINK_PRICES[item] * qty;
                    }
                }

                return total;
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
                    durationOptions.forEach(btn => btn.classList.remove('btn-primary',
                        'text-white'));
                    this.classList.add('btn-primary', 'text-white');
                    durationInput.value = this.dataset.duration;
                    updateEndTime();
                });
            });

            // Room type change
            roomTypeRadios.forEach(radio => {
                radio.addEventListener('change', updatePrice);
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
                const roomType = document.querySelector('input[name="room_type"]:checked').value;
                const roomName = roomType === 'regular' ? 'Classic' : 'Exclusive';
                const duration = parseInt(durationInput.value);
                const roomPrice = ROOM_PRICES[roomType] * duration;
                totalPrice = calculateTotalPrice();

                document.getElementById('confirmRoom').textContent = roomName;
                document.getElementById('confirmDate').textContent =
                    document.querySelector('input[name="booking_date"]').value;
                document.getElementById('confirmTime').textContent =
                    `${startTimeInput.value} - ${endTimeDisplay.textContent}`;
                document.getElementById('confirmDuration').textContent =
                    `${duration} Jam`;
                document.getElementById('confirmPrice').textContent =
                    `Rp ${roomPrice.toLocaleString('id-ID')}`;

                // Food summary
                document.getElementById('confirmFood').textContent =
                    foodItems.nasi_goreng > 0 ?
                    `${foodItems.nasi_goreng} Nasi Goreng (Rp ${(foodItems.nasi_goreng * FOOD_PRICES.nasi_goreng).toLocaleString('id-ID')})` :
                    'Tidak ada';

                // Drink summary
                const drinkSummary = [];
                if (drinkItems.root_calm > 0) {
                    drinkSummary.push(
                        `${drinkItems.root_calm} Root Calm (Rp ${(drinkItems.root_calm * DRINK_PRICES.root_calm).toLocaleString('id-ID')})`
                    );
                }
                if (drinkItems.es_dagen > 0) {
                    drinkSummary.push(
                        `${drinkItems.es_dagen} Es Dagen (Rp ${(drinkItems.es_dagen * DRINK_PRICES.es_dagen).toLocaleString('id-ID')})`
                    );
                }
                if (drinkItems.ice_tea > 0) {
                    drinkSummary.push(
                        `${drinkItems.ice_tea} Ice Tea (Rp ${(drinkItems.ice_tea * DRINK_PRICES.ice_tea).toLocaleString('id-ID')})`
                    );
                }

                document.getElementById('confirmDrink').textContent =
                    drinkSummary.length > 0 ? drinkSummary.join(', ') : 'Tidak ada';

                // Total price
                document.getElementById('confirmTotal').textContent =
                    `Rp ${totalPrice.toLocaleString('id-ID')}`;

                // Show modal
                confirmModal.showModal();
            });

            // Final submission (from confirmation modal)
            finalSubmit.addEventListener('click', function() {
                confirmModal.close();
                paymentModal.showModal();
            });

            // Payment method selection
            qrisMethod.addEventListener('click', function() {
                selectedPaymentMethod = 'qris';
                qrisMethod.classList.add('selected');
                bankMethod.classList.remove('selected');

                paymentDetails.classList.remove('hidden');
                qrisDetails.classList.remove('hidden');
                bankDetails.classList.add('hidden');
                paymentProofContainer.classList.remove('hidden');

                qrisAmount.textContent = `Rp ${totalPrice.toLocaleString('id-ID')}`;
                completePaymentBtn.classList.remove('hidden');
            });

            bankMethod.addEventListener('click', function() {
                selectedPaymentMethod = 'bank';
                bankMethod.classList.add('selected');
                qrisMethod.classList.remove('selected');

                paymentDetails.classList.remove('hidden');
                bankDetails.classList.remove('hidden');
                qrisDetails.classList.add('hidden');
                paymentProofContainer.classList.remove('hidden');

                bankAmount.textContent = `Rp ${totalPrice.toLocaleString('id-ID')}`;
                completePaymentBtn.classList.remove('hidden');
            });

            // Payment proof handling
            paymentProofInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    // Validate file size (max 5MB)
                    if (file.size > 5 * 1024 * 1024) {
                        showToast('Ukuran file terlalu besar (maks. 5MB)', 'error');
                        this.value = '';
                        return;
                    }

                    // Validate file type
                    const validTypes = ['image/jpeg', 'image/png', 'application/pdf'];
                    if (!validTypes.includes(file.type)) {
                        showToast('Format file tidak didukung (hanya JPG, PNG, PDF)', 'error');
                        this.value = '';
                        return;
                    }

                    paymentProofFile = file;

                    if (file.type.includes('image')) {
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            proofPreview.src = event.target.result;
                            proofPreview.classList.remove('hidden');
                            removeProofBtn.classList.remove('hidden');
                        }
                        reader.readAsDataURL(file);
                    } else {
                        // For PDF files
                        proofPreview.src = 'https://cdn-icons-png.flaticon.com/512/337/337946.png';
                        proofPreview.classList.remove('hidden');
                        removeProofBtn.classList.remove('hidden');
                    }
                }
            });

            removeProofBtn.addEventListener('click', function() {
                paymentProofInput.value = '';
                proofPreview.src = '';
                proofPreview.classList.add('hidden');
                removeProofBtn.classList.add('hidden');
                paymentProofFile = null;
            });

            // Complete payment with validation
            completePaymentBtn.addEventListener('click', function() {
                if (!paymentProofInput.files[0]) {
                    showToast('Harap upload bukti pembayaran', 'error');
                    paymentProofInput.focus();
                    return;
                }

                // Get booking details from URL
                const urlParams = new URLSearchParams(window.location.search);
                const mejaNumber = urlParams.get('meja') || '1';
                const mejaType = urlParams.get('tipe') || 'Classic';
                const lantai = urlParams.get('lantai') || '1';

                // Create booking data
                const bookingData = {
                    id: Date.now(), // Unique ID
                    meja: `Zetro ${mejaType} - Meja ${mejaNumber} (Lantai ${lantai})`,
                    tanggal: document.querySelector('input[name="booking_date"]').value,
                    waktu: `${startTimeInput.value} - ${endTimeDisplay.textContent}`,
                    status: "Menunggu Konfirmasi",
                    total: `Rp ${totalPrice.toLocaleString('id-ID')}`,
                    paymentMethod: selectedPaymentMethod === 'qris' ? 'QRIS' : 'Transfer Bank',
                    paymentProof: proofPreview.src,
                    details: {
                        roomType: document.querySelector('input[name="room_type"]:checked').value,
                        duration: durationInput.value,
                        foods: {
                            ...foodItems
                        },
                        drinks: {
                            ...drinkItems
                        },
                        mejaNumber: mejaNumber,
                        mejaType: mejaType,
                        lantai: lantai
                    },
                    timestamp: new Date().toISOString()
                };

                // Save to localStorage
                let existingBookings = JSON.parse(localStorage.getItem('bookings')) || [];
                existingBookings.unshift(bookingData);
                localStorage.setItem('bookings', JSON.stringify(existingBookings));

                paymentModal.close();
                successModal.showModal();

                // Reset form after successful payment
                setTimeout(resetForm, 3000);

                // Update booking history display
                renderBookingHistory();
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
                priceDisplay.textContent = 'Rp 0';

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

                // Reset payment proof
                paymentProofFile = null;
                paymentProofInput.value = '';
                proofPreview.src = '';
                proofPreview.classList.add('hidden');
                removeProofBtn.classList.add('hidden');
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

            // Format date to Indonesian format
            function formatDate(dateString) {
                const options = {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                return new Date(dateString).toLocaleDateString('id-ID', options);
            }

            // Booking History Functions
            function renderBookingHistory() {
                const bookings = JSON.parse(localStorage.getItem('bookings')) || [];
                const bookingHistoryBody = document.getElementById('booking-history-body');

                if (!bookingHistoryBody) return;

                if (bookings.length === 0) {
                    bookingHistoryBody.innerHTML = `
                    <tr>
                        <td colspan="7" class="text-center py-4 text-gray-400">
                            Belum ada riwayat pemesanan
                        </td>
                    </tr>
                `;
                    return;
                }

                bookingHistoryBody.innerHTML = bookings.map((booking, index) => {
                    let badgeClass = 'badge-info';
                    if (booking.status === 'Confirmed' || booking.status === 'Dikonfirmasi') badgeClass =
                        'badge-success';
                    if (booking.status === 'Pending' || booking.status === 'Menunggu Konfirmasi')
                        badgeClass = 'badge-warning';
                    if (booking.status === 'Cancelled' || booking.status === 'Dibatalkan') badgeClass =
                        'badge-error';

                    return `
                    <tr class="hover:bg-gray-700 transition-colors">
                        <th>${index + 1}</th>
                        <td>${booking.meja}</td>
                        <td>${formatDate(booking.tanggal)}</td>
                        <td>${booking.waktu}</td>
                        <td>
                            <span class="badge ${badgeClass}">
                                ${booking.status}
                            </span>
                        </td>
                        <td>${booking.total}</td>
                        <td>
                            <button class="btn btn-xs btn-info" 
                                    onclick="viewBookingDetail('${booking.id}')">
                                <i class="fas fa-eye mr-1"></i> Detail
                            </button>
                        </td>
                    </tr>
                `;
                }).join('');
            }

            // View booking detail
            window.viewBookingDetail = function(id) {
                const bookings = JSON.parse(localStorage.getItem('bookings')) || [];
                const booking = bookings.find(b => b.id == id);

                if (booking) {
                    // Format food items
                    let foodItems = '';
                    if (booking.details.foods) {
                        for (const [item, qty] of Object.entries(booking.details.foods)) {
                            if (qty > 0) {
                                const itemName = item.split('_').map(word =>
                                    word.charAt(0).toUpperCase() + word.slice(1)
                                ).join(' ');
                                foodItems += `<li>${qty}x ${itemName}</li>`;
                            }
                        }
                    }

                    // Format drink items
                    let drinkItems = '';
                    if (booking.details.drinks) {
                        for (const [item, qty] of Object.entries(booking.details.drinks)) {
                            if (qty > 0) {
                                const itemName = item.split('_').map(word =>
                                    word.charAt(0).toUpperCase() + word.slice(1)
                                ).join(' ');
                                drinkItems += `<li>${qty}x ${itemName}</li>`;
                            }
                        }
                    }

                    // Show detail modal
                    Swal.fire({
                        title: 'Detail Pemesanan',
                        html: `
                        <div class="text-left space-y-3">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <h4 class="font-bold text-blue-400">Informasi Booking</h4>
                                    <p><strong>Meja:</strong> ${booking.meja}</p>
                                    <p><strong>Tanggal:</strong> ${formatDate(booking.tanggal)}</p>
                                    <p><strong>Waktu:</strong> ${booking.waktu}</p>
                                    <p><strong>Durasi:</strong> ${booking.details.duration} Jam</p>
                                </div>
                                <div>
                                    <h4 class="font-bold text-blue-400">Status Pembayaran</h4>
                                    <p><strong>Status:</strong> 
                                        <span class="${booking.status.includes('Konfirmasi') ? 'text-green-500' : 
                                          booking.status.includes('Menunggu') ? 'text-yellow-500' : 'text-red-500'}">
                                            ${booking.status}
                                        </span>
                                    </p>
                                    <p><strong>Metode:</strong> ${booking.paymentMethod || '-'}</p>
                                    <p><strong>Total:</strong> ${booking.total}</p>
                                </div>
                            </div>
                            
                            ${foodItems || drinkItems ? `
                                                                                                                    <div class="grid grid-cols-2 gap-4 mt-4">
                                                                                                                        ${foodItems ? `
                                <div>
                                    <h4 class="font-bold text-blue-400">Makanan</h4>
                                    <ul class="list-disc pl-5">${foodItems}</ul>
                                </div>
                                ` : ''}
                                                                                                                        ${drinkItems ? `
                                <div>
                                    <h4 class="font-bold text-blue-400">Minuman</h4>
                                    <ul class="list-disc pl-5">${drinkItems}</ul>
                                </div>
                                ` : ''}
                                                                                                                    </div>
                                                                                                                    ` : ''}
                            
                            ${booking.paymentProof ? `
                                                                                                                    <div class="mt-4">
                                                                                                                        <h4 class="font-bold text-blue-400">Bukti Pembayaran</h4>
                                                                                                                        <img src="${booking.paymentProof}" alt="Bukti Pembayaran" 
                                                                                                                             class="mt-2 rounded-lg max-w-xs border border-gray-600">
                                                                                                                    </div>
                                                                                                                    ` : ''}
                        </div>
                    `,
                        width: '800px',
                        confirmButtonText: 'Tutup',
                        showCloseButton: true
                    });
                }
            };

            // Initialize booking history when modal is opened
            document.getElementById('booking-history-modal')?.addEventListener('show', renderBookingHistory);

            // Initial render
            renderBookingHistory();

            // If coming from booking page with success
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('booking_success')) {
                // Show success message
                Swal.fire({
                    title: 'Pemesanan Berhasil!',
                    text: 'Detail pemesanan telah ditambahkan ke riwayat Anda',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });

                // Remove the parameter from URL
                window.history.replaceState({}, document.title, window.location.pathname);
            }

            // Dropdown Functionality
            function setupDropdown(buttonId, menuId) {
                const button = document.getElementById(buttonId);
                const menu = document.getElementById(menuId);

                button?.addEventListener('click', function(e) {
                    e.stopPropagation();
                    menu.classList.toggle('show');
                });

                // Close when clicking outside
                document.addEventListener('click', function() {
                    menu?.classList.remove('show');
                });
            }

            setupDropdown('profile-button', 'profile-dropdown');
            setupDropdown('cart-button', 'cart-dropdown');

            // Mobile menu toggle
            const menuButton = document.getElementById('menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            menuButton?.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        });
    </script>
</body>

</html>
