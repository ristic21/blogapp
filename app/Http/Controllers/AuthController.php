<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function signIn(Request $request) {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')->withSuccess('Signed in');
        }
        return redirect('signin')->withErrors('Invalid credentials');

    }

    public function signUp(Request $request) {

        if(Auth::check()) {
            return redirect('signup')->withErrors('You are already signed in');
        }

        $request->validate([
            'name'=>'required|min:3|max:255|string',
            'email'=>'required|email|unique:users',
            "password"=>'required|min:5|max:150|string'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $this->signIn($request);

        return redirect('/')->withSuccess('You have signed in');
    }

    public function  signOut() {
        Session::flush();
        Auth::logout();

       return redirect('signin');
        
    }
}
