<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Catagory;

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::where('featured', true)->paginate(6); 
        return view('home.userpage',compact('product'));
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
            \Log::debug('Fetching products with pagination');
            $product = Product::paginate(6);
            \Log::debug('Pagination details', [
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

        $product=product::find($id);
        return view('home.product_details',compact('product'));
    }

public function all_products() {
    $products = Product::paginate(12);
    return view('home.all_products', compact('products'));
}



    public function add_cart(Request $request, $id){

        if(Auth::id()){
            
            $user = Auth::user();
            $product = Product::find($id);
            $cart = new Cart; // Use correct case
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

            $cart->save();
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
            return view('home.showcart',compact('cart')); 

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
            return view('home.order', compact('orders'));
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
        return view('home.all_products', compact('products'));
    }

    public function search_product(Request $request)
    {
        $search = $request->search;
        $terms = explode(' ', $search);
        
        $products = Product::where(function($query) use ($terms) {
            foreach ($terms as $term) {
                $query->where(function($q) use ($term) {
                    // Search in product fields with different weights
                    $q->whereRaw("LOWER(title) LIKE ?", ['%' . strtolower($term) . '%'])
                      ->orWhereRaw("LOWER(description) LIKE ?", ['%' . strtolower($term) . '%'])
                      ->when(is_numeric($term), function($q) use ($term) {
                          // Handle price range searches (e.g., "under 100" or "100-200")
                          if (strpos($term, '-') !== false) {
                              list($min, $max) = explode('-', $term);
                              $q->orWhereBetween('price', [(float)$min, (float)$max]);
                          } else {
                              $q->orWhere('price', '<=', (float)$term);
                          }
                      });
                });
            }
        })
        ->orWhereHas('category', function($query) use ($terms) {
            foreach ($terms as $term) {
                $query->orWhereRaw("LOWER(catagory_name) LIKE ?", ['%' . strtolower($term) . '%']);
            }
        })
        ->orderByRaw("
            CASE 
                WHEN title LIKE ? THEN 1
                WHEN title LIKE ? THEN 2
                WHEN description LIKE ? THEN 3
                ELSE 4
            END", 
            [
                $search . '%',
                '%' . $search . '%',
                '%' . $search . '%'
            ]
        )
        ->with('category') // Eager load category relationship
        ->paginate(12);

        // Get related categories for search refinement
        $relatedCategories = Catagory::whereHas('products', function($query) use ($search) {
            $query->whereRaw("LOWER(title) LIKE ?", ['%' . strtolower($search) . '%'])
                  ->orWhereRaw("LOWER(description) LIKE ?", ['%' . strtolower($search) . '%']);
        })->take(5)->get();

        return view('home.all_products', compact('products', 'search', 'relatedCategories'));
    }
}

