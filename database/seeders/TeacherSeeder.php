<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = [
            [
                'name' => 'dwi',
                'email' => 'dwi@teacher.com',
                'username' => 'dwi@teacher.com',
                'password' => 'dwi123',
                'address' => 'Jl. Merdeka No. 10, Jakarta',
                'Gender' => 'Male',
            ]
        ];

        foreach ($teachers as $teacher) {
            DB::table('teachers')->insert($teacher);
        }
    }
}
