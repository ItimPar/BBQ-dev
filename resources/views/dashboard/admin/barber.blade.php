@extends('layouts.dashboard')

@section('content')

@if ($message = Session::get('success'))
        <div class="alert alert-info text-white">{{ $message }}</div>
    @endif

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
          <div><b>Barber Management</b></div>
          <div><a href="{{ route('barber.create')}}" class="btn btn-info">Add Barber</a></div>
        </div>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table align-items-center mb-0 align-middle text-center">
            <thead>
                <th>ลำดับ</th>
                <th>รหัส</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>อีเมล</th>
                <th>ชื่อผู้ใช้</th>
                <th>เบอร์โทร</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </thead>

            <tbody>
                @foreach($barbers as $barber)
                <tr>
                    <td><b>{{ $barbers->firstItem()+$loop->iteration-1 }}</b></td>
                    <td>{{ $barber->id }}</td>
                    <td>{{ $barber->firstname }}</td>
                    <td>{{ $barber->lastname }}</td>
                    <td>{{ $barber->email }}</td>
                    <td>{{ $barber->username }}</td>
                    <td>{{ $barber->telephone }}</td>
                    <td><a href="{{ route('barber.edit',$barber->id)}}" class="btn btn-sm btn-warning">แก้ไข</a></td>
                    <td>
                      <a href="{{ route('barber.delete', $barber->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('คุณต้องการลบใช่หรือไม่?')">ลบ</a>
                    </td>
                </tr>
                @endforeach
            </table>
            {{ $barbers->links() }}

      </div>
    </div>
  </div>

@endsection
