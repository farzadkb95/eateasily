<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    public function data(): BelongsTo
    {
        return $this->belongsTo(Data::class);
    }

    protected function casts(): array
    {
        return [
            'info' => 'json',
            'amount' => 'float',
        ];
    }
}
