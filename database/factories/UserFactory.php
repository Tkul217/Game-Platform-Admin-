<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->unique()->userName,
            'password' => static::$password ??= Hash::make('password'),
            'registered_at' => now(),
            'last_login_at' => now()->addHours(3),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
