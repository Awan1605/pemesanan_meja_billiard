<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Booking - Zetro Billiard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #111;
            color: white;
            padding: 2rem;
        }
        .btn-custom {
            background-color: #003366;
            color: white;
        }
        .btn-custom:hover {
            background-color: #002244;
        }
        .form-control {
            background-color: #222;
            color: white;
            border: 1px solid #555;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="text-center mb-4">
        <h2 class="fw-bold">Informasi Booking</h2>
        <p>Silakan isi kolom kosong di bawah ini</p>
    </div>

    <div class="row justify-content-center align-items-center">
        <div class="col-md-5">
            <img id="tableImage" src="{{ asset('images/zetro-exclusive.jpg') }}" alt="Zetro Exclusive" class="img-fluid rounded">
            <p class="mt-2" id="tableInfo">Zetro Exclusive<br><small>Lantai 3</small></p>
        </div>

        <div class="col-md-6">
            <form method="POST" action="{{ route('booking') }}">
                @csrf

                <div class="mb-3">
                    <label for="table_type" class="form-label">Pilih Tipe Meja</label>
                    <select id="table_type" name="table_type" class="form-control" onchange="updateInfo()">
                        <option value="exclusive" selected>Exclusive</option>
                        <option value="classic">Classic</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="duration" class="form-label">Pilih Berapa Jam Reservasi</label>
                    <div class="input-group">
                        <button type="button" class="btn btn-danger" onclick="decreaseDuration()">-</button>
                        <input type="number" class="form-control text-center" id="duration" name="duration" value="2" min="1" readonly>
                        <button type="button" class="btn btn-success" onclick="increaseDuration()">+</button>
                    </div>
                </div>

                <div class="mb-3">
    <label class="form-label">Pilih Waktu yang Diinginkan</label>
    <div id="timeOptions" class="d-flex flex-wrap gap-2">
        <!-- Pilihan waktu preset -->
        <button type="button" class="btn btn-outline-light" data-time="18:00">18:00</button>
        <button type="button" class="btn btn-outline-light" data-time="19:00">19:00</button>
        <button type="button" class="btn btn-outline-light" data-time="20:00">20:00</button>
        <button type="button" class="btn btn-outline-light" data-time="21:00">21:00</button>
        <button type="button" class="btn btn-outline-light" data-time="22:00">22:00</button>
        <!-- Add more as needed -->
    </div>
    <!-- Input tersembunyi untuk dikirim ke server -->
    <input type="hidden" id="selectedTime" name="time" value="">
</div>


                <div class="mb-3">
                    <label for="date" class="form-label">Pilih Hari yang ingin ditentukan</label>
                    <input type="date" id="date" name="date" class="form-control" value="{{ date('Y-m-d') }}">
                </div>

                <div class="mb-3">
                    <p>Total Pembayaran <span id="total" class="text-success">100.000</span> per <span id="jam">2</span> Jam</p>
                </div>

                <button type="submit" class="btn btn-custom">Bayar Sekarang</button>
                <a href="{{ route('booking') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<script>
    let tarif = {
        exclusive: 50000,
        classic: 30000
    };

    function updateTotal() {
        let duration = parseInt(document.getElementById('duration').value);
        let tipe = document.getElementById('table_type').value;
        let harga = tarif[tipe];
        document.getElementById('jam').innerText = duration;
        document.getElementById('total').innerText = (harga * duration).toLocaleString('id-ID');
    }

    function increaseDuration() {
        let input = document.getElementById('duration');
        input.value = parseInt(input.value) + 1;
        updateTotal();
    }

    function decreaseDuration() {
        let input = document.getElementById('duration');
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
            updateTotal();
        }
    }

    function updateInfo() {
        let tipe = document.getElementById('table_type').value;
        let image = document.getElementById('tableImage');
        let info = document.getElementById('tableInfo');

        if (tipe === 'exclusive') {
            image.src = "{{ asset('images/zetro-exclusive.jpg') }}";
            info.innerHTML = 'Zetro Exclusive<br><small>Lantai 3</small>';
        } else {
            image.src = "{{ asset('images/zetro-classic.jpg') }}";
            info.innerHTML = 'Zetro Classic<br><small>Lantai 2</small>';
        }

        updateTotal();
    }

    window.onload = updateTotal;
</script>

</body>
</html>
