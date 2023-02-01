@extends('layouts.index')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@php
    use App\Models\User;
    use App\Models\Queue;
    use Carbon\Carbon;

@endphp
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('css') }}/userqueue.css" />
@section('content')
    <div class="overlay"></div>

    <div class="top-bar">
        <div class="logo">
            <a href="{{ route('index') }}"><img src="{{ asset('img') }}/logo.png" alt=""></a>
        </div>
    </div>


    <div class="container" style="height: auto;max-width: 700px">
        <header>
            จองคิว
        </header>
        <main>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>รหัสคิว</th>
                            <th>ชื่อช่าง</th>
                            <th>เบอร์โทร</th>
                            <th>วันที่จอง</th>
                            <th>เวลาที่จอง</th>
                            <th>สถานะ</th>
                            <th>ยกเลิก</th>


                        </tr>
                    </thead>
                    
                    @foreach ($queueList as $row)
                        <tr>
                            @php
                                $date1 = date('m-d-Y H:i:s', strtotime($row->end));
                                $date2 = date('m-d-Y H:i:s', strtotime('now'));
                                if ($date1 < $date2) {
                                    $update = Queue::where('id', $row->id)
                                        ->where('status', 'รอ')
                                        ->first();
                                    if ($update != null) {
                                        $update->update(['status' => 'เลยกำหนด']);
                                    }
                                    // array_push($debugArr,date('d-m-Y H:i:s',strtotime($row->end)).' +++ '. $row->id);
                                }
                            @endphp
                            <td>{{ $row->id }}</td>
                            <td>{{ User::find($row->barber_id)->firstname }} {{ User::find($row->barber_id)->lastname }}
                            </td>
                            <td>{{ User::find($row->barber_id)->telephone }}</td>
                            <td>{{ date('d/m/Y', strtotime($row->start)) }}</td>
                            <td>{{ date('H:i', strtotime($row->start)) . ' - ' . date('H:i', strtotime($row->start) + 1) }}</td>
                            <td>{{ $row->status }}</td>
                            @if ($row->status == 'รอ')
                                <td><a href="/dashboard/queue/update/{{ $row->id . '/' . 'ยกเลิก/' . $row->barber_id }}"
                                        class="" onclick="return confirm('คุณต้องการยกเลิกใช่หรือไม่?')">ยกเลิก</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </table>
                {{ $queueList->links() }}
                @php
                    // dd($debugArr);
                @endphp
            </div>
        </main>
    </div>


    <div class="menu">
        <ul>
            <li><a href="">ข้อมูลส่วนตัว</a></li>
            <li><a href="{{ route('user.queueHistory', 'active') }}">คิว</a></li>
            <li><a href="{{ route('user.queueHistory', 'all') }}">ประวัติ</a></li>
            <form method="POST" action="{{ route('logout') }}" style="width:auto;padding:0">
                @csrf
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                            this.closest('form').submit(); "
                    role="button">
                    {{ __('ออกจากระบบ') }}
                </a>
            </form>
        </ul>
    </div>
@endsection
