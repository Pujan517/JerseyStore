<section class="product_section layout_padding">
         <div class="container">
            @if(session('message'))
               <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                  {{ session('message') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
            @endif
            @if(session('error'))
               <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                  {{ session('error') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
            @endif
            <div class="heading_container heading_center">
               <h2>
                  Featured <span>Products</span>
               </h2>
               <p class="section-subtitle">Discover our premium collection of football gear</p>
            </div>
            <div class="row">
               @foreach($featuredProducts as $product)
                  @if(is_object($product))
                  <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 d-flex align-items-stretch">
                     <div class="box w-100">
                        <div class="img-box">
                           <img src="{{ asset('product/'.$product->image) }}" alt="{{$product->title}}">
                        </div>
                        <div class="detail-box">
                           <h5>{{$product->title}}</h5>
                           <div class="price-box">
                              @if($product->discount_price!=null)
                              <div class="price-wrapper">
                                 <h6 class="original-price">Rs. {{number_format($product->price, 2)}}</h6>
                                 <h6 class="discounted-price">Rs. {{number_format($product->discount_price, 2)}}</h6>
                                 <span class="discount-tag" style="background-color:red">
                                   -{{ round((($product->price - $product->discount_price) / $product->price) * 100) }}% OFF
                                 </span>
                              </div>
                              @else
                              <h6 class="regular-price">Rs. {{number_format($product->price, 2)}}</h6>
                              @endif
                           </div>
                        </div>
                        <div class="option_container">
                           <a href="{{url('product_details',$product->id)}}" class="option1 w-100 text-center">
                              <i class="fa fa-eye"></i> View Details
                           </a>
                        </div>
                     </div>
                  </div>
                  @else
                    <div style="color:red;">Invalid product entry skipped.</div>
                  @endif
               @endforeach
            </div>            @if($featuredProducts->count() == 0)
                <div class="p-4 text-blue-700 bg-blue-100 rounded">No products found</div>

            @endif
         </div>
      </section>

<style>
.product_section .box {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(44, 62, 80, 0.08);
    padding: 18px 12px 20px 12px;
    display: flex;
    flex-direction: column;
    align-items: center;
    height: 100%;
    min-height: 320px;
    max-width: 320px;
    aspect-ratio: 1 / 1; /* Makes the card square */
    margin: 0 auto;
    transition: box-shadow 0.2s, transform 0.2s;
}
.product_section .box:hover {
    box-shadow: 0 8px 24px rgba(44, 62, 80, 0.18);
    transform: translateY(-6px) scale(1.03);
}
.product_section .img-box {
    width: 100%;
    height: 180px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 12px;
    overflow: hidden;
    border-radius: 8px;
    background: #f8f9fa;
}
.product_section .img-box img {
    max-width: 100%;
    max-height: 170px;
    object-fit: contain;
    transition: transform 0.3s;
}
.product_section .box:hover .img-box img {
    transform: scale(1.08);
}
.product_section .detail-box {
    width: 100%;
    text-align: center;
    margin-bottom: 10px;
}
.product_section .detail-box h5 {
    font-size: 1.08rem;
    font-weight: 600;
    margin-bottom: 6px;
    color: #222;
}
.product_section .price-box {
    margin-bottom: 8px;
}
.product_section .original-price {
    color: #888;
    font-size: 0.95rem;
    text-decoration: line-through;
    margin-bottom: 0;
    display: inline-block;
}
.product_section .discounted-price {
    color: #e74c3c;
    font-size: 1.08rem;
    font-weight: 700;
    margin-left: 8px;
}
.product_section .regular-price {
    color: #2f80ed;
    font-size: 1.08rem;
    font-weight: 700;
}
.product_section .discount-tag {
    font-size: 0.85rem;
    color: #fff;
    background: #e74c3c;
    border-radius: 4px;
    padding: 2px 7px;
    margin-left: 7px;
    font-weight: 500;
}
.product_section .option_container {
    margin-top: auto;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.product_section .options .option1 {
    background: #2f80ed;
    color: #fff;
    border-radius: 4px;
    padding: 6px 18px;
    margin-bottom: 8px;
    font-size: 0.97rem;
    transition: background 0.2s;
    text-decoration: none;
    display: inline-block;
}
.product_section .options .option1:hover {
    background: #1e5bb8;
    color: #fff;
}
.product_section .cart-form .cart-btn {
    background: #56ccf2;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 6px 18px;
    font-size: 0.97rem;
    margin-top: 6px;
    transition: background 0.2s;
}
.product_section .cart-form .cart-btn:hover {
    background: #2f80ed;
}
.product_section .quantity-wrapper {
    display: flex;
    align-items: center;
    margin-bottom: 0;
}
.product_section .quantity-btn {
    background: #f1f1f1;
    border: none;
    width: 28px;
    height: 28px;
    font-size: 1.1rem;
    color: #2f80ed;
    border-radius: 50%;
    margin: 0 4px;
    transition: background 0.2s;
}
.product_section .quantity-btn:hover {
    background: #dbeafe;
}
.product_section .quantity-input {
    width: 44px;
    text-align: center;
    border: 1px solid #e0e0e0;
    border-radius: 4px;
    margin: 0 2px;
    height: 28px;
}
@media (max-width: 991px) {
    .product_section .box {
        min-height: 320px;
        aspect-ratio: 1 / 1;
    }
}
@media (max-width: 767px) {
    .product_section .box {
        min-height: 220px;
        max-width: 100%;
        aspect-ratio: 1 / 1;
    }
    .product_section .img-box {
        height: 120px;
    }
}
</style>

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