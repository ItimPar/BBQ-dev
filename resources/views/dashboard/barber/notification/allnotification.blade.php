@extends('layouts.dashboard')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
          <div><b>Notifications</b></div>
        </div>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table align-items-center mb-0 align-middle text-center">
            <tbody>
                @foreach($user->notifications()->paginate(5) as $notification)

                <tr>
                    <td>{{ $notification->data['text'] }}</td>
                </tr>
                @endforeach
            </table>
            {{$user->notifications()->paginate(5)->links()}}

      </div>
    </div>
  </div>

@endsection
