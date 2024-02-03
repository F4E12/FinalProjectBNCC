@extends('template')
@section('title', 'Home')
@section('body')
    <h1>KERANJANG</h1>
    @foreach($cartItems as $item)
        <p>User ID: {{ $item->userid }}</p>
        <p>Item Name: {{ $item->itemname }}</p>
        <p>Harga Satuan: {{ $item->price }}</p>
        <form action="{{ route('changeamount', ['id'=>$item->id]) }}" method="POST">
            @csrf
            <input type="number" name="cartamount" id="" value="{{ $item->cartamount }}">
            <button type="submit">Ubah Jumlah Barang</button>
        </form>
        <a href="{{ route('deletefromcart', ['id'=>$item->itemid]) }}"><button type="button">Delete</button></a>
        <p>Subtotal: {{ $item->subtotal }}</p>
        <img src="{{ asset('storage/' . $item->image) }}" alt="..." width="250" height="250">
        <br>
        <br>
    @endforeach

    <p>TOTAL: </p>{{$total}}
    <form action="{{ route('validatecart')}}" method="POST">
        @csrf
        <p>Alamat Pengiriman</p>
        <input type="text" name="address">

        <p>Kode Pos</p>
        <input type="number" name="postcode" id="">

        <button type="submit">Pesan</button>
    </form>
    <div class="error-sec">
        <div class="error-sec">
            @if($errors->any())
                <div class="">
                        @foreach($errors->all() as $error)
                            {{ $error }} <br>
                        @endforeach
                </div>
            </div>
        @endif
        <br>
        <br>
</div>


@endsection
