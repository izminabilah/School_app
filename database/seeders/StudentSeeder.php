<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            'name' => 'rani',
            'username' => 'rani@student.com',
            'password' => 'rani123',
            'address' => 'Jl. Kebayoran Baru No. 15, Jakarta Selatan',
            'Gender' => 'Male',
            'parent_id' => 1,
            'class_student_id' => 1,
            'religion' => 'Islam',
        ]);
    }
}
