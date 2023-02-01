@extends('layouts.index')
<link rel="stylesheet" href="{{ asset('css') }}/history.css" />

@php
    use App\Models\User;
    use App\Models\Queue;
    use Carbon\Carbon;

@endphp

@section('content')
<div class="overlay"></div>

<div class="top-bar">
  <div class="logo">
    <a href="{{ route('index') }}"><img src="{{ asset('img') }}/logo.png" alt=""></a>

  </div>
</div>


<div class="container">

  <div class="header">
    <h3>ประวัติการจอง</h3>
  </div>
  <table class="tb-booking">
    <thead>
      <tr>
        <th>No</th>
        <th>Customer</th>
        <th>Service</th>
        <th>Haircolor</th>
        <th>Staff</th>
        <th>Date</th>
        <th>Time</th>
        <th>Edit</th>
        <th>Cancel</th>
      </tr>
    </thead>
    <tbody>
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

    </tbody>
</table>
{{ $queueList->links() }}

</div>


<div class="menu">
  <ul>
    <li><a href="">ประวัติ</a></li>
    <li><a href="">ออกจากระบบ</a></li>
  </ul>
</div>

@endsection
