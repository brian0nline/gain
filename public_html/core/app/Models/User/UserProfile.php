<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProfile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongTo(User::class,'user_id', 'id');
    }
}
