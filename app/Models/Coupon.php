<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    // Define the table name if it doesn't follow Laravel's naming conventions
    protected $table = 'coupons';

    // Define the fillable fields
    protected $fillable = [
        'code',
        'discount_type',
        'value',
        'expiry_date',
    ];
}
