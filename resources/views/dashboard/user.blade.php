@extends('layouts.dashboard')

@section('content')

@if ($message = Session::get('success'))
        <div class="alert alert-info text-white">{{ $message }}</div>
    @endif

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
          <div><b>Users Management</b></div>
          <div><a href="{{ route('user.create') }}" class="btn btn-info">Create User</a></div>
        </div>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table align-items-center mb-0 align-middle text-center">
            <thead>
                <th>#</th>
                <th>Id</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Tel</th>
                <th>Username</th>
                <th>Created</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>

            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $users->firstItem()+$loop->iteration-1 }}</td>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->firstname }}</td>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->telephone }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td><a href="{{ route('user.edit',$user->id)}}" class="btn btn-sm btn-warning">แก้ไข</a></td>
                    <td>
                      <a href="{{ route('user.delete', $user->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">ลบ</a>
                    </td>
                </tr>
                @endforeach
            </table>
            {{ $users->links() }}

      </div>
    </div>
  </div>

@endsection
