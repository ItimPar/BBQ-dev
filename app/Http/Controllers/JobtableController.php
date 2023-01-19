<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Jobtable;
use App\Models\User;
use App\Models\Queue;
use Carbon\Carbon;


class JobtableController extends Controller
{
    // function checkTime($date,$time)
    // {
    //     $user = Jobtable::where('start',">=",$time)->where('end',"<=",$time+1)
    //         ->first();
    //         if ($user != null) {
    //             return true;
    //         }
    //     return false;
    // }

        function create(Request $request)
        {
            $request -> validate([

                'barber' => 'required',
                'reserve_date' => 'required',
                'reserve_time' => 'required',
            ]);

            $date = $request->reserve_date;
            $time = $request->reserve_time;
            $starttime = Carbon::createFromFormat('Y-m-d H', $date.' '.$time)->toDateTimeString();
            $endtime = Carbon::createFromFormat('Y-m-d H', $date.' '.($time+1).'')->toDateTimeString();

            $qstore = Queue::create([
                'user_id' => $request->user_id,
                'barber_id' => $request->barber,
                'start' => $starttime,
                'end' => $endtime,
                'status' => 'รอ',
            ]);

            $queue = Queue::where('start',$starttime)->first();

            $jstore = Jobtable::create([
                'queue_id' => $queue->id,
                'user_id' => $request->user_id,
                'barber_id' => $request->barber,
                'title' => $time." - ".($time+1)." ".User::find($request->user_id)->firstname ." ". User::find($request->user_id)->lastname ,
                'start' => $starttime,
                'end' => $endtime,
            ]);

            return view('index');
        }

    function getTimePost(Request $request)
    {

        // $data = $_GET['data'];
        $date = $request->get('date');
        $barber = $request->get('barber_id');
        // '19-1-2023'


        $time = [];
        $start = 9;
        $end = 18;
        $inteval = 1;
        // $new = strtotime($date);
        while ($start < $end) {
            $starttime = Carbon::createFromFormat('d-m-Y H', $date.' '.$start)->toDateTimeString();
            $endtime = Carbon::createFromFormat('d-m-Y H', $date.' '.($start+$inteval).'')->toDateTimeString();
            $user = Jobtable::where('barber_id',$barber)->where('start',">=",''.$starttime)->where('end',"<=",''.$endtime)->first();
            if ($user == null) {
                array_push($time,$start);
            }
            $start+=$inteval;
        }

        $barber = User::where('status','barber')->get();

        return response()->json($time);
    }

/**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = Jobtable::where('start', '>=', $request->start)
                       ->where('end',   '<=', $request->end)->where('barber_id',Auth::user()->id)
                       ->get(['id', 'title', 'start', 'end']);

            return response()->json($data);
        }

        return view('dashboard.barber.calendar');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function ajax(Request $request)
    {
        // switch ($request->type) {
        //    case 'add':
        //         $event = Event::create([
        //             'title' => $request->title,
        //             'start' => $request->start,
        //             'end' => $request->end,
        //         ]);

        //         return response()->json($event);
        //     break;

        //     case 'update':
        //         $event = Event::find($request->id)->update([
        //             'title' => $request->title,
        //             'start' => $request->start,
        //             'end' => $request->end,
        //         ]);

        //         return response()->json($event);
        //     break;

        //     case 'delete':
        //         $event = Event::find($request->id)->delete();

        //         return response()->json($event);
        //     break;

        //     default:
        //     # code...
        //     break;
        // }
    }
}
