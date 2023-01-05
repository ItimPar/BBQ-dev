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
                @foreach($barbers as $barber)
                <tr>
                    <td>{{ $barber->id }}</td>
                    <td>{{ $barber->firstname }}</td>
                    <td>{{ $barber->lastname }}</td>
                    <td>{{ $barber->email }}</td>
                    <td>{{ $barber->telephone }}</td>
                    <td>{{ $barber->username }}</td>
                    <td>{{ $barber->created_at }}</td>
                    <td><a href="{{ route('barber.edit',$barber->id)}}" class="btn btn-sm btn-warning">แก้ไข</a></td>
                    <td>
                      <a href="{{ route('barber.delete', $barber->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">ลบ</a>
                    </td>
                </tr>
                @endforeach
            </table>
            {{ $barbers->links() }}

      </div>
    </div>
  </div>

@endsection
