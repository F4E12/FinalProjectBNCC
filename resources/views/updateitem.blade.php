<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}">
    <script src="{{ asset('js/category.js') }}"></script>
    <script src="{{ asset('js/popup.js') }}"></script>
    <title>Perbarui Barang</title>
</head>

<body>
    <h1 style="text-align: center">Perbarui Barang</h1>
    <div class="tambah-admin">
        <div class="tambah-container" style="width: 35%">
            <form action="{{ route('saveupdate', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="category-admin">
                    <p for="category">Kategori Barang</p>
                    <input type="text" name="category" id="" value="{{ $data->category }}">
                </div>
                <div class="itemname-admin">
                    <p for="itemname">Nama Barang</p>
                    <input type="text" name="itemname" id="" value="{{ $data->itemname }}">
                </div>
                <div class="price-admin">
                    <p for="price">Harga Barang</p> <label for="">Rp. </label>
                    <input type="number" name="price" id="" value="{{ $data->price }}" min=1>
                </div>
                <div class="amount-admin">
                    <p for="amount">Jumlah Barang</p>
                    <input type="number" name="amount" id="" value="{{ $data->amount }}" min=1>
                </div>
                <p for="image-admin">Masukkan Foto Barang</p>
                <input type="file" name="image" id="image" value="{{ $data->image }}">
        </div>

    </div>
    <div class="admin-controller">
        <input type="submit" value="Perbarui Barang">
        <a href="{{ route('adminpage') }}">Back</a>
    </div>
    </form>
    @if($errors->any())
        <div id="error-sec">
            @foreach($errors->all() as $error)
               {{ $error }} <br>
            @endforeach
        </div>
    @endif
</body>

</html>
