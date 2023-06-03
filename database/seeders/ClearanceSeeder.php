<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClearanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clearance')->insert(
            [ 'id' => 1, 'role' => "Administrator" ]
        );
        DB::table('clearance')->insert(
            [ 'id' => 2, 'role' => "Owner" ]
        );
        DB::table('clearance')->insert(
            [ 'id' => 3, 'role' => "Web Manager" ]
        );
        DB::table('clearance')->insert(
            [ 'id' => 4, 'role' => "Worker" ]
        );
    }
}
