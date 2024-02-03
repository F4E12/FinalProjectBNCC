<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("styles/style.css")}}">
    <title>Login</title>
</head>
<body>
    <form action="{{route('login')}}" method="POST">
        @csrf
        <div class="username">
            <p for="email">Email</p>
            <input type="email" name="email" id="">
        </div>
        <div class="password">
            <p for="password">Password</p>
            <input type="password" name="password" id="">
        </div>
        <input type="submit" value="Login">
    </form>
    <p>Belum punya akun?</p>
    <a href="{{route('registerpage')}}">Buat sekarang</a>
    <div class="error-sec">
        @if($errors->any())
            <div class="">
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
            </div>
        @endif
    </div>

</body>
</html>
