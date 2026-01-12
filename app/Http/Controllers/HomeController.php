<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Client;
use App\Models\HeroSlide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $heroSlides = HeroSlide::active()->ordered()->get();
        $services = Service::active()->ordered()->get();
        $clients = Client::active()->ordered()->get();

        return view('home', compact('heroSlides', 'services', 'clients'));
    }
}