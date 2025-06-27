<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="">
    <title>Bhakundo - Football Store</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
    <style>
        /* Only product-specific styles below. Header-related and duplicate styles removed. */
        .glass-card {
            background: rgba(255,255,255,0.85);
            border-radius: 24px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.18);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255,255,255,0.18);
            max-width: 950px;
            margin: 20px auto 32px auto;
            padding: 0;
            overflow: hidden;
        }
        .product-row {
            display: flex;
            flex-wrap: wrap;
        }
        .product-image-col {
            flex: 1 1 350px;
            background: linear-gradient(120deg, #dbeafe 60%, #f1f5f9 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 420px;
        }
        .product-image-col img {
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.10);
            width: 320px;
            height: 320px;
            object-fit: cover;
            background: #f2f2f2;
            transition: transform 0.3s;
        }
        .product-image-col img:hover {
            transform: scale(1.04);
        }
        .product-info-col {
            flex: 2 1 400px;
            padding: 48px 40px 40px 40px;
            background: transparent;
        }
        @media (max-width: 900px) {
            .product-row {
                flex-direction: column;
            }
            .product-info-col {
                padding: 32px 16px 24px 16px;
            }
            .product-image-col {
                min-height: 260px;
            }
        }
        .product-title {
            font-size: 2.4rem;
            font-weight: 800;
            margin-bottom: 0.7rem;
            color: #1e293b;
            letter-spacing: -1px;
        }
        .badge-category {
            background: #6366f1;
            color: #fff;
            font-size: 0.95rem;
            border-radius: 6px;
            padding: 0.3em 0.9em;
            margin-right: 0.7em;
            font-weight: 500;
        }
        .badge-stock {
            background: #10b981;
            color: #fff;
            font-size: 0.95rem;
            border-radius: 6px;
            padding: 0.3em 0.9em;
            font-weight: 500;
        }
        .badge-stock.out {
            background: #ef4444;
        }
        .product-price {
            font-size: 2rem;
            font-weight: 700;
            color: #e11d48;
            margin-bottom: 0.2rem;
        }
        .product-old-price {
            font-size: 1.1rem;
            color: #64748b;
            text-decoration: line-through;
            margin-left: 14px;
        }
        .product-description {
            font-size: 1.13rem;
            color: #334155;
            margin: 1.2rem 0 1.7rem 0;
            line-height: 1.7;
        }
        .add-cart-area {
            background: #f1f5f9;
            border-radius: 12px;
            padding: 1.2rem 1.5rem 1.2rem 1.5rem;
            margin-top: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1.2rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }
        .add-cart-area input[type="number"] {
            max-width: 80px;
            border-radius: 6px;
            border: 1px solid #cbd5e1;
            padding: 0.4em 0.7em;
            font-size: 1.1rem;
        }
        .add-cart-area .btn-primary {
            background: linear-gradient(90deg, #6366f1 60%, #3b82f6 100%);
            border: none;
            font-weight: 700;
            padding: 0.6rem 2.2rem;
            border-radius: 7px;
            font-size: 1.13rem;
            box-shadow: 0 2px 8px rgba(99,102,241,0.10);
            transition: background 0.2s;
        }
        .add-cart-area .btn-primary:hover {
            background: linear-gradient(90deg, #3b82f6 60%, #6366f1 100%);
        }
    </style>
</head>
<body>
    <div class="hero_area">
        @include('home.header')
        <br><br>
        <div class="container">
            <div class="glass-card">
                <div class="product-row">
                    <div class="product-image-col">
                        <img src="{{ asset('product/'.$product->image) }}" alt="{{ $product->title }}">
                    </div>
                    <div class="product-info-col">
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge-category">{{$product->catagory}}</span>
                            @if($product->quantity > 0)
                                <span class="badge-stock">In Stock</span>
                            @else
                                <span class="badge-stock out">Out of Stock</span>
                            @endif
                        </div>
                        <div class="product-title">{{$product->title}}</div>
                        <div class="mb-2">
                            @if($product->discount_price!=null)
                                <span class="product-price">Rs.{{$product->discount_price}}</span>
                                <span class="product-old-price">Rs.{{$product->price}}</span>
                            @else
                                <span class="product-price">Rs.{{$product->price}}</span>
                            @endif
                        </div>
                        <div class="product-description">{{$product->description}}</div>
                        @if(!empty($sizes))
                        <div class="mb-3">
                            <div class="mb-2">Available Sizes:</div>
                            <div style="margin-bottom: 0.5rem;">
                                @foreach($sizes as $size)
                                    <span class="badge badge-info" style="background:#3b82f6;color:#fff;margin-right:6px;">{{$size}}</span>
                                @endforeach
                            </div>
                            <form action="{{url('add_cart',$product->id)}}" method="POST" class="d-flex align-items-center" style="gap: 1rem; margin-bottom: 0;">
                                @csrf
                                <select name="selected_size" class="form-control" style="max-width:160px;margin-right:10px;z-index:2;position:relative;background:#fff;color:#222;font-weight:600;appearance: menulist;min-width:120px;height:auto;line-height:1.5;box-shadow:none;" required>
                                    <option value="" disabled selected>Select size</option>
                                    @foreach($sizes as $size)
                                        <option value="{{$size}}">{{$size}}</option>
                                    @endforeach
                                </select>
                                <input min="1" type="number" value="1" name="quantity" class="form-control" style="max-width: 80px; min-width: 60px; margin-right: 10px;" required @if($product->quantity==0) disabled @endif>
                                <input type="submit" class="btn btn-primary" value="Add To Cart" style="min-width: 130px;" @if($product->quantity==0) disabled @endif>
                            </form>
                        </div>
                        @else
                        <div class="add-cart-area">
                            <form action="{{url('add_cart',$product->id)}}" method="POST" class="d-flex align-items-center" style="gap: 1rem; margin-bottom: 0;">
                                @csrf
                                <input min="1" type="number" value="1" name="quantity" class="form-control" style="max-width: 80px; min-width: 60px; margin-right: 10px;" required @if($product->quantity==0) disabled @endif>
                                <input type="submit" class="btn btn-primary" value="Add To Cart" style="min-width: 130px;" @if($product->quantity==0) disabled @endif>
                            </form>
                        </div>
                        @endif
                        <span class="text-muted" style="font-size:1.05rem; margin-left: 18px; white-space: nowrap;">Available: {{$product->quantity}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('home/js/popper.min.js') }}"></script>
    <script src="{{ asset('home/js/bootstrap.js') }}"></script>
    <script src="{{ asset('home/js/custom.js') }}"></script>
</body>
</html>
