<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("styles/style.css")}}">
    <script src="{{ asset('js/category.js') }}"></script>
    <script src="{{ asset('js/popup.js') }}"></script>
    <title>Register</title>
</head>
<body>
    <div class="login-register-container">
        <h3>Register</h3>
        <div class="form-sec-reg">
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="name">
                    <p id="name-p">Nama Lengkap</p>
                    <input type="text" name="name" id="name-inp" value="{{Session::get('name')}}">
                </div>
                <div class="email">
                    <p id="email-p">Email</p>
                    <input type="email" name="email" id="email-inp" value="{{Session::get('email')}}">
                </div>
                <div class="password">
                    <p id="password-p">Password</p>
                    <input type="password" name="password" id="password-inp" value="{{Session::get('password')}}">
                </div>
                <div class="phonenumber">
                    <p id="phonenumber-p">Nomor Handphone</p>
                    <input type="text" name="phonenumber" id="phonenumber-inp" value="{{Session::get('phonenumber')}}">
                </div>
                <input type="submit" value="Register" class="submit-button">
            </form>
            <div class="hyperlink-sec">
                <p>Sudah punya akun?</p>
                <a href="{{route('loginpage')}}">Masuk sekarang</a>
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
