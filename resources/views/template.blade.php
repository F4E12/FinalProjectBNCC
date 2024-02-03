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
    <div class="pages">
        <a href="{{route('welcome')}}">Beranda</a>
        <a href="{{route('cartpage')}}">Cart</a>
        <a href="{{route('catalogpage')}}">Catalog</a>
        @if(Auth::user()->adminID)
            <a href="{{route('adminpage')}}">Halaman Admin</a>
        @endif
    </div>
    @auth
        <form action="{{route('logout')}}" method="get"><input type="submit" value="Log Out"></form>
    @else
        <a href="{{route('loginpage')}}">Login</a>
        <a href="{{route('registerpage')}}">Daftar</a>
    @endauth

    <div style="flex: 1;">
        @yield('body')
    </div>

    {{-- footer --}}

</body>
</html>
