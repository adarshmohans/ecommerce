<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController
{
    public function login(){
        return view('login');
    }

    public function doLogin(){
        $input = [
            'email' => request('email'),
            'password' => request('password')
        ] ;
        if(auth()->attempt($input, true)){
            return redirect()->route('home');
        }else{
            return redirect()->route('login')->with('message', 'Login failed' );
        }
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('login');
    }
}
