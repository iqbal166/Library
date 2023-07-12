<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(){
        return view('login/index');
    }

    public function login(Request $request){
        Session::flash('email', $request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' =>'Email wajib diisi',
            'password.required' =>'Password wajib diisi'
        ]);

        $info = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($info)){
            return redirect('/library')->with('success', 'Berhasil Login');
        }else{
            return redirect('/login')->withErrors('Username dan Password yang dimasukkan tidak valid');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login')->with('success', 'Berhasil Logout');
    }

    public function register()
    {
        //
        return view('login.register');
    }

    public function store(Request $request)
    {
        DB::table('users')->insert([
            'name' => $request->uname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            ]);
        return redirect('/login');
    }
}
