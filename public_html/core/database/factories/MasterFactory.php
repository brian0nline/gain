<?php

namespace Database\Factories;

use App\Models\Master;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterFactory extends Factory
{
    protected $model = Master::class;

    public function definition()
    {
        return app($this->model)->definition($this->faker);
    }
}
