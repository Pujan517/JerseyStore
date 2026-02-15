<x-guest-layout>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />    
<style>
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
        .register-card-square {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(47,128,237,0.18);
            padding: 1.5rem 1.2rem;
            max-width: 700px;
            width: 100%;
            margin: 48px auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            position: relative;
            transition: box-shadow 0.3s;
            border: 1px solid #e3e6ee;
            min-height: unset;
        }
        .register-card-square:hover {
            box-shadow: 0 16px 48px rgba(47,128,237,0.22);
        }
        .register-title {
            font-size: 1.7rem;
            font-weight: 700;
            color: #2f80ed;
            margin-bottom: 0.1rem;
            text-align: center;
            letter-spacing: 1px;
        }
        .register-subtitle {
            font-size: 0.98rem;
            color: #2c3e50;
            opacity: 0.85;
            text-align: center;
            margin-bottom: 0.7rem;
        }
        .form-group {
            margin-bottom: 0.7rem;
            width: 100%;
            display: flex;
            flex-direction: column;
        }
        .form-label {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.25rem;
            font-size: 1rem;
        }
        .form-control {
            border-radius: 10px;
            border: 1px solid #d1d5db;
            font-size: 1.05rem;
            padding: 0.65rem 1rem;
            transition: border-color 0.2s, box-shadow 0.2s;
            background: #f7f8fa;
            outline: none;
        }
        .form-control:focus {
            border-color: #2f80ed;
            box-shadow: 0 0 0 2px rgba(47,128,237,0.13);
            background: #fff;
        }
        .register-btn {
            background: linear-gradient(90deg, #2f80ed, #56ccf2);
            color: #fff;
            font-weight: 600;
            border-radius: 10px;
            padding: 0.6rem 0;
            width: 100%;
            border: none;
            margin-top: 0.5rem;
            box-shadow: 0 2px 8px rgba(47,128,237,0.10);
            transition: background 0.2s;
            font-size: 1rem;
            letter-spacing: 0.5px;
        }
        .register-btn:hover {
            background: linear-gradient(90deg, #3498db, #2f80ed);
        }
        .already-link {
            text-align: center;
            margin-top: 0.7rem;
            color: #2f80ed;
            font-size: 0.95rem;
        }
        .terms {
            font-size: 0.97rem;
            color: #2c3e50;
            margin-top: 0.3rem;
            display: flex;
            align-items: center;
        }
        .terms input[type="checkbox"] {
            accent-color: #2f80ed;
            margin-right: 0.5rem;
        }
        @media (max-width: 600px) {
            .register-card-square {
                padding: 1.2rem 0.5rem;
                max-width: 98vw;
            }
            .register-title {
                font-size: 1.3rem;
            }
        }
    </style>

    <div class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-br from-indigo-100 via-white to-pink-100 py-8 px-4">
        <div class="register-card-square animate__animated animate__fadeInUp">
            
            <h2 class="register-title">Create Your Account</h2>
            <p class="register-subtitle">Sign up to get started with Bhakundo</p>
            <form method="POST" action="{{ route('register') }}" style="width:100%;">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Name</label>
                    <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
                </div>
                <div class="form-group">
                    <label for="phone" class="form-label">Phone</label>
                    <input id="phone" class="form-control" type="tel" name="phone" value="{{ old('phone') }}" required maxlength="10" pattern="\d{10}" />
                </div>
                <div class="form-group">
                    <label for="address" class="form-label">Address</label>
                    <input id="address" class="form-control" type="text" name="address" value="{{ old('address') }}" required />
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>
                <div class="form-group terms">
                    <input type="checkbox" name="terms" id="terms" required />
                    <label for="terms">
                        I agree to the Terms of Service and Privacy Policy
                    </label>
                </div>
                <button type="submit" class="register-btn">Register</button>
            </form>
            <div class="already-link">
                <a class="underline text-sm" href="{{ route('login') }}">
                    Already registered?
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
