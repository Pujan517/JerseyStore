<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <!-- SweetAlert2 CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
      
      <style type="text/css">
            .center{
                margin: auto;
                width: 90%;
                padding: 30px;
                text-align: center;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 30px;
            }

            table, th, td {
                border: 1px solid #ddd;
            }

            th, td {
                padding: 15px;
                text-align: center;
                vertical-align: middle;
            }

            .th_deg {
                font-size: 18px;
                background: #2196F3;
                color: white;
                text-transform: uppercase;
            }

            .img_deg {
                height: 150px;
                width: 150px;
                object-fit: cover;
                border-radius: 5px;
            }

            .total_deg {
                font-size: 24px;
                padding: 20px;
                color: #2196F3;
                font-weight: bold;
            }

            .btn-remove {
                background-color: #ff4444;
                color: white;
                padding: 8px 15px;
                border-radius: 5px;
                text-decoration: none;
                transition: background-color 0.3s;
            }

            .btn-remove:hover {
                background-color: #cc0000;
                color: white;
            }
        </style>

   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
          @include('home.header')
         

          @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>
          @endif

          <div class="center">
            <table>
                <tr>
                    <th class="th_deg">Product Title</th>
                    <th class="th_deg">Quantity</th>
                    <th class="th_deg">Price</th>
                    <th class="th_deg">Image</th>
                    <th class="th_deg">Action</th>
                </tr>
                
                <?php $totalprice=0;  ?>
                @foreach($cart as $cart)
                <tr>
                    <td>{{$cart->product_title}}</td>
                    <td>{{$cart->quantity}}</td>
                    <td>${{$cart->price}}</td>
                    <td>
                        <img class="img_deg" src="/product/{{$cart->image}}">
                    </td>
                    <td>
                        <a href="javascript:void(0)" onclick="confirmDelete('{{url('/remove_cart',$cart->id)}}')" class="btn-remove">Remove Product</a>
                    </td>  
                </tr>
                <?php $totalprice=$totalprice + $cart->price  ?>
                @endforeach
            </table>

            <div>
                <h1 class="total_deg">Total Price: ${{$totalprice}}</h1>
            </div>

            <div>
                <h1 style="font-size: 25px; padding-bottom: 15px;">Proceed to Order</h1>
                <a href="{{url('cash_order')}}" class="btn btn-danger">Cash On Delivery</a>
                <a href="" class="btn btn-danger">Pay Using Card</a>
            </div>
          </div>
      </div>

      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>

      <!-- SweetAlert2 JS -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      
      <script>
        function confirmDelete(url) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to remove this product from cart?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        }
      </script>
   </body>
</html>