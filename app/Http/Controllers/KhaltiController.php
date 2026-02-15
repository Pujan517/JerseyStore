<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KhaltiController extends Controller
{
    public function verify(Request $request)
    {
        $token = $request->input('token');
        $amount = $request->input('amount');

        // Log incoming request for debugging
        \Log::info('Khalti verify request', ['token' => $token, 'amount' => $amount]);

        $response = Http::withHeaders([
            'Authorization' => 'Key ' . env('KHALTI_SECRET_KEY', 'test_secret_key_6b5b7b3a9e34b6c8e6e7b7b7b7b7b7b7b'),
        ])->post('https://khalti.com/api/v2/payment/verify/', [
            'token' => $token,
            'amount' => $amount,
        ]);

        // Log Khalti API response for debugging
        \Log::info('Khalti verify response', ['status' => $response->status(), 'body' => $response->body()]);

        if ($response->successful() && isset($response['idx'])) {
            // Payment verified, you can store order/payment info here
            return response()->json(['success' => true, 'data' => $response->json()]);
        } else {
            return response()->json([
                'success' => false,
                'error' => $response->json(),
                'status' => $response->status(),
                'request' => [
                    'token' => $token,
                    'amount' => $amount,
                ]
            ]);
        }
    }
}
