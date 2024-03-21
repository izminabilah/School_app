<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TUSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('tu')->insert([
            'nama' => 'izmi',
            'alamat' => 'jakarta',
            'username' => 'izminabilah',
            'password' => 'izmi',
        ]);
    }
}
