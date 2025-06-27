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
      <title>Bhakundo - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <!-- SweetAlert2 CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
      
      <style type="text/css">
        :root {
            --primary-color: #2f80ed;
            --secondary-color: #56ccf2;
            --accent-color: #3498db;
            --text-color: #2c3e50;
            --light-gray: #f8f9fa;
            --dark-gray: #343a40;
            --danger-color:#ff4444;
        }
        .cart-table {
            width: 100%;
            max-width: 1350px;
            margin: 48px auto 0 auto;
            border-collapse: separate;
            border-spacing: 0;
            background: #f7f8f9;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 24px 0 rgba(47,128,237,0.09);
            padding: 0 24px 0 24px;
        }
        .cart-table th, .cart-table td {
            padding: 18px 12px;
            text-align: center;
            vertical-align: middle;
        }
        .cart-table th {
            font-size: 1.08rem;
            background: linear-gradient(45deg, #2f80ed, #56ccf2);
            color: #fff;
            text-transform: uppercase;
            border: none;
        }
        .cart-table td {
            background: #fff;
            border-top: 1px solid #e0e0e0;
            font-size: 1rem;
        }
        .cart-table tr:last-child td {
            border-bottom: none;
        }
        .img_deg {
            height: 90px;
            width: 90px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 1.5px 6px 0 rgba(47,128,237,0.07);
        }
        .total_deg {
            font-size: 1.5rem;
            padding: 18px 0 10px 0;
            color: #2f80ed;
            font-weight: 700;
            letter-spacing: 0.01em;
        }
        .btn-remove {
            background: linear-gradient(45deg, #ff4444, #ff8888);
            color: white;
            padding: 8px 18px;
            border-radius: 22px;
            text-decoration: none;
            border: none;
            font-weight: 600;
            font-size: 1rem;
            box-shadow: 0 1.5px 6px 0 rgba(255,68,68,0.07);
            transition: background 0.3s, transform 0.2s;
            outline: none;
            cursor: pointer;
        }
        .btn-remove:hover {
            background: linear-gradient(45deg, #cc0000, #ff4444);
            color: #fff;
            transform: scale(1.06);
        }
        .cart-actions {
            margin-top: 18px;
            display: flex;
            flex-wrap: wrap;
            gap: 18px;
            justify-content: center;
        }
        .cart-actions .btn {
            min-width: 180px;
            font-size: 1.08rem;
            font-weight: 600;
            border-radius: 22px;
            padding: 12px 0;
            box-shadow: 0 1.5px 6px 0 rgba(47,128,237,0.07);
            border: none;
            transition: background 0.3s, color 0.3s, transform 0.2s;
        }
        .cart-actions .btn-danger {
            background: linear-gradient(45deg, #2f80ed, #56ccf2);
            color: #fff;
        }
        .cart-actions .btn-danger:hover {
            background: linear-gradient(45deg, #56ccf2, #2f80ed);
            color: #fff;
            transform: scale(1.04);
        }
        @media (max-width: 600px) {
            .cart-table th, .cart-table td {
                padding: 8px 4px;
                font-size: 0.95rem;
            }
            .img_deg {
                height: 60px;
                width: 60px;
            }
            .cart-actions .btn {
                min-width: 120px;
                padding: 8px 0;
                font-size: 0.95rem;
            }
        }
      </style>
      <style>
        .cart-summary {
            max-width: 600px;
            margin: 4px auto 0 auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 2px 12px 0 rgba(47,128,237,0.08);
            padding: 32px 24px 28px 24px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 18px;
        }
        .cart-total {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2f80ed;
            margin-bottom: 10px;
        }
        .total-label {
            color: #222;
            font-size: 1.1rem;
            font-weight: 500;
            margin-right: 8px;
        }
        .total-value {
            color: #2f80ed;
            font-size: 1.5rem;
            font-weight: 700;
        }
        .cart-actions {
            display: flex;
            gap: 18px;
            justify-content: center;
            width: 100%;
        }
        .cart-actions .btn {
            min-width: 180px;
            font-size: 1.08rem;
            font-weight: 600;
            border-radius: 22px;
            padding: 12px 0;
            box-shadow: 0 1.5px 6px 0 rgba(47,128,237,0.07);
            border: none;
            transition: background 0.3s, color 0.3s, transform 0.2s;
        }
        .cart-actions .btn-danger {
            background: linear-gradient(45deg, #2f80ed, #56ccf2);
            color: #fff;
        }
        .cart-actions .btn-danger:hover {
            background: linear-gradient(45deg, #56ccf2, #2f80ed);
            color: #fff;
            transform: scale(1.04);
        }
        @media (max-width: 700px) {
            .cart-summary {
                max-width: 98vw;
                padding: 18px 2vw 18px 2vw;
            }
            .cart-actions .btn {
                min-width: 120px;
                padding: 8px 0;
                font-size: 0.95rem;
            }
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

        .nav-link {
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
            <table class="cart-table">
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
                    <td>Rs.{{$cart->price}}</td>
                    <td>
                        <img class="img_deg" src="{{ asset('product/'.$cart->image) }}" alt="{{$cart->product_title}}">
                    </td>
                    <td>
                        <a href="javascript:void(0)" onclick="confirmDelete('{{url('/remove_cart',$cart->id)}}')" class="btn-remove">Remove Product</a>
                    </td>  
                </tr>
                <?php $totalprice=$totalprice + $cart->price  ?>
                @endforeach
            </table>
            <div class="cart-summary">
                <div class="cart-total">
                    <span class="total-label">Total Price:</span>
                    <span class="total-value">Rs.{{$totalprice}}</span>
                </div>
                <div class="cart-actions">
                    <a href="{{url('cash_order')}}" class="btn btn-danger">Cash On Delivery</a>
                     <!-- Inserted eSewa payment form here -->
                    <form method="POST" action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" style="display:inline-block;">
                        <input value="{{$totalprice}}" name="tAmt" type="hidden">
                        <input value="{{$totalprice}}" name="amt" type="hidden">
                        <input value="0" name="txAmt" type="hidden">  <!-- tax amount -->
                        <input value="0" name="psc" type="hidden">    <!-- product service charge -->
                        <input value="0" name="pdc" type="hidden">    <!-- product delivery charge -->
                        <input value="order_{{ uniqid() }}" name="pid" type="hidden"> <!-- unique order id -->
                        <input value="{{ url('/esewa_success') }}" type="hidden" name="su">
                        <input value="{{ url('/esewa_failed') }}" type="hidden" name="fu">
                        <button type="submit" class="btn btn-danger">Pay Using Esewa</button>
                    </form>
                </div>
            </div>
          </div>
      </div>

      <!-- footer end -->
      
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
      <!-- Bootstrap 5 JS for dropdowns -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      
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