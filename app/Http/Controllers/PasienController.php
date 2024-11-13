<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PasienController extends Controller
{
    public function index()
    {
        $users = User::where('level_id', '=', 3)->get();
        return view('pasien.index', compact('users'));
    }
}