<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function viewitem(){
        $items=Item::all();
        return view('catalog',compact('items'));
    }
}
