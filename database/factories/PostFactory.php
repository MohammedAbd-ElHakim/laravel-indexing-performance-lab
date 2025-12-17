<?php

namespace Database\Factories;

use APP\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model= Post::class; 
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
        public function definition()
    {
        return [
            'title'=>$this->faker->sentence(4),
            'body'=>$this->faker->paragraph(10),
            'created_at'=>now()->subDays(rand(0,60)),
            'updated_at'=>now(),
        ];
    }
     public function trashed()
    {
        return $this->state(fn () => [
            'deleted_at' => now()->subDays(rand(1, 40)),
        ]);
    }
}
