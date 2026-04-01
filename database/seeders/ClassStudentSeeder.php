<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            ['name' => 'Kelas X'],
            ['name' => 'Kelas XI'],
            ['name' => 'Kelas XII'],
        ];

        DB::table('class_students')->insert($classes);
    }
}
