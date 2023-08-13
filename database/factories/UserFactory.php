<?php
declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;
use App\Models\User as UserModel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            UserModel::NAME => fake()->name(),
            UserModel::EMAIL => fake()->unique()->safeEmail(),
            UserModel::EMAIL_VERIFIED_AT => now(),
            UserModel::PASSWORD => fake()->password(),
            UserModel::REMEMBER_TOKEN => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            UserModel::EMAIL_VERIFIED_AT => null,
        ]);
    }

    /**
     * Prepare attributes for the default user record
     */
    public function default(): static
    {
        return $this->state(fn (array $attributes) => [
            UserModel::EMAIL => Config::get('auth.default_user.email'),
            UserModel::PASSWORD => Config::get('auth.default_user.password'),
        ]);
    }
}
