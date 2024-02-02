<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function additem(Request $r){
        Session::flash('category', $r->category);
        Session::flash('itemname', $r->itemname);
        Session::flash('price', $r->price);
        Session::flash('amount', $r->amount);
        $r->validate([
            'category'=> [
                'required',
            ],
            'itemname' => [
                'required',
                'min:5',
                'max:80',
            ],
            'price' => [
                'required',
                'gt:0',
            ],
            'amount' => [
                'required',
                'gt:0',
            ],'image' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png',
                'max:10240'
            ]
        ],[
            'category.required' => 'Kategori wajib diisi.',
            'itemname.required' => 'Nama barang wajib diisi.',
            'itemname.min' => 'Nama barang harus terdiri dari minimal 5 karakter.',
            'itemname.max' => 'Nama barang tidak boleh lebih dari 80 karakter.',
            'price.required' => 'Harga barang wajib diisi.',
            'price.gt' => 'Harga barang harus lebih besar dari 0.',
            'amount.required' => 'Jumlah barang wajib diisi.',
            'amount.gt' => 'Jumlah barang harus lebih besar dari 0.',
            'image.required' => 'Gambar harus diisi',
            'image.file' => 'Gambar harus merupakan file',
            'image.mimes' => 'Gambar harus menggunakan extensi .jpg, .jpeg, atau .png',
            'image.max' => 'Ukuran gambar terlalu besar (maksimal 10Mb)',

        ]);

        $uploadFile = $r->file('image');
        $filename = uniqid() . '_' . $uploadFile->getClientOriginalName();
        $imagepath = $uploadFile->storeAs('assets', $filename, 'public');

        Item::create([
            'category'=>$r->category,
            'itemname'=>$r->itemname,
            'price'=>$r->price,
            'amount'=>$r->amount,
            'image'=>$imagepath
        ]);
        return redirect()->route('adminpage');
    }

    public function viewitem(){
        $items=Item::all();
        return view('adminCRUDpage',compact('items'));
    }

    public function deleteitem($id)
    {
        $itemToDelete = Item::find($id);
        $itemToDelete->delete();
        return redirect()->route('adminpage');
    }

    public function updateitem($id){
        $data = Item::find($id);
        return view('updateitem', compact('data'));
    }
    public function saveitem(Request $r, $id){
        $r->validate([
            'category'=> [
                'required',
            ],
            'itemname' => [
                'required',
                'min:5',
                'max:80',
            ],
            'price' => [
                'required',
                'gt:0',
            ],
            'amount' => [
                'required',
                'gt:0',
            ],'image' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png',
                'max:10240'
            ]
        ],[
            'category.required' => 'Kategori wajib diisi.',
            'itemname.required' => 'Nama barang wajib diisi.',
            'itemname.min' => 'Nama barang harus terdiri dari minimal 5 karakter.',
            'itemname.max' => 'Nama barang tidak boleh lebih dari 80 karakter.',
            'price.required' => 'Harga barang wajib diisi.',
            'price.gt' => 'Harga barang harus lebih besar dari 0.',
            'amount.required' => 'Jumlah barang wajib diisi.',
            'amount.gt' => 'Jumlah barang harus lebih besar dari 0.',
            'image.file' => 'Gambar harus merupakan file',
            'image.mimes' => 'Gambar harus menggunakan extensi .jpg, .jpeg, atau .png',
            'image.max' => 'Ukuran gambar terlalu besar (maksimal 10Mb)',
        ]);


        $uploadFile = $r->file('image');
        $filename = uniqid() . '_' . $uploadFile->getClientOriginalName();
        $imagepath = $uploadFile->storeAs('assets', $filename, 'public');

        $data = Item::find($id);
        $data->category = $r->category;
        $data->itemname = $r->itemname;
        $data->price = $r->price;
        $data->amount = $r->amount;
        $data->image = $imagepath;
        $data->save();
        return redirect()->route('adminpage');
    }
}
