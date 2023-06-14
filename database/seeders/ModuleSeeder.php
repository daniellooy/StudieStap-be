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

        $demo_cat = LearningCategory::factory()->create(['title' => 'Demo Categorie', 'description'=>'De demo categorie, met relevante modules']);

        $demo_module = Module::factory()->for($demo_cat)->create(['title'=> 'Demo module']);
        $demo_video = Video::factory()->for($demo_module)->create([
            'title' => 'Demo Video',
            'description' => 'Een video over de Bijlmerramp van NOS op 3',
            'file_path' => '/videos/demo.mp4'
        ]);

        $demo_questionone = Question::factory()->create([
            'video_id' => $demo_video->id,
            'question' => 'Vanaf waar vertrok het vliegtuig?',
            'explanation' => 'In de video is te zien dat het vliegtuig vanaf Schiphol vertrok'
        ]);

        $demo_questionone_answerone = Question_Answer::factory()->create([
            'question_id' => $demo_questionone->id,
            'answer' => 'Schiphol',
            'correct' => true,
        ]);

        $demo_questionone_answertwo = Question_Answer::factory()->create([
            'question_id' => $demo_questionone->id,
            'answer' => 'Brussel',
            'correct' => false,
        ]);

        $demo_questionone_answerthree = Question_Answer::factory()->create([
            'question_id' => $demo_questionone->id,
            'answer' => 'London',
            'correct' => false,
        ]);

        $demo_questionone_answerfour = Question_Answer::factory()->create([
            'question_id' => $demo_questionone->id,
            'answer' => 'Berlijn',
            'correct' => false,
        ]);

        $demo_questiontwo = Question::factory()->create([
            'video_id' => $demo_video->id,
            'question' => 'Waar ging het vliegtuig naar toe?',
            'explanation' => 'In de video is te zien dat het vliegtuig naar Tel Aviv zou gaan'
        ]);

        $demo_questiontwo_answerone = Question_Answer::factory()->create([
            'question_id' => $demo_questiontwo->id,
            'answer' => 'Brussel',
            'correct' => false,
        ]);

        $demo_questiontwo_answertwo = Question_Answer::factory()->create([
            'question_id' => $demo_questiontwo->id,
            'answer' => 'Kopenhagen',
            'correct' => false,
        ]);

        $demo_questiontwo_answerthree = Question_Answer::factory()->create([
            'question_id' => $demo_questiontwo->id,
            'answer' => 'Berlijn',
            'correct' => false,
        ]);

        $demo_questiontwo_answerfour = Question_Answer::factory()->create([
            'question_id' => $demo_questiontwo->id,
            'answer' => 'Tel Aviv',
            'correct' => true,
        ]);



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
