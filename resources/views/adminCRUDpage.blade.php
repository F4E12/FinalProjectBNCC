@extends('template')
@section('title', 'Home')
@section('body')
    {{-- VIEW ALL ITEM --}}
    <div class="pilihan">
        <p>Halaman Admin</p>
    </div>
    <div class="category-dropdown">
        Kategori
        <select name="dropdown">
            <option value="all" {{ 'all' == $choose ? 'selected' : '' }}>Semua</option>
            @foreach ($categories as $category)
                <option value="{{ $category }}" {{ $category == $choose ? 'selected' : '' }}>{{ $category }}</option>
            @endforeach
        </select>
    </div>
    <div class="items-admin-container">
        @foreach ($items as $item)
            <div class="item-container">
                <div class="image-catalog">
                    <div class="image-container">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="..." class="item-image">
                    </div>
                </div>
                <div class="category-admin">
                    <p>{{ $item->category }}</p>
                </div>
                <div class="itemname-admin">
                    <p>{{ $item->itemname }}</p>
                </div>
                <div class="price-admin">
                    <p>Rp{{ $item->price }}</p>
                </div>
                <div class="amount-admin">
                    <p>{{ $item->amount }}</p>
                </div>
                <div class="admin-controller">
                    <a href="{{ route('deleteitem', ['id' => $item->id]) }}">Delete</a>
                    <a href="{{ route('updateitem', ['id' => $item->id]) }}">Update</a>
                </div>
            </div>
        @endforeach
    </div>
    <hr>
    {{-- ADD ITEM --}}
    <div class="tambah-admin">
        <div class="tambah-container">
            <h2>Tambah Barang Baru</h2>
            <form action="{{ route('additem') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="category-admin">
                    <p for="category">Kategori Barang</p>
                    <input type="text" name="category" id="" value="{{ Session::get('category') }}">
                </div>
                <div class="itemname-admin">
                    <p for="itemname">Nama Barang</p>
                    <input type="text" name="itemname" id="" value="{{ Session::get('itemname') }}">
                </div>
                <div class="price-admin">
                    <p for="price">Harga Barang</p> <label for="">Rp. </label>
                    <input type="number" name="price" id="" value="{{ Session::get('price') }}" min="1">
                </div>
                <div class="amount-admin">
                    <p for="amount">Jumlah Barang</p>
                    <input type="number" name="amount" id="" value="{{ Session::get('amount') }}">
                </div>
                <div class="image-admin">
                    <p for="image">Masukkan Foto Barang</p>
                    <input type="file" name="image" id="image">
                </div>
                <input type="submit" value="Tambahkan Barang" class="submit-tambah">
            </form>
        </div>
    </div>
    @if ($errors->any())
        <div id="error-sec">
            <div class="">
                @foreach ($errors->all() as $error)
                    {{ $error }} <br>
                @endforeach
            </div>
        </div>
    @endif
@endsection
