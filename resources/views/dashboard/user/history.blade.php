@extends('layouts.index')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@php
    use App\Models\User;

@endphp
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('css') }}/userqueue.css" />
@section('content')
    <div class="overlay"></div>

    <div class="top-bar">
        <div class="logo">
            <a href="{{ route('index') }}"><img src="{{ asset('img') }}/logo.png" alt=""></a>
        </div>
    </div>


    <div class="container">
        <header>
            จองคิว
        </header>
        <main>
            <div class="table-responsive">
                <table class="table" >
                    <thead>
                        <tr>
                            <th>รหัสคิว</th>
                    <th>ชื่อช่าง</th>
                    <th>เบอร์โทร</th>
                    <th>วันที่จอง</th>
                    <th>เวลาที่จอง</th>
                    <th>สถานะ</th>

                        </tr>
                    </thead>

                    @foreach ($queueList as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ User::find($row->barber_id)->username }}</td>
                            <td>{{ User::find($row->barber_id)->telephone }}</td>
                            <td>{{ date("Y-m-d", strtotime($row->start))}}</td>
                            <td>{{ date("H", strtotime($row->start)) ." - ". date("H", strtotime($row->start))+1}}</td>
                            <td>{{ $row->status }}</td>
                        </tr>
                    @endforeach
                </table>
              </div>
        </main>
    </div>


    <div class="menu">
        <ul>
            <li><a href="">ประวัติ</a></li>
            <form method="POST" action="{{ route('logout') }}" style="width:auto;padding:0">
                @csrf
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                            this.closest('form').submit(); "
                    role="button">
                    {{ __('ออกจากระบบ') }}
                </a>
            </form>
        </ul>
    </div>

@endsection
