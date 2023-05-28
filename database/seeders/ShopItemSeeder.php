<?php

namespace Database\Seeders;

use App\Models\ShopItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShopItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShopItem::create([
            'name'=>'€10,00 Workshop budget',
            'description'=>'Met workshop budget kan je iets kopen om je workshop leuker te maken.',
            'price'=>1000,
        ]);

        ShopItem::create([
            'name'=>'€20,00 Workshop budget',
            'description'=>'Met workshop budget kan je iets kopen om je workshop leuker te maken.',
            'price'=>1500,
        ]);
    }
}
