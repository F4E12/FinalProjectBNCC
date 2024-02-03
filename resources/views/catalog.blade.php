@extends('template')
@section('title', 'Home')
@section('body')
    <h1>Catalog</h1>
    <h1>ITEM LIST</h1>
    {{-- VIEW ALL ITEM --}}
    @foreach($items as $item)
        <p> Kategory Barang: {{$item->category}}</p>
        <p> Nama Barang: {{$item->itemname}}</p>
        <p> Harga Barang: Rp.{{$item->price}}</p>
        <p> Jumlah Barang: {{$item->amount}}</p>
        <img src="{{ asset('storage/' . $item->image) }}" alt="..." width="250" height="250">
        @if($item->amount===0)
            <h3>Barang sedang habis, silahkan tunggu sampai barang ada kembali :D</h3>
        @else
            <a href="{{ route('addtocart', ['id'=>$item->id]) }}"><button type="button">Tambahkan Keranjang</button></a>
        @endif
        <br>
        <br>
    @endforeach
@endsection
