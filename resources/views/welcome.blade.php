<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css') }}/style.css">
    <title>Main</title>
</head>
<body>
    <div class="logo">
        <img src="{{ asset('images') }}/logo.png"width="172.09px";
        height="189.81px">
    </div>
    <div class="title-bar"></div>
    <div class="img-bg"></div>
    <div class="register">
        <b><a href="{{ route('register') }}">Register</a></b>
    </div>
    <div class="login">
        <b><a href="{{ route('login') }}">Login</a></b>
    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
