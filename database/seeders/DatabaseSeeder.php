<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\UserCompletedVideos;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File as FileFacade;
use App\Models\Channel;
use App\Models\User;
use App\Models\UserChannel;
use App\Models\Message;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'firstname' => 'Peter',
            'lastname' => 'van Rijn',
            'date_of_birth' => '1998-11-06',
            'email' => 'petervanrijn@hotmail.nl',
            'image' => 'images/profile.jpg',
            'password'=> bcrypt('password'),
        ]);
        $this->call([
            UserSeeder::class,
            WorkshopSeeder::class,
            AchievementSeeder::class,
            SubSeeder::class,
            ModuleSeeder::class,
            ShopItemSeeder::class,
            VideoSeeder::class,
            UserCompletedVideosSeeder::class,
            ProgressRubricSeeder::class,
            ProgressEvaluationSeeder::class,
            ProgressScoreSeeder::class,
            FunFactSeeder::class,
            FeaturedModuleSeeder::class,
        ]);
        // make channels
        $image = ['images/Alpha-Symbol.png', 'images/Beta-Symbol.jpg'];
        // get a random image from the array
        $randomImage = $image[array_rand($image)];
        $channels = Channel::factory()->count(3)->create([
            'image_path' => $randomImage,
        ]);
        foreach ($channels as $channel) {
            foreach (User::all() as $user) {
              $userChannel = UserChannel::factory()->create([
                    'user_id' => $user->id,
                    'channel_id' => $channel->id,
                ]);
                Message::factory()->count(1)->create([
                    'user_id' => $userChannel->user_id,
                    'channel_id' => $userChannel->channel_id,
                ]);
            }
        }


        // UserChannel::factory()->count(10)->create();

    }
}
