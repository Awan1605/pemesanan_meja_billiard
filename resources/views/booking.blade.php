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
            <img src="{{ asset('images/zetro-exclusive.jpg') }}" alt="Zetro Exclusive" class="img-fluid rounded">
            <p class="mt-2">Zetro Exclusive<br><small>Lantai 3</small></p>
        </div>

        <div class="col-md-6">
            <form method="POST" action="{{ route('booking') }}">
                @csrf

                <div class="mb-3">
                    <label for="duration" class="form-label">Pilih Berapa Jam Reservasi</label>
                    <div class="input-group">
                        <button type="button" class="btn btn-danger" onclick="decreaseDuration()">-</button>
                        <input type="number" class="form-control text-center" id="duration" name="duration" value="2" min="1" readonly>
                        <button type="button" class="btn btn-success" onclick="increaseDuration()">+</button>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="time" class="form-label">Pilih Waktu yang ingin ditentukan</label>
                    <input type="time" id="time" name="time" class="form-control" value="20:30">
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
    function updateTotal() {
        let duration = parseInt(document.getElementById('duration').value);
        document.getElementById('jam').innerText = duration;
        document.getElementById('total').innerText = (duration * 50000).toLocaleString('id-ID');
    }

    function increaseDuration() {
        let durationInput = document.getElementById('duration');
        durationInput.value = parseInt(durationInput.value) + 1;
        updateTotal();
    }

    function decreaseDuration() {
        let durationInput = document.getElementById('duration');
        if (parseInt(durationInput.value) > 1) {
            durationInput.value = parseInt(durationInput.value) - 1;
            updateTotal();
        }
    }
</script>

</body>
</html>