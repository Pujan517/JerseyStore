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
      <link href="home/css/style.css" rel="stylesheet" />      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />      <style type="text/css">
          .center {
              margin: auto;
              width: 90%;
              max-width: 1200px;
              padding: 30px;
              text-align: center;
          }
          .order-table {
              width: 100%;
              border-collapse: collapse;
              background-color: #fff;
              box-shadow: 0 2px 4px rgba(0,0,0,0.1);
              margin-top: 20px;
          }
          .order-table th {
              background-color: #f8f9fa;
              color: #333;
              font-weight: bold;
              padding: 15px;
              border: 1px solid #dee2e6;
              text-transform: uppercase;
              font-size: 14px;
          }
          .order-table td {
              padding: 15px;
              border: 1px solid #dee2e6;
              vertical-align: middle;
          }
          .order-table img {
              border-radius: 8px;
              object-fit: cover;
              box-shadow: 0 2px 4px rgba(0,0,0,0.1);
          }
          .section-title {
              text-align: center;
              margin-bottom: 30px;
              color: #333;
              font-size: 28px;
              font-weight: bold;
          }
          .status-badge {
              padding: 6px 12px;
              border-radius: 20px;
              font-size: 14px;
              font-weight: 500;
          }
          .status-delivered {
              background-color: #d4edda;
              color: #155724;
          }          .status-processing {
              background-color: #fff3cd;
              color: #856404;
          }
          .btn-cancel {
              padding: 6px 12px;
              border-radius: 20px;
              font-size: 14px;
              font-weight: 500;
              background-color: #f8d7da;
              color:rgb(255, 0, 25);
              border: none;
              cursor: pointer;
              text-decoration: none;
              transition: all 0.3s ease;
          }
          .btn-cancel:hover {
              background-color: #f5c6cb;
              color: #721c24;
              text-decoration: none;
          }
      </style>
   </head>
   <body>      <div class="hero_area">
         <!-- header section strats -->
          @include('home.header')         <!-- end header section -->
           <div class="center">
                @if(session()->has('message'))
                <div class="alert alert-success" style="margin-bottom: 20px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{session()->get('message')}}
                </div>
                @endif
                <h2 class="section-title">My Orders</h2>
                <table class="order-table">
                     <thead>
                         <tr>
                            <th>Product Title</th>
                            <th>Quantity</th>
                            <th>Price</th>                            <th>Payment Status</th>
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
                            <td>${{number_format($order->price, 2)}}</td>
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
                                <img height="100" width="180" src="product/{{$order->image}}" alt="{{$order->product_title}}">
                            </td>                            <td>
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
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>