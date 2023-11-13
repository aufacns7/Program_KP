<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public Function main_dashboard()
    {
        return view('view_sesi');
    }

    // public Function dashboard()
    // {
    //     return view('dashboard');
    // }
    
    

    public function login_proses (Request $request)
    {
        $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ]);

        $data = [
            'email'        => $request->email,
            'password'     => $request->password
        ];

        if(Auth::attempt($data)){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('login')->with('Failed','Email/Password Salah');
        }
    }

    public function logout() 
    {
        Auth::logout();
        return redirect()->route('login')->with('Succes','Kamu Berhasil Logout');
    }

    public function register()
    {
        return view('register');
    }

    public function register_proses(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $data['name']       = $request->name;
        $data['email']      = $request->email;
        $data['password']   = Hash::make($request->password);

        User::create($data);

        $login = [
            'email'        => $request->email,
            'password'     => $request->password
        ];

        if(Auth::attempt($login)){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('login')->with('Failed','Email/Password Salah');
        }
    }
}