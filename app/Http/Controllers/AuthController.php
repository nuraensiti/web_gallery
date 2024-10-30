<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //method untuk menampilkan form login
    public function showFormLogin()
    {
        return view('auth.login');
    }

    //method untuk menangani proses login
    public function login(Request $request){
        //validasi request
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required' 
        ]);

        // lakukan proses login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        // jika gagal, kembali ke halaman login
        return back()->with('error', 'Email atau password salah');
    }    

    //method untuk logout
    public function logout(){
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
