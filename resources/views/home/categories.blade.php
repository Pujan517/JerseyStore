<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="Modern Fashion E-commerce Store" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{asset('images/logo.png')}}" type="">
      <title>BHAKUNDO - Categories</title>
      
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
      <!-- CSS Libraries -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         @include('home.header')
      </div>

      <div class="categories-section">
         <div class="container">
            <div class="section-header text-center">
               <h1 class="section-title">Explore Our Categories</h1>
               <p class="section-subtitle">Find the perfect gear for your game</p>
            </div>

            <div class="row g-4 justify-content-center">
               @foreach($categories as $category)
               <div class="col-md-4">
                  <div class="category-card">
                     <div class="image-wrapper">
                        @if($category->image)
                           <img src="{{ asset('storage/category/'.$category->image) }}" alt="{{ $category->catagory_name }}">
                        @else
                           <div class="icon-wrapper">
                              <i class="fas fa-futbol"></i>
                           </div>
                        @endif
                     </div>
                     <h3 class="category-title">{{ $category->catagory_name }}</h3>
                     <p class="category-description">Discover our collection of {{ strtolower($category->catagory_name) }}</p>
                     <a href="{{ url('category_products/'.$category->id) }}" class="btn-explore">
                        Explore Collection
                        <i class="fas fa-arrow-right"></i>
                     </a>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>

      <!-- Custom Styles -->
      <style>
         :root {
            --primary-color: #2c3e50;
            --secondary-color: #e74c3c;
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

         .row.g-4.justify-content-center {
            display: flex;
            flex-wrap: wrap;
            align-items: stretch;
         }

         .col-md-4 {
            display: flex;
            flex-direction: column;
         }

         .category-card {
            background: white;
            padding: 40px 30px;
            border-radius: 20px;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            display: flex;
            flex-direction: column;
            height: 100%;
         }

         .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.12);
         }

         .category-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            opacity: 0;
            transition: all 0.3s ease;
            z-index: 1;
         }

         .category-card:hover::before {
            opacity: 0.05;
         }

         .image-wrapper {
            width: 150px;
            height: 150px;
            margin: 0 auto 25px;
            background: var(--light-gray);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            overflow: hidden;
         }

         .image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.3s ease;
         }

         .category-card:hover .image-wrapper {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
         }

         .icon-wrapper {
            width: 80px;
            height: 80px;
            background: var(--light-gray);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
         }

         .icon-wrapper i {
            font-size: 2rem;
            color: var(--secondary-color);
            transition: all 0.3s ease;
         }

         .category-card:hover .icon-wrapper {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
         }

         .category-card:hover .icon-wrapper i {
            color: white;
         }

         .category-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 15px;
            position: relative;
            z-index: 2;
         }

         .category-description {
            color: var(--text-color);
            opacity: 0.8;
            margin-bottom: 25px;
            position: relative;
            z-index: 2;
         }

         .btn-explore {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 25px;
            background: transparent;
            border: 2px solid var(--secondary-color);
            color: var(--secondary-color);
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            z-index: 2;
            margin-top: auto;
         }

         .btn-explore i {
            transition: transform 0.3s ease;
         }

         .btn-explore:hover {
            background: var(--secondary-color);
            color: white;
         }

         .btn-explore:hover i {
            transform: translateX(5px);
         }

         @media (max-width: 768px) {
            .categories-section {
               padding: 60px 0;
            }

            .section-title {
               font-size: 2rem;
            }

            .category-card {
               margin-bottom: 30px;
            }
         }
      </style>

      <!-- Scripts -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>      <script src="{{asset('home/js/custom.js')}}"></script>
   </body>
</html>
