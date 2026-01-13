<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Client;
use App\Models\Stat;
use App\Models\HeroSlide;
use App\Models\WhyFeature;

class HomeController extends Controller
{
    public function index()
    {
        $heroSlides = HeroSlide::active()->ordered()->get();
        $stats = Stat::active()->ordered()->get();
        $services = Service::active()->ordered()->limit(6)->get();
        $clients = Client::active()->ordered()->get();
        $whyFeatures = WhyFeature::active()->ordered()->get();

        return view('home', compact('heroSlides', 'stats', 'services', 'clients', 'whyFeatures'));
    }
}