<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\str;

class Callus extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('callus')->insert([
            'gmail'=>'persiantopmusic@gmail.com',
            'telegram'=>null,
            'instagram'=>null,
            'phoneNumber'=>null,
        ]);
    }
}
