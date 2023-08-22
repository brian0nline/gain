<?php

namespace Database\Factories;

use App\Models\LiveState;
use Illuminate\Database\Eloquent\Factories\Factory;

class LiveStateFactory extends Factory
{
    protected $model = LiveState::class;

    public function definition()
    {
        return app($this->model)->definition($this->faker);
    }
}
