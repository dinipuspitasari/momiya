<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // $user = Auth::user();

        $getTotalPasien = User::where('level_id', 3)->get()->count();
        // $getTotalAdmin = User::where('id_level', 1)->get()->count();
        // $getTotalTagihanBelumBayar = Tagihan::where('status', 1)->get()->count();
        // $getTotalTagihanSudahBayar = Tagihan::where('status', 2)->get()->count();

        // dd($getTotalPasien);
        return view('dashboard', compact('getTotalPasien'));
    }
    
}

