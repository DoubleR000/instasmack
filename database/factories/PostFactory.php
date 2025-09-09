<?php

namespace Database\Factories;

use App\Models\Media;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraphs(3, true),
            'user_id' => \App\Models\User::factory(),
        ];
    }

    public function withMedia()
    {
        return $this->afterCreating(function (Post $post) {
            $numberOfMedia = $this->faker->numberBetween(1, 3);

            for ($i = 0; $i < $numberOfMedia; $i++) {
                $media = Media::factory()->for($post)->make();

                $media->position = $i;

                $media->save();
            }
        });
    }
}
