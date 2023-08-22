<?php

namespace Database\Factories;

use App\Models\HomePage;
use Illuminate\Database\Eloquent\Factories\Factory;

class HomePageFactory extends Factory
{
    protected $model = HomePage::class;

    public function definition()
    {
        return app($this->model)->definition($this->faker);
    }
}
