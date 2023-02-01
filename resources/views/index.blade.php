@extends('layouts.index')

@section('content')
    <div class="overlay"></div>

    <div class="top-bar">
        <div class="logo">
            <a href="{{ route('index') }}"><img src="{{ asset('img') }}/logo.png" alt=""></a>
        </div>
        <div class="top-main">

            @guest
                <div class="register">
                    <a href="{{ route('register') }}">Register</a>
                </div>
                <div class="login">
                    <a href="{{ route('login') }}">Login</a>
                </div>
                <div class="top-queue">
                    <form action="{{ route('user.queue') }}">
                        <button type="submit" class="top-btn-queue">จองคิว</button>
                    </form>
                </div>
            @else
            <div class="top-queue">
                <form action="{{ route('user.queue') }}">
                    <button type="submit" class="top-btn-queue">จองคิว</button>
                </form>
            </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <div class="top-queue">
                        <button class="top-btn-queue" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            this.closest('form').submit(); "
                            role="button" >
                            {{ __('Log Out') }}
                        </button>
                    </div>
                </form>
                @endguest


        </div>

    </div>

    <div class="ctn-main">

        <div class="center-text">
            <h1>Welcome to</h1>
            <div class="center-texts">
                <h1>Barber Shop</h1>
            </div>
            <div class="queue">
                <form action="{{ route('user.queue') }}">
                    <button type="submit" class="btn-queue">จองคิว</button>
                </form>
            </div>
        </div>

        <div class="bottom-bar">
        </div>
    @endsection
