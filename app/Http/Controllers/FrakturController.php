<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Barryvdh\DomPDF\Facade\Pdf as PDF;

class FrakturController extends Controller
{
    public function viewitem(){
        $cartItems = DB::table('carts')
        ->join('items', 'carts.itemid', '=', 'items.id')
        ->get()
        ->where('userid','=',Auth::user()->id);

        $total = Cart::where('userid', Auth::user()->id)->sum('subtotal');

        $user = User::find(Auth::user()->id);
        $user->total = 0;
        $user->save();

        $maxValue = Invoice::max('invoiceid');
        $invoiceid = $maxValue+1;

        foreach ($cartItems as $cartItem) {
            Invoice::create([
                'userid' => Auth::user()->id,
                'itemid' => $cartItem->itemid,
                'cartamount' => $cartItem->cartamount,
                'subtotal' => $cartItem->subtotal,
                'total' => $total,
                'invoiceid' => $invoiceid,
            ]);
        }

        $user = User::find(Auth::user()->id);
        $address = $user->address;
        $postcode = $user->postcode;

        Cart::truncate();

        return view('frakturpage',compact('cartItems', 'total', 'invoiceid', 'address', 'postcode'));
    }

    public function validatecart(Request $r)
    {
        $r->validate([
            'address'=> [
                'required',
                'min:10',
                'max:100',
            ],
            'postcode'=> [
                'required',
                'numeric',
                'digits:5'
            ],
        ],[
            'address.required' => 'Alamat wajib diisi',
            'address.min' => 'Alamat harus lebih dari 10 karakter',
            'address.max' => 'Alamat harus kurang dari 100 karakter',
            'postcode.required' => 'Kode pos wajib diisi',
            'postcode.numeric' => 'Kode pos harus angka',
            'postcode.digits' => 'Kode pos harus 5 digit',
        ]);
        $user = User::find(Auth::user()->id);
        $user->address = $r->address;
        $user->postcode = $r->postcode;
        $user->save();
        return redirect()->route('frakturpage');
    }


    public function printfraktur()
    {
        $maxValue = Invoice::max('invoiceid');
        $invoiceid = $maxValue;

        $cartItems = DB::table('invoices')
        ->join('items', 'invoices.itemid', '=', 'items.id')
        ->get()
        ->where('userid','=',Auth::user()->id)
        ->where('invoiceid', $invoiceid);

        $total = $cartItems->first()->total;

        // dd($cartItems);

        $user = User::find(Auth::user()->id);
        $address = $user->address;
        $postcode = $user->postcode;

        $pdf = PDF::loadView('frakturpage-pdf', compact('cartItems', 'total', 'invoiceid', 'address', 'postcode'));
        return $pdf->download('fraktur'.$invoiceid.'-'.Carbon::now()->format('Y-m-d H:i:s').'.pdf');
    }
}
