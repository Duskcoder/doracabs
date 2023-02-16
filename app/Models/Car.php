<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = 'cars';
    public $primaryKey = "id";
    public $timestamps = true;
	protected $dates = ['deleted_at'];
	protected $fillable = ['model_name','oneway_km_cost','round_km_cost','actual_file_name','file_name','file_path'];
}
