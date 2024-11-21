<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class DashboardController extends Controller
{
    public function index(){
        $title = "Dashboard";
        $subtitle = [
            'subtitle' => 'Dashboard',
            // 'subs' => 'Dashboard Subs',
            // 'route' => 'dashboard'
        ];
        $countBarang = Barang::count();
        return view('dashboard.index', compact('title','subtitle','countBarang'));
    }
}
