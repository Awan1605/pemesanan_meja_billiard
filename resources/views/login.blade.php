<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zetro Billiard Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f3f4f6;
        }
        .container {
            display: flex;
            width: 900px;
            background: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        .left {
            position: relative;
            width: 50%;
        }
        .left img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .overlay h1 {
            color: white;
            font-size: 32px;
            font-weight: bold;
        }
        .overlay span {
            color: #2563eb;
        }
        .right {
            width: 50%;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .right h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .input-group {
            margin-bottom: 15px;
        }
        .input-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: #333;
        }
        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .terms {
            font-size: 12px;
            color: gray;
            margin-bottom: 15px;
        }
        .terms span {
            color: #2563eb;
            cursor: pointer;
        }
        .btn {
            width: 100%;
            background: #2563eb;
            color: white;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        .btn:hover {
            background: #1e4db7;
        }
        .create-account {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }
        .create-account a {
            text-decoration: none;
            font-weight: bold;
            color: black;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left">
            <img src="biliard.png" alt="Billiard Hall">
            <div class="overlay">
                <h1><span>Zetro</span>Billiard.</h1>
            </div>
        </div>
        <div class="right">
            <h2>Login Account</h2>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST['username'];
                $password = $_POST['password'];

                // Dummy login check (Anda bisa mengganti ini dengan database)
                $valid_username = "admin";
                $valid_password = "123456";

                if ($username == $valid_username && $password == $valid_password) {
                    echo "<p style='color: green;'>Login berhasil! Selamat datang, $username.</p>";
                } else {
                    echo "<p style='color: red;'>Username atau password salah.</p>";
                }
            }
            ?>
            <form method="POST" action="">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="6+ characters" required>
                </div>
                <p class="terms">By signing up you agree to <span>terms and conditions</span> at Zoho.</p>
                <button type="submit" class="btn">Login</button>
            </form>
            <p class="create-account">Belum punya akun? <a href="registrasi.php">Daftar di sini</a></p>

            
        </div>
    </div>
</body>
</html>
