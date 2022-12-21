<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Hash;

class MainController extends Controller
{
    function login()
    {
        return view('login');
    }

    function loginCheck(Request $request)
    {
        $request -> validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request -> only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('dashboard');
        }

        return redirect('login')->with('success','ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง');
    }

    function register()
    {
        return view('register');
    }

    function registerCheck(Request $request)
    {
        $request -> validate([
            'firstname' => 'required|max: 50',
            'lastname' => 'required|max: 50',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min: 8',
            'telephone' => 'required|digits: 10',
        ]);

        $data = $request->all();

        User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'telephone' => $data['telephone'],
        ]);

        return redirect('login')->with('success', 'สมัครสมาชิกเรียบร้อยแล้ว');
    }

    function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');

    }

}
