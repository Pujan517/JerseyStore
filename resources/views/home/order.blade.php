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
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
      <style type="text/css">
        :root {
            --primary-color: #2f80ed;
            --secondary-color: #56ccf2;
            --primary-color-rgb: 47, 128, 237;
            --secondary-color-rgb: 86, 204, 242;
            --text-color: #333;
            --light-gray: #e0e0e0;
        }
        .order-container {
            margin: 0;
            max-width: none;
            background: none;
            border-radius: 0;
            box-shadow: none;
            padding: 0;
        }
        .order-table {
            width: 100%;
            max-width: 1350px;
            margin: 48px auto 40px auto;
            border-collapse: separate;
            border-spacing: 0;
            background: #f7f8f9;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 24px 0 rgba(47,128,237,0.09);
            padding: 0 24px 24px 24px;
        }
        @media (max-width: 1400px) {
            .order-table {
                max-width: 98vw;
                padding: 0 2vw 24px 2vw;
            }
        }
        .order-table th, .order-table td {
            padding: 18px 12px;
            text-align: center;
            vertical-align: middle;
        }
        .order-table th {
            font-size: 1.08rem;
            background: linear-gradient(45deg, #2f80ed, #56ccf2);
            color: #fff;
            text-transform: uppercase;
            border: none;
        }
        .order-table td {
            background: #fff;
            border-top: 1px solid #e0e0e0;
            font-size: 1rem;
        }
        .order-table tr:last-child td {
            border-bottom: none;
        }
        .order-table img {
            border-radius: 10px;
            object-fit: cover;
            box-shadow: 0 1.5px 6px 0 rgba(47,128,237,0.07);
            height: 70px;
            width: 120px;
        }
        .section-title {
            text-align: center;
            margin-bottom: 30px;
            color: #2f80ed;
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: 0.01em;
        }
        .status-badge {
            padding: 7px 16px;
            border-radius: 22px;
            font-size: 0.98rem;
            font-weight: 600;
            letter-spacing: 0.01em;
            display: inline-block;
        }
        .status-delivered {
            background: linear-gradient(45deg, #27ae60, #6ee7b7);
            color: #fff;
        }
        .status-processing {
            background: linear-gradient(45deg, #fbc02d, #fffde4);
            color: #856404;
        }
        .status-paid {
            background: linear-gradient(45deg, #2f80ed, #56ccf2);
            color: #fff;
        }
        .status-unpaid {
            background: #f8d7da;
            color: #c0392b;
        }
        .btn-cancel {
            padding: 8px 20px;
            border-radius: 22px;
            font-size: 1rem;
            font-weight: 600;
            background: linear-gradient(45deg, #ff4444, #ff8888);
            color: #fff;
            border: none;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.3s, color 0.3s, transform 0.2s;
            box-shadow: 0 1.5px 6px 0 rgba(255,68,68,0.07);
        }
        .btn-cancel:hover {
            background: linear-gradient(45deg, #cc0000, #ff4444);
            color: #fff;
            transform: scale(1.06);
            text-decoration: none;
        }
        @media (max-width: 600px) {
            .order-container {
                padding: 10px 2px 20px 2px;
            }
            .order-table th, .order-table td {
                padding: 8px 4px;
                font-size: 0.95rem;
            }
            .order-table img {
                height: 40px;
                width: 60px;
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
         <!-- end header section -->
         <div class="center">
            @if(session()->has('message'))
            <div class="alert alert-success" style="margin-bottom: 20px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{session()->get('message')}}
            </div>
            @endif
            <br><br>
            <h2 class="section-title">My Orders</h2>
            <table class="order-table">
                <thead>
                    <tr>
                       <th>Product Title</th>
                       <th>Quantity</th>
                       <th>Price</th>                           <th>Payment Status</th>
                       <th>Delivery Status</th>
                       <th>Image</th>
                       <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr>
                       <td>{{$order->product_title}}</td>
                       <td>{{$order->quantity}}</td>
                       <td>Rs.{{number_format($order->price, 2)}}</td>
                       <td>
                           <span class="status-badge {{ $order->payment_status == 'Paid' ? 'status-delivered' : '' }}">
                               {{$order->payment_status}}
                           </span>
                       </td>
                       <td>
                           <span class="status-badge {{ $order->delivery_status == 'delivered' ? 'status-delivered' : 'status-processing' }}">
                               {{ucfirst($order->delivery_status)}}
                           </span>
                       </td>
                       <td>
                           <img height="100" width="180" src="{{ asset('product/'.$order->image) }}" alt="{{$order->product_title}}">
                       </td>                           <td>
                           @if($order->delivery_status != 'delivered')
                               <a onclick="return confirm('Are you sure to cancel this order ?')" 
                                  class="btn-cancel" 
                                  href="{{url('cancel_order',$order->id)}}">
                                   Cancel 
                               </a>
                           @else
                               <span class="status-badge status-delivered">Completed</span>
                           @endif
                       </td>
                    </tr>
                    @empty
                    <tr>
                       <td colspan="6" class="text-center py-4">No orders found</td>
                    </tr>
                    @endforelse
                </tbody>
           </table>
         </div>
      </div>
      <!-- Scripts -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <!-- ...other scripts if needed... -->
   </body>
</html>