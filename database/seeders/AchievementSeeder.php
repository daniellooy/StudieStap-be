<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('achievements')->insert([
            'name' => "LOB-influencer",
            'description' => "Hoeveel kids heb je in een klas lesgegeven?",
        ]);
        DB::table('achievements')->insert([
            'name' => "Carriereswitch?",
            'description' => "Hoe hoog worden je workshops beoordeeld?",
        ]);
        DB::table('achievements')->insert([
            'name' => "GLobetrotter",
            'description' => "Ga mee naar projecten",
        ]);
        DB::table('achievements')->insert([
            'name' => "Ga er maar uit!",
            'description' => "Stuur een kind naar waar hij vandaan komt",
        ]);
    }
}
