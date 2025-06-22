<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="Modern Football Kit Store" />
      <link rel="shortcut icon" href="{{asset('images/logo.png')}}" type="">
      <title>BHAKUNDO - Football Kits</title>
        <!-- CSS Libraries -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">      <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />      <style type="text/css">
        :root {
            --primary-color: #2f80ed;
            --secondary-color: #56ccf2;
            --primary-color-rgb: 47, 128, 237;
            --secondary-color-rgb: 86, 204, 242;
            --text-color: #333;
            --light-gray: #e0e0e0;
        }

        body {
            padding: 0;
            margin: 0;
        }

        /* Only unique product section and footer styles below. Remove all nav, header, search, card, section-title, hero_area, etc. */
        .product_section {
            position: relative;
            z-index: 1;
        }
        .product_section .box {
            position: relative;
            overflow: visible;
            margin-top: 25px;
            padding: 35px 35px;
            background-color: #f7f8f9;
            transition: all .3s;
            box-shadow: 5px 5px 5px -5px rgba(0,0,0,.2);
            border: solid #fff 10px;
        }
        .product_section .box:hover {
            box-shadow: 5px 5px 5px -5px rgba(0,0,0,.4);
        }
        .img-box {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 215px;
            padding: 15px;
        }
        .img-box img {
            max-width: 100%;
            max-height: 160px;
            transition: all .3s;
        }
        .img-box img:hover {
            transform: scale(1.05);
        }
        .product_section .box .detail-box {
            text-align: center;
            padding: 25px;
            position: relative;
            z-index: 10;
            background: none;
            color: #2f80ed;
        }
        .product_section .box .detail-box h5 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: #000 !important;
            background: none;
            border: none;
            white-space: normal;
            overflow-wrap: break-word;
            word-break: break-word;
            min-height: 3em;
        }
        .product_section .box .detail-box h6.price {
            margin-bottom: 15px;
        }
        .product_section .option_container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(255,255,255,0.85);
            z-index: 99;
            opacity: 0;
            transition: all .2s;
            pointer-events: none;
        }
        .product_section .box:hover .option_container,
        .product_section .option_container:focus-within {
            opacity: 1;
            pointer-events: auto;
        }
        .product_section .option_container .options {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .product_section .option_container .options a {
            display: inline-block;
            padding: 8px 15px;
            border-radius: 30px;
            width: 165px;
            text-align: center;
            transition: all .3s;
            margin: 5px 0;
        }
        .option1 {
            background: white;
            color: #2f80ed;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin: 5px 0;
        }
        .option1:hover {
            background: #2f80ed;
            color: white;
            transform: translateY(-2px);
        }
        .quantity-cart-row {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            margin: 10px 0;
        }
        .quantity-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 10px 0;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 30px;
            padding: 5px;
        }
        .quantity-btn {
            background: transparent;
            border: none;
            color: #2f80ed;
            padding: 5px 10px;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
        }
        .quantity-btn:hover {
            transform: scale(1.1);
            background: rgba(47, 128, 237, 0.1);
        }
        .quantity-input {
            width: 50px;
            text-align: center;
            background: transparent;
            border: none;
            color: #2f80ed;
            font-size: 16px;
            padding: 0;
            margin: 0 5px;
        }
        .quantity-input::-webkit-inner-spin-button,
        .quantity-input::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        
        .cart-btn {
            width: 165px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: white;
            color: #2f80ed;
            padding: 8px 15px;
            border-radius: 30px;
            border: none;
            cursor: pointer;
            font-weight: 500;
            transition: all .3s ease;
        }
        .cart-btn:hover {
            background: #2f80ed;
            color: white;
            transform: translateY(-2px);
        }
        .price-box {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            text-align: center;
        }
        .price-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
        }
        .original-price {
            text-decoration: line-through;
            color: #999;
            font-size: 0.9rem;
            margin: 0;
        }
        .discounted-price {
            color: #2f80ed;
            font-weight: 600;
            font-size: 1.1rem;
            margin: 0;
        }
        .regular-price {
            color: #2f80ed;
            font-weight: 600;
            font-size: 1.1rem;
            margin: 0;
        }
        /* Footer styles (keep if not duplicated) */
        .footer {
            background: var(--dark-gray);
            color: #fff;
            padding: 60px 0 30px;
        }
        .footer h4 {
            color: #fff;
            margin-bottom: 25px;
            font-weight: 600;
        }
        .footer ul {
            list-style: none;
            padding: 0;
        }
        .footer ul li {
            margin-bottom: 15px;
        }
        .footer ul li a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .footer ul li a:hover {
            color: var(--secondary-color);
        }
                        /* Header pill style for all_products page */
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

    .hero_area {
        position: relative;
        background-color: var(--light-gray);
        min-height: 80vh;
        display: flex;
        align-items: center;
    }

        /* Product section styles end */
      </style>
   </head>
   <body>
      <!-- Header Section -->
      @include('home.header')
      <section class="product_section layout_padding">
         <div class="container">
            @if(session('message'))
            <div class="alert alert-success mt-3">{{ session('message') }}</div>
            @endif
            <div class="heading_container heading_center">
               <div class="d-flex flex-wrap justify-content-between align-items-center mb-2 gap-2" style="z-index:10; padding: 0 0 10px 0;">
                  <h2 class="mb-0" style="flex:1 1 auto; min-width:180px;">All <span>Products</span></h2>
               </div>
               <p class="section-subtitle">Discover our premium collection of football gear</p>
            </div>
            <!-- Filter Button directly under heading_container -->
            <div class="w-100 d-flex justify-content-end mb-3" style="position:relative; z-index:1200;">
                <button class="btn btn-outline-primary btn-sm d-inline-flex align-items-center" type="button" id="toggleFilterBtn" style="min-width:90px;">Filter <i class="fa fa-sliders-h ms-2"></i></button>
            </div>
            <div id="filterBackdrop" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; z-index:1199; background:rgba(30,40,60,0.18); pointer-events:auto; transition:background 0.2s;"></div>
            <div id="filterOverlay" style="display:none; position:absolute; top:100%; right:0; background:#fff; border-radius:14px; box-shadow:0 8px 32px rgba(0,0,0,0.18), 0 1.5px 8px 0 rgba(47,128,237,0.08); border:1.5px solid #e3eaf5; padding:0; min-width:220px; max-width:340px; width:90vw; z-index:1201; pointer-events:auto; overflow:hidden;">
    <div class="filter-overlay-header d-flex align-items-center justify-content-between px-4 py-3 border-bottom" style="background:linear-gradient(90deg,#f7f8fa 80%,#e3f0ff 100%); border-bottom:1px solid #e3eaf5;">
        <div class="d-flex align-items-center gap-2">
            <i class="fa fa-sliders-h text-primary me-2" style="font-size:1.25rem;"></i>
            <h5 class="mb-0 fw-bold" style="font-size:1.13rem; color:#2f80ed; letter-spacing:0.5px;">Product Filters</h5>
        </div>
        <button type="button" id="closeFilterOverlay" aria-label="Close filter" class="filter-close-btn" style="background:none; border:none; font-size:1.7rem; color:#888; cursor:pointer; line-height:1; padding:0 0 2px 0; transition:color .2s;" onmouseover="this.style.color='#2f80ed'" onmouseout="this.style.color='#888'">&times;</button>
    </div>
    <form method="GET" action="" class="px-4 py-3" id="filterForm" style="min-width:260px;">
        <div class="mb-3">
            <label for="category" class="form-label fw-semibold text-primary" style="font-size:0.98rem;">League</label>
            <select name="category" id="category" class="form-select form-select-sm rounded-pill border-primary-subtle" style="background:#f7f8fa;">
                <option value="">All Leagues</option>
                @foreach($categories as $cat)
                    <option value="{{$cat->catagory_name}}" {{ request('category') == $cat->catagory_name ? 'selected' : '' }}>{{$cat->catagory_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold text-primary" style="font-size:0.98rem;">Size</label>
            <div class="d-flex flex-wrap gap-2">
                @foreach($sizes as $size)
                    <div class="form-check me-2 mb-1" style="padding-left:0;">
                        <input class="form-check-input visually-hidden" type="checkbox" name="size[]" value="{{$size}}" id="size_{{$size}}" {{ collect((array)request('size'))->contains($size) ? 'checked' : '' }}>
                        <label class="form-check-label size-pill" for="size_{{$size}}" style="display:inline-block; padding:5px 16px; border-radius:20px; background:#f7f8fa; border:1.5px solid #e3eaf5; color:#2f80ed; font-weight:500; font-size:0.97rem; cursor:pointer; transition:all .2s; margin-right:2px;">
                            {{$size}}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold text-primary" style="font-size:0.98rem;">Price Range</label>
            <div class="row g-2 align-items-end">
                <div class="col-6">
                    <label for="min_price" class="form-label small">Min</label>
                    <input type="number" name="min_price" id="min_price" class="form-control form-control-sm rounded-pill border-primary-subtle" placeholder="0" value="{{ request('min_price') }}" style="background:#f7f8fa;">
                </div>
                <div class="col-6">
                    <label for="max_price" class="form-label small">Max</label>
                    <input type="number" name="max_price" id="max_price" class="form-control form-control-sm rounded-pill border-primary-subtle" placeholder="10000" value="{{ request('max_price') }}" style="background:#f7f8fa;">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="availability" class="form-label fw-semibold text-primary" style="font-size:0.98rem;">Availability</label>
            <select name="availability" id="availability" class="form-select form-select-sm rounded-pill border-primary-subtle" style="background:#f7f8fa;">
                <option value="">All</option>
                <option value="in_stock" {{ request('availability') == 'in_stock' ? 'selected' : '' }}>In Stock</option>
                <option value="out_of_stock" {{ request('availability') == 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
            </select>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary btn-sm w-100 filter-apply-btn rounded-pill shadow-sm" style="font-weight:600; font-size:1.05rem; letter-spacing:0.5px;">Apply Filters <i class="fa fa-filter ms-2"></i></button>
        </div>
    </form>
</div>
<style>
#filterOverlay .size-pill {
    background: #f7f8fa;
    border: 1.5px solid #e3eaf5;
    color: #2f80ed;
    font-weight: 500;
    font-size: 0.97rem;
    transition: all .2s;
}
#filterOverlay .form-check-input:checked + .size-pill {
    background: #2f80ed;
    color: #fff;
    border-color: #2f80ed;
    box-shadow: 0 2px 8px 0 rgba(47,128,237,0.08);
}
#filterOverlay .form-check-input:focus + .size-pill {
    outline: 2px solid #2f80ed;
    outline-offset: 1px;
}
#filterOverlay .form-select, #filterOverlay .form-control {
    box-shadow: none !important;
    border-width: 1.5px;
}
#filterOverlay .form-select:focus, #filterOverlay .form-control:focus {
    border-color: #2f80ed;
    box-shadow: 0 0 0 2px rgba(47,128,237,0.08);
}
#filterOverlay .filter-apply-btn:hover, #filterOverlay .filter-apply-btn:focus {
    background: #1e5bb8;
    color: #fff;
    box-shadow: 0 2px 8px 0 rgba(47,128,237,0.13);
}
</style>
            <div class="row">
               @foreach($products as $product)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="img-box">
                        <img src="{{ asset('product/'.$product->image) }}" alt="{{ $product->title }}">
                     </div>
                     <div class="detail-box">
                        <h5 style="white-space: normal; overflow-wrap: break-word; word-break: break-word; min-height: 3em;">{{ $product->title }}</h5>
                        <div class="price-box" style="text-align: center;">
                            @if($product->discount_price !== null && $product->discount_price < $product->price)
                                <h6 class="discounted-price" style="color: black; font-weight: normal;">Rs. {{ number_format($product->discount_price, 2) }}</h6>
                            @else
                                <h6 class="regular-price" style="color: red;">Rs. {{ number_format($product->price, 2) }}</h6>
                            @endif
                        </div>
                     </div>
                     <div class="option_container" tabindex="0">
                        <div class="options">
                           <a href="{{ url('product_details', $product->id) }}" class="option1" aria-label="View Details">
                              <i class="fa fa-eye"></i> View Details
                           </a>
                           <form action="{{ url('add_cart', $product->id) }}" method="POST" class="cart-form">
                           @csrf
                               <div class="quantity-cart-row">
                                   @php
                                       $sizes = [];
                                       if ($product->sizes) {
                                           $sizes = is_array($product->sizes) ? $product->sizes : json_decode($product->sizes, true);
                                       }
                                   @endphp
                                   @if(!empty($sizes))
                                       <select name="selected_size" class="form-control" style="max-width:140px;margin-bottom:8px;background:#fff;color:#222;font-weight:600;appearance: menulist;min-width:100px;height:auto;line-height:1.5;box-shadow:none;" required>
                                           <option value="" disabled selected>Select size</option>
                                           @foreach($sizes as $size)
                                               <option value="{{$size}}">{{$size}}</option>
                                           @endforeach
                                       </select>
                                   @endif
                                   <div class="quantity-wrapper">
                                       <button type="button" class="quantity-btn minus" aria-label="Decrease quantity">-</button>
                                       <input min="1" type="number" value="1" name="quantity" class="quantity-input" aria-label="Quantity">
                                       <button type="button" class="quantity-btn plus" aria-label="Increase quantity">+</button>
                                   </div>
                                   <button type="submit" class="cart-btn" aria-label="Add to Cart">
                                       <i class="fa fa-shopping-cart"></i> Add to Cart
                                   </button>
                               </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
               @if($products->count() == 0)
                <div class="p-4 text-blue-700 bg-blue-100 rounded">No products found</div>
               @endif
            </div>
         </div>
         <!-- Scripts -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
      <script>
        // Header Search Functionality
        document.querySelector('.search-toggle')?.addEventListener('click', function(e) {
            e.stopPropagation();
            const popup = document.querySelector('.search-popup');
            if (popup) {
                popup.style.opacity = '1';
                popup.style.visibility = 'visible';
                if (window.innerWidth <= 991.98) {
                    popup.style.transform = 'translateX(-50%) translateY(0)';
                } else {
                    popup.style.transform = 'translateY(0)';
                }
                popup.querySelector('input')?.focus();
            }
        });
        document.addEventListener('click', function(e) {
            const popup = document.querySelector('.search-popup');
            const searchWrapper = document.querySelector('.search-wrapper');
            if (!searchWrapper?.contains(e.target)) {
                if (popup) {
                    popup.style.opacity = '0';
                    popup.style.visibility = 'hidden';
                    if (window.innerWidth <= 991.98) {
                        popup.style.transform = 'translateX(-50%) translateY(20px)';
                    } else {
                        popup.style.transform = 'translateY(20px)';
                    }
                }
            }
        });
        // Product quantity handlers
        document.addEventListener('DOMContentLoaded', function() {
             const quantityWrappers = document.querySelectorAll('.quantity-wrapper');
             quantityWrappers.forEach(wrapper => {
                 const input = wrapper.querySelector('.quantity-input');
                 const minusBtn = wrapper.querySelector('.minus');
                 const plusBtn = wrapper.querySelector('.plus');
                 minusBtn.addEventListener('click', () => {
                     const currentValue = parseInt(input.value);
                     if (currentValue > 1) {
                         input.value = currentValue - 1;
                     }
                 });
                 plusBtn.addEventListener('click', () => {
                     const currentValue = parseInt(input.value);
                     input.value = currentValue + 1;
                 });
                 input.addEventListener('change', () => {
                     if (input.value < 1) {
                         input.value = 1;
                     }
                 });
             });
         });
         // Filter Overlay logic
