<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBarang = Barang::count();
        $totalStok   = Barang::sum('stok');
        $totalUser   = User::count();

        return view('dashboard', compact('totalBarang', 'totalStok', 'totalUser'));
    }
}