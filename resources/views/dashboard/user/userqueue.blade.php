@extends('layouts.index')
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
            <form action="{{ route('queueCreate') }}" method="POST">
                @csrf
                <div class="group-input">
                    <label for="">เลือกช่าง
                    </label>
                    <select name="barber" id="barber">
                        <option value="" selected disabled>เลือกช่าง</option>"
                        @foreach ($barber as $row)
                            <option value={{ $row->id }}>{{ $row->firstname }} {{ $row->lastname }}</option>
                        @endforeach
                    </select>
                </div>
                @if ($errors->has('barber'))
                    <span class="text-danger">{{ $errors->first('barber') }}</span>
                @endif
                {{-- <div class="group-input">
                    <label for="">เลือกบริการ</label>
                    <input type="radio" name="serve" id="cut">
                    <label for="cut"> ตัดผม</label>
                    <input type="radio" name="serve" id="w">
                    <label for="w"> สระไดร์</label>
                </div> --}}
                {{-- <div class="group-input">
                    <label for="">เลือกสีผม</label>
                    <select name="" id="">
                        <option value="">####</option>
                    </select>
                </div> --}}
                <div class="group-input">
                    <label for="">วันที่</label>
                    <input type="date" name="reserve_date" id="date" disabled>
                </div>
                @if ($errors->has('reserve_date'))
                    <span class="text-danger">{{ $errors->first('reserve_date') }}</span>
                @endif
                <div class="group-input">
                    <label for="">เลือกเวลา</label>
                    <select name="reserve_time" id="time" disabled>

                        <option value="" selected disabled>เลือกเวลา</option>

                        {{-- @foreach ($time as $i)
                        <option value={{ $i }}>{{ $i }} {{ $i }}</option>
                    @endforeach --}}

                    </select>
                </div>
                @if ($errors->has('reserve_time'))
                    <span class="text-danger">{{ $errors->first('reserve_time') }}</span>
                @endif

                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="group-button">
                    <button type="submit">ตกลง</button>
                    <button type="">ยกเลิก</button>
                </div>
            </form>
        </main>
    </div>


    <div class="menu">
        <ul>
            <li><a href="{{ route('user.queueHistory') }}">ประวัติ</a></li>
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
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $("#barber").on('change', function(e) {
            $("#date").prop('disabled', false);
            $("#time").prop('disabled', true);
            $("#time").empty().append('<option value="" selected disabled>เลือกเวลา</option>');

        });


        $("#date").on('change', function(e) {
            var fulldate = new Date($('#date').val());
            var day = fulldate.getDate();
            var month = fulldate.getMonth() + 1;
            var year = fulldate.getFullYear();
            var date = [day, month, year].join('-');

            // e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "{{ route('timePost') }}",
                data: {
                    'date': date,
                    'barber_id': $('#barber').val()
                },
                success: function(data) {
                    $("#time").empty();
                    const datenow = new Date();
                    const date = new Date($('#date').val());
                    if (datenow.getTime() < date.getTime()) {
                        $("#time").append('<option value="" selected disabled>เลือกเวลา</option>')
                        data.forEach(i => {
                            $("#time").prop('disabled', false);
                            $("#time").append('<option value=' + i + '>' + i + ' - ' + (i + 1) +
                                '</option>');
                        });
                    } else {
                        $("#time").append(
                            '<option value="" selected disabled>ไม่สามารถเลือกวันนี้ได้</option>');
                            $("#time").prop('disabled', true);
                    }

                },
                error: function(data) {
                    var errors = data.responseJSON;
                    console.log(data);
                }
            });
        });

        // });
        //     });
    </script>
@endsection
