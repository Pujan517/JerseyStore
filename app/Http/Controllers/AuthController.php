<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone' => $validated['phone'] ?? null,
            'address' => $validated['address'] ?? null
        ]);

        Auth::login($user);

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard')->with('success', 'Registration successful');
        }
        return redirect('/')->with('success', 'Registration successful');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            
            Log::info('User logged in', [
                'id' => auth()->user()->id,
                'usertype' => auth()->user()->usertype
            ]);
            
            if (auth()->user()->usertype == 1) {
                $total_product = \App\Models\Product::count();
                $total_order = \App\Models\Order::count();
                $total_user = \App\Models\user::count();
                $total_revenue = \App\Models\Order::sum('price'); 
                $total_delivered = \App\Models\Order::where('delivery_status', 'delivered')->count();
                $total_processing = \App\Models\Order::where('delivery_status', 'processing')->count();
                return view('admin.home', compact('total_product', 'total_order','total_user', 'total_revenue','total_delivered','total_processing'));
            }
            Log::info('Redirecting regular user to home');
            return redirect()->intended('/')->with('success', 'Login successful');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
