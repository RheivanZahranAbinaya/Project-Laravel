<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    // ===== LOGIN =====
    public function loginForm() {
        return view('login');
    }

    public function login(Request $request)
{
    $user = DB::table('users')
        ->where('email', $request->email)
        ->where('password', $request->password)
        ->first();

    if (!$user) {
        return back()->with('error', 'Login gagal');
    }

    session(['user' => $user]);

    return redirect('/');
}


    // ===== REGISTER =====
    public function registerForm() {
        return view('register');
    }

    public function register(Request $request) {
        DB::table('users')->insert([
            'email' => $request->email,
            'password' => md5($request->password)
        ]);

        return redirect('/login');
    }

    // ===== LOGOUT =====
    public function logout() {
        session()->flush();
        return redirect('/login');
    }

    // ===== HOME (index.php) =====
    public function home()
{
    if (!session('user')) {
        return redirect('/login');
    }

    return view('home');
}


    // ===== SUBMIT.PHP =====
    public function submit(Request $request) {
        DB::table('data')->insert($request->all());
        return redirect('/');
    }

    // ===== VIEW.PHP =====
    public function viewData() {
        $data = DB::table('data')->get();
        return view('view', compact('data'));
    }
}
