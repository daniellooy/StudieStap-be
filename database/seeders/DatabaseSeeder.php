<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File as FileFacade;

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
            ModuleSeeder::class,
            AchievementSeeder::class,
            SubSeeder::class,

        ]);
        $image = FileFacade::files(public_path('images'));

    }
}
