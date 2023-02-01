@extends('layouts.userlayout')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
        <h3>โปรไฟล์</h3>
      </div>
      <section>
        <form action="">
          <div class="group-input">
            <div class="fname">
              <label for="fname">ชื่อ</label>
              <input type="text" placeholder="" id="fname" value='{{ $user->firstname }}' disabled/>
            </div>
            <div class="lname">
              <label for="lname">นามสกุล</label>
              <input type="text" placeholder="" id="lname" value='{{ $user->lastname }}' disabled/>
            </div>
          </div>
          <div class="group-input">
            <label for="username">ชื่อผู้ใช้</label>
            <input type="text" placeholder="" id="username" value='{{ $user->username }}' disabled/>
          </div>
          <div class="group-input">
            <label for="pass">รหัสผ่าน</label>
            <input type="password" placeholder="" id="pass" value='**********' disabled/>
          </div>
          <div class="group-input">
            <label for="phone">เบอร์โทรศัพท์</label>
            <input type="text" placeholder="" id="phone" value='{{ $user->telephone }}' disabled/>
          </div>
          <div class="btn">
            <button>แก้ไข</button>
          </div>
        </form>

      </section>
    </div>


@endsection
