<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("styles/style.css")}}">
    <script src="{{ asset('js/category.js') }}"></script>
    <script src="{{ asset('js/popup.js') }}"></script>
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
    </div>
    @if($errors->any())
    <div id="error-sec">
            <div class="">
                    @foreach($errors->all() as $error)
                        {{ $error }} <br>
                    @endforeach
            </div>
        </div>
    @endif
</body>
</html>
