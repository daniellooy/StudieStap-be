<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Question_Answer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Module;
use App\Models\Video;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Module::factory()
            ->has(Video::factory()
                ->has(Question::factory()->has(Question_Answer::factory()->count(4)))
                ->count(3))
            ->create(
                ['title' => 'Klassenmanagement']
        );

        Module::factory()
            ->has(Video::factory()->count(3))
            ->create(
                ['title' => 'Veilige omgeving']
            );

        Module::factory()
            ->has(Video::factory()->count(3))
            ->create(
                ['title' => 'Bevorderen van waardeontwikkeling']
            );

        Module::factory()
            ->has(Video::factory()->count(3))
            ->create(
                ['title' => 'Identiteitsontwikkeling']
            );
    }
}
