@extends('layouts.index')

@section('content')

    <div class="logo">
        <img src="{{ asset('img') }}/logo.png"width="172.09px";
        height="189.81px">
    </div>
    <div class="title-bar"></div>
    <div class="img-bg"></div>
    @guest
    <div class="register">
        <b><a href="{{ route('register') }}">Register</a></b>
    </div>
    <div class="login">
        <b><a href="{{ route('login') }}">Login</a></b>
    </div>
    @else
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <div class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit(); " role="button">
                <i class="fas fa-sign-out-alt"></i>

                {{ __('Log Out') }}
            </a>
        </div>
    </form>


    @endguest
    <div class="queue-top">
        <a href="index.html">จองคิว</a>
    </div>

    <div class="bottom"></div>
    <div class="text-Contract">
        ช่องทางการติดต่อ<br>
        Fb : Parm Weerapat<br>
        Fb : Parinat Kanyala
    </div>
    <div class="text-address">
        ที่อยู่ทางร้าน<br>
        บ้านเลขที่ 255 ถ.บูรพาใน ต.ในเมือง
        อ.เมือง จ.อุบลราชธานี 34000
    </div>

@stop
