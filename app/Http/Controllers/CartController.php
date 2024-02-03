<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function viewitem(){
        $items=Item::all();
        return view('cartpage',compact('items'));
    }
}
