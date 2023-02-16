<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $table = "vehicle_information";
    protected $fillable = ['booking_id','vehicle_name','vehicle_number','vehicle_seats'];
}
