<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::create(["type" => "könyv"]);
        Category::create(["type" => "magazin"]);
        Category::create(["type" => "napilap"]);
        Category::create(["type" => "szórólap"]);

        Order::factory(20)->create();
    }
}
