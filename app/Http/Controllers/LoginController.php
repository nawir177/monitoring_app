<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function authenticate(Request $request){
        $validatedData = $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        if(Auth::attempt($validatedData)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->with('LoginError','Login Failed..!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function register_view(){

        return view('register.register');
    }

    public function register(Request $request){
 
        if($request['password']!== $request['confirm']){
            return back()->with('error','verifikasi password salah');
        }
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Login the user
        auth()->login($user);

        // Redirect the user to the homepage
        return redirect()->route('dashboard');
    }
}
