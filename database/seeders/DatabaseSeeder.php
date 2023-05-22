<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File as FileFacade;
use App\Models\Channel;
use App\Models\User;
use App\Models\UserChannel;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
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
        ]);
        // make channels
        $channels = Channel::factory()->count(3)->create();
        foreach ($channels as $channel) {
            foreach (User::all() as $user) {
              UserChannel::factory()->create([
                    'user_id' => $user->id,
                    'channel_id' => $channel->id,
                ]);
            }
        }


        // UserChannel::factory()->count(10)->create();
        $image = FileFacade::files(public_path('images'));

    }
}
