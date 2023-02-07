@extends('layouts.userlayout')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@php
    use App\Models\User;
    use App\Models\Queue;
    use Carbon\Carbon;

@endphp
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('css') }}/history.css" />
@section('content')
    <div class="overlay"></div>

    <div class="top-bar">
        <div class="logo">
            <a href="{{ route('index') }}"><img src="{{ asset('img') }}/logo.png" alt=""></a>
        </div>
    </div>


    <div class="container" style="height: auto;max-width: 700px">
        <header>
            การแจ้งเตือน
        </header>
        <main>
            <div class="table-responsive">
                <table class="table">
                    @foreach($noti->notifications()->paginate(5) as $notification)

                <tr>
                    <td>{{ $notification->data['text'] }}</td>
                </tr>
                @endforeach
            </table>
            {{$noti->notifications()->paginate(5)->links()}}

            </div>
        </main>
    </div>



@endsection
