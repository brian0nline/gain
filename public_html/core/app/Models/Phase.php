<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phase extends Model
{
    protected $guarded = ['id'];


    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

}
