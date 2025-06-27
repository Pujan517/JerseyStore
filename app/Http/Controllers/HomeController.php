<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Catagory;
use App\Services\RecommendationService;
use App\Services\BubbleSort;
use App\Notifications\OrderPlaced;

class HomeController extends Controller
{
    public function index(RecommendationService $service)
    {
        $featuredProducts = Product::where('featured', 1)
            ->whereNotNull('title')
            ->paginate(6);
        // Remove debug log for production
        // Log::debug('Featured products collection', [
        //     'products' => $featuredProducts->getCollection()->toArray()
        // ]);
        $user = Auth::user();
        $recommendations = $service->getRecommendations($user, 4); // Show 4 recommendations on homepage
        // Fetch products marked as new arrivals
        $newArrivals = Product::where('new_arrival', true)->orderBy('created_at', 'desc')->take(8)->get();
        return view('home.userpage', compact('featuredProducts', 'recommendations', 'newArrivals'));
    }
     
    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if ($usertype == '1')
        {
            $total_product = Product::count();

            $total_order = order::count();

            $total_user = user::count();

            $total_revenue = Order::sum('price');

            $total_delivered = Order::where('delivery_status', 'delivered')->count();

            $total_processing = Order::where('delivery_status', 'processing')->count();

            return view('admin.home', compact('total_product', 'total_order', 'total_user', 'total_revenue','total_delivered', 'total_processing'));
        }
        else
        {
            Log::debug('Fetching products with pagination');
            $product = Product::paginate(6);
            Log::debug('Pagination details', [
                'total' => $product->total(),
                'per_page' => $product->perPage(),
                'current_page' => $product->currentPage(),
                'last_page' => $product->lastPage(),
                'from' => $product->firstItem(),
                'to' => $product->lastItem()
            ]);
            return view('home.product', compact('product'));

        }
    }

    public function product_details($id){
        $product = Product::find($id);
        $sizes = [];
        if ($product && $product->sizes) {
            $sizes = json_decode($product->sizes, true);
        }
        // Record view activity
        if (Auth::check()) {
            \App\Models\UserActivity::create([
                'user_id' => Auth::id(),
                'product_id' => $id,
                'type' => 'view',
            ]);
        }
        return view('home.product_details', compact('product', 'sizes'));
    }

    public function all_products(Request $request)
    {
        $query = Product::query();

        // League/Category filter
        if ($request->filled('category')) {
            $query->where('catagory', $request->input('category'));
        }

        // Size filter (support multiple sizes)
        if ($request->filled('size')) {
            $sizes = (array) $request->input('size');
            $query->where(function ($q) use ($sizes) {
                foreach ($sizes as $size) {
                    $q->orWhereJsonContains('sizes', $size);
                }
            });
        }

        // Price range filter (use discount_price if set, else price)
        if ($request->filled('min_price')) {
            $query->where(function($q) use ($request) {
                $q->where(function($sub) use ($request) {
                    $sub->whereNotNull('discount_price')->where('discount_price', '>=', $request->input('min_price'));
                })->orWhere(function($sub) use ($request) {
                    $sub->whereNull('discount_price')->where('price', '>=', $request->input('min_price'));
                });
            });
        }
        if ($request->filled('max_price')) {
            $query->where(function($q) use ($request) {
                $q->where(function($sub) use ($request) {
                    $sub->whereNotNull('discount_price')->where('discount_price', '<=', $request->input('max_price'));
                })->orWhere(function($sub) use ($request) {
                    $sub->whereNull('discount_price')->where('price', '<=', $request->input('max_price'));
                });
            });
        }

        // Availability filter
        if ($request->filled('availability')) {
            if ($request->input('availability') === 'in_stock') {
                $query->where('quantity', '>', 0);
            } elseif ($request->input('availability') === 'out_of_stock') {
                $query->where('quantity', '<=', 0);
            }
        }

        // Debug: Log max_price from request
        Log::debug('Request max_price', ['max_price' => $request->input('max_price')]);
        // Debug: Log SQL query and bindings
        Log::debug('SQL', [$query->toSql(), $query->getBindings()]);
        $products = $query->get();
        // Sorting option from filter
        $sort = $request->input('sort_by');
        $productsArray = $products->toArray();
        if ($sort === 'price_asc') {
            $productsArray = BubbleSort::sort($productsArray);
        } elseif ($sort === 'price_desc') {
            $productsArray = array_reverse(BubbleSort::sort($productsArray));
        } elseif ($sort === 'name_asc') {
            usort($productsArray, function($a, $b) {
                return strcmp($a['title'], $b['title']);
            });
        } elseif ($sort === 'name_desc') {
            usort($productsArray, function($a, $b) {
                return strcmp($b['title'], $a['title']);
            });
        }
        $products = collect($productsArray)->map(function($item) {
            return (object) $item;
        });
        $categories = Catagory::all();
        $sizes = ['S', 'M', 'L', 'XL', 'XXL', 'XXXL'];

        return view('home.all_products', [
            'products' => $products,
            'categories' => $categories,
            'sizes' => $sizes,
        ]);
    }



    public function add_cart(Request $request, $id){
        Log::info('add_cart called', ['user_id' => Auth::id(), 'product_id' => $id, 'request' => $request->all()]);

        if(Auth::id()){
            $user = Auth::user();
            $product = Product::find($id);
            $cart = new Cart;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;
            $cart->product_title = $product->title;

            if($product->discount_price != null) {
                $cart->price = $product->discount_price * $request->quantity;
            } else {
                $cart->price = $product->price * $request->quantity; 
            }
            $cart->image = $product->image;
            $cart->Product_id = $product->id;
            $cart->quantity = $request->quantity;

            // Validate and set size
            if ($product->sizes && (! $request->has('selected_size') || empty($request->selected_size))) {
                return redirect()->back()->with('error', 'Please select a size.');
            } elseif ($product->sizes && $request->has('selected_size')) {
                $cart->size = $request->selected_size;
            } elseif (!$product->sizes) {
                $cart->size = 'N/A'; // or any default value
            }

            $cart->save();
            // Record add-to-cart as a 'view' activity (optional, or use 'cart' if you want to distinguish)
            \App\Models\UserActivity::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'type' => 'view',
            ]);
            return redirect()->back()->with('message', 'Product added to cart successfully!');
        }
        else{
            return redirect('login'); 
        }
    }

    public function show_cart(){
        if(Auth::id()){
            $id=Auth::user()->id;
            $cart=cart::where('user_id','=',$id)->get();
            $notifications = Auth::user()->notifications()->take(10)->get();
            return view('home.showcart',compact('cart', 'notifications'));
        }
        else{
            return redirect('login');
        }
    }

    public function remove_cart($id){

        $cart=cart::find($id);
        $cart->delete();

        return redirect()->back();
    }

    public function cash_order(){

        $user=Auth::user();
        $userid=$user->id;

        $data=cart::where('user_id','=',$userid)->get();

        foreach($data as $data)
        {
            $order=new order;

            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;

            $order->product_id=$data->Product_id;
            $order->payment_status='cash on delivery';
            $order->delivery_status='processing';
            $order->save();

            // Record purchase activity
            \App\Models\UserActivity::create([
                'user_id' => $user->id,
                'product_id' => $data->Product_id,
                'type' => 'purchase',
            ]);

            // Notify user about the order
            // Log image filename and asset path for debugging
            Log::info('OrderPlaced Notification Image', [
                'image_filename' => $data->image,
                'asset_url' => asset('product/' . $data->image),
                'file_exists' => file_exists(public_path('product/' . $data->image)),
            ]);

            $user->notify(new OrderPlaced($data->image, $data->Product_id));

            $cart_id=$data->id;
            $cart=cart::find($cart_id); 
            $cart->delete();
        }

        return redirect()->back()->with('message','We have received your order. We will connect with you soon');
    }

    public function show_order()
    {
        if(Auth::id()){
            $user = Auth::user();
            $orders = Order::where('user_id', $user->id)->get();
            $notifications = $user->notifications()->take(10)->get();
            return view('home.order', compact('orders', 'notifications'));
        }
        else{
            return redirect('login');
        }
    }
    
    public function cancel_order($id)
    {
        if(Auth::id())
        {
            $order = Order::find($id);
            
            // Check if order belongs to the logged-in user
            if($order->user_id == Auth::user()->id && $order->delivery_status != 'delivered')
            {
                $order->delete();
                return redirect()->back()->with('message', 'Order Cancelled Successfully');
            }
            return redirect()->back()->with('message', 'Unable to cancel the order');
        }
        return redirect('login');
    }

    public function show_categories()
    {
        $categories = Catagory::all();
        return view('home.categories', compact('categories'));
    }

    public function category_products($id)
    {
        $category = Catagory::findOrFail($id);
        $products = Product::where('catagory', $category->catagory_name)->paginate(6);
        $categories = Catagory::all();
        $sizes = ['S', 'M', 'L', 'XL', 'XXL', 'XXXL'];
        return view('home.all_products', [
            'products' => $products,
            'categories' => $categories,
            'sizes' => $sizes,
        ]);
    }

    public function search_product(Request $request)
    {
        $search = $request->search;
        $terms = explode(' ', $search);
        $query = Product::query();

        // Search in title, description, tags, category with relevance
        $query->selectRaw('products.*, (
            (CASE WHEN LOWER(title) LIKE ? THEN 10 ELSE 0 END) +
            (CASE WHEN LOWER(description) LIKE ? THEN 5 ELSE 0 END) +
            (CASE WHEN LOWER(catagory) LIKE ? THEN 3 ELSE 0 END) +
            (CASE WHEN LOWER(tags) LIKE ? THEN 2 ELSE 0 END)
        ) as relevance', [
            '%' . strtolower($search) . '%',
            '%' . strtolower($search) . '%',
            '%' . strtolower($search) . '%',
            '%' . strtolower($search) . '%',
        ]);
        $query->where(function($q) use ($terms) {
            foreach ($terms as $term) {
                $q->orWhereRaw("LOWER(title) LIKE ?", ['%' . strtolower($term) . '%'])
                  ->orWhereRaw("LOWER(description) LIKE ?", ['%' . strtolower($term) . '%'])
                  ->orWhereRaw("LOWER(tags) LIKE ?", ['%' . strtolower($term) . '%'])
                  ->orWhereRaw("LOWER(catagory) LIKE ?", ['%' . strtolower($term) . '%']);
            }
        });

        // Category filter
        if ($request->filled('category')) {
            $query->where('catagory', $request->input('category'));
        }
        // Size filter
        if ($request->filled('size')) {
            $sizes = (array) $request->input('size');
            $query->where(function ($q) use ($sizes) {
                foreach ($sizes as $size) {
                    $q->orWhereJsonContains('sizes', $size);
                }
            });
        }
        // Price range filter
        if ($request->filled('min_price')) {
            $query->where(function($q) use ($request) {
                $q->where(function($sub) use ($request) {
                    $sub->whereNotNull('discount_price')->where('discount_price', '>=', $request->input('min_price'));
                })->orWhere(function($sub) use ($request) {
                    $sub->whereNull('discount_price')->where('price', '>=', $request->input('min_price'));
                });
            });
        }
        if ($request->filled('max_price')) {
            $query->where(function($q) use ($request) {
                $q->where(function($sub) use ($request) {
                    $sub->whereNotNull('discount_price')->where('discount_price', '<=', $request->input('max_price'));
                })->orWhere(function($sub) use ($request) {
                    $sub->whereNull('discount_price')->where('price', '<=', $request->input('max_price'));
                });
            });
        }
        // Availability filter
        if ($request->filled('availability')) {
            if ($request->input('availability') === 'in_stock') {
                $query->where('quantity', '>', 0);
            } elseif ($request->input('availability') === 'out_of_stock') {
                $query->where('quantity', '<=', 0);
            }
        }

        // Order by relevance
        $query->orderByDesc('relevance');

        // Pagination
        $products = $query->paginate(12)->appends($request->all());

        $categories = Catagory::all();
        $sizes = ['S', 'M', 'L', 'XL', 'XXL', 'XXXL'];
        $relatedCategories = Catagory::whereHas('products', function($query) use ($search) {
            $query->whereRaw("LOWER(title) LIKE ?", ['%' . strtolower($search) . '%'])
                  ->orWhereRaw("LOWER(description) LIKE ?", ['%' . strtolower($search) . '%']);
        })->take(5)->get();

        return view('home.all_products', compact('products', 'search', 'relatedCategories', 'categories', 'sizes'));
    }

    /**
     * Show personalized or trending product recommendations
     */
    public function recommendations(RecommendationService $service)
    {
        $user = Auth::user();
        $products = $service->getRecommendations($user, 8);
        return view('home.recommendations', compact('products'));
    }

    public function markNotificationRead($id)
    {
        $notification = Auth::user()->notifications()->where('id', $id)->first();
        if ($notification) {
            $notification->markAsRead();
        }
        return back();
    }
}

