<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Reservasi</title>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <style>
        .status-confirmed {
            background-color: #d1fae5;
            color: #065f46;
        }

        .status-pending {
            background-color: #fef3c7;
            color: #92400e;
        }

        .status-cancelled {
            background-color: #fee2e2;
            color: #991b1b;
        }

        /* Animasi fade-in untuk baris tabel */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animated-row {
            animation: fadeInUp 0.7s cubic-bezier(0.23, 1, 0.32, 1);
        }

        /* Hover effect untuk baris */
        tr.hover\:bg-gray-50:hover {
            background: linear-gradient(90deg, #f0fdfa 0%, #e0e7ff 100%);
            transition: background 0.3s;
        }

        /* Animasi highlight saat hover pada tombol */
        .btn-detail {
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn-detail:hover {
            transform: scale(1.08) rotate(-2deg);
            box-shadow: 0 4px 20px rgba(99, 102, 241, 0.15);
            background: #eef2ff;
        }

        /* Animasi pada header tabel */
        thead th {
            position: relative;
            overflow: hidden;
        }

        thead th::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, #34d399 0%, #6366f1 100%);
            transform: scaleX(0);
            transition: transform 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        }

        thead th:hover::after {
            transform: scaleX(1);
        }
    </style>
</head>

<body>
    <x-navbar2 />

    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-6 text-center">Riwayat Pemesanan</h2>

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Meja</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Waktu</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @if (isset($bookings) && $bookings->count() > 0)
                        @foreach ($bookings as $index => $booking)
                            <tr class="hover:bg-gray-50 animated-row" style="animation-delay: {{ $index * 0.08 }}s;">
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">{{ $index + 1 }}</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                    {{ $booking->table->name ?? 'N/A' }}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                    {{ $booking->booking_date->format('d/m/Y') }}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                    {{ $booking->booking_time }}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 text-xs font-semibold rounded-full
                                @if ($booking->status == 'confirmed') status-confirmed
                                @elseif($booking->status == 'pending') status-pending
                                @else status-cancelled @endif">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                    Rp {{ number_format($booking->total_amount, 0, ',', '.') }}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm font-medium">
                                    <button onclick="showDetail({{ $booking->id }})"
                                        class="text-indigo-600 hover:text-indigo-900 btn-detail">
                                        Detail
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="animated-row">
                            <td colspan="7" class="px-4 py-4 text-center text-sm text-gray-500">
                                Tidak ada riwayat pemesanan
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <script>
        async function showDetail(bookingId) {
            try {
                const response = await fetch(`/bookings/${bookingId}`);
                if (!response.ok) throw new Error('Gagal mengambil data');

                const data = await response.json();

                // Format tanggal
                const options = {
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric'
                };
                const bookingDate = new Date(data.booking_date).toLocaleDateString('id-ID', options);

                // Tampilkan modal
                Swal.fire({
                    title: 'Detail Reservasi',
                    html: `
                        <div class="text-left space-y-2">
                            <div><strong>Nomor Meja:</strong> ${data.table?.name || 'N/A'}</div>
                            <div><strong>Tanggal:</strong> ${bookingDate}</div>
                            <div><strong>Waktu:</strong> ${data.booking_time}</div>
                            <div><strong>Status:</strong> <span class="status-${data.status} px-2 py-1 rounded-full text-xs">${data.status}</span></div>
                            <div><strong>Total Pembayaran:</strong> Rp ${data.total_amount.toLocaleString('id-ID')}</div>
                            <div><strong>Catatan:</strong> ${data.notes || 'Tidak ada catatan'}</div>
                        </div>
                    `,
                    confirmButtonText: 'Tutup',
                    customClass: {
                        popup: 'rounded-lg'
                    }
                });
            } catch (error) {
                Swal.fire({
                    title: 'Error',
                    text: error.message,
                    icon: 'error'
                });
            }
        }

        document.getElementById('menu-button').addEventListener('click', function() {
            var menu = document.getElementById('mobile-menu');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
