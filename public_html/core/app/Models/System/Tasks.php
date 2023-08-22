<?php

namespace App\Models\System;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tasks extends Model
{
    use HasFactory;

    protected $guarded = [];



    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function jobs()
    {
        return $this->hasMany(Jobs::class, 'tasks_id');
    }


    public function scopeStatus($query, $type)
    {
        return $query->where('status', $type);
            
    }
}
