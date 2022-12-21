<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    function create()
    {
        return view('user.create');
    }

    function store(Request $request)
    {
        $request -> validate([
            'firstname' => 'required|max: 50',
            'lastname' => 'required|max: 50',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min: 8',
            'telephone' => 'required|digits: 10',
        ]);

        $store = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telephone' => $request->telephone,
        ]);

        return redirect()->route('dashboard.users')->with('success','เพิ่มข้อมูลเรียบร้อย');
    }

    function edit($id)
    {
        $user = User::find($id);
        return view('user.edit',compact('user'));
    }

    function update(Request $request, $id)
    {
        $request -> validate([
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'username' => 'required',
            'email' => 'required',
            'telephone' => 'required',
        ]);


        $update = User::find($id)->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'email' => $request->email,
            'telephone' => $request->telephone,

        ]);

        return redirect()->route('dashboard.users')->with('success','อัพเดทข้อมูลเรียบร้อย');
    }

    public function delete($id)
    {
        $delete = User::find($id)->forceDelete();
        return redirect()->back()->with('success','ลบข้อมูลเรียบร้อย');
    }
}
