<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registration;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $total = Registration::count();
        $approved = Registration::where('status', 'approved')->count();
        $pending = Registration::where('status', 'pending')->count();
        $rejected = Registration::where('status', 'rejected')->count();
        
        $recentRegistrations = Registration::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'total',
            'approved',
            'pending',
            'rejected',
            'recentRegistrations'
        ));
    }
}
