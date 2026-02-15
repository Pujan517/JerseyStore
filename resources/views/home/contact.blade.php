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

      <br><br>
      <!-- Contact Section Start -->
      <section class="container py-5" style="background: #fff; min-height: 90vh;">
         <div class="row justify-content-center align-items-center">
            <div class="col-lg-10">
               <div class="card shadow-lg border-0 rounded-4 p-4">
                  <div class="row g-0 align-items-center">
                     <div class="col-lg-5 p-4 border-end">
                        <h1 class="fw-bold mb-3" style="color: var(--primary-color);">Get in Touch</h1>
                        <p class="mb-4">We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
                        <div class="mb-3 d-flex align-items-start">
                           <span class="me-3 fs-3 text-primary"><i class="fas fa-map-marker-alt"></i></span>
                           <div><h6 class="mb-1">Address</h6><p class="mb-0">Gaindakot, Nepal</p></div>
                        </div>
                        <div class="mb-3 d-flex align-items-start">
                           <span class="me-3 fs-3 text-primary"><i class="fas fa-phone"></i></span>
                           <div><h6 class="mb-1">Phone</h6><p class="mb-0">+977 9819287752 <br>
                              +977 9860898568
                           </p></div>
                        </div>
                        <div class="mb-3 d-flex align-items-start">
                           <span class="me-3 fs-3 text-primary"><i class="fas fa-envelope"></i></span>
                           <div><h6 class="mb-1">Email</h6><p class="mb-0">Pujan2273@gmail.com
                              Bigh_bca2078@lict.edu.np
                           </p></div>
                        </div>
                        <div class="mb-3 d-flex align-items-start">
                           <span class="me-3 fs-3 text-primary"><i class="fas fa-clock"></i></span>
                           <div><h6 class="mb-1">Working Hours</h6><p class="mb-0">Mon - Fri: 9:00 AM - 6:00 PM</p></div>
                        </div>
                        <div class="mt-4">
                           <a href="#" class="me-2 text-decoration-none text-primary fs-4" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                           <a href="#" class="me-2 text-decoration-none text-primary fs-4" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                           <a href="#" class="me-2 text-decoration-none text-primary fs-4" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                           <a href="#" class="text-decoration-none text-primary fs-4" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                     </div>
                     <div class="col-lg-7 p-4">
                        <h2 class="mb-4 text-center fw-bold" style="color: var(--primary-color); letter-spacing:1px;">Contact Us</h2>
                        <form method="POST" action="{{ route('contact.send') }}">
                           @csrf
                           <div class="mb-3">
                              <input type="text" class="form-control rounded-pill px-4 py-2" name="name" placeholder="Your Name" required style="box-shadow:0 1px 4px rgba(47,128,237,0.07);">
                           </div>
                           <div class="mb-3">
                              <input type="email" class="form-control rounded-pill px-4 py-2" name="email" placeholder="Your Email" required style="box-shadow:0 1px 4px rgba(47,128,237,0.07);">
                           </div>
                           <div class="mb-3">
                              <input type="text" class="form-control rounded-pill px-4 py-2" name="subject" placeholder="Subject" required style="box-shadow:0 1px 4px rgba(47,128,237,0.07);">
                           </div>
                           <div class="mb-4">
                              <textarea class="form-control rounded-4 px-4 py-2" name="message" placeholder="Your Message" rows="5" required style="box-shadow:0 1px 4px rgba(47,128,237,0.07);"></textarea>
                           </div>
                           <div class="d-grid">
                              <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow-sm" style="background: linear-gradient(90deg, var(--primary-color), var(--secondary-color)); border:none;">Send Message <i class="fa-solid fa-paper-plane ms-2"></i></button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Contact Section End -->
         <!-- Scripts -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      @if(session('success'))
      <script>
        Swal.fire({
          icon: 'success',
          title: 'Success!',
          text: '{{ session('success') }}',
          confirmButtonColor: '#2f80ed'
        });
      </script>
      @endif
</style>
   </body>
</html>