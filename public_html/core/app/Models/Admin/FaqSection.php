<?php

namespace App\Models\Admin;

use Faker\Generator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

class FaqSection extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];

    public function migration(Blueprint $table)
    {
        $table->id();
        $table->string('question');
        $table->string('answer');
    }

    public function definition(Generator $faker)
    {
        return [
            'name' => $faker->name,
            'created_at' => $faker->dateTimeThisMonth,
        ];
    }
}
