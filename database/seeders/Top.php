<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\str;

class Top extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('top')->insert([
            'music'=>Str::random(15),
            'picture'=>Str::random(15),
            'text'=>Str::random(15),
            'text1'=>Str::random(15),
            'key_out'=> 100 ,
        ]);
        DB::table('top')->insert([
            'music'=>Str::random(15),
            'picture'=>Str::random(15),
            'text'=>Str::random(15),
            'text1'=>Str::random(15),
            'key_out'=> 200 ,
        ]);
        DB::table('top')->insert([
            'music'=>Str::random(15),
            'picture'=>Str::random(15),
            'text'=>Str::random(15),
            'text1'=>Str::random(15),
            'key_out'=> 300 ,
        ]);
        DB::table('top')->insert([
            'music'=>Str::random(15),
            'picture'=>Str::random(15),
            'text'=>Str::random(15),
            'text1'=>Str::random(15),
            'key_out'=> 400 ,
        ]);
        DB::table('top')->insert([
            'music'=>Str::random(15),
            'picture'=>Str::random(15),
            'text'=>Str::random(15),
            'text1'=>Str::random(15),
            'key_out'=> 500 ,
        ]);
        DB::table('top')->insert([
            'music'=>Str::random(15),
            'picture'=>Str::random(15),
            'text'=>Str::random(15),
            'text1'=>Str::random(15),
            'key_out'=> 600 ,
        ]);
        DB::table('top')->insert([
            'music'=>Str::random(15),
            'picture'=>Str::random(15),
            'text'=>Str::random(15),
            'text1'=>Str::random(15),
            'key_out'=> 700 ,
        ]);
        DB::table('top')->insert([
            'music'=>Str::random(15),
            'picture'=>Str::random(15),
            'text'=>Str::random(15),
            'text1'=>Str::random(15),
            'key_out'=> 800 ,
        ]);
    }
}
