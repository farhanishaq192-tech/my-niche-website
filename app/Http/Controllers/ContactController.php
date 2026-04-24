<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        Contact::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'service' => $request->service,
            'message' => $request->message,
        ]);

        return back()->with('success',
            'Shukriya! Hum 24 ghante mein rabta karenge.');
    }

    public function admin()
    {
        $contacts = Contact::latest()->get();
        return view('admin', compact('contacts'));
    }
}
