<?php

namespace App\Models\System;

use Faker\Generator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

class Config extends Model
{
    use HasFactory;

    
    protected $table= 'settings';

    protected $guarded = [];

    public $timestamps = false;

    
}
