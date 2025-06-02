<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')
  <style type="text/css">
    body {
      background: #181818;
      font-family: 'Segoe UI', Arial, sans-serif;
    }
    .title_deg {
      text-align: center;
      font-size: 2.2rem;
      font-weight: 700;
      color: #fff;
      padding-bottom: 30px;
      letter-spacing: 1px;
      margin-top: 30px;
    }
    .order-search {
      display: flex;
      justify-content: flex-end;
      margin-bottom: 30px;
      margin-right: 40px;
    }
    .order-search input[type="text"] {
      border-radius: 25px;
      border: 1px solid #333;
      padding: 8px 18px;
      font-size: 1rem;
      margin-right: 10px;
      background: #222;
      color: #fff;
      transition: border 0.2s;
    }
    .order-search input[type="text"]:focus {
      border: 1.5px solid #3498db;
      outline: none;
      background: #181818;
    }
    .order-search .btn {
      border-radius: 25px;
      padding: 8px 22px;
      font-weight: 600;
      font-size: 1rem;
      background: #3498db;
      color: #fff;
      border: none;
      transition: background 0.2s;
    }
    .order-search .btn:hover {
      background: #217dbb;
    }
    .order-table-wrapper {
      background: #111;
      border-radius: 18px;
      box-shadow: 0 4px 32px rgba(44,62,80,0.18);
      padding: 30px 20px 20px 20px;
      margin: 0 auto 40px auto;
      max-width: 98vw;
      overflow-x: auto;
    }
    .table_deg {
      width: 100%;
      border-collapse: collapse;
      font-size: 1rem;
      background: #111;
    }
    .th_deg th {
      background: #222;
      color: #fff;
      font-weight: 600;
      padding: 14px 10px;
      border: none;
      letter-spacing: 0.5px;
    }
    .table_deg td {
      padding: 12px 10px;
      border-bottom: 1px solid #333;
      color: #eee;
      vertical-align: middle;
    }
    .table_deg tr:last-child td {
      border-bottom: none;
    }
    .img_size {
      width: 110px;
      height: 70px;
      object-fit: cover;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(44,62,80,0.08);
      border: 1px solid #333;
      background: #222;
    }
    .btn-primary, .btn-secondary {
      border-radius: 20px;
      font-weight: 600;
      padding: 7px 18px;
      font-size: 0.98rem;
      transition: background 0.2s, color 0.2s;
    }
    .btn-primary {
      background: #27ae60;
      color: #fff;
      border: none;
    }
    .btn-primary:hover {
      background: #219150;
    }
    .btn-secondary {
      background: #e67e22;
      color: #fff;
      border: none;
    }
    .btn-secondary:hover {
      background: #b95c0b;
    }
    .delivered-label {
      color: #27ae60;
      font-weight: 700;
      font-size: 1rem;
      letter-spacing: 0.5px;
    }
    @media (max-width: 900px) {
      .order-table-wrapper {
        padding: 10px 2px;
      }
      .table_deg th, .table_deg td {
        font-size: 0.95rem;
        padding: 8px 4px;
      }
      .img_size {
        width: 70px;
        height: 45px;
      }
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
            <div class="content-wrapper">
                <h1 class="title_deg">All Orders</h1>

                <div class="order-search">
                  <form action="{{url('search')}}" method="get" style="display: flex; align-items: center;">
                    <input type="text" name="search" placeholder="Search Order">
                    <input type="submit" value="Search" class="btn">
                  </form>
                </div>
                <div class="order-table-wrapper">
                <table class="table_deg">
                    <tr class="th_deg"> 
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product Title</th> 
                        <th>Quantity</th> 
                        <th>Price</th> 
                        <th>Payment Status</th> 
                        <th>Delivery Status</th> 
                        <th>Image</th> 
                        <th>Delivered</th> 
                        <th>Print PDF</th> 
                    </tr>
                    @foreach($order as $order) 
                    <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->address}}</td> 
                        <td>{{$order->phone}}</td> 
                        <td>{{$order->product_title}}</td> 
                        <td>{{$order->quantity}}</td> 
                        <td>{{$order->price}}</td> 
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->delivery_status}}</td>
                        <td>
                            <img src="/product/{{$order->image}}" class="img_size">
                        </td>
                        <td>
                        @if($order->delivery_status=='processing')
                            <a href="{{url('delivered', $order->id)}}" onclick="return confirm('Are You Sure This Product is Delivered !!!')" class="btn btn-primary">Delivered</a>
                        @else
                            <span class="delivered-label">Delivered</span>
                        @endif 
                        </td>
                        <td>
                            <a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary">Print PDF</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                </div>

            </div>
        </div>

        <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
