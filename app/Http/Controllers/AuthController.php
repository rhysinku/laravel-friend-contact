<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function register(){
        return view('auth.register');
    }

    public function store(){
        
        $validate = request()->validate([
            'name'=> 'required',
            'email' =>'required|email|unique:users,email',
            'password'=>'required|confirmed',
        ]);

      $user = User::create($validate);

      auth()->login($user);
      return(redirect()->route('home'));
    }

    public function login(){
        return view('auth.login');
    }

    public function authenticate(){
        
        $validate = request()->validate([
            'email'=> 'required|email',
            'password'=>'required'
        ]);

       if( auth()->attempt($validate)){
        request()->session()->regenerate();
        return(redirect()->route('home'));
       }

       
       return redirect()->route('login')->withErrors(['error'=>'Invalid credentials']);
    }

    public function logout(){
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerate();

        return redirect()->route('auth.login');
    }
}