@extends('layouts.dashboard')

@section('content')

@if ($message = Session::get('success'))
        <div class="alert alert-info text-white">{{ $message }}</div>
    @endif

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
          <div><b>Users Management</b></div>
          <div><a href="{{ route('user.create') }}" class="btn btn-info">Add User</a></div>
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
                @foreach($users as $user)
                <tr>
                    <td><b>{{ $users->firstItem()+$loop->iteration-1 }}</b></td>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->firstname }}</td>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->telephone }}</td>
                    <td><a href="{{ route('user.edit',$user->id)}}" class="btn btn-sm btn-warning">แก้ไข</a></td>
                    <td>
                      <a href="{{ route('user.delete', $user->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('คุณต้องการลบใช่หรือไม่?')">ลบ</a>
                    </td>
                </tr>
                @endforeach
            </table>
            {{ $users->links() }}

      </div>
    </div>
  </div>

@endsection
