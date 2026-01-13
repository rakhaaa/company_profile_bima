<?php

namespace App\Http\Controllers;

use App\Http\Requests\CareerApplicationRequest;
use App\Models\CareerApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CareerController extends Controller
{
    public function index()
    {
        return view('career');
    }

    public function store(CareerApplicationRequest $request)
    {
        try {
            $data = $request->validated();

            // Handle CV upload
            if ($request->hasFile('cv')) {
                $data['cv_path'] = $request->file('cv')->store('career/cv', 'public');
            }

            // Handle Photo upload
            if ($request->hasFile('photo')) {
                $data['photo_path'] = $request->file('photo')->store('career/photos', 'public');
            }

            CareerApplication::create($data);

            return redirect()->back()->with('success', 'Terima kasih! Lamaran Anda telah kami terima. Kami akan menghubungi Anda jika terpilih untuk tahap selanjutnya.');
        } catch (\Exception $e) {
            // Clean up uploaded files if database insert fails
            if (isset($data['cv_path'])) {
                Storage::disk('public')->delete($data['cv_path']);
            }
            if (isset($data['photo_path'])) {
                Storage::disk('public')->delete($data['photo_path']);
            }

            return redirect()->back()->with('error', 'Maaf, terjadi kesalahan. Silakan coba lagi.')->withInput();
        }
    }
}