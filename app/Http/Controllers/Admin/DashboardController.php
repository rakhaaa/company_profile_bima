<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerApplication;
use App\Models\Client;
use App\Models\ContactSubmission;
use App\Models\Service;
use App\Models\HeroSlide;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index(): View
    {
        // Statistics Cards
        $stats = [
            'total_services' => Service::count(),
            'active_services' => Service::active()->count(),
            'total_clients' => Client::count(),
            'total_hero_slides' => HeroSlide::count(),
        ];

        // Contact & Career Stats
        $contactStats = [
            'new' => ContactSubmission::where('status', 'new')->count(),
            'read' => ContactSubmission::where('status', 'read')->count(),
            'replied' => ContactSubmission::where('status', 'replied')->count(),
            'total' => ContactSubmission::count(),
        ];

        $careerStats = [
            'pending' => CareerApplication::where('status', 'pending')->count(),
            'reviewing' => CareerApplication::where('status', 'reviewing')->count(),
            'interview' => CareerApplication::where('status', 'interview')->count(),
            'accepted' => CareerApplication::where('status', 'accepted')->count(),
            'total' => CareerApplication::count(),
        ];

        // Recent Contact Submissions (Last 5)
        $recentContacts = ContactSubmission::latest()
            ->take(5)
            ->get();

        // Recent Career Applications (Last 5)
        $recentApplications = CareerApplication::latest()
            ->take(5)
            ->get();

        // Monthly Submissions Chart Data (Last 6 months)
        $monthlyContacts = ContactSubmission::select(
            DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
            DB::raw('COUNT(*) as count')
        )
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month');

        $monthlyApplications = CareerApplication::select(
            DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
            DB::raw('COUNT(*) as count')
        )
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month');

        // Position Distribution (Career Applications)
        $positionDistribution = CareerApplication::select('position_applied', DB::raw('COUNT(*) as count'))
            ->groupBy('position_applied')
            ->pluck('count', 'position_applied');

        // Status Distribution (Contact Submissions)
        $contactStatusDistribution = ContactSubmission::select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status');

        return view('admin.dashboard', compact(
            'stats',
            'contactStats',
            'careerStats',
            'recentContacts',
            'recentApplications',
            'monthlyContacts',
            'monthlyApplications',
            'positionDistribution',
            'contactStatusDistribution'
        ));
    }
}
