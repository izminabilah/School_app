<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            ['name' => 'Matematika'],
            ['name' => 'Bahasa Indonesia'],
            ['name' => 'Bahasa Inggris'],
            ['name' => 'IPA'],
            ['name' => 'IPS'],
            ['name' => 'Pendidikan Agama'],
            ['name' => 'Pendidikan Kewarganegaraan'],
            ['name' => 'Seni Budaya'],
            ['name' => 'Prakarya'],
            ['name' => 'Penjaskes'],
            ['name' => 'Informatika'],
        ];

        DB::table('subjects')->insert($subjects);
    }
}
