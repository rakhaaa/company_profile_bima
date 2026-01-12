<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'company' => 'nullable|string|max:255',
            'service_type' => 'nullable|in:security,cleaning,driver,patrol,cctv,consulting,other',
            'message' => 'required|string|max:2000',
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'phone.required' => 'Nomor telepon wajib diisi',
            'message.required' => 'Pesan wajib diisi',
            'message.max' => 'Pesan maksimal 2000 karakter',
        ]);

        $contact = Contact::create($validated);

        // Optional: Send notification email to admin
        // Mail::to(config('mail.admin_email'))->send(new NewContactNotification($contact));

        return redirect()
            ->route('contact')
            ->with('success', 'Terima kasih! Pesan Anda telah terkirim. Tim kami akan segera menghubungi Anda.');
    }
}