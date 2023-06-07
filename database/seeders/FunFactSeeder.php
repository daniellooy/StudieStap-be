<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FunFactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('funfact')->insert([
            'fact' => 'Als je actief bent geweest voordat je gaat leren, je hersenen dat dan ook zijn? Hierdoor kun je daadwerkelijk meer leerstof opslaan.'
        ]);
    }
}
