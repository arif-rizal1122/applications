<?php

namespace Database\Factories;

use App\Models\Category;
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
            //
            'title' => $this->faker->sentence(mt_rand(2,4)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->sentence(mt_rand(4, 4)),
            // 1
            // ini membuat paragraphs
            // setiap paragraphs ini mengembalikan array dibungkus dengan tag <p>
            // jadi setiap array ini dibungkus dengan tag <p>
            // 'body' => '<p>' . implode('<p></p>' ,$this->faker->paragraphs (mt_rand(5, 10))) . '</p> ',

            // 2
            // 'body' => collect($this->faker->paragraphs(mt_rand(5, 10)))->map(function($p){
            //     return "<p>$p</p>";
            // }),

            // 3 arrow function
            'body' => collect($this->faker->paragraphs(mt_rand(5, 10)))->map(fn($p) => "<p>$p</p>")->implode(''),

            'user_id' => mt_rand(1, 3),
            'category_id' => mt_rand(1,3)
        ];
    }
}
