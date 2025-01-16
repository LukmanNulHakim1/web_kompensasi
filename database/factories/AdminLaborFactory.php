<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Admin;
use App\Models\Labor;

class AdminLaborFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'),
            'labor_id' => Labor::inRandomOrder()->first()->id ?? Labor::factory()->create()->id,
            'admin_id' => Admin::inRandomOrder()->first()->id ?? Admin::factory()->create()->id,
        ];
    }
}
