<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zetro Billiard Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            background-color: rgba(14, 20, 36, 1);
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
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .right h2 {
            font-size: 30px;
            margin-bottom: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
        }
        .input-group {
            margin-bottom: 20px;
            position: relative;
        }
        .input-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: #333;
        }
        .input-group input {
            width: 100%;
            padding: 10px 10px 10px 35px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .input-icon {
            position: absolute;
            left: 10px;
            top: 33px;
            color: #777;
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 33px;
            color: #777;
            cursor: pointer;
            z-index: 2;
        }
        .terms {
            font-size: 11px;
            color: gray;
            margin-bottom: 10px;
        }
        .terms span {
            color: #2563eb;
            cursor: pointer;
        }
        .btn {
            width: 100%;
            background: #2563eb;
            color: white;
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn:hover {
            background: #1e4db7;
        }
        .login-link {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }
        .login-link a {
            text-decoration: none;
            font-weight: bold;
            color: black;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes scaleUp {
            from { transform: scale(0.95); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
        
        .animate-fade {
            animation: fadeIn 0.8s ease-out;
        }
        
        .animate-scale {
            animation: scaleUp 0.6s ease-out;
        }
        
        .animate-delay-1 {
            animation-delay: 0.2s;
        }
        
        .animate-delay-2 {
            animation-delay: 0.4s;
        }
        
        .input-group input {
            transition: all 0.3s ease;
        }
        
        .input-group input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }
        
        .btn {
            transition: all 0.3s;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }
        
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                width: 90%;
                height: auto;
            }
            .left, .right {
                width: 100%;
                height: auto;
            }
            .left img {
                height: 200px;
            }
            .overlay h1 {
                font-size: 24px;
            }
            .right {
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="container animate-scale">
        <div class="left animate-fade">
            <img src="https://storage.googleapis.com/a1aa/image/BdM59a_ixLBfeOCEjJXBFhDJiIRx_iwRtPIZEFmcf5g.jpg" alt="Billiard Hall">
            <div class="overlay">
                <h1><i class="fas fa-8-ball"></i> <span>Zetro</span>Billiard.</h1>
            </div>
        </div>
        <div class="right animate-fade animate-delay-1">
            <h2 class="animate-fade animate-delay-2">Register Account</h2>
            <form method="POST" action="">
                @csrf
                <div class="input-group">
                    <label for="nama">Nama</label>
                    <i class="fas fa-user input-icon"></i>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan Nama" required>
                </div>
                
                <div class="input-group">
                    <label for="email">Email</label>
                    <i class="fas fa-envelope input-icon"></i>
                    <input type="email" id="email" name="email" placeholder="email@gmail.com" required>
                </div>

                <div class="input-group">
                    <label for="phone"> No HP</label>
                    <i class="fas fa-phone input-icon"></i>
                    <input type="tel" id="phone" name="phone" placeholder="Phone Number" required>
                </div>

                <div class="input-group">
                    <label for="username">Username</label>
                    <i class="fas fa-user input-icon"></i>
                    <input type="text" id="username" name="username" placeholder="Masukkan Username" required>
                </div>
                
                <div class="input-group">
                    <label for="password">Password</label>
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <i class="fas fa-eye toggle-password" id="togglePassword"></i>
                </div>
               
                <p class="terms">Dengan melakukan pendaftaran, Anda setuju terhadap <span>syarat dan ketentuan</span> yang berlaku di Zetro Billiard.</p>
                
                <button type="submit" class="btn"><i class="fas fa-user-plus"></i> Register</button>
            </form>
            <p class="login-link">Already have an account? <a href="{{ route('login') }}">Login here</a></p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');
            
            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        });
    </script>
</body>
</html>