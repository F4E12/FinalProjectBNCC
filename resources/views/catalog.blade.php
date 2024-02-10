@extends('template')
@section('title', 'Home')
@section('body')
    {{-- VIEW ALL ITEM --}}
    <div class="pilihan">
        <p>Catalog Kami</p>
    </div>
    <div class="catalog-container">
        @foreach($items as $item)
            <div class="item-container">
                <div class="image-catalog">
                    <div class="image-container">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="..." class="item-image">
                    </div>
                </div>
                <div class="itemname-catalog">
                    <p>{{$item->itemname}}</p>
                </div>
                <div class="category-catalog">
                    <p>{{$item->category}}</p>
                </div>
                <div class="price-catalog">
                    <p>Rp{{$item->price}}</p>
                </div>
                <div class="amount-catalog">
                    <p>{{$item->amount}} tersedia</p>
                </div>
                <div class="buy-catalog">
                    @if($item->amount===0)
                        <h3>Barang sedang habis, silahkan tunggu sampai barang ada kembali :D</h3>
                    @else
                        <a href="{{ route('addtocart', ['id'=>$item->id]) }}">Tambahkan Keranjang</a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
