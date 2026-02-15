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

    // ...existing code...
    /**
     * Handles POST from cart, generates eSewa payment form
     */
    public function pay(Request $request)
    {
        $amount = $request->input('amount') ?? 1000;
        $tax_amount = 0;
        $product_service_charge = 0;
        $product_delivery_charge = 0;
        $total_amount = $amount + $tax_amount + $product_service_charge + $product_delivery_charge;
        $pid = uniqid('order_');
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

    /**
     * Handles eSewa success callback, verifies payment server-to-server
     */
    public function esewaSuccess(Request $request)
    {
        $refId = $request->input('refId');
        $oid = $request->input('oid');
        $amt = $request->input('amt');
        $verified = false;
        $message = 'Could not verify payment.';
        if ($refId && $oid && $amt) {
            $verified = $this->verifyEsewa($amt, $oid, $refId);
            $message = $verified ? 'Payment verified successfully!' : 'Payment verification failed!';
        }
        // Save order/payment status to DB here if needed
        return view('esewa.success', [
            'data' => $request->all(),
            'verified' => $verified,
            'message' => $message
        ]);
    }

    /**
     * Handles eSewa failure callback
     */
    public function esewaFailure(Request $request)
    {
        // Handle failed payment here
        return view('esewa.failure', ['data' => $request->all()]);
    }

    /**
     * Server-to-server verification with eSewa
     */
    private function verifyEsewa($amt, $pid, $refId)
    {
        $url = "https://rc-epay.esewa.com.np/api/epay/txn_status/v2"; // sandbox/test URL
        $data = [
            'amt' => $amt,
            'scd' => env('ESEWA_MERCHANT_CODE', 'EPAYTEST'),
            'pid' => $pid,
            'rid' => $refId,
        ];
        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->post($url, ['form_params' => $data]);
            $body = $response->getBody()->getContents();
            return strpos($body, 'Success') !== false;
        } catch (\Exception $e) {
            return false;
        }
    }
}
