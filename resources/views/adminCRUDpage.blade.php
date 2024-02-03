@extends('template')
@section('title', 'Home')
@section('body')
    <form action="{{route('additem')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="category">
            <p for="category">Kategori Barang</p>
            <input type="text" name="category" id="" value="{{Session::get('category')}}">
        </div>
        <div class="itemname">
            <p for="itemname">Nama Barang</p>
            <input type="text" name="itemname" id="" value="{{Session::get('itemname')}}">
        </div>
        <div class="price">
            <p for="price">Harga Barang</p> <label for="">Rp. </label>
            <input type="number" name="price" id="" value="{{Session::get('price')}}">
        </div>
        <div class="amount">
            <p for="amount">Jumlah Barang</p>
            <input type="number" name="amount" id="" value="{{Session::get('amount')}}">
        </div>
        <div class="image">
            <p for="image">Masukkan Foto Barang</p>
            <input type="file" name="image" id="image">
        </div>
        <input type="submit" value="Tambahkan Barang">
    </form>
    <div class="error-sec">
        @if($errors->any())
            <div class="">
                    @foreach($errors->all() as $error)
                        {{ $error }} <br>
                    @endforeach
            </div>
        </div>
    @endif

    <h1>ITEM LIST</h1>
    {{-- VIEW ALL ITEM --}}
    @foreach($items as $item)
        <p> Kategory Barang: {{$item->category}}</p>
        <p> Nama Barang: {{$item->itemname}}</p>
        <p> Harga Barang: Rp.{{$item->price}}</p>
        <p> Jumlah Barang: {{$item->amount}}</p>
        <img src="{{ asset('storage/' . $item->image) }}" alt="..." width="250" height="250">
        <a href="{{ route('deleteitem', ['id'=>$item->id]) }}"><button type="button">Delete</button></a>
        <a href="{{ route('updateitem', ['id'=>$item->id]) }}"><button type="button">Update</button></a>
        <br>
        <br>
    @endforeach

@endsection
