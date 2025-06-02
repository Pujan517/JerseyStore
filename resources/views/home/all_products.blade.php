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

        /* Modern Product Card Styles */
        .product_section .box {
            position: relative;
            overflow: visible;
            margin-top: 18px;
            padding: 16px 10px 18px 10px;
            background: linear-gradient(135deg, #f7f8f9 80%, #e3eefe 100%);
            border-radius: 14px;
            box-shadow: 0 2px 10px 0 rgba(47,128,237,0.07), 0 1px 4px 0 rgba(86,204,242,0.06);
            border: 1px solid #e0e0e0;
            transition: box-shadow 0.3s, transform 0.3s, border 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .product_section .box:hover {
            box-shadow: 0 8px 32px 0 rgba(47,128,237,0.13), 0 3px 12px 0 rgba(86,204,242,0.12);
            border: 1.5px solid #2f80ed;
            transform: scale(1.025) translateY(-4px);
        }
        .img-box {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 150px;
            width: 100%;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 1px 6px 0 rgba(47,128,237,0.06);
            margin-bottom: 10px;
            padding: 6px 4px;
        }
        .img-box img {
            max-width: 90%;
            max-height: 110px;
            border-radius: 8px;
            box-shadow: 0 1px 4px 0 rgba(47,128,237,0.07);
            transition: all .3s;
        }
        .img-box img:hover {
            transform: scale(1.05);
        }
        .product_section .box .detail-box {
            text-align: center;
            padding: 0 0 12px 0;
            position: relative;
            z-index: 10;
            background: none;
            color: #2f80ed;
            width: 100%;
        }
        .product_section .box .detail-box h5 {
            font-size: 1.18rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: #222 !important;
            background: none;
            border: none;
            white-space: normal;
            overflow-wrap: break-word;
            word-break: break-word;
            min-height: 2.5em;
            letter-spacing: 0.01em;
        }
        .product_section .box .detail-box h6.price {
            margin-bottom: 15px;
        }
        .product_section .box .detail-box .price-box {
            margin-bottom: 10px;
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
            background: rgba(255,255,255,0.93);
            z-index: 99;
            opacity: 0;
            transition: all .2s;
            pointer-events: none;
            border-radius: 22px;
            box-shadow: 0 4px 24px 0 rgba(47,128,237,0.09);
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
            gap: 12px;
            width: 100%;
        }
        .product_section .option_container .options a {
            display: inline-block;
            padding: 10px 0;
            border-radius: 30px;
            width: 90%;
            max-width: 180px;
            text-align: center;
            transition: all .3s;
            margin: 0 auto;
            font-size: 1rem;
            font-weight: 600;
            box-shadow: 0 1.5px 6px 0 rgba(47,128,237,0.07);
        }
        .option1 {
            background: #f7f8f9;
            color: #2f80ed;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin: 0;
            border: 1.5px solid #e0e0e0;
        }
        .option1:hover {
            background: #2f80ed;
            color: white;
            border: 1.5px solid #2f80ed;
            transform: translateY(-2px) scale(1.04);
        }
        .quantity-cart-row {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 12px;
            margin: 10px 0 0 0;
            width: 100%;
            justify-content: space-between;
        }
        .cart-btn {
            width: 140px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: #f7f8f9;
            color: #2f80ed;
            padding: 10px 0;
            border-radius: 30px;
            border: 1.5px solid #e0e0e0;
            cursor: pointer;
            font-weight: 600;
            font-size: 1rem;
            transition: all .3s ease;
            box-shadow: 0 1.5px 6px 0 rgba(47,128,237,0.07);
        }
        .cart-btn:hover {
            background: #2f80ed;
            color: white;
            border: 1.5px solid #2f80ed;
            transform: translateY(-2px) scale(1.04);
        }

        /* Header */
        .header_section {
            padding: 20px 0 0 0;
            position: relative;
        }

        .navbar {
            padding: 0;
        }

        .header-main {
            background: #fff;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
            border: 1px solid rgba(0,0,0,0.04);
            border-radius: 35px;
            padding: 15px 25px;
            position: relative;
            z-index: 9999;
        }

        /* Brand Text */
        .brand-text {
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(45deg, #2f80ed, #56ccf2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: 2px;
        }

        /* Navigation Links */
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
            color: var(--primary-color) !important;
        }

        .nav-item.active .nav-link {
            background: rgba(var(--secondary-color-rgb), 0.1);
            color: var(--primary-color) !important;
        }

        /* Deals Banner */
        .deals-banner {
            background: linear-gradient(45deg, #2f80ed, #56ccf2);
            padding: 10px 0;
            margin-top: 20px;
            border-radius: 25px;
            margin: 20px 20px 0;
            overflow: hidden;
        }

        .deals-slider {
            display: flex;
            animation: slideDeals 20s linear infinite;
            width: 300%;
        }

        .deals-item {
            flex: 0 0 33.333%;
            text-align: center;
            color: white;
            font-weight: 500;
            font-size: 0.9rem;
            white-space: nowrap;
            padding: 5px 15px;
            animation: bounceIn 1s;
        }

        /* Navigation Icons */
        .nav-icons {
            display: flex;
            align-items: center;
            gap: 15px;
            position: relative;
            z-index: 99999;
        }

        .nav-icon-link {
            color: var(--text-color);
            text-decoration: none;
            position: relative;
            transition: all 0.3s ease;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 10px 20px;
            border-radius: 25px;
            background: rgba(0,0,0,0.04);
        }

        .nav-icon-link:hover {
            background: rgba(var(--secondary-color-rgb), 0.1);
            color: var(--primary-color);
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

        /* Deals Banner Animation */
        .deals-slider {
            display: flex;
            animation: slideDeals 20s linear infinite;
        }

        .deals-item {
            flex: 0 0 100%;
            text-align: center;
            color: white;
            font-weight: 500;
            font-size: 1rem;
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

        /* Mobile Responsive Styles */
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
        }

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
            height: 270px;
            padding: 15px;
        }

        .img-box img {
            max-width: 100%;
            max-height: 220px;
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
        }        .product_section .option_container {
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
        }        .quantity-btn {
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

        .heading_container.heading_center {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin-bottom: 40px;
        }

        .heading_container.heading_center h2 {
            font-weight: bold;
            font-size: 32px;
            margin-bottom: 10px;
        }
        .heading_container.heading_center h2 span {
            color: red;
        }

        .section-subtitle {
            color: #6c757d;
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .price-box {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
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
        
        .product_section .box {
            position: relative;
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

        .heading_container.heading_center {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin-bottom: 40px;
        }

        .heading_container.heading_center h2 {
            font-weight: bold;
            font-size: 32px;
            margin-bottom: 10px;
        }
        .heading_container.heading_center h2 span {
            color: red;
        }

        .section-subtitle {
            color: #6c757d;
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Search Styles */
        .nav-icons {
            position: relative;
            z-index: 99999;
        }

        .search-wrapper {
            position: relative;
            z-index: 99999;
        }

        .search-popup {
            position: absolute !important;
            top: calc(100% + 5px) !important;
            right: 0 !important;
            width: 300px !important;
            padding: 15px !important;
            background: white !important;
            z-index: 99999 !important;
            border-radius: 25px !important;
            box-shadow: 0 5px 30px rgba(0,0,0,0.15) !important;
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px) !important;
            transition: all 0.3s ease !important;
        }

        .search-wrapper:hover .search-popup,
        .search-popup:hover,
        .search-popup:focus-within {
            opacity: 1 !important;
            visibility: visible !important;
            transform: translateY(0) !important;
        }

        @media (max-width: 991.98px) {
            .search-popup {
                position: fixed !important;
                top: 70px !important;
                left: 50% !important;
                transform: translateX(-50%) translateY(20px) !important;
                width: 90% !important;
                max-width: 300px !important;
            }
            
            .search-wrapper:hover .search-popup,
            .search-popup:hover,
            .search-popup:focus-within {
                transform: translateX(-50%) translateY(0) !important;
            }
        }

        /* Product section styles */
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
               <h2>
                  All <span>Products</span>
               </h2>
               <p class="section-subtitle">Discover our premium collection of football gear</p>
            </div>
            <div class="row">
               @foreach($products as $product)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="img-box">
                        <img src="{{ asset('product/'.$product->image) }}" alt="{{ $product->title }}">
                     </div>
                     <div class="detail-box">
                        <h5 style="white-space: normal; overflow-wrap: break-word; word-break: break-word; min-height: 3em;">{{ $product->title }}</h5>
                        <div class="price-box">
                           <h6 class="regular-price">Rs. {{ number_format($product->price, 2) }}</h6>
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
      </section>
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
      </script>
   </body>
</html>