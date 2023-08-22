<?php

namespace Database\Factories;

use App\Models\TsUserLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

class TsUserLevelFactory extends Factory
{
    protected $model = TsUserLevel::class;

    public function definition()
    {
        return app($this->model)->definition($this->faker);
    }
}
