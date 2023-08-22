<?php

namespace Database\Factories;

use App\Models\CreateTask;
use Illuminate\Database\Eloquent\Factories\Factory;

class CreateTaskFactory extends Factory
{
    protected $model = CreateTask::class;

    public function definition()
    {
        return app($this->model)->definition($this->faker);
    }
}
