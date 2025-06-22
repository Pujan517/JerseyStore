<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Featured <span>Products</span>
               </h2>
               <p class="section-subtitle">Discover our premium collection of football gear</p>
            </div>            <div class="row">
               @foreach($product as $products)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="img-box">
                        <img src="{{ asset('product/'.$products->image) }}" alt="{{$products->title}}">
                     </div>
                     <div class="detail-box">
                        <h5>{{$products->title}}</h5>
                        <div class="price-box">
                           @if($products->discount_price!=null)
                           <div class="price-wrapper">
                              <h6 class="original-price">Rs. {{number_format($products->price, 2)}}</h6>
                              <h6 class="discounted-price">Rs. {{number_format($products->discount_price, 2)}}</h6>
                              <span class="discount-tag" style="background-color:red">
                                -{{ round((($products->price - $products->discount_price) / $products->price) * 100) }}% OFF
                              </span>
                           </div>
                           @else
                           <h6 class="regular-price">Rs. {{number_format($products->price, 2)}}</h6>
                           @endif
                        </div>
                     </div>
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_details',$products->id)}}" class="option1">
                              <i class="fa fa-eye"></i> View Details
                           </a>
                           <form action="{{url('add_cart',$products->id)}}" method="POST" class="cart-form">
                           @csrf
                              <div class="quantity-cart-row">
                                 <div class="quantity-wrapper">
                                    <button type="button" class="quantity-btn minus">-</button>
                                    <input min="1" type="number" value="1" name="quantity" class="quantity-input">
                                    <button type="button" class="quantity-btn plus">+</button>
                                 </div>
                                 <button type="submit" class="cart-btn">
                                    <i class="fa fa-shopping-cart"></i> Add to Cart
                                 </button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>               @endforeach
            </div>            @if($product->count() == 0)
                <div class="p-4 text-blue-700 bg-blue-100 rounded">No products found</div>

            @endif
         </div>
      </section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle quantity buttons
    const quantityWrappers = document.querySelectorAll('.quantity-wrapper');
    
    quantityWrappers.forEach(wrapper => {
        const input = wrapper.querySelector('.quantity-input');
        const minusBtn = wrapper.querySelector('.minus');
        const plusBtn = wrapper.querySelector('.plus');
        
        minusBtn.addEventListener('click', () => {
            const currentValue = parseInt(input.value);
            if (currentValue > 1) {
                input.value = currentValue - 1;
            }
        });
        
        plusBtn.addEventListener('click', () => {
            const currentValue = parseInt(input.value);
            input.value = currentValue + 1;
        });
        
        input.addEventListener('change', () => {
            if (input.value < 1) {
                input.value = 1;
            }
        });
    });
});
</script>