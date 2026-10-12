<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Tool;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Tool>
 */
class ToolFactory extends Factory
{
    public function definition(): array
    {
        $name = Str::title($this->faker->unique()->words(2, true));

        return [
            'category_id' => Category::factory(),
            'name' => $name,
            'slug' => Str::slug($name),
            'short_description' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'icon' => 'code',
            'is_active' => true,
            'is_premium' => false,
            'ads_enabled' => true,
            'sort_order' => 0,
        ];
    }

    public function inactive(): static
    {
        return $this->state(['is_active' => false]);
    }

    public function premium(): static
    {
        return $this->state(['is_premium' => true]);
    }
}
