<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parents = [
            [
                'name' => 'budi',
                'username' => 'budi@parent.com',
                'password' => 'budi123',
            ]
        ];

        foreach ($parents as $parent) {
            DB::table('parents')->insert($parent);
        }
    }
}
