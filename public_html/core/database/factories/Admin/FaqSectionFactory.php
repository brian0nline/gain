<?php

namespace Database\Factories\Admin;

use App\Models\Admin\FaqSection;
use Illuminate\Database\Eloquent\Factories\Factory;

class FaqSectionFactory extends Factory
{
    protected $model = FaqSection::class;

    public function definition()
    {
        return app($this->model)->definition($this->faker);
    }
}
