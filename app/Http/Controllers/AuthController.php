<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function registerView(){
        // make a variable that contain random integer between 100000-125000
        $random = rand(100000,125000);
        return view("register", compact('random'));
    }
    public function register(Request $request){
        $validate = $request->validate([
            'username' => 'required',
            'email' => 'required|unique:users|email:dns',
            'password' => 'required',
            'hobby1' => 'required',
            'hobby2' => 'required',
            'hobby3' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'image' => 'required'
        ]);

        $validate['image'] = $request->file('image')->store('image_user');
        $validate['password'] = bcrypt($validate['password']);
        User::create($validate);

        return redirect('/login')->with('registerSuccess','You success register');
    }

    public function login(Request $request){
        $validate = $request->validate([
            'password' => 'required',
            'email' => 'required'
        ]);

        if(Auth::attempt($validate)){
            $request->session()->regenerate();
            return redirect('/home');
        }

        return redirect()->back()->with('loginError', "Login Failed!");
    }

    public function logout(){
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
