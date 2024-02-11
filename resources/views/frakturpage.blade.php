<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}">
    <title>Fraktur</title>
</head>

<body>
    <h1 class="confirm-fraktur">Pesanan Berhasil Diproses</h1>
    <h2 class="noinv-fraktur">Nomor Invoice: {{ $invoiceid }}</h2>
    <div class="fraktur-container">
        <div class="left-fraktur">
            @foreach ($cartItems as $item)
                <div class="fraktur-item">
                    <div class="image-fraktur">
                        <div class="image-container-fraktur">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="..." class="item-image">
                        </div>
                    </div>
                    <div class="item-details-fraktur">
                        <div class="itemname-fraktur">
                            <p>{{ $item->itemname }}</p>
                        </div>
                        <div class="category-fraktur">
                            <p>{{ $item->category }}</p>
                        </div>
                        <div class="price-fraktur">
                            <p>Rp{{ $item->price }}</p>
                        </div>
                    </div>
                <div class="amount-fraktur">
                    <p>Jumlah Barang</p>
                    <h6>{{ $item->cartamount }}</h6>
                </div>
                <div class="subtotal-fraktur">
                    <p>Subtotal</p>
                    <h6>Rp{{ $item->subtotal }}</h6>
                </div>
            </div>
        @endforeach
    </div>
    <div class="right-fraktur">
        <div class="total-fraktur">
            <p>Total</p>
            <h6>Rp{{ $total }}</h6>
        </div>
        <hr>
        <div class="detail-alamat-fraktur">
            <h3>Detail Alamat</h3>
            <p>Alamat</p>
            <h5>{{$address}}</h5>
            <p>Kode Pos</p>
            <h5>{{$postcode}}</h5>
        </div>
    </div>
    </div>
    <div class="fraktur-controller">
        <a href="{{ route('printfraktur') }}">Cetak Fraktur</a>
        <a href="{{ route('catalogpage') }}">Back</a>
    </div>
</body>

</html>
