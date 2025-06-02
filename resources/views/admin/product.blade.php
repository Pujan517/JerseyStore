<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')

  <style type="text/css">
    body {
      background: #181818;
      font-family: 'Segoe UI', Arial, sans-serif;
    }
    .div_center {
      background: #111;
      border-radius: 18px;
      box-shadow: 0 4px 32px rgba(44,62,80,0.18);
      padding: 40px 30px 30px 30px;
      margin: 40px auto 0 auto;
      max-width: 600px;
    }
    .font_size {
      font-size: 2.2rem;
      font-weight: 700;
      color: #fff;
      padding-bottom: 30px;
      letter-spacing: 1px;
      margin-top: 10px;
    }
    .div_design {
      margin-bottom: 22px;
      text-align: left;
    }
    label {
      display: block;
      font-weight: 600;
      color: #eee;
      margin-bottom: 7px;
      font-size: 1.05rem;
    }
    .text_color, select {
      width: 100%;
      padding: 10px 14px;
      border-radius: 8px;
      border: 1px solid #333;
      font-size: 1rem;
      background: #fff;
      color: #000;
      transition: border 0.2s;
    }
    .text_color:focus, select:focus {
      border: 1.5px solid #3498db;
      outline: none;
      background: #fff;
      color: #000;
    }
    input[type="file"] {
      border: none;
      background: #fff;
      padding: 8px 0;
      color: #000;
    }
    .btn-primary {
      background: #3498db;
      color: #fff;
      border: none;
      border-radius: 25px;
      padding: 10px 32px;
      font-weight: 600;
      font-size: 1.1rem;
      transition: background 0.2s;
      margin-top: 10px;
    }
    .btn-primary:hover {
      background: #217dbb;
    }
    .alert-success {
      border-radius: 10px;
      margin-bottom: 20px;
      font-size: 1.05rem;
      background: #222;
      color: #fff;
      border: 1px solid #333;
    }
    @media (max-width: 700px) {
      .div_center {
        padding: 18px 5px 18px 5px;
        max-width: 98vw;
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

            <div class="div_center">
                <h1 class="font_size">Add Product</h1>

                <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">

                @csrf

                    <div class="div_design">
                        <label>Product Title: </label>
                        <input class="text_color" type="text" name="title" placeholder="Write a title" required="">
                    </div>
                    <div class="div_design">
                        <label>Product Description: </label>
                        <input class="text_color" type="text" name="description" placeholder="Write a description" required="">
                    </div>
                    <div class="div_design">
                        <label>Product Price: </label>
                        <input class="text_color" type="number" name="price" placeholder="Write a price" required="">
                    </div>
                    <div class="div_design">
                        <label>Discount Price: </label>
                        <input class="text_color" type="number" name="dis_price" id="discount_price" placeholder="Write a discount if apply" step="0.01">
                        <span id="percentage_off" style="color: #e74c3c; font-weight: 600; margin-left: 10px;"></span>
                    </div>
                    <div class="div_design">
                        <label>Product Quantity: </label>
                        <input class="text_color" type="number" min="0" name="quantity" placeholder="Write a quantity" required="">
                    </div>
                    <div class="div_design">
                        <label>Product Catagory: </label>
                        <select class="text_color" name="catagory" required="">
                            <option value="" selected="">Add a catagory here</option>

                            @foreach($catagories as $catagory)
                            <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>

                            @endforeach
                        </select> 
                    </div>
                    <div class="div_design">
                        <label>Product Image here: </label>
                        <input type="file" name="image" required="">
                    </div>
                    <div class="div_design">
                        <label>Featured Product:</label>
                        <input type="checkbox" name="featured" value="1"> Mark as Featured
                    </div>

                    <div class="div_design">
                        <input type="submit" value="Add Product" class="btn btn-primary">
                    </div>

                </form>
 
                </div>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const priceInput = document.querySelector('input[name="price"]');
    const discountInput = document.getElementById('discount_price');
    const percentSpan = document.getElementById('percentage_off');
    function updatePercent() {
        const price = parseFloat(priceInput.value);
        const discount = parseFloat(discountInput.value);
        if (price > 0 && discount > 0 && discount < price) {
            const percent = Math.round(((price - discount) / price) * 100);
            percentSpan.textContent = `(${percent}% OFF)`;
        } else {
            percentSpan.textContent = '';
        }
    }
    priceInput.addEventListener('input', updatePercent);
    discountInput.addEventListener('input', updatePercent);
});
</script>
  </body>
</html>
