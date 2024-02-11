@extends('template')
@section('title', 'Home')
@section('body')
    <div class="pilihan" style="margin-left: 50px">
        <p>Keranjang Anda</p>
    </div>
    <div class="kosong">
        @if(!($pesan==1)) <h3>Keranjang kamu masih kosong nihh<br>yukk belanja sekarang</h3>
        @endif
    </div>
    <div class="cart-container">
        <div class="left-cart">
            @foreach($cartItems as $item)
            <div class="cart-item">
                <div class="image-cart">
                    <div class="image-container-cart">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="..." class="item-image">
                    </div>
                </div>
                <div class="item-details-cart">
                    <div class="itemname-cart">
                        <p>{{ $item->itemname }}</p>
                    </div>
                    <div class="category-cart">
                        <p>{{$item->category}}</p>
                    </div>
                    <div class="price-cart">
                        <p>Rp{{ $item->price }}</p>
                    </div>
                </div>
                <div class="cart-controller">
                    <div class="amount-cart">
                        <form action="{{ route('changeamount', ['id'=>$item->id]) }}" method="POST">
                            @csrf
                            <input type="number" name="cartamount" id="amount-cart-input" value="{{ $item->cartamount }}" min="1" max="{{$item->amount+$item->cartamount}}">
                            <button type="submit" id="ubah-cart">Ubah</button>
                        </form>
                    </div>
                    <div class="delete-cart">
                        <a href="{{ route('deletefromcart', ['id'=>$item->itemid]) }}" ><img src="{{ asset('storage/assets/delete.png')}}" alt="Hapus" style="width: 20px"></a>
                    </div>
                    <div class="subtotal-cart">
                        <p>Subtotal</p>
                        <h6>Rp{{ $item->subtotal }}</h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @if(($pesan==1))
        <div class="right-cart">
            <div class="right-cart-container">
                <h3>Ringkasan Belanja</h3>
                <div class="total-cart">
                    <p>Total</p>
                    <h6>Rp{{$total}}</h6>
                </div>
                <hr>
                <form action="{{ route('validatecart')}}" method="POST">
                    @csrf
                    <div class="alamat-cart">
                       <p>Alamat Pengiriman</p>
                        <input type="text" name="address">
                    </div>

                    <div class="kodepos-cart">
                        <p>Kode Pos</p>
                        <input type="number" name="postcode" id="" min="10000" max="99999">
                    </div>

                    <div>
                        <button type="submit" class="pesan-cart" {{ $pesan == 1 ? '' : 'disabled' }}>Pesan</button>
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div>

    @if($errors->any())
        <div id="error-sec">
                <div class="">
                        @foreach($errors->all() as $error)
                            {{ $error }} <br>
                        @endforeach
                </div>
            </div>
    @endif


@endsection
