<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $table = "driver_information";
    protected $fillable = ['booking_id','driver_name','licence_number','age'];

}
