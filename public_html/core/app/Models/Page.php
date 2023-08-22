<?php

namespace App\Models;

use Faker\Generator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

class Page extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function migration(Blueprint $table)
    {
        $table->id();
        $table->string('type')->default('blog')->comment('blog|nav|footer');
        $table->string('title');
        $table->string('slug');
        $table->string('img');
        $table->longText('content');
        $table->boolean('isCompleted')->default(0)->comment('0 Uncompleted| 1 Completed');
        $table->timestamp('created_at')->nullable();
        $table->timestamp('updated_at')->nullable();
    }

    public function definition(Generator $faker)
    {
        return [
            'name' => $faker->name,
            'created_at' => $faker->dateTimeThisMonth,
        ];
    }
}
