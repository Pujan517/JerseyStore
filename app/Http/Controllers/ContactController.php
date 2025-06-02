<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Here you can add code to send email or store the contact form data
        // For now, we'll just redirect with a success message

        return redirect()->back()->with('success', 'Thank you for your message. We will get back to you soon!');
    }
}
