@php
    use Illuminate\Support\Facades\Request;
@endphp

<!-- Main Header -->
<header class="header_section">
    <nav class="navbar navbar-expand-lg rounded-pill p-0">
        <div class="container p-0">
            <div class="header-main d-flex align-items-center w-100 px-4 py-2">
                <!-- Brand Name instead of logo -->
                <a class="navbar-brand text-gradient m-0" href="{{url('/')}}">
                    <span class="brand-text">BHAKUNDO</span>
                </a>

                <!-- Center Navigation -->
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                            <a class="nav-link" href="{{url('/')}}">Home</a>
                        </li>
                        <li class="nav-item {{ Request::is('products') ? 'active' : '' }}">
                            <a class="nav-link" href="{{url('products')}}">Shop</a>
                        </li>
                        <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                            <a class="nav-link" href="{{url('about')}}">About</a>
                        </li>
                        <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                            <a class="nav-link" href="{{url('contact')}}">Contact</a>
                        </li>
                    </ul>
                </div>

                <!-- Right Side Icons -->
                <div class="nav-icons d-flex align-items-center">
                    <!-- Search -->
                    <div class="search-wrapper me-3">
                        <button class="search-toggle" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                        <div class="search-popup z-10">
                            <form class="search-form" action="{{ url('search_product') }}" method="GET">
                                <div class="form-group">
                                    <input type="search" class="form-control" placeholder="Search products..." name="search">
                                    <button type="submit" class="btn-search">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Cart -->
                    <a href="{{url('show_cart')}}" class="nav-icon-link me-3 cart-link">
                        <i class="fas fa-shopping-cart"></i>
                        @if(Auth::check())
                            <?php $count = App\Models\Cart::where('user_id', Auth::id())->count(); ?>
                            @if($count > 0)
                                <span class="cart-badge">{{ $count }}</span>
                            @endif
                        @endif
                    </a>

                    <!-- Orders -->
                    <a href="{{url('show_order')}}" class="nav-icon-link me-3">
                        <span class="order-text">Orders</span>
                    </a>

                    <!-- Auth -->
                    @if (Route::has('login'))
                        @auth 
                            <x-app-layout></x-app-layout>
                        @else
                            <div class="auth-buttons">
                                <a class="btn-login me-2" href="{{ route('login') }}">Login</a>
                                <a class="btn-register" href="{{ route('register') }}">Register</a>
                            </div>
                        @endauth
                    @endif

                    <!-- Mobile Menu Toggle -->
                    <button class="navbar-toggler ms-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        <!-- </div> -->
    </nav>

    <!-- Deals Banner (Moved to bottom of header) -->
    <div class="deals-banner">
        <div class="container">
            <div class="deals-slider">
                <div class="deals-item">🔥 Hot Deal: 30% OFF on All Summer Collection!</div>
                <div class="deals-item">🚚 Free Shipping on Orders Over $50</div>
                <div class="deals-item">🎁 New Arrivals: Check Out Latest Fashion</div>
            </div>
        </div>
    </div>
</header>

