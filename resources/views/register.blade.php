@extends('layouts.index')

@section('content')
<link rel="stylesheet" href="{{ asset('css') }}/register.css" />
    <div class="overlay"></div>

    <div class="top-bar">
        <div class="logo">
            <img src="{{ asset('img') }}/logo.png" alt="">
        </div>
    </div>

    <div class="ctn-reg">

        <div class="top-reg">
            <h1>Register</h1>
        </div>

        <div class="bottom-reg">
            <form action="{{ route("register.check") }}" method="post">
                @csrf
                <div class="group-input">
                    <label for="fistname">Fisrt Name</label>
                    <input type="text" name="fistname" id="fistname"/>
                </div>
                <div class="group-input">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" id="lastname"/>
                </div>
                <div class="group-input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username"/>
                </div>
                <div class="group-input">
                    <label for="telephone">Phone</label>
                    <input type="text" name="telephone" id="telephone"/>
                </div>
                <div class="group-input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email"/>
                </div>
                <div class="group-input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password"/>
                </div>
                <div class="group-input">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" name="confirm-password" />
                </div>

                <button type="submit" class="btn-reg">Register</button>
            </form>
        </div>
    </div>
@endsection