const filterBtn = document.getElementById('toggleFilterBtn');
const filterOverlay = document.getElementById('filterOverlay');
const filterBackdrop = document.getElementById('filterBackdrop');

function openFilterOverlay() {
    // Place overlay so its top-right aligns with the Filter button's bottom-right (directly below, no gap)
    const btnRect = filterBtn.getBoundingClientRect();
    const scrollTop = window.scrollY || document.documentElement.scrollTop;
    const scrollLeft = window.scrollX || document.documentElement.scrollLeft;
    const overlayWidth = 340;
    filterOverlay.style.width = overlayWidth + 'px';
    filterOverlay.style.maxWidth = overlayWidth + 'px';
    filterOverlay.style.minWidth = '220px';
    filterOverlay.style.position = 'absolute';
    filterOverlay.style.left = (btnRect.right + scrollLeft - overlayWidth) + 'px';
    filterOverlay.style.top = (btnRect.bottom + scrollTop) + 'px'; // FIX: use btnRect.bottom
    filterOverlay.style.transform = 'none';
    filterOverlay.style.opacity = '0';
    filterOverlay.style.display = 'block';
    filterOverlay.style.borderRadius = '16px';
    filterOverlay.style.boxShadow = '0 8px 32px rgba(0,0,0,0.18), 0 1.5px 8px 0 rgba(47,128,237,0.08)';
    filterOverlay.style.transition = 'opacity 0.25s';
    filterOverlay.style.zIndex = '1201';
    filterBackdrop.style.display = 'block';
    // Animate in
    setTimeout(() => {
        filterOverlay.style.opacity = '1';
    }, 10);
}

