@extends('layouts.dashboard')

@section('content')
@php
    use App\Models\User;
    use App\Models\Queue;
    use Carbon\Carbon;

@endphp
@if ($message = Session::get('success'))
        <div class="alert alert-info text-white">{{ $message }}</div>
    @endif

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
          <div><b>Queue Management</b></div>
          <div><a href="{{ route('queue.create') }}" class="btn btn-info">Create Queue</a></div>
        </div>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table align-items-center mb-0 align-middle text-center">
            <thead>
                <th>รหัส</th>
                <th>ลูกค้า</th>
                <th>เบอร์โทร</th>
                <th>เวลา</th>
                <th>วันที่</th>
                <th>สถานะ</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </thead>

            <tbody>
                @foreach($queue as $row)
                @php
                    if (date('d-m-Y H:i:s',strtotime($row->end)) < date(Carbon::now()->format('d-m-Y H:i:s')))  {
                    $update = Queue::find($row->id)->update(['status' => 'เลยกำหนด']);
                    }

                @endphp
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ User::find($row->user_id)->firstname }} {{ User::find($row->user_id)->lastname }}</td>
                    <td>{{ User::find($row->user_id)->telephone }}</td>
                    <td>{{ date("H", strtotime($row->start)) ." - ". date("H", strtotime($row->start))+1}}</td>
                    <td>{{ date("d-m-Y", strtotime($row->start))}}</td>
                    <td>{{ $row->status }}</td>
                    @if ($row->status == 'เสร็จ'|| $row->status == 'ยกเลิก')
                    <td><a href="/dashboard/queue/update/{{ $row->id.'/'.'รอ' }}" class="btn btn-secondary">เปลี่ยนกลับ</a></td>

                    @else

                    <td><a href="/dashboard/queue/update/{{ $row->id.'/'.'เสร็จ' }}" class="btn btn-warning">เสร็จสิ้น</a></td>
                    @endif
                    <td><a href="/dashboard/queue/update/{{ $row->id.'/'.'ยกเลิก' }}" class="btn btn-primary">ยกเลิก</a></td>

                </tr>
                @endforeach
            </table>
            {{ $queue->links() }}

      </div>
    </div>
  </div>

@endsection
