<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Guest extends Model
{
    use HasFactory;

    public function tests(): HasMany
    {
        return $this->hasMany(Data::class);
    }

    public function latestTest(): HasOne
    {
        return $this->hasOne(Data::class)->latestOfMany();
    }
}
