@extends('template')
@section('title', 'Home')
@section('body')
    <div class="welcome-text">
        <div class="pilihan">
            <p>SELAMAT DATANG DI WEBSITE PT MEXICO</p>
        </div>
        <h4>Cari barang favorit anda disini !!!</h4>
    </div>
    <div class="items-welcome-container">
        @foreach($items as $item)
            <div class="item-container">
                <a href="{{ route('catalogpage')}}">
                    <div class="image-catalog">
                        <div class="image-container">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="..." class="item-image">
                        </div>
                    </div>
                    <div class="category-catalog"><p>{{$item->category}}</p></div>
                    <div class="itemname-catalog"><p>{{$item->itemname}}</p></div>
                    <div class="price-catalog"><p>Rp{{$item->price}}</p></div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
