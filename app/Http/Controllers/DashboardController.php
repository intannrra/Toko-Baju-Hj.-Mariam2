<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Data yang ingin ditampilkan pada dashboard
        $data = [
            'totalUsers' => 100,
            'totalOrders' => 50,
        ];

        return view('dashboard.index', compact('data'));
    }
}
