<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginAuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function show(){
        return view("auth.show");
    }

    public function login(LoginAuthRequest $request)
    {
       $credentials = $request->safe(['email','password']);
   
       if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('games.index');
        }
        return back()->withErrors(['email'=> 'The provided email and password does not match'
        ])->onlyInput('email');


    }
    

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login');

    }
}
