<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgressScoreSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('progressscores')->insert([
            'progressrubric_id' => 1,
            'progressevaluation_id' => 1,
            'score' => 20
        ]);

        DB::table('progressscores')->insert([
            'progressrubric_id' => 2,
            'progressevaluation_id' => 1,
            'score' => 20
        ]);

        DB::table('progressscores')->insert([
            'progressrubric_id' => 3,
            'progressevaluation_id' => 1,
            'score' => 15
        ]);

        DB::table('progressscores')->insert([
            'progressrubric_id' => 4,
            'progressevaluation_id' => 1,
            'score' => 20
        ]);

        DB::table('progressscores')->insert([
            'progressrubric_id' => 5,
            'progressevaluation_id' => 1,
            'score' => 20
        ]);

        DB::table('progressscores')->insert([
            'progressrubric_id' => 1,
            'progressevaluation_id' => 2,
            'score' => 30
        ]);

        DB::table('progressscores')->insert([
            'progressrubric_id' => 2,
            'progressevaluation_id' => 2,
            'score' => 30
        ]);

        DB::table('progressscores')->insert([
            'progressrubric_id' => 3,
            'progressevaluation_id' => 2,
            'score' => 25
        ]);

        DB::table('progressscores')->insert([
            'progressrubric_id' => 4,
            'progressevaluation_id' => 2,
            'score' => 30
        ]);

        DB::table('progressscores')->insert([
            'progressrubric_id' => 5,
            'progressevaluation_id' => 2,
            'score' => 30
        ]);

        DB::table('progressscores')->insert([
            'progressrubric_id' => 1,
            'progressevaluation_id' => 3,
            'score' => 40
        ]);

        DB::table('progressscores')->insert([
            'progressrubric_id' => 2,
            'progressevaluation_id' => 3,
            'score' => 40
        ]);

        DB::table('progressscores')->insert([
            'progressrubric_id' => 3,
            'progressevaluation_id' => 3,
            'score' => 45
        ]);

        DB::table('progressscores')->insert([
            'progressrubric_id' => 4,
            'progressevaluation_id' => 3,
            'score' => 40
        ]);

        DB::table('progressscores')->insert([
            'progressrubric_id' => 5,
            'progressevaluation_id' => 3,
            'score' => 40
        ]);
    }
}
