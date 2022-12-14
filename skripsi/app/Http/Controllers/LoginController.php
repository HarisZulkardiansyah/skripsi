<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            return redirect()->intended('home');
        }
        return back()->with('loginError', 'login Gagal !');
           }
    public function logout(Request $request){
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/login');
    }
}
