@extends('layouts.dashboard')

@section('content')
@php
    use App\Models\User;

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
                <th>Id</th>
                <th>User</th>

                <th>Start</th>
                <th>End</th>
                <th>Created</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>

            <tbody>
                @foreach($queue as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ User::find($row->user_id)->firstname }} {{ User::find($row->user_id)->lastname }}</td>

                    <td>{{ $row->start }}</td>
                    <td>{{ $row->end }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>{{ $row->status }}</td>
                    <td><a href="{{ route('queue.edit',$row->id)}}" class="btn btn-sm btn-warning">แก้ไข</a></td>
                    <td>
                      <a href="{{ route('queue.delete', $row->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">ลบ</a>
                    </td>
                </tr>
                @endforeach
            </table>
            {{ $queue->links() }}

      </div>
    </div>
  </div>

@endsection
