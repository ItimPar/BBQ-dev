<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Queue;


class DashboardController extends Controller
{
    function index()
    {
        //if user is not authenticated / session is null then redirect to login page
        //Illuminate\Auth\GuardHelpers.php
        if (!Auth::check()) {
            return redirect('login')->with('success','กรุณาเข้าสู่ระบบ');
        }

        //status code 0=member 1=barber 2=admin
        if(Auth::user()->status == "customer"){
            return view('dashboard.user.index');
        }

        if(Auth::user()->status == "barber"){
            return view('dashboard.barber.index');
        }

        if(Auth::user()->status == "admin"){
            return view('dashboard.admin.index');
        }


    }

    function user()
    {
        $users = User::where('status','customer')->paginate(8);

        return view('dashboard.admin.user',compact('users'));
    }

    function barber()
    {
        $barbers = User::where('status','barber')->paginate(8);
        return view('dashboard.admin.barber',compact('barbers'));
    }

    function queue()
    {
        $queue = Queue::paginate(8);
        return view('dashboard.admin.queue',compact('queue'));
    }
}
