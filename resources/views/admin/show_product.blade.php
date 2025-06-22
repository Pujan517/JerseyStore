<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')

    <style>
        body {
            background: #181818;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .main-panel {
            background: #181818;
        }
        .font_size {
            text-align: center;
            font-size: 2.2rem;
            font-weight: 700;
            color: #fff;
            padding: 30px 0 20px 0;
            letter-spacing: 1px;
        }
        .center {
            background: #111;
            border-radius: 18px;
            box-shadow: 0 4px 32px rgba(44,62,80,0.18);
            margin: 0 auto 40px auto;
            max-width: 98vw;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 1rem;
            background: #111;
        }
        .th_color th {
            background: #222;
            color: #fff;
            font-weight: 600;
            padding: 14px 10px;
            border: none;
            letter-spacing: 0.5px;
        }
        td {
            padding: 12px 10px;
            border-bottom: 1px solid #333;
            color: #eee;
            vertical-align: middle;
        }
        tr:last-child td {
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
        .btn-danger, .btn-success {
            border-radius: 20px;
            font-weight: 600;
            padding: 7px 18px;
            font-size: 0.98rem;
            transition: background 0.2s, color 0.2s;
        }
        .btn-danger {
            background: #e74c3c;
            color: #fff;
            border: none;
        }
        .btn-danger:hover {
            background: #c0392b;
        }
        .btn-success {
            background: #27ae60;
            color: #fff;
            border: none;
        }
        .btn-success:hover {
            background: #219150;
        }
        @media (max-width: 900px) {
            .center {
                padding: 10px 2px;
            }
            th, td {
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

            @if(session()->has('message'))

            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>

            @endif

                <h2 class="font_size">All Products</h2>

                <table class="center">
                    <tr class="th_color"> 

                    <th class="th_deg">Product Title</th>
                    <th class="th_deg">Description</th>
                    <th class="th_deg">Quantity</th>
                    <th class="th_deg">Catagory</th>
                    <th class="th_deg">Price</th>
                    <th class="th_deg">Discount Price</th>
                    <th class="th_deg">Product Image</th>
                    <th class="th_deg">Delete</th>
                    <th class="th_deg">Edit</th>

                    </tr>

                    @forelse($product as $product)
                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->catagory}}</td>
                        <td>Rs.{{$product->price}}</td>
                        <td>Rs.{{$product->discount_price}}</td>
                        <td>
                            <img class="img_size" src="{{ asset('product/'.$product->image) }}" alt="{{$product->title}}">
                        </td>
                        <td>
                            <a onclick="return confirm('Are You Sure To Delete This')" class="btn btn-danger" href="{{url('delete_product',$product->id)}}">Delete</a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{url('update_product',$product->id)}}">Edit</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" style="text-align:center; color:#e74c3c; font-weight:600;">No products found.</td>
                    </tr>
                    @endforelse
                </table>

            </div>
        </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
