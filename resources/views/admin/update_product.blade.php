<!DOCTYPE html>
<html lang="en">
  <head>

  <base href="/public">

  @include('admin.css')

  <style type="text/css">
    .div_center{
        text-align:center;
        padding-top:40px;
    } 
    .font_size{
        font-size:40px;
        padding-bottom:40px;
    }
    .text_color{
        color:#000;
        padding-bottom:20px;
    }
    label{
        display:inline-block;
        width:200px;
    }
    .div_design{
        padding-bottom:15px;
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
            <h1 class="font_size">Update Product</h1>
            <form action="{{url('/update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="background:#181818; border-radius:12px; padding:28px 24px 18px 24px; margin-bottom:24px; box-shadow:0 2px 12px #0002;">
                    <h2 style="color:#fff; font-size:1.3rem; font-weight:700; margin-bottom:18px;">Basic Information</h2>
                    <div class="div_design">
                        <label>Product Title:</label>
                        <input class="text_color" type="text" name="title" placeholder="Write a title" required value="{{$product->title}}">
                    </div>
                    <div class="div_design">
                        <label>Product Description:</label>
                        <input class="text_color" type="text" name="description" placeholder="Write a description" required value="{{$product->description}}">
                    </div>
                    <div class="div_design">
                        <label>Product Catagory:</label>
                        <select class="text_color" name="catagory" required>
                            <option value="{{$product->catagory}}">{{$product->catagory}}</option>
                            @foreach($catagories as $catagory)
                                <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div style="background:#181818; border-radius:12px; padding:28px 24px 18px 24px; margin-bottom:24px; box-shadow:0 2px 12px #0002;">
                    <h2 style="color:#fff; font-size:1.3rem; font-weight:700; margin-bottom:18px;">Pricing & Stock</h2>
                    <div class="div_design">
                        <label>Product Price:</label>
                        <input class="text_color" type="number" name="price" placeholder="Write a price" required value="{{$product->price}}">
                    </div>
                    <div class="div_design">
                        <label>Discount Price:</label>
                        <input class="text_color" type="number" name="dis_price" id="discount_price" placeholder="Write a discount if apply" value="{{$product->discount_price}}" step="0.01">
                        <span id="percentage_off" style="color: #e74c3c; font-weight: 600; margin-left: 10px;"></span>
                    </div>
                    <div class="div_design">
                        <label>Product Quantity:</label>
                        <input class="text_color" type="number" min="0" name="quantity" placeholder="Write a quantity" required value="{{$product->quantity}}">
                    </div>
                </div>
                <div style="background:#181818; border-radius:12px; padding:28px 24px 18px 24px; margin-bottom:24px; box-shadow:0 2px 12px #0002;">
                    <h2 style="color:#fff; font-size:1.3rem; font-weight:700; margin-bottom:18px;">Images</h2>
                    <div class="div_design">
                        <label>Current Product Image:</label>
                        <img style="margin:auto; display:block; border-radius:8px; box-shadow:0 2px 8px #0003;" height="100" width="100" src="{{ asset('product/'.$product->image) }}" alt="Product Image">
                    </div>
                    <div class="div_design">
                        <label>Change Product Image:</label>
                        <input type="file" name="image">
                    </div>
                </div>
                <div style="background:#181818; border-radius:12px; padding:28px 24px 18px 24px; margin-bottom:24px; box-shadow:0 2px 12px #0002;">
                    <h2 style="color:#fff; font-size:1.3rem; font-weight:700; margin-bottom:18px;">Options</h2>
                    <div class="div_design">
                        <label>Featured Product:</label>
                        <input type="checkbox" name="featured" value="1" {{ $product->featured ? 'checked' : '' }}> Mark as Featured
                    </div>
                    <div class="div_design">
                        <label>Available Sizes:</label>
                        <div style="display: flex; gap: 12px; flex-wrap: wrap; align-items: center;">
                            <label style="font-weight:600; color:#fff; margin-right:18px;">
                                <input type="checkbox" id="select-all-sizes"> All
                            </label>
                            @php
                                $selectedSizes = is_array($product->sizes) ? $product->sizes : (json_decode($product->sizes, true) ?? []);
                            @endphp
                            @foreach(['S','M','L','XL','XXL','XXXL'] as $size)
                                <label style="font-weight:400; color:#fff;">
                                    <input type="checkbox" class="size-checkbox" name="sizes[]" value="{{ $size }}" {{ in_array($size, $selectedSizes) ? 'checked' : '' }}> {{ $size }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="div_design">
                        <label>Product Tags: <span style="font-weight:400; color:#bbb; font-size:0.95em;">(comma separated)</span></label>
                        <input class="text_color" type="text" name="tags" placeholder="e.g. football,shoes,adidas" value="{{$product->tags}}">
                    </div>
                </div>
                <div class="div_design" style="text-align:center; margin-top:24px;">
                    <input type="submit" value="Update Product" class="btn btn-primary" style="min-width:180px; font-size:1.15rem;">
                </div>
            </form>
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
    // Initial update
    updatePercent();

    const allCheckbox = document.getElementById('select-all-sizes');
    const sizeCheckboxes = document.querySelectorAll('.size-checkbox');
    function updateAllCheckbox() {
        allCheckbox.checked = Array.from(sizeCheckboxes).every(cb => cb.checked);
    }
    allCheckbox.addEventListener('change', function() {
        sizeCheckboxes.forEach(cb => cb.checked = allCheckbox.checked);
    });
    sizeCheckboxes.forEach(cb => {
        cb.addEventListener('change', updateAllCheckbox);
    });
    updateAllCheckbox(); // Set initial state
});
</script>
  </body>
</html>
