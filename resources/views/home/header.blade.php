`@php
        use Illuminate\Support\Facades\Request;
    @endphp

<!-- Main Header -->
<header class="header_section">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
    <nav class="navbar navbar-expand-lg rounded-pill p-0">
        <div class="container p-0 flex flex-row justify-around items-center w-[100vw] bg-transparent">
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
                        <li class="nav-item {{ Request::is('all_products') ? 'active' : '' }}">
                            <a class="nav-link" href="{{url('all_products')}}">Products</a>
                        </li>                        <li class="nav-item {{ Request::is('categories') ? 'active' : '' }}">
                            <a class="nav-link" href="{{url('categories')}}">Categories</a>
                        </li>
                        <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                            <a class="nav-link" href="{{url('contact')}}">Contact</a>
                        </li>
                    </ul>
                </div>

                <!-- Right Side Icons -->
                <div class="nav-icons d-flex align-items-center">
                    <!-- Search -->
                    <div class="search-wrapper me-3" style="position:relative;">
                        <button class="search-toggle" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                        <div class="search-popup">
                            <form class="search-form" action="{{ url('search_product') }}" method="GET" autocomplete="off">
                                <div class="form-group" style="position:relative;">
                                    <input type="search" class="form-control" placeholder="Search products..." name="search" id="search-input" autocomplete="off">
                                    <button type="submit" class="btn-search">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <div id="recent-searches" class="autocomplete-results" style="display:none; position:absolute; left:0; right:0; top:100%; background:#fff; z-index:1000; border-radius:0 0 10px 10px; box-shadow:0 4px 16px rgba(44,62,80,0.10); color:#222; max-height:220px; overflow-y:auto;"></div>
                                </div>
                            </form>
                            <div id="autocomplete-results" class="autocomplete-results"></div>
                        </div>
                    </div>

                    <!-- Cart -->
                    <a href="{{url('show_cart')}}" class="nav-icon-link me-3 cart-link">
                        <i class="fas fa-shopping-cart"></i>
                        @if(Auth::check())
                            <?php $count = App\Models\Cart::where('user_id', Auth::id())->count(); ?>
                            @if($count > 0)
                                <span class="cart-badge animate-bounce">{{ $count }}</span>
                            @endif
                        @endif
                    </a>

                    <!-- Orders -->
                    <a href="{{url('show_order')}}" class="nav-icon-link me-3">
                        <span class="order-text">Orders</span>
                    </a>

                    <!-- Notifications -->
                    @if(Auth::check())
                        <div class="nav-icon-link me-3 position-relative">
                            <a href="#" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-bell"></i>
                                @if(auth()->user()->unreadNotifications->count() > 0)
                                    <span class="cart-badge animate-bounce" style="background:#2f80ed;">{{ auth()->user()->unreadNotifications->count() }}</span>
                                @endif
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end p-2" aria-labelledby="notificationDropdown" style="min-width:300px; max-width:350px; max-height:350px; overflow-y:auto;">
                                @php
                                    $allNotifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->get();
                                @endphp
                                @forelse($allNotifications as $notification)
                                    <li class="mb-2">
                                        <div class="d-flex align-items-center gap-2">
                                            @if(!empty($notification->data['image']))
                                                <img src="{{ asset('product/' . $notification->data['image']) }}" alt="Product" style="width:40px;height:40px;object-fit:cover;border-radius:5px;">
                                            @endif
                                            <div class="flex-grow-1">
                                                <span>{{ $notification->data['message'] }}</span>
                                                @if($notification->read_at)
                                                    <span class="badge bg-success ms-2">Read</span>
                                                @else
                                                    <span class="badge bg-warning ms-2">Unread</span>
                                                @endif
                                            </div>
                                            @if(!$notification->read_at)
                                            <form method="POST" action="{{ route('notification.read', $notification->id) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-link text-danger p-0">Mark as read</button>
                                            </form>
                                            @endif
                                        </div>
                                    </li>
                                @empty
                                    <li><span class="text-muted">No notifications</span></li>
                                @endforelse
                            </ul>
                        </div>
                    @endif

                    <!-- Mobile Menu Toggle -->
                    <button class="navbar-toggler ms-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>
    

 
    <div class="deals-banner overflow-hidden">
        <div class="container">
            <div class="deals-slider">
                <div class="deals-item">🔥 Hot Deal: 30% OFF on All Summer Collection!</div>
                <div class="deals-item">🚚 Free Shipping on Orders Over Rs.5000</div>
                <div class="deals-item">🎁 New Arrivals: Check Out Latest Fashion</div>
            </div>
        </div>
    </div>
</header>

@if (Route::has('login'))
    @guest
        <div class="floating-auth">
            <a class="btn-auth circular-btn login" href="{{ route('login') }}" title="Login">
                <i class="fas fa-sign-in-alt"></i>
            </a>
            <a class="btn-auth circular-btn register" href="{{ route('register') }}" title="Register">
                <i class="fas fa-user-plus"></i>
            </a>
        </div>    @else
        <div class="floating-auth">
            <div class="auth-buttons-group">
                <a href="{{ route('profile.show') }}" 
                    class="btn-auth circular-btn profile" 
                    title="Profile">
                    <i class="fas fa-user"></i>
                </a>
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <button type="submit" 
                        class="btn-auth circular-btn logout" 
                        title="Logout"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    @endguest
@endif

<style>    .header_section {
        padding: 20px 0 0 0;
        position: relative;
        background: transparent;
        z-index: 100;
    }    .header-main {
        /* Removed background, border-radius, box-shadow, margin, max-width, and padding to eliminate the inner rounded div */
        background: none;
        border-radius: 0;
        box-shadow: none;
        margin: 0;
        max-width: none;
        padding: 0;
    }

    /* Brand Text */
    .brand-text {
        font-size: 1.8rem;
        font-weight: 800;
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        font-family: 'Playfair Display';
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        letter-spacing: 2px;
    }    /* Navigation */
    .nav-link {
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
        z-index: 1000;
        display: inline-block;
        vertical-align: top;
    }    
    
    .search-toggle {
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
        right: 0;
        left: auto;
        margin-top: 8px;
        width: 300px;
        min-width: 220px;
        max-width: 320px;
        padding: 15px;
        background: white;
        z-index: 1001;
        border-radius: 18px;
        box-shadow: 0 5px 30px rgba(0,0,0,0.15);
        opacity: 0;
        visibility: hidden;
        transform: translateY(10px);
        transition: all 0.3s ease;
        border: 1px solid rgba(0,0,0,0.04);
    }

    .search-popup.active {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    /* Remove hover/focus-within rules for .search-wrapper and .search-popup */
    .search-wrapper:hover .search-popup,
    .search-popup:hover,
    .search-popup:focus-within {
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
    }    /* Auth Buttons */
    .floating-auth {
        position: fixed;
        right: 30px;
        top: 50%;
        transform: translateY(-50%);
        display: flex;
        flex-direction: column;
        gap: 15px;
        z-index: 1000;
    }

    .circular-btn {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        position: relative;
    }

    .circular-btn i {
        font-size: 1.2rem;
        transition: all 0.3s ease;
    }

    .circular-btn.login {
        background: white;
        border: 2px solid var(--secondary-color);
        color: var(--secondary-color);
    }

    .circular-btn.register {
        background: linear-gradient(45deg, var(--secondary-color), var(--primary-color));
        color: white;
        border: none;
    }

    .circular-btn.logout {
        background: white;
        border: 2px solid #dc3545;
        color: #dc3545;
        margin: 10px 0;
    }

    .circular-btn.profile {
        background: white;
        border: 2px solid var(--primary-color);
        color: var(--primary-color);
    }

    .circular-btn:hover {
        transform: scale(1.2);
        box-shadow: 0 6px 20px rgba(0,0,0,0.65);
    }

    .circular-btn.login:hover {
        background: var(--secondary-color);
        color: white;
    }

    .circular-btn.register:hover {
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
    }

    .circular-btn.logout:hover {
        background: #dc3545;
        color: white;
        transform: scale(1.1);
        box-shadow: 0 6px 20px rgba(220, 53, 69, 0.2);
    }

    .circular-btn.profile:hover {
        background: var(--primary-color);
        color: white;
        transform: scale(1.1);
        box-shadow: 0 6px 20px rgba(var(--primary-color-rgb), 0.2);
    }

    /* Tooltip */
    .circular-btn::before {
        content: attr(title);
        position: absolute;
        right: 55px;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0,0,0,0.8);
        color: white;
        padding: 5px 12px;
        border-radius: 4px;
        font-size: 0.85rem;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        white-space: nowrap;
    }

    .circular-btn:hover::before {
        opacity: 1;
        visibility: visible;
        right: 60px;
    }

    /* Deals Banner */
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
            max-width: 98vw;
        }

        .navbar-collapse {
            position: fixed;
            top: 0;
            left: -100%;
            width: 80%;
            max-width: 300px;
            height: 100vh;
            background: white;
            padding: 2rem;
            transition: all 0.3s ease;
            z-index: 1000;
            overflow-y: auto;
        }

        .navbar-collapse.show {
            left: 0;
            box-shadow: 5px 0 15px rgba(0,0,0,0.1);
        }

        .navbar-nav {
            margin-top: 2rem;
        }

        .nav-item {
            margin: 1rem 0;
        }

        .nav-link {
            font-size: 1.1rem;
            padding: 0.5rem 0 !important;
        }

        .nav-icons {
            margin-left: auto;
        }

        .navbar-toggler {
            z-index: 1001;
            border: none;
            padding: 0;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        .search-popup {
            position: fixed;
            top: 70px;
            left: 50%;
            transform: translateX(-50%) translateY(20px);
            width: 90%;
            max-width: 300px;
        }
        
        .search-wrapper:hover .search-popup,
        .search-popup:hover,
        .search-popup:focus-within {
            transform: translateX(-50%) translateY(0);
        }

        .floating-auth {
            z-index: 1002;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
        }

        .overlay.show {
            opacity: 1;
            visibility: visible;
        }
    }    /* General Header Improvements */
    .header_section {
        position: relative;
        background: transparent;
    }

    .nav-link {
        position: relative;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 2px;
        background: var(--primary-color);
        transition: all 0.3s ease;
    }

    .nav-link:hover::after,
    .nav-item.active .nav-link::after {
        width: 100%;
    }

    .cart-badge {
        animation: bounce 1s infinite;
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-3px); }
    }

    .autocomplete-results {
    position: absolute;
    width: 100%;
    top: 65%;
    left: 0;
    right: 0;
    background: #fff;
    border-radius: 0 0 10px 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    z-index: 2000;
    max-height: 300px;
    overflow-y: auto;
    border: 1px solid #eee;
    display: none;
}


.autocomplete-item {
    padding: 10px 15px;
    cursor: pointer;
    border-bottom: 1px solid #f3f3f3;
}
.autocomplete-item:last-child { border-bottom: none; }
.autocomplete-item.popular { font-weight: bold; color: #e67e22; }
.autocomplete-item:hover { background: #f8f8f8; }
</style>

<!-- Overlay for mobile menu -->
<div class="overlay" id="menuOverlay"></div>

<script>
    // Mobile menu functionality
    document.addEventListener('DOMContentLoaded', function() {
        const navbarToggler = document.querySelector('.navbar-toggler');
        const navbarCollapse = document.querySelector('.navbar-collapse');
        const overlay = document.getElementById('menuOverlay');

        navbarToggler.addEventListener('click', function() {
            navbarCollapse.classList.toggle('show');
            overlay.classList.toggle('show');
        });

        overlay.addEventListener('click', function() {
            navbarCollapse.classList.remove('show');
            overlay.classList.remove('show');
        });

        // Close menu when clicking a link
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                navbarCollapse.classList.remove('show');
                overlay.classList.remove('show');
            });
        });

        // Close search popup when clicking outside
        document.addEventListener('click', function(e) {
            const searchWrapper = document.querySelector('.search-wrapper');
            const popup = document.querySelector('.search-popup');
            
            if (!searchWrapper.contains(e.target)) {
                popup.style.opacity = '0';
                popup.style.visibility = 'hidden';
            }
        });

        // Search toggle with focus
        document.querySelector('.search-toggle').addEventListener('click', function(e) {
            e.stopPropagation();
            const popup = document.querySelector('.search-popup');
            popup.style.opacity = '1';
            popup.style.visibility = 'visible';
            popup.querySelector('input').focus();
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search-input');
        const resultsBox = document.getElementById('autocomplete-results');
        const searchPopup = document.querySelector('.search-popup');
        let debounceTimeout = null;

        if (searchInput) {
            // Show popup on input focus
            searchInput.addEventListener('focus', function() {
                searchPopup.classList.add('active');
            });
            // Hide popup on input blur (with delay to allow click)
            searchInput.addEventListener('blur', function() {
                setTimeout(() => {
                    if (!searchPopup.matches(':hover')) {
                        searchPopup.classList.remove('active');
                    }
                }, 150);
            });
            // Keep popup open when hovering over it
            searchPopup.addEventListener('mouseenter', function() {
                searchPopup.classList.add('active');
            });
            searchPopup.addEventListener('mouseleave', function() {
                if (document.activeElement !== searchInput) {
                    searchPopup.classList.remove('active');
                }
            });
            searchInput.addEventListener('input', function() {
                const query = this.value.trim();
                clearTimeout(debounceTimeout);

                if (query.length < 2) {
                    resultsBox.style.display = 'none';
                    resultsBox.innerHTML = '';
                    return;
                }

                debounceTimeout = setTimeout(() => {
                    fetch(`/autocomplete?query=${encodeURIComponent(query)}`)
                        .then(res => res.json())
                        .then(data => {
                            if (data.length === 0) {
                                resultsBox.innerHTML = '<div class="autocomplete-item">No results found</div>';
                            } else {
                                resultsBox.innerHTML = data.map(item =>
                                    `<div class="autocomplete-item d-flex align-items-center" data-title="${item.title}" data-id="${item.id}">
                                        <img src="/product/${item.image}" alt="${item.title}" style="width:38px;height:38px;object-fit:cover;border-radius:8px;margin-right:12px;border:1px solid #eee;background:#fafbfc;">
                                        <div style="flex:1;">
                                            <div style="font-weight:600;font-size:1.01em;">${item.title}</div>
                                            <div style="color:#2f80ed;font-weight:500;font-size:0.97em;">Rs.${item.price}</div>
                                        </div>
                                    </div>`
                                ).join('');
                            }
                            resultsBox.style.display = 'block';
                            searchPopup.classList.add('active');
                        });
                }, 200);
            });

            // Convert string to kebab-case for slug
            function toKebabCase(str) {
                return str
                    .toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, '') // Remove non-alphanumeric except space and hyphen
                    .replace(/\s+/g, '-')         // Replace spaces with hyphens
                    .replace(/-+/g, '-')           // Replace multiple hyphens with single
                    .replace(/^-+|-+$/g, '');      // Trim hyphens from start/end
            }

            resultsBox.addEventListener('click', function(e) {
                const item = e.target.closest('.autocomplete-item');
                if (item && item.hasAttribute('data-title')) {
                    const productId = item.getAttribute('data-id');
                    if (productId) {
                        window.location.href = `/product_details/${productId}`;
                    } else {
                        searchInput.value = item.getAttribute('data-title');
                        resultsBox.style.display = 'none';
                        searchPopup.classList.remove('active');
                        searchInput.form.submit();
                    }
                }
            });

            document.addEventListener('click', function(e) {
                if (!searchPopup.contains(e.target) && e.target !== searchInput) {
                    resultsBox.style.display = 'none';
                    searchPopup.classList.remove('active');
                }
            });
        }
    });

    // Recent searches functionality
    (function() {
        const input = document.getElementById('search-input');
        const recentBox = document.getElementById('recent-searches');
        const form = input.closest('form');
        const RECENT_KEY = 'recent_product_searches';
        function getRecent() {
            try {
                return JSON.parse(localStorage.getItem(RECENT_KEY)) || [];
            } catch { return []; }
        }
        function saveRecent(val) {
            if (!val) return;
            let arr = getRecent();
            arr = arr.filter(v => v !== val);
            arr.unshift(val);
            if (arr.length > 7) arr = arr.slice(0,7);
            localStorage.setItem(RECENT_KEY, JSON.stringify(arr));
        }
        function showRecent() {
            const arr = getRecent();
            if (!arr.length) { recentBox.style.display = 'none'; return; }
            recentBox.innerHTML = arr.map(q => `
        <div class='recent-item' style='padding:8px 16px; cursor:pointer; display:flex; align-items:center; justify-content:space-between;'>
            <span>${q.replace(/</g,'&lt;')}</span>
            <span class="delete-recent" data-query="${q.replace(/&/g,'&amp;').replace(/"/g,'&quot;')}", style="margin-left:12px; color:#888; font-size:1.1em; cursor:pointer;">&times;</span>
        </div>`).join('');
            recentBox.style.display = 'block';
        }
        function hideRecent() { recentBox.style.display = 'none'; }
        input.addEventListener('focus', showRecent);
        input.addEventListener('input', function() { if (!this.value) showRecent(); else hideRecent(); });
        document.addEventListener('click', function(e) {
            if (!recentBox.contains(e.target) && e.target !== input) hideRecent();
        });
        recentBox.addEventListener('mousedown', function(e) {
            if (e.target.classList.contains('recent-item')) {
                input.value = e.target.textContent;
                hideRecent();
                setTimeout(() => form.submit(), 50);
            }
            if (e.target.classList.contains('delete-recent')) {
        e.stopPropagation();
        const delQuery = e.target.getAttribute('data-query');
        let arr = getRecent();
        arr = arr.filter(q => q !== delQuery);
        localStorage.setItem(RECENT_KEY, JSON.stringify(arr));
        showRecent();
    }
        });
        form.addEventListener('submit', function() {
            saveRecent(input.value.trim());
        });
    })();
</script>