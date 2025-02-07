<?php

namespace Database\Seeders;

use App\Models\Admin as adminmodel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        adminmodel::create([
            'name'=>'meysam',
            'username'=>'m.kh.1',
            'password'=>Hash::make('m.m.m.kh.1'),
            'owner'=>1,
            'superadmin'=>1,
        ]);
    }
}
