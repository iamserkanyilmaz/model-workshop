<?php

namespace Database\Factories;

use App\Models\Podcast;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'content_type' => 'podcast',
            'content_id' => Podcast::all()->random()->id,
            'user_type_id' =>  UserType::all()->random()->id,
        ];
    }
}
