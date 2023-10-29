<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'Login' 
        ]);
    }

    // authentifikasi
    public function authenticate(Request $request)
    {
            $credentials =  $request->validate([
            'email' => 'required|email',
            'password' => 'required|'
        ]); 

    // atempt 
    // $request->session()->regenerate(); = mengenerate ulang session (security)
    // jika proses login yg dilakukan credentials berhasil
    if(Auth::attempt($credentials))
    {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }    
    
    // jika yg diatas salah maka lakukan langkah yg di bawah ini
    // back()->with('LoginErrors', 'Login Failed') = flash message
    return back()->with('loginError', 'Login Failed');
    }



    public function logout(Request $request)
    {
        // butuh Auth
        Auth::logout();
        // invalidate session supaya gak bisa dipakai
        $request->session()->invalidate();
        // bikin yg baru supaya gak dibajak
        $request->session()->regenerateToken();
        // lalu balik mau ke halama mana
        return redirect('/login');
    }

}
