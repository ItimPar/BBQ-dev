<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Queue;
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
            'status' => 'customer',
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
            'password' => 'min:8',
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

    function userQueue()
    {
        // check if user is not logged in
        if (!Auth::user()) {
            return redirect('login');
        }
        $barber = User::where('status','barber')->get();
        return view('dashboard.user.userQueue')->with('barber',$barber);

    }

    function userQueueHistory($scope)
    {
        if ($scope == 'active') {
            $queueList = Queue::where('user_id',Auth::user()->id)->where('status', '<>', 'เลยกำหนด')->where('status', '<>', 'ยกเลิก')->orderBy('start', 'DESC')->paginate(8);
        }
        //only active queue list
        else {
            $queueList = Queue::where('user_id',Auth::user()->id)->orderBy('start', 'DESC')->paginate(8);
        }
        return view('dashboard.user.history')->with('queueList',$queueList);
    }

    function userProfile()
    {
        $user = User::find(Auth::user()->id);
        return view('dashboard.user.profile')->with('user',$user);
    }

}
