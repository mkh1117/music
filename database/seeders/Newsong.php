<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\str;


class Newsong extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('newsong')->insert([
            'music'=>Str::random(15),
            'picture'=>Str::random(15),
            'text'=>Str::random(15),
            'text1'=>Str::random(15),
            'keyout'=> 100,
        ]);
        DB::table('newsong')->insert([
            'music'=>Str::random(15),
            'picture'=>Str::random(15),
            'text'=>Str::random(15),
            'text1'=>Str::random(15),
            'keyout'=> 200,
        ]);
        DB::table('newsong')->insert([
            'music'=>Str::random(15),
            'picture'=>Str::random(15),
            'text'=>Str::random(15),
            'text1'=>Str::random(15),
            'keyout'=> 300,
        ]);
        DB::table('newsong')->insert([
            'music'=>Str::random(15),
            'picture'=>Str::random(15),
            'text'=>Str::random(15),
            'text1'=>Str::random(15),
            'keyout'=> 400,
        ]);
        DB::table('newsong')->insert([
            'music'=>Str::random(15),
            'picture'=>Str::random(15),
            'text'=>Str::random(15),
            'text1'=>Str::random(15),
            'keyout'=> 500,
        ]);
        DB::table('newsong')->insert([
            'music'=>Str::random(15),
            'picture'=>Str::random(15),
            'text'=>Str::random(15),
            'text1'=>Str::random(15),
            'keyout'=> 600,
        ]);
        DB::table('newsong')->insert([
            'music'=>Str::random(15),
            'picture'=>Str::random(15),
            'text'=>Str::random(15),
            'text1'=>Str::random(15),
            'keyout'=> 700,
        ]);
        DB::table('newsong')->insert([
            'music'=>Str::random(15),
            'picture'=>Str::random(15),
            'text'=>Str::random(15),
            'text1'=>Str::random(15),
            'keyout'=> 800,
        ]);
        DB::table('newsong')->insert([
            'music'=>Str::random(15),
            'picture'=>Str::random(15),
            'text'=>Str::random(15),
            'text1'=>Str::random(15),
            'keyout'=> 900,
        ]);
        DB::table('newsong')->insert([
            'music'=>Str::random(15),
            'picture'=>Str::random(15),
            'text'=>Str::random(15),
            'text1'=>Str::random(15),
            'keyout'=> 1000 ,
        ]);
    }
}
