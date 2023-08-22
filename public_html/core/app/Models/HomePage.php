<?php

namespace App\Models;

use Faker\Generator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

class HomePage extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = ['value' => 'array'];
    protected $fillable = ['value', 'name'];

    public function migration(Blueprint $table)
    {
        $table->id();
        $table->string('name');
        $table->boolean('isActive')->default(0)->comment('0 Inactive| 1 Active');
        $table->longText('value');
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