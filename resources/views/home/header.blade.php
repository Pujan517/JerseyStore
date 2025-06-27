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