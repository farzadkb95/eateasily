<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestPrice extends Model
{
    protected $table = 'test_prices'; // Define the table name

    protected $fillable = ['price']; // Make 'price' mass assignable
}
