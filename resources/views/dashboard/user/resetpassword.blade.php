@extends('layouts.userlayout')
<link rel="stylesheet" href="{{ asset('css') }}/profile.css" />
@section('content')
    <div class="overlay"></div>


    <div class="top-bar">
        <div class="logo">
            <a href="{{ route('index') }}"><img src="{{ asset('img') }}/logo.png" alt=""></a>
        </div>
    </div>

    <div class="container">
        <div class="header">
            <h3>เปลี่ยนรหัสผ่าน</h3>
        </div>
        <section>
            <form method="POST" action="{{ route('dashboard.resetPassword',Auth::user()->id) }}" id="formId">
                @csrf
                <div class="group-input">
                    <div class="password">
                        <label for="password">รหัสผ่าน</label>
                        <input type="password" placeholder="Password" name="password" value=''/>
                    </div>
                    <div class="lname">
                        <label for="confirm-password">ยืนยันรหัส</label>
                        <input type="password" placeholder="Confirm Password" name="password_confirmation" value=''/>
                    </div>
                </div>
                @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
                <div class="btn">
                    <button id="confirm" type="submit">ยืนยัน</button>
                </div>
            </form>

        </section>
    </div>


@endsection
