<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modern Login Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #243754 0%, #353d60 100%);
            padding: 20px;
        }

        .form-container {
            width: 100%;
            max-width: 500px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            animation: fadeIn 0.5s ease-out;
        }

        .form-header {
            background: linear-gradient(to right, #294055 0%, #243a4e 100%);
            color: white;
            padding: 25px;
            text-align: center;
        }

        .form-header h1 {
            font-weight: 600;
            font-size: 1.8rem;
            margin-bottom: 5px;
        }

        .form-header p {
            opacity: 0.9;
            font-size: 0.9rem;
        }

        .form {
            display: flex;
            flex-direction: column;
            gap: 20px;
            padding: 30px;
        }

        .input-group {
            position: relative;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
            font-size: 0.95rem;
        }

        .inputForm {
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            height: 50px;
            display: flex;
            align-items: center;
            padding: 0 15px;
            transition: all 0.3s ease;
            background: #f9f9f9;
        }

        .inputForm:hover {
            border-color: #4facfe;
        }

        .inputForm:focus-within {
            border-color: #4facfe;
            box-shadow: 0 0 0 3px rgba(79, 172, 254, 0.2);
        }

        .inputForm svg {
            width: 20px;
            height: 20px;
            margin-right: 10px;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }

        .inputForm:focus-within svg {
            opacity: 1;
        }

        .input {
            border: none;
            outline: none;
            width: 100%;
            height: 100%;
            background: transparent;
            font-size: 0.95rem;
        }

        .input::placeholder {
            color: #aaa;
        }

        .flex-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 10px 0;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
        }

        .checkbox-container input {
            margin-right: 8px;
            accent-color: #4facfe;
        }

        .checkbox-container label {
            font-size: 0.9rem;
            color: #555;
        }

        .forgot-password {
            color: #4facfe;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .forgot-password:hover {
            color: #3a8fd4;
            text-decoration: underline;
        }

        .button-submit {
            background: linear-gradient(to right, #4facfe 0%, #00f2fe 100%);
            border: none;
            color: white;
            padding: 15px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(79, 172, 254, 0.3);
            margin-top: 10px;
        }

        .button-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(79, 172, 254, 0.4);
        }

        .button-submit:active {
            transform: translateY(0);
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 20px 0;
            color: #999;
            font-size: 0.9rem;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #e0e0e0;
        }

        .divider::before {
            margin-right: 15px;
        }

        .divider::after {
            margin-left: 15px;
        }

        .social-buttons {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }

        .btn {
            flex: 1;
            height: 50px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 500;
            gap: 10px;
            border: 1px solid #e0e0e0;
            background-color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            color: #555;
        }

        .btn:hover {
            border-color: #4facfe;
            color: #4facfe;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .btn svg {
            width: 20px;
            height: 20px;
        }

        .signup-link {
            text-align: center;
            font-size: 0.9rem;
            color: #555;
        }

        .signup-link a {
            color: #4facfe;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .signup-link a:hover {
            color: #3a8fd4;
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 576px) {
            .social-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="form-container">
        <div class="form-header">
            <h1>ZetroBilliard</h1>
            <p>Please enter your details to sign in</p>
        </div>

        <form class="form">
            <div class="input-group">
                <label for="email">Email</label>
                <div class="inputForm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 32 32" height="20">
                        <g data-name="Layer 3" id="Layer_3">
                            <path
                                d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z">
                            </path>
                        </g>
                    </svg>
                    <input id="email" placeholder="Enter your email" class="input" type="email" required>
                </div>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <div class="inputForm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="-64 0 512 512" height="20">
                        <path
                            d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0">
                        </path>
                        <path
                            d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0">
                        </path>
                    </svg>
                    <input id="password" placeholder="Enter your password" class="input" type="password" required>
                </div>
            </div>

            <div class="flex-row">
                <div class="checkbox-container">
                    <input type="checkbox" id="remember">
                    <label for="remember">Remember me</label>
                </div>
                <a href="#" class="forgot-password">Forgot password?</a>
            </div>

            <button type="submit" class="button-submit">Sign In</button>

            <div class="divider">or continue with</div>

            <div class="social-buttons">
                <button type="button" class="btn google">
                    <svg xml:space="preserve" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" width="20"
                        version="1.1">
                        <path d="M113.47,309.408L95.648,375.94l-65.139,1.378C11.042,341.211,0,299.9,0,256
     c0-42.451,10.324-82.483,28.624-117.732h0.014l57.992,10.632l25.404,57.644c-5.317,15.501-8.215,32.141-8.215,49.456
     C103.821,274.792,107.225,292.797,113.47,309.408z" style="fill:#FBBB00;"></path>
                        <path d="M507.527,208.176C510.467,223.662,512,239.655,512,256c0,18.328-1.927,36.206-5.598,53.451
     c-12.462,58.683-45.025,109.925-90.134,146.187l-0.014-0.014l-73.044-3.727l-10.338-64.535
     c29.932-17.554,53.324-45.025,65.646-77.911h-136.89V208.176h138.887L507.527,208.176L507.527,208.176z"
                            style="fill:#518EF8;"></path>
                        <path d="M416.253,455.624l0.014,0.014C372.396,490.901,316.666,512,256,512
     c-97.491,0-182.252-54.491-225.491-134.681l82.961-67.91c21.619,57.698,77.278,98.771,142.53,98.771
     c28.047,0,54.323-7.582,76.87-20.818L416.253,455.624z" style="fill:#28B446;"></path>
                        <path d="M419.404,58.936l-82.933,67.896c-23.335-14.586-50.919-23.012-80.471-23.012
     c-66.729,0-123.429,42.957-143.965,102.724l-83.397-68.276h-0.014C71.23,56.123,157.06,0,256,0
     C318.115,0,375.068,22.126,419.404,58.936z" style="fill:#F14336;"></path>
                    </svg>
                    Google
                </button>
                <button type="button" class="btn apple">
                    <svg viewBox="0 0 22.773 22.773" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        version="1.1">
                        <g>
                            <g>
                                <path
                                    d="M15.769,0c0.053,0,0.106,0,0.162,0c0.13,1.606-0.483,2.806-1.228,3.675c-0.731,0.863-1.732,1.7-3.351,1.573 c-0.108-1.583,0.506-2.694,1.25-3.561C13.292,0.879,14.557,0.16,15.769,0z">
                                </path>
                                <path
                                    d="M20.67,16.716c0,0.016,0,0.03,0,0.045c-0.455,1.378-1.104,2.559-1.896,3.655c-0.723,0.995-1.609,2.334-3.191,2.334 c-1.367,0-2.275-0.879-3.676-0.903c-1.482-0.024-2.297,0.735-3.652,0.926c-0.155,0-0.31,0-0.462,0 c-0.995-0.144-1.798-0.932-2.383-1.642c-1.725-2.098-3.058-4.808-3.306-8.276c0-0.34,0-0.679,0-1.019 c0.105-2.482,1.311-4.5,2.914-5.478c0.846-0.52,2.009-0.963,3.304-0.765c0.555,0.086,1.122,0.276,1.619,0.464 c0.471,0.181,1.06,0.502,1.618,0.485c0.378-0.011,0.754-0.208,1.135-0.347c1.116-0.403,2.21-0.865,3.652-0.648 c1.733,0.262,2.963,1.032,3.723,2.22c-1.466,0.933-2.625,2.339-2.427,4.74C17.818,14.688,19.086,15.964,20.67,16.716z">
                                </path>
                            </g>
                        </g>
                    </svg>
                    Apple
                </button>
            </div>

            <p class="signup-link">Don't have an account? <a href="#">Sign up</a></p>
        </form>
    </div>
</body>

</html>
