<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'id'=>'1',
            'category'=>'Makanan',
            'itemname'=>'Chitato 68gr',
            'price'=>'15000',
            'amount'=>'15',
            'image'=>'assets/65c91bacdcc95_Chitato 68gr.jpg',
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta')
        ]);
        DB::table('items')->insert([
            'id'=>'2',
            'category'=>'Makanan',
            'itemname'=>'Chitato Lite 68gr',
            'price'=>'15000',
            'amount'=>'20',
            'image'=>'assets/65c91bd1beb5e_Chitato lite 68 gr.jpg',
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta')
        ]);
        DB::table('items')->insert([
            'id'=>'3',
            'category'=>'Minuman',
            'itemname'=>'Coca cola 395ml',
            'price'=>'3500',
            'amount'=>'35',
            'image'=>'assets/65c91c1b0bfb4_Coca cola 395ml.jpg',
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta')
        ]);
        DB::table('items')->insert([
            'id'=>'4',
            'category'=>'Minuman',
            'itemname'=>'Fanta 1.5L',
            'price'=>'15000',
            'amount'=>'20',
            'image'=>'assets/65c91c8073843_Fanta 1.5L.jpg',
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta')
        ]);
        DB::table('items')->insert([
            'id'=>'5',
            'category'=>'Sepeda',
            'itemname'=>'Sepeda TREX MTB 26 XT 781',
            'price'=>'5500000',
            'amount'=>'5',
            'image'=>'assets/65c91cd1824f4_Sepeda TREX MTB 26 XT 781.png',
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta')
        ]);
    }
}
