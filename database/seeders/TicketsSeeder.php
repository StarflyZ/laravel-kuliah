<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class TicketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tickets')->insert([
            [
                'report' => Str::random(30),
                'place_id' => mt_rand(1,3),
            ],
            [
                'report' => Str::random(30),
                'place_id' => mt_rand(1,3),
            ],
            [
                'report' => Str::random(30),
                'place_id' => mt_rand(1,3),
            ]
        ]);
    }
}
