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
            <form method="POST" action={{ route('dashboard.updateUser',Auth::user()->id) }} id="formId">
                @csrf

                <div class="group-input">
                    <div class="fname">
                        <label for="fname">ชื่อ</label>
                        <input type="text" placeholder="" id="fname" name="firstname" value='{{ $user->firstname }}'
                            disabled="disable" />
                    </div>
                    <div class="lname">
                        <label for="lname">นามสกุล</label>
                        <input type="text" placeholder="" id="lname" name="lastname" value='{{ $user->lastname }}' disabled />
                    </div>
                </div>
                <div class="group-input">
                    <label for="username">ชื่อผู้ใช้</label>
                    <input type="text" placeholder="" id="username" name="username" value='{{ $user->username }}' disabled />
                </div>
                <div class="group-input">
                    <label for="email">อีเมล</label>
                    <input type="email" placeholder="" id="email" name="email" value='{{ $user->email }}' disabled />
                </div>
                <div class="group-input">
                    <label for="pass">รหัสผ่าน</label>
                    <input type="password" placeholder="" id="pass" name="password" value="********" disabled />
                    <div class="btn">
                        <button class="btn-resetpassword"><a href="{{ route('dashboard.view_resetPassword') }}">เปลี่ยนรหัสผ่าน</a> </button>
                    </div>
                </div>
                <div class="group-input">
                    <label for="phone">เบอร์โทรศัพท์</label>
                    <input type="text" placeholder="" id="phone" name="telephone" value='{{ $user->telephone }}' disabled />
                </div>
                <div class="btn">
                    <button id="edit-confirm" type="submit">ยืนยัน</button>
                    <button id="edit-toggle">แก้ไข</button>
                </div>
            </form>

        </section>
    </div>

    <script>
        $('#edit-confirm').hide()
        $("#edit-toggle").on('click', function() {
            event.preventDefault();
            $("#formId :input").prop("disabled", function(index, value) {
                return !value;
            });
            $('#pass').prop("disabled", true);
            $('#formId :button').prop("disabled", false);
            $('#edit-confirm').toggle();
        });


    </script>
@endsection
