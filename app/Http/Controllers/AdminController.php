<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Order; 
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
        $data->save();
        return redirect()->back()->with('message', 'Catagory Added Successfully');
    }

    public function delete_catagory($id)
    {
        $data = Catagory::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Catagory Deleted Successfully');
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

        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image = $imagename;

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
        
        if($request->image) {
            $imagename = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move('product', $imagename);
            $product->image = $imagename;
        }

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
        $order = order::where('name','LIKE',"%searchText%")->orWhere('phone','LIKE',"%searchText%")->orWhere('product_title','LIKE',"%searchText%")->get;
        return view('admin.order',compact('order'));  
    }
}
