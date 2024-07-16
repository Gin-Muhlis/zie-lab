<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // dashboard admin
    public function dashboardAdmin() {
        return view('admin.dashboard');
    }

    // dashboard user
    public function dashboardUser() {
        dd('Dashboard user');
    }
}
