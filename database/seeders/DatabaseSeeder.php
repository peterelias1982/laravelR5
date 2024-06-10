<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Client;
use App\Models\City;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create();
        City::factory(20)->create();
        Client::factory(20)->create();
    }
}
