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
            'nama' => Str::random(10).'nameanexample',
            'alamat' => Str::random(20).'alamatexample',
            'username' => Str::random(10).'example',
            'password' => Str::random(20).'password',
        ]);
    }
}
