<?php

namespace Database\Factories;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Chat>
 */
class ChatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $senderId = User::query()->inRandomOrder()->value('id');

        return [
            'sender_id' => $senderId,
            'receiver_id' => User::query()
                ->whereKeyNot($senderId)
                ->inRandomOrder()
                ->value('id'),
            'message' => fake()->sentence(),
            'created_at' => fake()->dateTime(),
        ];
    }
}
