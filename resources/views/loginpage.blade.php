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
    <div class="login-register-container">
        <h3>Login</h3>
        <div class="form-sec-login">
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="email">
                    <p id="email-p">Email</p>
                    <input type="email" name="email" id="email-inp">
                </div>
                <div class="password">
                    <p id="password-p">Password</p>
                    <input type="password" name="password" id="email-inp">
                </div>
                <input type="submit" value="Login" class="submit-button">
            </form>
            <div class="hyperlink-sec">
                <p>Belum punya akun?</p>
                <a href="{{route('registerpage')}}">Buat sekarang</a>
            </div>
        </div>
        <div class="error-sec">
            @if($errors->any())
                <div class="">
                        @foreach($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                </div>
            @endif
        </div>
    </div>
</body>
</html>
