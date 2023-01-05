@extends('layouts.index')

@section('content')
    <link rel="stylesheet" href="{{ asset('css') }}/register.css" />
    <div class="overlay"></div>

    <div class="top-bar">
        <div class="logo">
            <a href="{{ route('index') }}"><img src="{{ asset('img') }}/logo.png" alt="" ></a>
        </div>
    </div>

    <div class="ctn-reg">

        <div class="top-reg">
            <h1>Register</h1>
        </div>

        <div class="bottom-reg">
            <form action="{{ route('register.check') }}" method="post">
                @csrf
                <div class="group-input">
                    <label for="firstname">Fisrt Name</label>
                    <input type="text" name="firstname" id="firstname" />
                </div>
                @if ($errors->has('firstname'))
                    <span class="text-danger">{{ $errors->first('firstname') }}</span>
                @endif


                <div class="group-input">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" id="lastname" />
                </div>
                @if ($errors->has('lastname'))
                    <span class="text-danger">{{ $errors->first('lastname') }}</span>
                @endif


                <div class="group-input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" />
                </div>
                @if ($errors->has('username'))
                    <span class="text-danger">{{ $errors->first('username') }}</span>
                @endif


                <div class="group-input">
                    <label for="telephone">Phone</label>
                    <input type="text" name="telephone" id="telephone" />
                </div>
                @if ($errors->has('telephone'))
                    <span class="text-danger">{{ $errors->first('telephone') }}</span>
                @endif


                <div class="group-input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" />
                </div>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif


                <div class="group-input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" />
                </div>
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif


                <div class="group-input">
                    <label for="password_confirm">Confirm Password</label>
                    <input type="password" name="password_confirm" />
                </div>
                @if ($errors->has('password_confirm'))
                    <span class="text-danger">{{ $errors->first('password_confirm') }}</span>
                @endif

                <button type="submit" class="btn-reg">Register</button>
            </form>
        </div>
    </div>
@endsection
