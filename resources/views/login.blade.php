@extends('layouts.index')

@section('content')
<link rel="stylesheet" href="{{ asset('css') }}/login.css" />



<div class="overlay"></div>


    <div class="top-bar">
      <div class="logo">
        <a href="{{ route('index') }}"><img src="{{ asset('img') }}/logo.png" alt="" ></a>
      </div>
    </div>

    <div class="ctn-login">

      <div class="top-log">
        <h1>Login</h1>
      </div>

      <div class="bottom-log">
        <form action="{{ route("login.check") }}" method="post">
            @csrf
          <div class="group-input">
            <label for="username">Username</label>
            <input type="text" id="username" name="username"/>
          </div>
          <div class="group-input">
            <label for="password">Password</label>
            <input type="password" id="password" name="password"/>
          </div>
          @if ($message = Session::get('success'))
    <div class="alert alert-danger">{{ $message }}</div>
@endif
          <div class="dont">
            <span> Don't have an account? <a href="{{ route('register') }}">Register</a></span>
          </div>
          <button type="submit" class="btn-log">Login</button>

        </form>

      </div>
    </div>

@endsection
