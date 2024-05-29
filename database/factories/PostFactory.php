<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'title' => $this->faker->sentence(mt_rand(4,8)), //mt_rand(4,8) untuk title nya berapa dari 4 sampai 8
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(),
            // 'body' =>'<p>' . implode('</p><p>',$this->faker->paragraphs(mt_rand(6,10))) .'</p>',
            'body' => collect($this->faker->paragraphs(mt_rand(6,10)))
            ->map(fn($p) => "<p>$p</p>")
            ->implode(''),
            'user_id' => mt_rand(1,3),
            'category_id' => mt_rand(1,3)
        ];
    }
}
