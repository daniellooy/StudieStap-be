<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgressRubricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('progressrubrics')->insert(
            [
                'title' => 'Klassenmanagement',
                'description' => 'Lorem Ipsum Dolor Sit Amet'
            ]
        );

        DB::table('progressrubrics')->insert(
            [
                'title' => 'Didactiek',
                'description' => 'Lorem Ipsum Dolor Sit Amet'
            ]
        );

        DB::table('progressrubrics')->insert(
            [
                'title' => 'Veilige Leeromgeving',
                'description' => 'Lorem Ipsum Dolor Sit Amet'
            ]
        );

        DB::table('progressrubrics')->insert(
            [
                'title' => 'Enthousiasmeren',
                'description' => 'Lorem Ipsum Dolor Sit Amet'
            ]
        );

        DB::table('progressrubrics')->insert(
            [
                'title' => 'Waardeontwikkeling',
                'description' => 'Lorem Ipsum Dolor Sit Amet'
            ]
        );

    }
}
