<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("styles/style.css")}}">
    <title>Register</title>
</head>
<body>
    <form action="{{route('register')}}" method="POST">
        @csrf
        <div class="name">
            <p for="name">Nama Lengkap</p>
            <input type="text" name="name" id="" value="{{Session::get('name')}}">
        </div>
        <div class="email">
            <p for="email">Email</p>
            <input type="email" name="email" id="email" value="{{Session::get('email')}}">
        </div>
        <div class="password">
            <p for="password">Password</p>
            <input type="password" name="password" id="" value="{{Session::get('password')}}">
        </div>
        <div class="phonenumber">
            <p for="phonenumber">Nomor Handphone</p>
            <input type="text" name="phonenumber" id="" value="{{Session::get('phonenumber')}}">
        </div>
        <input type="submit" value="Register">
    </form>
    <p>Sudah punya akun?</p>
    <a href="{{route('loginpage')}}">Masuk sekarang</a>
    <div class="error-sec">
        @if($errors->any())
            <div class="">
                    @foreach($errors->all() as $error)
                        {{ $error }} <br>
                    @endforeach
            </div>
        </div>
    @endif
</body>
</html>
