<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Queue;
use App\Models\User;


class QueueController extends Controller
{
    function create()
    {
        $user = User::where('status','customer')->get();
        $barber = User::where('status','barber')->get();
        return view('dashboard.admin.queue.create')->with('user',$user)->with('barber',$barber);
    }

    function store(Request $request)
    {
        $request -> validate([
            'user_id' => 'required',
            'barber_id' => 'required',
            'reserve_date' => 'required',
            'reserve_time' => 'required',
        ]);

        $store = Queue::create([
            'user_id' => $request->user_id,
            'barber_id' => $request->barber_id,
            'reserve_date' => $request->reserve_date,
            'reserve_time' => $request->reserve_time,
            'status' => 'รอ',
        ]);

        return redirect()->route('dashboard.queue')->with('success','เพิ่มข้อมูลเรียบร้อย');
    }

    function edit($id)
    {
        $queue = Queue::find($id);
        $user = User::where('status','customer')->get();
        $barber = User::where('status','barber')->get();

        return view('dashboard.admin.queue.edit')->with('queue',$queue)->with('user',$user)->with('barber',$barber);
    }

    function update(Request $request, $id)
    {
        $request -> validate([
            'user_id' => 'required',
            'barber_id' => 'required',
            'reserve_date' => 'required',
            'reserve_time' => 'required',
        ]);


        $update = Queue::find($id)->update([
            'user_id' => $request->user_id,
            'barber_id' => $request->barber_id,
            'reserve_date' => $request->reserve_date,
            'reserve_time' => $request->reserve_time,
        ]);

        return redirect()->route('dashboard.queue')->with('success','อัพเดทข้อมูลเรียบร้อย');
    }

    public function delete($id)
    {
        $delete = Queue::find($id)->forceDelete();
        return redirect()->back()->with('success','ลบข้อมูลเรียบร้อย');
    }
}
