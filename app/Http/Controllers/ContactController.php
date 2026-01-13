<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactSubmissionRequest;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(ContactSubmissionRequest $request)
    {
        try {
            ContactSubmission::create($request->validated());

            return redirect()->back()->with('success', 'Terima kasih! Pesan Anda telah kami terima. Tim kami akan segera menghubungi Anda.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Maaf, terjadi kesalahan. Silakan coba lagi.')->withInput();
        }
    }
}