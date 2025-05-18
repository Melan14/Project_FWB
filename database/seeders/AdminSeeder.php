<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('Users')->insert([
            'nama'       => 'Admin Culinary',
            'email'      => 'admin@culinary.local',
            'password'   => Hash::make('admin123'), // pastikan password dienkripsi
            'role'       => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
