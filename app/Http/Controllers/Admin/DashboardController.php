<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [];
        $stats['total_users'] = User::role('User')->count();
        $stats['total_active_users'] = User::role('User')->enabled(1)->count();
        $stats['total_inactive_users'] = User::role('User')->enabled(0)->count();

        return view('admin.dashboard',compact('stats'));
    }
}
