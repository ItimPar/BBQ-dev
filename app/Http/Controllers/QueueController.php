<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Queue;
use App\Models\User;
use App\Notifications\QueueNotification;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;


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
            'start' => 'required',
            'end' => 'required',
        ]);

        $store = Queue::create([
            'user_id' => $request->user_id,
            'barber_id' => $request->barber_id,
            'start' => $request->start,
            'end' => $request->end,
            'status' => 'รอ',
        ]);

        return redirect()->route('dashboard.queue')->with('success','เพิ่มข้อมูลเรียบร้อย');
    }

    function edit($id)
    {
        $queue = Queue::find($id);
        $user = User::where('status','customer')->get();
        $barber = User::where('status','barber')->get();

        return view('dashboard.admin.queue.edit')->with('queue',$queue)->with('user',$user)->with('barber',$barber)->with('queue',$queue);
    }

    function update(Request $request, $id)
    {
        $request -> validate([
            'user_id' => 'required',
            'barber_id' => 'required',
            'start' => 'required',
            'end' => 'required',
            'status' => 'required',
        ]);


        $update = Queue::find($id)->update([
            'user_id' => $request->user_id,
            'barber_id' => $request->barber_id,
            'start' => $request->start,
            'end' => $request->end,
            'status' => $request->status,

        ]);

        return redirect()->route('dashboard.queue')->with('success','อัพเดทข้อมูลเรียบร้อย');
    }

    function delete($id)
    {
        $delete = Queue::find($id)->forceDelete();
        return redirect()->back()->with('success','ลบข้อมูลเรียบร้อย');
    }

    function changeStatus($id,$status,$barber=null)
    {

        if ($barber != null) {
        $queueData = Queue::find($id);
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $queueData->start);
        $text = 'รหัสคิว '.$id.' วันที่ '.$date->day.'-'.$date->month.'-'.$date->year.' '.$date->hour.'-'.($date->hour+1).' ถูก '.$status;
        $barber = User::find($barber)->first();
        Notification::send($barber, new QueueNotification($text,$id));
        }
        $update = Queue::find($id)->update([
            'status' => $status,
        ]);


        return redirect()->back()->with('success','แก้ไขเรียบร้อย');
    }



}
