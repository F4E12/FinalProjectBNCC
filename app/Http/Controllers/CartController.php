<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CartController extends Controller
{
    public function viewitem(){
        $cartItems = DB::table('carts')
        ->join('items', 'carts.itemid', '=', 'items.id')
        ->get()
        ->where('userid','=',Auth::user()->id);

        $total = Cart::where('userid', Auth::user()->id)->sum('subtotal');

        $user = User::find(Auth::user()->id);
        $user->total = $total;
        $user->save();

        return view('cartpage',compact('cartItems', 'total'));
    }

    public function changeamount(Request $r, $id)
    {
        $cart = Cart::where('itemid', $id)
            ->where('userid', Auth::user()->id)
            ->first();
        $beforeamount = $cart->cartamount;

        $item = Item::find($cart->itemid);
        $maxItem = $item->amount+$beforeamount;

        $r->validate([
            'cartamount'=> [
                'required',
                'gt:0',
                'lt:'.$maxItem+1
            ],
        ],[
            'cartamount.required' => 'Jumlah barang wajib diisi.',
            'cartamount.gt' => 'Jumlah barang harus lebih besar dari 0.',
            'cartamount.lt' => 'Jumlah barang harus kurang dari atau sama dengan '.$maxItem,
        ]);

        $cart->cartamount = $r->cartamount;
        $cart->save();

        $afteramount = $item->amount+$beforeamount-$r->cartamount;
        $item->amount= $afteramount;
        $item->save();

        $subtotalbefore = $cart->subtotal;
        $subtotal = $r->cartamount*$item->price;
        $cart->subtotal = $subtotal;
        $cart->save();

        $user = User::find(Auth::user()->id);
        // $user->total=$user->total-$subtotalbefore+$subtotal;
        $user->save();

        return redirect()->route('cartpage');
    }

    public function saveinvoice()
    {

    }

    public function deletefromcart($id)
    {
        $cart = Cart::where('itemid', $id)
        ->where('userid', Auth::user()->id)
        ->first();

        $item = Item::find($cart->itemid);
        $item->amount= $item->amount+$cart->cartamount;
        $item->save();

        $user = User::find(Auth::user()->id);
        // $user->total=$user->total-$cart->subtotal;
        $user->save();

        $cart->delete();

        return redirect()->route('cartpage');
    }
}
