<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function viewitem(){
        $categories = Item::distinct()->pluck('category')->toArray();
        $items = Item::all();
        return view('welcome',compact('items'));
    }
}
