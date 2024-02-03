<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Pesanan Berhasil Di Proses</h1>
    <h2>Nomor Invoice: </h2>
    @foreach($cartItems as $item)
        <p>Item Name: {{ $item->itemname }}</p>
        <p>Harga Satuan: {{ $item->price }}</p>
        <p>Jumlah Barang: {{ $item->cartamount }}</p>
        <p>Subtotal: {{ $item->subtotal }}</p>
        <p>Total: {{ $total }}</p>
        <img src="{{ asset('storage/' . $item->image) }}" alt="..." width="250" height="250">
    @endforeach
    <a href="{{route('printfraktur')}}">Cetak Fraktur</a>
    <a href="{{route('catalogpage')}}">Back</a>
</body>
</html>
