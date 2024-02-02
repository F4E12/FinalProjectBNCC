<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id'=>'1',
            'name'=>'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'phonenumber' => '085836725512',
            'adminID' => 'A1',
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta')
        ]);

        DB::table('users')->insert([
            'id'=>'2',
            'name'=>'test 1',
            'email' => 'test1@gmail.com',
            'password' => bcrypt('testing1'),
            'phonenumber' => '085836729381',
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta')
        ]);
    }
}
