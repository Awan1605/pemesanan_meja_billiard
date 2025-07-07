<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Blog</title>
</head>

<body
    style="font-family: Arial, sans-serif; background: linear-gradient(135deg, #e0eafc, #cfdef3); min-height: 100vh; margin:0;">
    <nav
        style="background: #222; padding: 1rem; display: flex; gap: 2rem; justify-content: center; box-shadow: 0 2px 8px rgba(0,0,0,0.07);">
        <a href="/" style="color: #fff; text-decoration: none; font-weight: bold; transition: color 0.3s;">Home</a>
        <a href="/landing_page"
            style="color: #fff; text-decoration: none; font-weight: bold; transition: color 0.3s;">About</a>
        <a href="/blog"
            style="color: #fff; text-decoration: none; font-weight: bold; transition: color 0.3s;">Blog</a>
        <a href="/kontak"
            style="color: #fff; text-decoration: none; font-weight: bold; transition: color 0.3s;">Kontak</a>
    </nav>

    <div style="display: flex; flex-direction: column; align-items: center; margin-top: 3rem;">
        <h1 style="font-size: 2.5rem; color: #333; margin-bottom: 1rem; animation: fadeInDown 1s;">Halaman Blog</h1>
        <article
            style="background: #fff; padding: 2rem 2.5rem; border-radius: 18px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); max-width: 500px; animation: fadeInUp 1.2s;">
            <h3 style="color: #2b5876; margin-bottom: 0.5rem;">Awan</h3>
            <p style="color: #444;">Saya wibo kurniawan yang bercita-cita ingin menjadi triliuner di usia 35thn</p>
        </article>

        <section
            style="margin-top: 3rem; background: #f7fafc; padding: 2rem 2.5rem; border-radius: 18px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); max-width: 500px; animation: fadeIn 2s;">
            <h2 style="color: #2b5876; margin-bottom: 1rem;">Kontak Kami</h2>
            <p style="color: #444; margin-bottom: 1rem;">No HP: <strong>081265470483</strong></p>
            <form>
                <input type="text" placeholder="Nama"
                    style="width: 100%; padding: 0.7rem; margin-bottom: 1rem; border-radius: 8px; border: 1px solid #ccc;">
                <input type="email" placeholder="Email"
                    style="width: 100%; padding: 0.7rem; margin-bottom: 1rem; border-radius: 8px; border: 1px solid #ccc;">
                <textarea placeholder="Pesan" rows="4"
                    style="width: 100%; padding: 0.7rem; border-radius: 8px; border: 1px solid #ccc; margin-bottom: 1rem;"></textarea>
                <button type="submit"
                    style="background: linear-gradient(90deg, #36d1c4, #5b86e5); color: #fff; border: none; padding: 0.8rem 2rem; border-radius: 8px; font-weight: bold; cursor: pointer; transition: background 0.3s;">Kirim</button>
            </form>
        </section>
    </div>

    <!-- Animasi CSS -->
    <style>
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        nav a:hover {
            color: #36d1c4;
        }

        button:hover {
            background: linear-gradient(90deg, #5b86e5, #36d1c4);
        }
    </style>
</body>

</html>
