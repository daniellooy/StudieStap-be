<?php

namespace Database\Seeders;

use App\Models\LearningCategory;
use App\Models\Question;
use App\Models\Question_Answer;
use Database\Factories\LearningcategoryFactory;
use Database\Factories\ModuleFactory;
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
        $learning_cat1 = LearningCategory::factory()->create(['title' => 'Categorie 1']);
        $learning_cat2 = LearningCategory::factory()->create(['title' => 'Categorie 2']);


        Module::factory()
            ->for($learning_cat1)
            ->has(Video::factory()
                ->has(Question::factory()->has(Question_Answer::factory()->count(4)))
                ->count(3))
            ->create(
                ['title' => 'Klassenmanagement']
        );


        Module::factory()
            ->for($learning_cat1)
            ->has(Video::factory()->count(3))
            ->create(
                ['title' => 'Veilige omgeving']
            );


        Module::factory()
            ->for($learning_cat2)
            ->has(Video::factory()->count(3))
            ->create(
                ['title' => 'Bevorderen van waardeontwikkeling']
            );

        Module::factory()
            ->for($learning_cat2)
            ->has(Video::factory()->count(3))
            ->create(
                ['title' => 'Identiteitsontwikkeling']
            );
    }
}
