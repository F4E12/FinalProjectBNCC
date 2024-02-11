<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fraktur</title>
    <style>
        h3{
            margin: 0 0 5px 0;
        }
        h5{
            margin: 0 0 10px 0;
            font-size: 15px;
            font-weight: normal;
        }
        h4{
            margin: 0;
        }
        p{
            margin: 0;
            font-weight: bolder;
        }
    </style>
</head>

<body>
    <h1 class="confirm-fraktur">Pesanan Berhasil Diproses</h1>
    <h2 class="noinv-fraktur">Nomor Invoice: {{ $invoiceid }}</h2>
    <table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Harga Satuan</th>
        <th>Jumlah Barang</th>
        <th>Subtotal</th>
      </tr>
    @foreach ($cartItems as $item)
        <tr>
            <td>{{ $item->itemname }}</td>
            <td>{{ $item->category }}</td>
            <td>Rp{{ $item->price }}</td>
            <td>{{ $item->cartamount }}</td>
            <td>Rp{{ $item->subtotal }}</td>
        </tr>
    @endforeach
    </table>
        <h3>Detail Alamat</h3>
        <p>Alamat</p>
        <h5>{{$address}}</h5>
        <p>Kode Pos</p>
        <h5>{{$postcode}}</h5>
    <h4>Total:</h4> {{$total}}
</body>

</html>
