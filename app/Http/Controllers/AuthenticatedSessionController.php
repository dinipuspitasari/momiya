<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');  // Mengarahkan ke halaman login
    }

    public function store(Request $request)
    {
        // Validasi input login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt login
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            // Redirect berdasarkan level user
            if ($user->level_id == 1) {
                return redirect()->route('dashboard');
            } elseif ($user->level_id == 2) {
                return redirect()->route('dashboard');
            } elseif ($user->level_id == 3) {
                return redirect()->route('dashboard');
            }
        }

        // Jika login gagal, kembali ke halaman login dengan error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
