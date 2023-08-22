<?php

namespace Database\Factories\System;

use App\Models\System\Config;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConfigFactory extends Factory
{
    protected $model = Config::class;

    public function definition()
    {
        return app($this->model)->definition($this->faker);
    }
}
