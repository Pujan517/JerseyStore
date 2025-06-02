<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
    
    <style type="text/css">
        .div_center {
            padding: 30px;
            background: #191c24;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            margin: 20px;
        }
        /* Fix for sidebar menu */
        .sidebar .nav .nav-item.active .nav-link {
            background: #0F1015 !important;
        }
        .sidebar .nav .nav-item .nav-link:hover {
            background: #0F1015 !important;
        }
        .sidebar .nav .nav-item.active > .nav-link {
            position: relative;
            background: #0F1015;
            border-radius: 8px;
        }
        .sidebar .nav.sub-menu .nav-item .nav-link.active {
            color: #0090e7;
            background: transparent;
        }
        .sidebar .nav.sub-menu .nav-item .nav-link:hover {
            color: #0090e7;
            background: transparent;
        }
        .sidebar-brand-wrapper {
            background: #191c24;
        }
        .sidebar .nav .nav-item .nav-link {
            border-radius: 8px;
            transition: background 0.3s ease;
        }
        .h2_font {
            font-size: 32px;
            padding-bottom: 30px;
            color: #fff;
            border-bottom: 2px solid #2c2e33;
            margin-bottom: 30px;
        }
        .input_color {
            color: #fff;
            background: #2A3038;
            padding: 12px 20px;
            border-radius: 6px;
            border: 1px solid #2c2e33;
            width: 100%;
            transition: all 0.3s ease;
        }
        .input_color:focus {
            border-color: #0090e7;
            box-shadow: 0 0 0 0.2rem rgba(0,144,231,.25);
        }
        .form-group {
            margin: 25px 0;
            text-align: left;
            width: 100%;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        .form-group label {
            display: block;
            margin-bottom: 10px;
            color: #fff;
            font-weight: 500;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .img_size {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin: 15px 0;
            border: 2px solid #2c2e33;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            transition: transform 0.3s ease;
        }
        .img_size:hover {
            transform: scale(1.05);
        }
        .btn-group {
            margin-top: 30px;
            display: flex;
            gap: 15px;
            justify-content: center;
        }
        .btn {
            padding: 12px 30px;
            font-weight: 500;
            border-radius: 6px;
            transition: all 0.3s ease;
        }
        .btn-primary {
            background: #0090e7;
            border: none;
        }
        .btn-primary:hover {
            background: #0078c1;
            transform: translateY(-2px);
        }
        .btn-secondary {
            background: #2A3038;
            border: 1px solid #2c2e33;
        }
        .btn-secondary:hover {
            background: #2c2e33;
        }
        .alert {
            border-radius: 6px;
            margin-bottom: 20px;
        }
        .form-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        small {
            color: #6c7293;
            font-size: 12px;
            margin-top: 5px;
            display: block;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
      <!-- partial -->
      <div class="main-panel">
          <div class="content-wrapper">                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    {{session()->get('message')}}
                </div>
                @endif

                <div class="div_center">
                    <div class="form-container">
                        <h2 class="h2_font">
                            <i class="mdi mdi-pencil-box-outline mr-2"></i>
                            Edit Category
                        </h2>
                        
                        <form action="{{url('/update_catagory', $category->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group">
                                <label for="catagory">
                                    <i class="mdi mdi-format-title mr-2"></i>
                                    Category Name
                                </label>
                                <input class="input_color" type="text" id="catagory" name="catagory" 
                                    value="{{$category->catagory_name}}" required 
                                    placeholder="Enter category name">
                            </div>

                            <div class="form-group">
                                <label>
                                    <i class="mdi mdi-image mr-2"></i>
                                    Current Image
                                </label>
                                <div style="text-align: center;">
                                    @if($category->image)
                                        <img src="{{asset('storage/category/'.$category->image)}}" 
                                            class="img_size" alt="{{$category->catagory_name}}">
                                    @else
                                        <div style="padding: 30px; background: #2A3038; border-radius: 10px; color: #6c7293;">
                                            <i class="mdi mdi-image-off" style="font-size: 48px;"></i>
                                            <p class="mt-2">No image uploaded</p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image">
                                    <i class="mdi mdi-cloud-upload mr-2"></i>
                                    Update Image
                                </label>
                                <div class="custom-file">
                                    <input type="file" name="image" id="image" class="input_color" 
                                        accept="image/*" style="padding: 10px;">
                                    <small>
                                        <i class="mdi mdi-information-outline mr-1"></i>
                                        Leave empty to keep current image. Supported formats: JPG, PNG, GIF
                                    </small>
                                </div>
                            </div>

                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="mdi mdi-content-save mr-1"></i>
                                    Update Category
                                </button>
                                <a href="{{url('view_catagory')}}" class="btn btn-secondary">
                                    <i class="mdi mdi-close-circle mr-1"></i>
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>            </div>
        </div>
    </div>
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>
