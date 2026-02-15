<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="">
    <title>Bhakundo - Football Store | Login</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
    <style>
        body { background: #f3f4f6; }
        
        .login-glass-card {
            background: rgba(255,255,255,0.92);
            border-radius: 24px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.18);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255,255,255,0.18);
            max-width: 420px;
            margin: 40px auto 32px auto;
            padding: 0;
            overflow: hidden;
        }
        .login-form-area {
            padding: 40px 32px 32px 32px;
        }
        .login-title {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            color: #1e293b;
            text-align: center;
        }
        .form-label {
            font-weight: 600;
            color: #334155;
        }
        .form-control:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 2px #6366f1;
        }
        .login-btn {
            background: linear-gradient(90deg, #6366f1 60%, #3b82f6 100%);
            border: none;
            font-weight: 700;
            padding: 0.7rem 2.2rem;
            border-radius: 7px;
            font-size: 1.13rem;
            color: #fff;
            width: 100%;
            margin-top: 1.2rem;
            transition: background 0.2s;
        }
        .login-btn:hover {
            background: linear-gradient(90deg, #3b82f6 60%, #6366f1 100%);
        }
        .login-links {
            margin-top: 1.5rem;
            text-align: center;
        }
        .login-links a {
            color: #3b82f6;
            text-decoration: underline;
            margin: 0 0.5em;
        }
        @media (max-width: 600px) {
            .login-glass-card { max-width: 98vw; }
            .login-form-area { padding: 24px 8px 16px 8px; }
        }
         :root {
            --primary-color: #2f80ed;
            --secondary-color: #56ccf2;
            --accent-color: #3498db;
            --text-color: #2c3e50;
            --light-gray: #f8f9fa;
            --dark-gray: #343a40;
         }

         body {
            font-family: 'DM Sans', sans-serif;
            background-color: var(--light-gray);
         }

         .hero_area {
            min-height: auto;
            background-color: white;
            margin-bottom: 2rem;
         }

         .categories-section {
            padding: 80px 0;
            background: linear-gradient(135deg, #ffffff 0%, var(--light-gray) 100%);
         }

         .section-header {
            background: none;
            border-radius: 0;
            box-shadow: none;
            max-width: none;
            margin-left: 0;
            margin-right: 0;
            padding: 0 0 40px 0;
            margin-bottom: 40px;
         }

         .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 1rem;
         }

         .section-subtitle {
            font-size: 1.1rem;
            color: var(--text-color);
            opacity: 0.8;
         }
          .navbar {
            width: 70%;
            margin: 30px auto 0 auto;
            border-radius: 50px;
            background: #fff;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
            border: 1px solid rgba(0,0,0,0.04);
            padding: 18px 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .deals-banner {
        width: 70%;
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        padding: 10px 0;
        margin-top: 20px;
        border-radius: 25px;
        margin-left: 20px;
        margin-right: 20px;
    }

    .header_section {
      padding: -100px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: start;
      margin: 0;
      padding: 0;
   }
   .nav-item.active .nav-link {
       background: #e3f0ff !important;
       color: #1e40af !important;
       font-weight: bold !important;
       font-weight: 500;
       color: var(--text-color) !important;
       margin: 0 10px;
       position: relative;
   }
    </style>
</head>
<body>
    <div class="hero_area">
        @include('home.header')
        <div class="container">
            <div class="login-glass-card">
                <div class="login-form-area">
                    <div class="login-title">Login to Your Account</div>
                    @if (session('success'))
                        <div class="mb-3 font-medium text-sm text-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="mb-3 font-medium text-sm text-primary">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="mb-3 text-danger text-sm">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" name="password" required class="form-control" placeholder="Enter your password">
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="form-check">
                                <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                <label for="remember" class="form-check-label">Remember Me</label>
                            </div>
                            <a href="{{ route('password.request') }}" class="text-sm">Forgot Password?</a>
                        </div>
                        <button type="submit" class="login-btn">Login</button>
                    </form>
                    <div class="login-links">
                        Don't have an account?
                        <a href="{{ route('register') }}">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>      <script src="{{asset('home/js/custom.js')}}"></script>
</body>
</html>
