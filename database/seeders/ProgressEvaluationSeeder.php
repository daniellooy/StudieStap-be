<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgressEvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('progressevaluations')->insert([
            'title' => 'Evaluatie 3 April',
            'user_id' => 1
        ]);

        DB::table('progressevaluations')->insert([
            'title' => 'Evaluatie 3 Mei',
            'user_id' => 1
        ]);

        DB::table('progressevaluations')->insert([
            'title' => 'Evaluatie 3 Juni',
            'user_id' => 1
        ]);
    }
}
