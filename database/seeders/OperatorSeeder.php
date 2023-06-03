<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('operators')->insert([
            'clearance_id' => 1,
            'name' => "Administrator",
            'password' => Hash::make('admin123'),
            'email' => 'admin@example.com'
        ]);

        DB::table('operators')->insert([
            'clearance_id' => 2,
            'name' => "Fajar Sulaiman",
            'password' => Hash::make('fajarartree'),
            'email' => 'fajar@example.com'
        ]);
        
        DB::table('operators')->insert([
            'clearance_id' => 3,
            'name' => "Dendi Rahardjo",
            'password' => Hash::make('dendiweb'),
            'email' => 'dendi@example.com'
        ]);
        
        DB::table('operators')->insert([
            'clearance_id' => 3,
            'name' => "Dimas Maher Suprapto",
            'password' => Hash::make('dimasweb'),
            'email' => 'dimas@example.com'
        ]);
        
        DB::table('operators')->insert([
            'clearance_id' => 4,
            'name' => "Natasha Chrystallie",
            'password' => Hash::make('natashaworker'),
            'email' => 'natasha@example.com'
        ]);
        
        DB::table('operators')->insert([
            'clearance_id' => 4,
            'name' => "Hendrik Tjahyadi",
            'password' => Hash::make('hendrikworker'),
            'email' => 'hendrik@example.com'
        ]);
        
        DB::table('operators')->insert([
            'clearance_id' => 4,
            'name' => "Tono Jaya Rahardja",
            'password' => Hash::make('tonoworker'),
            'email' => 'tono@example.com'
        ]);
    }
}
