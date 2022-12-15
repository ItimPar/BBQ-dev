@extends('layouts.dashboard')




@section('content')
<div class="card">
    <div class="card-header">
        <b>Users Management</b>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table align-items-center mb-0 align-middle text-center">
            <thead>
                <th>#</th>
                <th>Id</th>
                <th>Name</th>
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
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->telephone }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td><a href="{{ route('editUser',$user->id) }}" class="btn btn-warning btn-sm">แก้ไข</a></td>
                    <td><a href="" class="btn btn-danger btn-sm">ลบ</a></td>
                </tr>
                @endforeach
        </table>
      </div>
    </div>
  </div>
@stop
