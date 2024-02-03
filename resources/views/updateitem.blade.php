<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Item</title>
</head>
<body>
    <a href="{{route('adminpage')}}"> Back</a>
    <form action="{{route('saveupdate',['id'=>$data->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="category">
            <p for="category">Kategori Barang</p>
            <input type="text" name="category" id="" value="{{$data->category}}">
        </div>
        <div class="itemname">
            <p for="itemname">Nama Barang</p>
            <input type="text" name="itemname" id="" value="{{$data->itemname}}">
        </div>
        <div class="price">
            <p for="price">Harga Barang</p> <label for="">Rp. </label>
            <input type="number" name="price" id="" value="{{$data->price}}">
        </div>
        <div class="amount">
            <p for="amount">Jumlah Barang</p>
            <input type="number" name="amount" id="" value="{{$data->amount}}">
        </div>
        <div class="image">
            <p for="image">Masukkan Foto Barang</p>
            <input type="file" name="image" id="image" value="{{$data->image}}">
        </div>
        <input type="submit" value="Perbarui Barang">
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
</body>
</html>
