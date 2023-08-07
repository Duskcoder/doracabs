<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = "bookings";
    protected $fillable = [
        'id',
        'from_place',
        'to_place',
        'car_id', 
        'status',
        'oneway_round', 
        'charge_per_km',
        'distance',
        'amount',
        'depart_date_time',
        'cust_name',
        'cust_email',
        'cust_mbl',
        'pickup_add',
        'drop_add', 
        'days',
        'actual_amount', 
        'driver_bata'
     ];
     public function driver()
     {
         return $this->hasOne(Driver::class,'booking_id','id');
     }
 
     public function vehicle()
     {
         return $this->hasOne(Vehicle::class,'booking_id','id');
     }
 
     public function payment()
     {
         return $this->hasOne(Payment::class,'booking_id','id');
     }
}
