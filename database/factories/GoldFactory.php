<?php

namespace Database\Factories;

use App\Models\Faction;
use App\Models\Server;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gold>
 */
class GoldFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'server_id' => Server::get()->random()->id,
            'faction_id' => Faction::get()->random()->id,
            'seller_id' => User::get()->random()->id,
            'price' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
