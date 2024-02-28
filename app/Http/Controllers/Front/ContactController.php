<?php

namespace App\Http\Controllers\Front;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index() {
        return view('front.contact-us');
    }

    public function sendMessage(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:30',
            'email' => 'required|email|max:50',
            'phone' => 'required|string',
            'message' => 'required|string|min:10|max:1000'
        ]);
        Contact::create($data);
        return back()->with('success', 'Message sent successfully');
    }
}
