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
            border: 2px solid #e3e6ea; /* Subtle border */
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 30px;
            box-shadow: 0 8px 32px rgba(44,62,80,0.16), 0 2px 8px rgba(44,62,80,0.10); /* More prominent shadow */
            background: #f7fafc; /* Slightly lighter background for more contrast */
            transition: box-shadow 0.3s, transform 0.3s, border-color 0.2s;
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

         /* Make New Arrivals product card square (1:1 aspect ratio) */
         .new-arrivals-section .box {
           background: #f7fafc; /* Lighter background for more contrast */
           border: 2px solid #e3e6ea; /* Subtle border */
           box-shadow: 0 8px 32px rgba(44,62,80,0.16), 0 2px 8px rgba(44,62,80,0.10); /* More prominent shadow */
           border-radius: 12px;
           aspect-ratio: 1 / 1;
           min-width: 0;
           min-height: 0;
           max-width: 320px;
           width: 100%;
           margin: 0 auto;
           display: flex;
           flex-direction: column;
           align-items: center;
           transition: box-shadow 0.3s, border-color 0.2s;
           min-height: 325px; /* Added a little more height */
         }
         .new-arrivals-section .img-box {
           width: 100%;
           aspect-ratio: 1 / 1;
           height: auto;
           display: flex;
           align-items: center;
           justify-content: center;
           overflow: hidden;
           border-radius: 8px;
           background: #f8f9fa;
         }
         .new-arrivals-section .img-box img {
           width: 70%;
           height: 70%;
           object-fit: contain;
         }
         .new-arrivals-section .detail-box h5 {
           font-size: 0.95rem;
           margin-top: 6px;
           margin-bottom: 4px;
         }
         @media (max-width: 991px) {
           .new-arrivals-section .box {
             aspect-ratio: 1 / 1;
             min-height: 220px;
           }
           .new-arrivals-section .img-box {
             aspect-ratio: 1 / 1;
           }
         }

         /* Make Recommendations product card square (1:1 aspect ratio) with smaller image and visible title */
         .recommendations-section .card {
           aspect-ratio: 1 / 1;
           max-width: 320px;
           width: 100%;
           margin: 0 auto 30px auto;
           display: flex;
           flex-direction: column;
           justify-content: flex-start;
           align-items: stretch;
         }
         .recommendations-section .product-image {
           width: 100%;
           aspect-ratio: unset;
           height: 70%;
           min-height: 0;
           max-height: 220px;
           display: flex;
           align-items: center;
           justify-content: center;
           overflow: hidden;
           border-radius: 8px;
           background: #f8f9fa;
           position: relative;
         }
         .recommendations-section .product-image img {
           width: 120%;
           height: 120%;
           max-height: 180px;
           object-fit: contain;
         }
         .recommendations-section .product-info {
           flex: 1 1 auto;
           padding: 12px 10px 10px 10px;
           display: flex;
           flex-direction: column;
           justify-content: flex-start;
           align-items: flex-start;
           min-height: 0;
         }
         .recommendations-section .product-title {
           font-size: 1rem;
           font-weight: 600;
           margin-bottom: 6px;
           white-space: nowrap;
           overflow: hidden;
           text-overflow: ellipsis;
           width: 100%;
         }
         @media (max-width: 991px) {
           .recommendations-section .card {
             aspect-ratio: 1 / 1;
             min-height: 220px;
           }
           .recommendations-section .product-image {
             height: 65%;
             max-height: 160px;
           }
         }

         .recommendations-card-custom {
        aspect-ratio: 1 / 1;
        max-width: 320px;
        width: 100%;
        background: #f7fafc;
        border-radius: 12px;
        border: 2px solid #e3e6ea;
        box-shadow: 0 4px 18px rgba(44,62,80,0.10), 0 1.5px 6px rgba(44,62,80,0.06);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        padding: 18px 10px 10px 10px;
        transition: box-shadow 0.25s, border-color 0.25s, transform 0.3s;
        min-height: 315px;
      }
      .recommendations-card-custom:hover {
        box-shadow: 0 12px 32px rgba(44,62,80,0.18), 0 4px 16px rgba(44,62,80,0.13);
        border-color: #bfc8d4;
        background: rgba(255,255,255,0.97);
        transform: scale(1.045);
      }
      .recommendations-img-box {
         width: 100%;
    height: 180px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 12px;
    overflow: hidden;
    border-radius: 8px;
    background: #f8f9fa;
      }
      .recommendations-img {
        width: 80%;
        height: 80%;
        object-fit: contain;
        display: block;
        transition: transform 0.3s, filter 0.3s;
      }
      .recommendations-card-custom:hover .recommendations-img {
        transform: scale(1.08);
        filter: brightness(1.08) contrast(1.08);
      }
      .recommendations-title {
        font-size: 1.08rem;
        font-weight: 600;
        color: #2c3e50;
        margin-top: 8px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
      }
      @media (max-width: 991px) {
        .recommendations-card-custom {
          min-height: 220px;
        }
        .recommendations-img-box {
          aspect-ratio: 1 / 1;
        }
      }

      /* Show View Details button on hover in recommendations */
      .recommendations-option-container {
        opacity: 0;
        pointer-events: none;
        position: absolute;
        left: 0;
        right: 0;
        bottom: 50%;
        transform: translateY(50%);
        display: flex;
        flex-direction: column;
        align-items: center;
        transition: opacity 0.25s;
        z-index: 2;
        width: 100%;
      }
      .recommendations-card-custom:hover .recommendations-option-container {
        opacity: 1;
        pointer-events: auto;
      }

      .new-arrivals-section .box:hover {
  box-shadow: 0 16px 40px rgba(44,62,80,0.22), 0 4px 16px rgba(44,62,80,0.13);
  transform: translateY(-6px) scale(1.03);
  border-color: #bfc8d4;
  background: rgba(255,255,255,0.97); /* Less transparent on hover */
  backdrop-filter: blur(2.5px);
}
.new-arrivals-section .box:hover .img-box img {
  transform: scale(1.04);
  filter: brightness(1.08) contrast(1.08);
}
.new-arrivals-section .img-box img {
  transition: transform 0.3s, filter 0.3s;
}
.new-arrivals-section .option_container {
  opacity: 0;
  pointer-events: none;
  position: absolute;
  left: 0;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  transition: opacity 0.25s;
  z-index: 2;
}
.new-arrivals-section .box:hover .option_container {
  opacity: 1;
  pointer-events: auto;
}
.new-arrivals-section .option1 {
  background: #2f80ed;
  color: #fff;
  border-radius: 4px;
  padding: 6px 18px;
  font-size: 0.97rem;
  transition: background 0.2s;
  text-decoration: none;
  display: inline-block;
  box-shadow: 0 2px 8px rgba(44,62,80,0.10);
}
.new-arrivals-section .option1:hover {
  background: #1e5bb8;
  color: #fff;
}

      /* Shared option container/button styles for product cards */
      .option_container, .recommendations-option-container {
        margin-top: auto;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
      }
      .option1, .recommendations-option-btn {
        background: #2f80ed;
        color: #fff;
        border-radius: 4px;
        padding: 6px 18px;
        margin-bottom: 8px;
        font-size: 0.97rem;
        transition: background 0.2s;
        text-decoration: none;
        display: inline-block;
      }
      .option1:hover, .recommendations-option-btn:hover {
        background: #1e5bb8;
        color: #fff;
      }

      .new-arrivals-section .new-arrivals-rectangle {
  display: flex;
  flex-direction: row;
  align-items: center;
  aspect-ratio: 5 / 3;
  max-width: 700px;
  width: 100%;
  min-width: 320px;
  min-height: 180px;
  margin: 0 auto;
  background: #f9fbfd;
  border-radius: 18px;
  box-shadow: 0 6px 32px 0 rgba(44,62,80,0.10), 0 1.5px 6px 0 rgba(44,62,80,0.06);
  padding: 0;
  overflow: hidden;
  border: none;
  transition: box-shadow 0.25s, transform 0.25s;
}
.new-arrivals-section .new-arrivals-rectangle:hover {
  box-shadow: 0 12px 40px 0 rgba(44,62,80,0.16), 0 4px 16px 0 rgba(44,62,80,0.13);
  transform: translateY(-2px) scale(1.01);
}
.new-arrivals-section .new-arrivals-rectangle .img-box {
  flex: 0 0 38%;
  height: 100%;
  background: #f3f6fa;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 0 0 0 18px;
  padding: 0;
}
.new-arrivals-section .new-arrivals-rectangle .img-box img {
  width: 90%;
  max-width: 180px;
  max-height: 90%;
  object-fit: contain;
  border-radius: 12px;
  box-shadow: 0 2px 8px rgba(44,62,80,0.07);
  background: transparent;
}
.new-arrivals-section .new-arrivals-rectangle .detail-box {
  flex: 1 1 0%;
  padding: 32px 32px 32px 24px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  min-width: 0;
  background: transparent;
}
.new-arrivals-section .new-arrivals-rectangle .detail-box h5 {
  font-size: 1.25rem;
  font-weight: 700;
  color: #1a2233;
  margin-bottom: 8px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.new-arrivals-section .new-arrivals-rectangle .detail-box .product-price {
  color: #2f80ed;
  font-weight: 700;
  font-size: 1.1rem;
  margin-bottom: 8px;
  background: #eaf3ff;
  display: inline-block;
  padding: 4px 16px;
  border-radius: 8px;
  letter-spacing: 0.5px;
}
.new-arrivals-section .new-arrivals-rectangle .detail-box .product-desc {
  font-size: 1rem;
  color: #4a5568;
  margin-bottom: 18px;
  max-width: 100%;
  white-space: normal;
  line-height: 1.5;
}
.new-arrivals-section .new-arrivals-rectangle .option_container {
  margin-top: auto;
}
.new-arrivals-section .new-arrivals-rectangle .option1 {
  font-size: 1rem;
  font-weight: 600;
  background: linear-gradient(90deg, #2f80ed 60%, #56ccf2 100%);
  color: #fff;
  border: none;
  border-radius: 6px;
  padding: 10px 28px;
  box-shadow: 0 2px 8px rgba(44,62,80,0.10);
  text-decoration: none;
  transition: background 0.2s, transform 0.2s;
  display: inline-block;
  letter-spacing: 0.5px;
}
.new-arrivals-section .new-arrivals-rectangle .option1:hover {
  background: linear-gradient(90deg, #1e5bb8 60%, #3498db 100%);
  color: #fff;
  transform: translateY(-2px) scale(1.04);
}
@media (max-width: 991px) {
  .new-arrivals-section .new-arrivals-rectangle {
    max-width: 100%;
    min-width: 0;
    aspect-ratio: unset;
    min-height: 120px;
    flex-direction: column;
    padding: 0;
  }
  .new-arrivals-section .new-arrivals-rectangle .img-box {
    width: 100%;
    min-height: 120px;
    border-radius: 18px 18px 0 0;
    margin-bottom: 0;
    padding: 12px 0 0 0;
  }
  .new-arrivals-section .new-arrivals-rectangle .img-box img {
    max-width: 120px;
    max-height: 80px;
  }
  .new-arrivals-section .new-arrivals-rectangle .detail-box {
    padding: 18px 14px 18px 14px;
  }
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
      

      <!-- New Arrivals Section -->
      <div class="new-arrivals-section">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  New <span>Arrivals</span>
               </h2>
               <p class="section-subtitle">Explore the latest additions to our collection</p>
            </div>
            <br><br>
            <!-- Carousel Start -->
            <div id="newArrivalsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
              <div class="carousel-inner">
                @foreach($newArrivals as $index => $product)
                  <div class="carousel-item @if($index == 0) active @endif">
                    <div class="row">
                      <div class="col-12 mb-4 d-flex align-items-stretch">
                        <div class="box w-100 d-flex flex-row align-items-center new-arrivals-rectangle aspect-[5/2]" style="aspect-ratio:3/1;">
                          <div class="img-box flex-shrink-0">
                            <img src="{{ asset('product/'.$product->image) }}" alt="{{$product->title}}">
                          </div>
                          <div class="detail-box flex-grow-1">
                            <h5 style="font-size:1.1rem; font-weight:600; margin-bottom:6px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{$product->title}}</h5>
                            @if(isset($product->price))
                            <div class="product-price mb-2" style="color:#2f80ed; font-weight:700; font-size:1.1rem;">RS.{{ number_format($product->price, 2) }}</div>
                            @endif
                            <div class="product-desc mb-2" style="font-size:0.97rem; color:#555; max-width:350px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $product->description ?? '' }}</div>
                            <div class="option_container" style="position:static; opacity:1; pointer-events:auto; margin-top:56px;">
                              <a href="{{ url('product/'.$product->id) }}" class="option1">
                                View Product
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#newArrivalsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#newArrivalsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
            <!-- Carousel End -->
         </div>
      </div>
      
      
      <!-- Products -->
      <section class="products-section py-5">
         <div class="container">
            <div data-aos="fade-up">
               @include('home.product', ['featuredProducts' => $featuredProducts])
            </div>
         </div>
      </section>

      <!-- Notifications -->
      {{-- Notifications removed from homepage. Now only shown in notification dropdown. --}}
      <!-- End Notifications -->

      <!-- Recommendations -->
      @if(isset($recommendations) && $recommendations->count())
      <section class="recommendations-section py-5">
         <div class="container">
            <h2 class="section-title">Recommended for You</h2>
            <div class="row">
               @foreach($recommendations as $product)
                  <div class="col-md-3 mb-4">
                     <div class="card h-100 d-flex flex-column align-items-center justify-content-center p-2 recommendations-card-custom position-relative">
                        <div class="recommendations-img-box mb-2">
                          <img src="{{ asset('product/'.$product->image) }}" alt="{{ $product->title }}" class="img-fluid recommendations-img" />
                        </div>
                        <div class="recommendations-title text-center w-100">{{ $product->title }}</div>
                        <div class="recommendations-option-container">
                          <a href="{{ url('product/'.$product->id) }}" class="recommendations-option-btn">View Details</a>
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