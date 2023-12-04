<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\GameVersion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class GameVersionFactory extends Factory
{
    protected $model = GameVersion::class;

    public function definition(): array
    {
        return [
            'game_id' => Game::factory(),
            'version_timestamp' => Carbon::now()->addDay(),
            'path' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
