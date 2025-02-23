<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }

    // public function login(Request $request)
    // {
    //     $credentials = $request->all();
    //     dd($credentials);
    //     if (Auth::attempt($credentials)) {
    //         // dd('haruse bener');
    //         // Authentication successful, redirect user to a protected page
    //         return redirect()->intended('/');
    //     } else {
    //         // dd('haruse salah');
    //         // Invalid credentials, redirect back to the login page with an error
    //         return redirect()->route('login')->withErrors(['message' => 'salah, coba ulang']);
    //     }
    // }


    public function login(Request $request)
{
    $credentials = $request->only('password');
    
    // Check if the input contains '@'
    if (strpos($request->input('email'), '@') !== false) {
        // If '@' is present, search for 'email' field
        $credentials['email'] = $request->input('email');
    } else {
        // If '@' is not present, search for 'nik' field
        $credentials['nik'] = $request->input('email');
        unset($credentials['email']); // Remove the 'email' key from credentials
    }

    if (Auth::attempt($credentials)) {
        // Authentication successful, redirect user to a protected page
        return redirect()->intended('/');
    } else {
        // Invalid credentials, redirect back to the login page with an error
        return redirect()->route('login')->withErrors(['message' => 'Invalid credentials, please try again']);
    }
}


    public function logout()
    {
        auth()->logout();

        return redirect('/login');
    }
}
