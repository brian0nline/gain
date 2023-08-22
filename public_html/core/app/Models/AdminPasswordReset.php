<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminPasswordReset extends Model
{
    public $timestamps = false;
    protected $table = "admin_password_resets";
    protected $guarded = ['id'];
}
