<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("styles/style.css")}}">
    <title>@yield('title', 'Default Title')</title>
</head>
<body>
    <div class="navbar">
        <div class="left-nav">
            <a href="{{route('welcome')}}" class="a-page">Beranda</a>
            <a href="{{route('cartpage')}}" class="a-page">Keranjang</a>
            <a href="{{route('catalogpage')}}" class="a-page">Catalog</a>
            @auth
                @if(Auth::user()->adminID)
                    <a href="{{route('adminpage')}}" class="a-page">Halaman Admin</a>
                @endif
            @endauth
        </div>
        <div class="right-nav">
            @auth
                <p>Selamat Datang {{Auth::user()->name}}</p>
                <a href="{{route('logout')}}" class="nav-btn">Keluar</a>
            @else
                <a href="{{route('loginpage')}}" class="nav-btn">Login</a>
                <a href="{{route('registerpage')}}" class="nav-btn">Daftar</a>
            @endauth
        </div>
    </div>

    <div style="flex: 1; margin-top:50px">
        @yield('body')
    </div>

    {{-- footer --}}

</body>
</html>
