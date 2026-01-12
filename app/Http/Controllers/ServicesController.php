<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::active()->ordered()->get();
        
        return view('services', compact('services'));
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        // Get related services (same category or random other services)
        $relatedServices = Service::active()
            ->where('id', '!=', $service->id)
            ->ordered()
            ->take(3)
            ->get();

        return view('services.show', compact('service', 'relatedServices'));
    }
}