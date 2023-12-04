<?php

namespace Database\Factories;

use App\Models\GameScore;
use App\Models\GameVersion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class GameScoreFactory extends Factory
{
    protected $model = GameScore::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'game_version_id' => GameVersion::factory(),
            'played_at' => Carbon::now()->addDay(),
            'score' => $this->faker->numberBetween(-2147483648, 2147483647),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
