<?php

namespace Database\Factories;

use App\Models\FaqSection;
use Illuminate\Database\Eloquent\Factories\Factory;

class FaqSectionFactory extends Factory
{
    protected $model = FaqSection::class;

    public function definition()
    {
        return app($this->model)->definition($this->faker);
    }
}
