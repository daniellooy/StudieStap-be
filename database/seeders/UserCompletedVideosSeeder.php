<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserCompletedVideosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_completed_videos')->insert([
            'user_id' => 1,
            'video_id' => 1,
        ]);

        DB::table('user_completed_videos')->insert([
            'user_id' => 2,
            'video_id' => 1,
        ]);
    }
}