<style>    .header_section {
        padding: 20px 0 0 0;
        position: relative;
    }

    .header-main {
        background: #fff;
        box-shadow: 0 3px 15px rgba(0,0,0,0.08);
        border: 1px solid rgba(0,0,0,0.04);
        border-radius: 35px;
        overflow: hidden;
    }

    /* Brand Text */
    .brand-text {
        font-size: 1.8rem;
        font-weight: 800;
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        letter-spacing: 2px;
    }    /* Navigation */
    .nav-link {
        font-weight: 600;
        font-size: 0.95rem;
        padding: 8px 20px !important;
        color: var(--text-color) !important;
        transition: all 0.3s ease;
        position: relative;
        border-radius: 25px;
    }

    .nav-link:hover {
        background: rgba(0,0,0,0.04);
    }

    .nav-item.active .nav-link {
        background: rgba(var(--secondary-color-rgb), 0.1);
    }

    .nav-link::after {
        display: none;
    }

    /* Search */
    .search-wrapper {
        position: relative;
    }    .search-toggle {
        background: rgba(0,0,0,0.04);
        border: none;
        color: var(--text-color);
        font-size: 1.2rem;
        cursor: pointer;
        padding: 10px;
        border-radius: 50%;
        height: 40px;
        width: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .search-toggle:hover {
        background: rgba(var(--secondary-color-rgb), 0.1);
    }

    .search-popup {
        position: absolute;
        top: 100%;
        right: -100px;
        width: 300px;
        padding: 15px;
        background: white;
        border-radius: 25px;
        box-shadow: 0 5px 30px rgba(0,0,0,0.15);
        opacity: 0;
        visibility: hidden;
        transform: translateY(10px);
        transition: all 0.3s ease;
        border: 1px solid rgba(0,0,0,0.04);
    }

    .search-wrapper:hover .search-popup,
    .search-popup:hover {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .search-form .form-group {
        position: relative;
        margin: 0;
    }

    .form-control {
        border: 2px solid var(--light-gray);
        border-radius: 25px;
        padding: 12px 20px;
        padding-right: 50px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: var(--secondary-color);
        box-shadow: none;
    }

    .btn-search {
        position: absolute;
        right: 5px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: var(--secondary-color);
        padding: 8px 12px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    /* Cart and Order Links */    .nav-icon-link {
        color: var(--text-color);
        text-decoration: none;
        position: relative;
        transition: all 0.3s ease;
        font-weight: 600;
        font-size: 0.9rem;
        padding: 10px 20px;
        border-radius: 25px;
        background: rgba(0,0,0,0.04);
    }

    .nav-icon-link:hover {
        background: rgba(var(--secondary-color-rgb), 0.1);
    }

    .order-text {
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .cart-badge {
        position: absolute;
        top: -8px;
        right: -8px;
        background: var(--secondary-color);
        color: white;
        font-size: 0.7rem;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        animation: pulse 2s infinite;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }

    /* Auth Buttons */
    .btn-login, .btn-register {
        padding: 10px 25px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 0.9rem;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-login {
        color: var(--secondary-color);
        border: 2px solid var(--secondary-color);
    }

    .btn-register {
        background: var(--secondary-color);
        color: white;
    }

    .btn-login:hover {
        background: var(--secondary-color);
        color: white;
    }

    .btn-register:hover {
        background: var(--primary-color);
        color: white;
    }    /* Deals Banner */
    .deals-banner {
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        padding: 10px 0;
        margin-top: 20px;
        border-radius: 25px;
        margin-left: 20px;
        margin-right: 20px;
    }

    .deals-slider {
        display: flex;
        animation: slideDeals 20s linear infinite;
    }

    .deals-item {
        flex: 0 0 100%;
        text-align: center;
        color: white;
        font-weight: 500;
        font-size: 0.9rem;
        white-space: nowrap;
    }

    @keyframes slideDeals {
        0% { transform: translateX(0); }
        33.33% { transform: translateX(-100%); }
        33.34% { transform: translateX(-100%); }
        66.66% { transform: translateX(-200%); }
        66.67% { transform: translateX(-200%); }
        100% { transform: translateX(-300%); }
    }

    @media (max-width: 991.98px) {
        .header-main {
            border-radius: 25px;
            padding: 10px !important;
        }

        .navbar-collapse {
            position: absolute;
            top: 100%;
            left: 15px;
            right: 15px;
            background: white;
            padding: 20px;
            border-radius: 25px;
            box-shadow: 0 5px 30px rgba(0,0,0,0.15);
            margin-top: 15px;
            border: 1px solid rgba(0,0,0,0.04);
        }

        .search-popup {
            position: fixed;
            top: 70px;
            left: 50%;
            transform: translateX(-50%);
            width: 90%;
            max-width: 300px;
            border-radius: 25px;
        }

        .nav-icon-link {
            margin: 5px 0;
            display: inline-block;
        }

        .auth-buttons {
            margin-top: 15px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .btn-login, .btn-register {
            text-align: center;
            display: block;
        }
    }
</style>

<script>
    document.querySelector('.search-toggle').addEventListener('click', function(e) {
        e.stopPropagation();
        const popup = document.querySelector('.search-popup');
        popup.style.opacity = '1';
        popup.style.visibility = 'visible';
        popup.style.transform = 'translateY(10)';
        
        // Focus the search input
        popup.querySelector('input').focus();
    });

    // Close search popup when clicking outside
    document.addEventListener('click', function(e) {
        const popup = document.querySelector('.search-popup');
        const searchWrapper = document.querySelector('.search-wrapper');
        
        if (!searchWrapper.contains(e.target)) {
            popup.style.opacity = '0';
            popup.style.visibility = 'hidden';
            popup.style.transform = 'translateY(10px)';
        }
    });
</script>