function closeFilterOverlay() {
    // Animate out
    filterOverlay.style.transform = 'translateY(-24px)';
    filterOverlay.style.opacity = '0';
    setTimeout(() => {
        filterOverlay.style.display = 'none';
        filterBackdrop.style.display = 'none';
    }, 250);
}

filterBtn.addEventListener('click', function(e) {
    e.stopPropagation();
    openFilterOverlay();
});

document.getElementById('closeFilterOverlay').addEventListener('click', closeFilterOverlay);
filterBackdrop.addEventListener('click', closeFilterOverlay);

window.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeFilterOverlay();
});
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('liveProductSearch');
    const noMsg = document.getElementById('noProductsMsg');
    if (!searchInput) return;
    searchInput.addEventListener('input', function() {
        const val = this.value.trim().toLowerCase();
        let shown = 0;
        document.querySelectorAll('.product_section .box').forEach(function(card) {
            const text = card.textContent.toLowerCase();
            const match = val.length < 1 || text.includes(val);
            card.parentElement.style.display = match ? '' : 'none';
            if (match) shown++;
        });
        if (shown === 0) noMsg.style.display = 'block';
        else noMsg.style.display = 'none';
    });
});
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('liveProductAutoSearch');
    const dropdown = document.getElementById('product-autocomplete-results');
    const noMsg = document.getElementById('noProductsMsg');
    const RECENT_KEY = 'recent_product_searches';
    let debounceTimeout = null;
    function getRecent() {
        try { return JSON.parse(localStorage.getItem(RECENT_KEY)) || []; } catch { return []; }
    }
    function saveRecent(val) {
        if (!val) return;
        let arr = getRecent();
        arr = arr.filter(v => v !== val);
        arr.unshift(val);
        if (arr.length > 7) arr = arr.slice(0,7);
        localStorage.setItem(RECENT_KEY, JSON.stringify(arr));
    }
    function renderDropdown(recentArr, productArrHtml) {
        let html = '';
        if (recentArr.length) {
            html += '<div class="recent-searches-label" style="font-size:0.97em;color:#888;padding:7px 16px 2px 16px;">Recent Searches</div>';
            html += recentArr.map(q =>
                `<div class='recent-item' style='display:flex;align-items:center;justify-content:space-between;padding:8px 16px;cursor:pointer;'>
                    <span>${q.replace(/</g,'&lt;')}</span>
                    <span class="delete-recent" data-query="${q.replace(/&/g,'&amp;').replace(/"/g,'&quot;')}">&times;</span>
                </div>`
            ).join('');
            html += '<hr style="margin:0 0 2px 0;">';
        }
        html += productArrHtml;
        dropdown.innerHTML = html;
        dropdown.style.display = (recentArr.length || productArrHtml) ? 'block' : 'none';
    }
    function fetchAndRenderProducts(query) {
        clearTimeout(debounceTimeout);
        if (query.length < 3) {
            renderDropdown(getRecent(), '');
            document.querySelectorAll('.product_section .box').forEach(card => card.parentElement.style.display = '');
            noMsg.style.display = 'none';
            return;
        }
        debounceTimeout = setTimeout(() => {
            fetch(`/autocomplete?query=${encodeURIComponent(query)}`)
                .then(res => res.json())
                .then(data => {
                    let productHtml = '';
                    if (data.length === 0) {
                        productHtml = '<div class="autocomplete-item">No results found</div>';
                        document.querySelectorAll('.product_section .box').forEach(card => card.parentElement.style.display = 'none');
                        noMsg.style.display = 'block';
                    } else {
                        productHtml = data.map(item =>
                            `<div class="autocomplete-item d-flex align-items-center" data-title="${item.title}" data-id="${item.id}">
                                <img src="/product/${item.image}" alt="${item.title}" style="width:38px;height:38px;object-fit:cover;border-radius:8px;margin-right:12px;border:1px solid #eee;background:#fafbfc;">
                                <div style="flex:1;">
                                    <div style="font-weight:600;font-size:1.01em;">${item.title}</div>
                                    <div style="color:#2f80ed;font-weight:500;font-size:0.97em;">Rs.${item.price}</div>
                                </div>
                            </div>`
                        ).join('');
                        const ids = data.map(item => String(item.id));
                        let shown = 0;
                        document.querySelectorAll('.product_section .box').forEach(card => {
                            const detailLink = card.querySelector('a.option1');
                            const href = detailLink ? detailLink.getAttribute('href') : '';
                            const idMatch = href && ids.some(id => href.endsWith('/'+id));
                            card.parentElement.style.display = idMatch ? '' : 'none';
                            if (idMatch) shown++;
                        });
                        noMsg.style.display = shown === 0 ? 'block' : 'none';
                    }
                    renderDropdown(getRecent(), productHtml);
                });
        }, 200);
    }
    searchInput.addEventListener('focus', function() {
        renderDropdown(getRecent(), '');
    });
    searchInput.addEventListener('input', function() {
        fetchAndRenderProducts(this.value.trim());
    });
    dropdown.addEventListener('mousedown', function(e) {
        if (e.target.classList.contains('recent-item')) {
            searchInput.value = e.target.querySelector('span').textContent;
            fetchAndRenderProducts(searchInput.value.trim());
        }
        if (e.target.classList.contains('delete-recent')) {
            e.stopPropagation();
            const delQuery = e.target.getAttribute('data-query');
            let arr = getRecent();
            arr = arr.filter(q => q !== delQuery);
            localStorage.setItem(RECENT_KEY, JSON.stringify(arr));
            renderDropdown(arr, '');
        }
        const item = e.target.closest('.autocomplete-item');
        if (item && item.hasAttribute('data-id')) {
            const id = item.getAttribute('data-id');
            const card = Array.from(document.querySelectorAll('.product_section .box')).find(card => {
                const detailLink = card.querySelector('a.option1');
                return detailLink && detailLink.getAttribute('href').endsWith('/'+id);
            });
            if (card) {
                card.parentElement.scrollIntoView({behavior:'smooth', block:'center'});
                card.classList.add('border-primary');
                setTimeout(()=>card.classList.remove('border-primary'), 1200);
            } else {
                window.location.href = '/product_details/' + id;
            }
            dropdown.style.display = 'none';
        }
    });
    document.addEventListener('click', function(e) {
        if (!dropdown.contains(e.target) && e.target !== searchInput) {
            dropdown.style.display = 'none';
        }
    });
    searchInput.form && searchInput.form.addEventListener('submit', function() {
        saveRecent(searchInput.value.trim());
    });
    // Show recent on page load if input is empty
    if (!searchInput.value) renderDropdown(getRecent(), '');
});
</script>
      <style>
@media (max-width: 576px) {
    #toggleFilterBtn {
        right: 10px !important;
        top: 120px !important;
        width: auto;
        min-width: 80px;
        font-size: 0.95rem;
        padding: 7px 14px;
    }
    #filterOverlay {
        right: 5px !important;
        left: auto !important;
        top: 170px !important;
        min-width: 90vw !important;
        padding: 18px 6px !important;
        max-width: 98vw !important;
    }
}
@media (max-width: 768px) {
    .filter-btn-wrapper {
        position: static !important;
        display: block !important;
        width: 100%;
        margin: 12px 0 0 0 !important;
        text-align: right;
    }
    #filterOverlay {
        right: 0 !important;
        left: 0 !important;
        min-width: 0 !important;
        width: 100vw !important;
        top: 60px !important;
        padding: 18px 6px !important;
    }
}
</style>
   </body>
</html>