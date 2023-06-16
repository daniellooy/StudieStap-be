<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //achievement 1 LOB-influencer
        DB::table('subs')->insert([
            'achievement_id' => 1,
            'amount' => 5,
            "points" => 100,
            "rang" => 1
        ]);
        DB::table('subs')->insert([
            'achievement_id' => 1,
            'amount' => 10,
            "points" => 100,
            "rang" => 2
        ]);
        DB::table('subs')->insert([
            'achievement_id' => 1,
            'amount' => 50,
            "points" => 1000,
            "rang" => 3
        ]);
        DB::table('subs')->insert([
            'achievement_id' => 1,
            'amount' => 100,
            "points" => 1500,
            "rang" => 4
        ]);

        //achievement 2 carriereswitch
        DB::table('subs')->insert([
            'achievement_id' => 2,
            'amount' => 6,
            "points" => 100,
            "rang" => 1
        ]);
        DB::table('subs')->insert([
            'achievement_id' => 2,
            'amount' => 7,
            "points" => 100,
            "rang" => 2
        ]);
        DB::table('subs')->insert([
            'achievement_id' => 2,
            'amount' => 8,
            "points" => 200,
            "rang" => 3
        ]);
        DB::table('subs')->insert([
            'achievement_id' => 2,
            'amount' => 9,
            "points" => 200,
            "rang" => 4
        ]);
        DB::table('subs')->insert([
            'achievement_id' => 2,
            'amount' => 10,
            "points" => 500,
            "rang" => 5
        ]);

        //achievement 3 globetrotter
        DB::table('subs')->insert([
            'achievement_id' => 3,
            'amount' => 5,
            "points" => 100,
            "rang" => 1
        ]);
        DB::table('subs')->insert([
            'achievement_id' => 3,
            'amount' => 10,
            "points" => 100,
            "rang" => 2
        ]);
        DB::table('subs')->insert([
            'achievement_id' => 3,
            'amount' => 50,
            "points" => 1000,
            "rang" => 3
        ]);
        DB::table('subs')->insert([
            'achievement_id' => 3,
            'amount' => 100,
            "points" => 1500,
            "rang" => 4
        ]);

        //achievement 4 Ga er maar uit!
        DB::table('subs')->insert([
            'achievement_id' => 4,
            'amount' => 1,
            "points" => 500,
            "rang" => 1
        ]);
    }
}
