<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Order; 
use App\Models\User;
use PDF;

class AdminController extends Controller
{
    public function view_catagory()
    {
        $data = Catagory::all();
        return view('admin.catagory', compact('data'));
    }

    public function add_catagory(Request $request)
    {
        $data = new Catagory;
        $data->catagory_name = $request->catagory;
        
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/category'), $imagename);
            $data->image = $imagename;
        }
        
        $data->save();
        return redirect()->back()->with('message', 'Catagory Added Successfully');
    }

    public function delete_catagory($id)
    {
        $data = Catagory::find($id);
        
        // Delete the image file if it exists
        if($data->image) {
            $imagePath = public_path('storage/category/' . $data->image);
            if(file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        
        $data->delete();
        return redirect()->back()->with('message', 'Catagory Deleted Successfully');
    }

    public function edit_catagory($id)
    {
        $category = Catagory::find($id);
        return view('admin.edit_catagory', compact('category'));
    }

    public function update_catagory(Request $request, $id)
    {
        $category = Catagory::find($id);
        $category->catagory_name = $request->catagory;
        
        if($request->hasFile('image')) {
            // Delete old image if it exists
            if($category->image) {
                $old_image_path = public_path('storage/category/' . $category->image);
                if(file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            }
            
            // Upload new image
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/category'), $imagename);
            $category->image = $imagename;
        }
        
        $category->save();
        return redirect()->back()->with('message', 'Category Updated Successfully');
    }

    public function view_product()
    {
        $catagories = Catagory::all();
        return view('admin.product', compact('catagories'));
    }

    public function add_product(Request $request)
    {
        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->dis_price;
        $product->catagory = $request->catagory;
        $product->featured = $request->has('featured') ? 1 : 0;
        $product->sizes = json_encode($request->input('sizes', []));
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image = $imagename;
        $product->tags = $request->tags;
        $product->save();
        return redirect()->back()->with('message', 'Product Added Successfully'); 
    }

    public function show_product()
    {
        $product = Product::all();
        return view('admin.show_product', compact('product'));
    }

    public function delete_product($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }

    public function update_product($id)
    {
        $product = Product::find($id);
        $catagories = Catagory::all();
        return view('admin.update_product', compact('product', 'catagories'));
    }

    public function update_product_confirm(Request $request, $id)
    {
        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->dis_price;
        $product->catagory = $request->catagory;
        $product->quantity = $request->quantity;
        $product->featured = $request->has('featured') ? 1 : 0;
        $product->new_arrival = $request->has('new_arrival') ? 1 : 0;
        $product->sizes = json_encode($request->input('sizes', []));
        if($request->image) {
            $imagename = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move('product', $imagename);
            $product->image = $imagename;
        }
        $product->tags = $request->tags;
        $product->save();
        return redirect()->back()->with('message', 'Product Updated Successfully');
    }

    public function product_details($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product_details', compact('product'));
    }

    public function dashboard()
    {
        $total_product = Product::count();
        $total_order = Order::count();
        $total_user =  User::count(); 
        $total_revenue = Order::sum('price'); 
        $total_delivered = Order::where('delivery_status', 'delivered')->count();
        $total_processing = Order::where('delivery_status', 'processing')->count();
        return view('admin.home', compact('total_product', 'total_order', 'total_user','total_revenue','total_delivered','total_processing'));
    }

    public function order()
    {
        $order = Order::all();
        return view('admin.order', compact('order'));  
    }

    public function delivered($id)
    {
        $order = Order::find($id);
        $order->delivery_status = "delivered"; 
        $order->payment_status = 'Paid'; 
        $order->save();
        // Send notification to user
        $user = User::find($order->user_id);
        if ($user) {
            $user->notify(new \App\Notifications\OrderDelivered($order));
        }
        return redirect()->back();
    }
      
    public function print_pdf($id)
    {
        $order = Order::find($id); 
        $pdf = PDF::loadView('admin.pdf', compact('order')); 
        return $pdf->download('order_details.pdf');  
    }

    public function searchdata(Request $request)
    {
        $searchText = $request->search;
        $order = Order::where('name','LIKE',"%{$searchText}%")
            ->orWhere('phone','LIKE',"%{$searchText}%")
            ->orWhere('product_title','LIKE',"%{$searchText}%")
            ->get();
        return view('admin.order',compact('order'));
    }

    public function search_product(Request $request)
    {
        \Log::info('ADMIN SEARCH PRODUCT CONTROLLER HIT', ['search' => $request->input('search')]);
        $search = $request->input('search');
        $products = Product::where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->orWhere('catagory', 'LIKE', "%{$search}%")
            ->orWhere('price', 'LIKE', "%{$search}%")
            ->get();
        $catagories = Catagory::all();
        return view('admin.product', ['products' => $products, 'catagories' => $catagories]);
    }
}
