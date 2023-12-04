<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Game;
use App\Models\GameScore;
use App\Models\GameVersion;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Admin::factory(10)->create();
        Game::factory(10)->create();
        GameScore::factory(10)->create();
        GameVersion::factory(10)->create();
    }
}
