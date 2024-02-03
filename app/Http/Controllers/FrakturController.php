<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\View;

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
        $invoceid = $maxValue+1;

        foreach ($cartItems as $cartItem) {
            Invoice::create([
                'userid' => Auth::user()->id,
                'itemid' => $cartItem->itemid,
                'cartamount' => $cartItem->cartamount,
                'subtotal' => $cartItem->subtotal,
                'total' => $total,
                'invoiceid' => $invoceid,
            ]);
        }

        Cart::truncate();

        return view('frakturpage',compact('cartItems', 'total'));
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
            'address.required' => 'Alamat wajib diisi.',
            'address.min' => 'Alamat harus lebih dari 10 karakter.',
            'address.max' => 'Alamat harus kurang dari 100 karakter.',
            'postcode.required' => 'Kode pos wajib diisi.',
            'postcode.numeric' => 'Kode pos harus angka.',
            'postcode.digits' => 'Kode pos harus 5 digit.',
        ]);
        return redirect()->route('frakturpage');
    }


    public function printfraktur()
    {
        $htmlContent = View::make('frakturpage')->render();

        $pdf = PDF::loadHtml($htmlContent);
        $pdf->save(public_path('frakturpage.pdf'));

        return response()->download(public_path('frakturpage.pdf'));
    }
}
