<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="Modern Fashion E-commerce Store" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{asset('images/logo.png')}}" type="">
      <title>BHAKUNDO - Football Kits</title>
      
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
        <!-- CSS Libraries -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
      
      <!-- Custom Styles -->
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
            color: var(--text-color);
            line-height: 1.6;
        }

        .hero_area {
            position: relative;
            background-color: var(--light-gray);
            min-height: 80vh;
            display: flex;
            align-items: center;
        }

        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
            padding: 15px 0;
        }

        .nav-link {
            font-weight: 500;
            color: var(--text-color) !important;
            margin: 0 10px;
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--secondary-color);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
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

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 3rem;
            position: relative;
            padding-bottom: 15px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background: var(--secondary-color);
        }

        .card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .product-image {
            position: relative;
            overflow: hidden;
            padding-top: 100%;
        }

        .product-image img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .card:hover .product-image img {
            transform: scale(1.05);
        }

        .product-info {
            padding: 20px;
        }

        .product-title {
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        .product-price {
            color: var(--secondary-color);
            font-weight: 700;
            font-size: 1.2rem;
        }

        .btn {
            padding: 12px 25px;
            border-radius: 5px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: var(--secondary-color);
            border: none;
        }

        .btn-primary:hover {
            background: var(--primary-color);
            transform: translateY(-2px);
        }

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

        @media (max-width: 768px) {
            .hero_area {
                min-height: 60vh;
            }

            .section-title {
                font-size: 1.75rem;
            }
        }

        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #fff;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
         }

         .loader {
            width: 40px;
            height: 40px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid var(--secondary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
         }

         .floating-cart {
            position: fixed;
            bottom: 80px;
            right: 20px;
            width: 50px;
            height: 50px;
            background: var(--secondary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-decoration: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            z-index: 1000;
         }

         .floating-cart:hover {
            transform: scale(1.1);
            color: #fff;
         }

         .cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--primary-color);
            color: #fff;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
         }

         @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
         }
      </style>
   </head>
   <body>
      <!-- Preloader -->
      <div id="preloader">
         <div class="loader"></div>
      </div>

      <div class="hero_area">
         @include('home.header')
         @include('home.slider')
      </div>
      
      
      <!-- Products -->
      <section class="products-section py-5">
         <div class="container">
            <div data-aos="fade-up">
               @include('home.product')
            </div>
         </div>
      </section>

      <!-- Recommendations -->
      @if(isset($recommendations) && $recommendations->count())
      <section class="recommendations-section py-5">
         <div class="container">
            <h2 class="section-title">Recommended for You</h2>
            <div class="row">
               @foreach($recommendations as $product)
                  <div class="col-md-3 mb-4">
                     <div class="card h-100">
                        <div class="product-image">
                           <a href="{{ route('product.details', $product->id) }}">
                              <img src="{{ asset('product/'.$product->image) }}" alt="{{ $product->title }}">
                           </a>
                        </div>
                        <div class="product-info">
                           <div class="product-title">{{ $product->title }}</div>
                           <div class="product-price">
                              @if($product->discount_price)
                                 Rs.{{ $product->discount_price }} <span class="text-muted text-decoration-line-through">Rs.{{ $product->price }}</span>
                              @else
                                 Rs.{{ $product->price }}
                              @endif
                           </div>
                           <a href="{{ route('product.details', $product->id) }}" class="btn btn-primary mt-2">View</a>
                        </div>
                     </div>
                  </div>
               @endforeach
            </div>
         </div>
      </section>
      @endif

      <!-- Testimonials -->
      <section class="testimonials-section py-5">
         <div class="container">
            <div data-aos="fade-up">
               @include('home.client')
            </div>
         </div>
      </section>

      @include('home.footer')

      <!-- Floating Cart Button -->
      <a href="{{url('show_cart')}}" class="floating-cart">
         <i class="fas fa-shopping-cart"></i>
         @if(Auth::check())
            <?php $count = App\Models\Cart::where('user_id', Auth::id())->count(); ?>
            @if($count > 0)
               <span class="cart-count">{{ $count }}</span>
            @endif
         @endif
      </a>

      <!-- Back to Top -->
      <button id="backToTop" class="back-to-top">
         <i class="fas fa-arrow-up"></i>
      </button>

      <!-- Scripts -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
      <script src="{{asset('home/js/custom.js')}}"></script>
      <script>
         // Preloader
         $(window).on('load', function() {
            $('#preloader').fadeOut(1000);
         });

         // Back to Top
         $(window).scroll(function() {
            if ($(this).scrollTop() > 200) {
               $('#backToTop').fadeIn();
            } else {
               $('#backToTop').fadeOut();
            }
         });

         $('#backToTop').click(function() {
            $('html, body').animate({scrollTop: 0}, 800);
            return false;
         });

         // Add to Cart Animation
         $('.add-to-cart').click(function(e) {
            e.preventDefault();
            const cart = $('.floating-cart');
            const imgtodrag = $(this).closest('.product-card').find('img').eq(0);
            
            if (imgtodrag) {
               const imgclone = imgtodrag.clone()
                  .offset({
                     top: imgtodrag.offset().top,
                     left: imgtodrag.offset().left
                  })
                  .css({
                     'opacity': '0.5',
                     'position': 'absolute',
                     'height': '150px',
                     'width': '150px',
                     'z-index': '100'
                  })
                  .appendTo($('body'))
                  .animate({
                     'top': cart.offset().top + 10,
                     'left': cart.offset().left + 10,
                     'width': 75,
                     'height': 75
                  }, 1000, 'easeInOutExpo');

               imgclone.animate({
                  'width': 0,
                  'height': 0
               }, function () {
                  $(this).detach()
               });
            }
         });
      </script>
   </body>
</html>