<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function viewitem(Request $r){
        $categories = Item::distinct()->pluck('category')->toArray();
        $category = $r->input('category');
        if($category===null){
            $category = 'all';
        }
        if ($category == 'all') {
            $items = Item::all();
        } else {
            $items = Item::where('category', $category)->get();
        }

        $choose = $category;

        return view('catalog',compact('items', 'categories', 'choose'));
    }

    public function addtocart($id)
    {
        //item table
        $item = Item::find($id);
        $item->amount--;
        $item->save();

        //cart table
        $cart = Cart::where('itemid', $id)
            ->where('userid', Auth::user()->id)
            ->first();
        $user = User::find(Auth::user()->id);
        if($cart)
        {
            $totalnow=$cart->cartamount+1;
            $cart->cartamount = $totalnow;
            $subtotal = $totalnow*$item->price;
            $cart->subtotal = $subtotal;
            $cart->save();
            // $user->total+=$subtotal;
            // $user->save();
        }else{
            Cart::create([
                'userid'=>Auth::user()->id,
                'itemid'=>$id,
                'cartamount'=>1,
                'subtotal'=>$item->price
            ]);

            // $user->total+=$item->price;
            $user->save();
        }

        return redirect()->route('catalogpage');
    }
}
