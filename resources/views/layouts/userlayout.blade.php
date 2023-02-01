<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ asset('css') }}/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>


    {{-- <title>Barber Queue</title> --}}
    <title>{{ ucfirst(Request::route()->getName()) }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="menu">
        <ul>
            <li><a href="{{ route('user.profile') }}">ข้อมูลส่วนตัว</a></li>
            <li><a href="{{ route('user.queueHistory', 'active') }}">คิว</a></li>
            <li><a href="{{ route('user.queueHistory', 'all') }}">ประวัติ</a></li>
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

        @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
