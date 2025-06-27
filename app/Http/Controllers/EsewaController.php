<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EsewaController extends Controller
{
    public function redirectToEsewa(Request $request)
    {
        // You can get amount from request or calculate from session cart
        $amount = $request->input('amount') ?? 1000; // fallback 1000 for testing
        $tax_amount = 0;
        $product_service_charge = 0;
        $product_delivery_charge = 0;
        $total_amount = $amount + $tax_amount + $product_service_charge + $product_delivery_charge;
        $pid = uniqid();
        $success_url = route('esewa.success');
        $failure_url = route('esewa.failure');
        $esewa_url = 'https://rc-epay.esewa.com.np/api/epay/main/v2/form'; // sandbox/test URL

        return view('esewa.redirect', compact(
            'total_amount',
            'amount',
            'tax_amount',
            'product_service_charge',
            'product_delivery_charge',
            'pid',
            'success_url',
            'failure_url',
            'esewa_url'
        ));
    }

    public function esewaSuccess(Request $request)
    {
        // Here you can verify payment, save to DB, etc.
        return view('esewa.success', ['data' => $request->all()]);
    }

    public function esewaFailure(Request $request)
    {
        // Handle failed payment here
        return view('esewa.failure', ['data' => $request->all()]);
    }
}
