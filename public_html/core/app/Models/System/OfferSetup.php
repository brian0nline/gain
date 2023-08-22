<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OfferSetup extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function log()
    {
        return $this->hasMany(OfferLog::class, 'offer_id', 'id');
    }

    public function scopeActive($query)
    {
        return $query->where('isActive', true);
    }
}
