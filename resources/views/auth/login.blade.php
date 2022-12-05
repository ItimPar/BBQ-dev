<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css') }}/login.css">
    <title>Document</title>
</head>
<body>

    <div class="logo">
        <img src="{{ asset('images') }}/logo.png"width="172.09px";
        height="189.81px">
    </div>
    <div class="title-bar"></div>
    <div class="img-bg"></div>
    <div class="login-box">
        <div class="text-login">
            Login
        </div>


        <div class="username text-white">
            Username
        </div>
        <div class="password text-white">
            Password
        </div>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="in-user">
            <input type="text" name="username" id="username" required autofocus>
            </div>
            <div class="in-pass">
            <input type="password" name="password" id="password" required>
            </div>
            <div class="button">
            <button type="submit" name="signin" >Login</button>
            </div>
        </form>
        <div class="dont">
            Don’t have an account? <g><a href="index.html">Register</a></g>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
