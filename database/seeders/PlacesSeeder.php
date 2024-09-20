<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('places')->insert([
            [
                'name' => Str::random(20),
                'description' => Str::random(40),
                'address' => Str::random(40),
                'postcode' => mt_rand(10000, 90000),
                'city' => Str::random(40),
                'province' => Str::random(40),
                'latitude' => mt_rand(-90000000, 90000000) / 1000000,
                'longtitude' => mt_rand(-90000000, 90000000) / 1000000,
                'type_id' => 2,
            ],
            [
                'name' => Str::random(20),
                'description' => Str::random(40),
                'address' => Str::random(40),
                'postcode' => mt_rand(10000, 90000),
                'city' => Str::random(40),
                'province' => Str::random(40),
                'latitude' => mt_rand(-90000000, 90000000) / 1000000,
                'longtitude' => mt_rand(-90000000, 90000000) / 1000000,
                'type_id' => 1,
            ],
            [
                'name' => Str::random(20),
                'description' => Str::random(40),
                'address' => Str::random(40),
                'postcode' => mt_rand(10000, 90000),
                'city' => Str::random(40),
                'province' => Str::random(40),
                'latitude' => mt_rand(-90000000, 90000000) / 1000000,
                'longtitude' => mt_rand(-90000000, 90000000) / 1000000,
                'type_id' => 3,
            ]
        ]);
    }
}
